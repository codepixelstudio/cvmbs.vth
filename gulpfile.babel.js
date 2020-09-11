'use strict';

    import plugins       from 'gulp-load-plugins';
    import yargs         from 'yargs';
    import browser       from 'browser-sync';
    import gulp          from 'gulp';
    import rimraf        from 'rimraf';
    import yaml          from 'js-yaml';
    import fs            from 'fs';
    import dateFormat    from 'dateformat';
    import webpackStream from 'webpack-stream';
    import webpack2      from 'webpack';
    import named         from 'vinyl-named';
    import log           from 'fancy-log';
    import colors        from 'ansi-colors';
    import path          from 'path';
    import notify        from 'gulp-notify';

    // gulp plugins
    const $ = plugins();

    // check for --production flag
    const PRODUCTION = !!( yargs.argv.production );

    // check for --development flag
    const DEV = !!( yargs.argv.dev );

    // load settings from config.yml
    const { BROWSERSYNC, COMPATIBILITY, REVISIONING, PORT, PATHS } = loadConfig();

    // check if file exists synchronously
    function checkFileExists( filepath ) {

        let flag = true;

        try {

            fs.accessSync( filepath, fs.F_OK );

        } catch( e ) {

            flag = false;

        }

        return flag;

    }

    // loadConfig
    function loadConfig() {

        log( 'loading config file...' );

        if ( checkFileExists( 'config.yml' ) ) {

            log(

                colors.bold( colors.cyan( 'config.yml' ) ),
                'exists, loading',
                colors.bold( colors.cyan( 'config.yml') )

            );

            let ymlFile = fs.readFileSync( 'config.yml', 'utf8' );

            return yaml.load( ymlFile );

        } else if( checkFileExists( 'config-default.yml' ) ) {

            log(

                colors.bold( colors.cyan( 'config.yml' ) ),
                'does not exist, loading',
                colors.bold( colors.cyan( 'config-default.yml' ) )

            );

            let ymlFile = fs.readFileSync( 'config-default.yml', 'utf8' );

            return yaml.load( ymlFile );

        } else {

            log('exiting process, no config file exists' );
            log( 'error code:', err.code );
            process.exit( 1 );

        }

    }

    // clean production folder
    function clean( done ) {

        rimraf( PATHS.site, done );

    }

    // copy assets folder
    function copy() {

        return gulp.src( PATHS.assets )

            .pipe( gulp.dest( PATHS.site + '/assets' ) );

    }

    // compile SCSS
    function sass() {

        return gulp.src( 'src/assets/scss/cvmbs.vth.ui.scss' )

            .pipe( $.sourcemaps.init() )

            .pipe( $.sass( {

                includePaths : PATHS.sass

            } ).on( 'error', $.sass.logError ) )

            .pipe( $.sourcemaps.write() )

            .pipe( $.autoprefixer( {

                browsers : COMPATIBILITY

            } ) )

            .pipe( $.if( PRODUCTION,

                $.cleanCss( { compatibility: 'ie9' } )

            ) )

            .pipe( gulp.dest( PATHS.site + '/assets/css' ) )

            .pipe( notify({

                title: 'compiled',
                message: '<%= file.relative %> : <%= options.timestamp %>',
                onLast: true,
                icon: path.join( __dirname, notifycon_scss ),
                templateOptions: {

                    timestamp: timestamp

                }

            } ) )

            .pipe( browser.reload( { stream: true } ) );

    }

    // webpack
    const webpack = {

        config: {

            module: {

                rules: [{

                  test: /.js$/,
                  loader: 'babel-loader',
                  exclude: /node_modules(?![\\\/]foundation-sites)/,

                },],

            },

            externals: {

                jquery: 'jQuery',

            },

        },

        changeHandler( err, stats ) {

            log( '[webpack]', stats.toString({

                colors: true,

            }));

            browser.reload();

        },

        build() {

            return gulp.src( PATHS.entries )

                .pipe( named() )

                .pipe( webpackStream( webpack.config, webpack2 ) )

                .pipe( $.if( PRODUCTION, $.uglify()

                    .on( 'error', e => {

                        console.log( e );

                    }),

                ))

                .pipe( $.if( REVISIONING && PRODUCTION || REVISIONING && DEV, $.rev() ) )

                .pipe( gulp.dest( PATHS.site + '/assets/js' ) )

                .pipe( $.if( REVISIONING && PRODUCTION || REVISIONING && DEV, $.rev.manifest() ) )

                .pipe( gulp.dest( PATHS.site + '/assets/js' ) )

                .pipe( notify({

                    title: 'compiled',
                    message: '<%= file.relative %> : <%= options.timestamp %>',
                    onLast: true,
                    icon: path.join( __dirname, notifycon_js ),
                    templateOptions: {

                        timestamp: timestamp

                    }

                } ) );

        },

        watch() {

            const watchConfig = Object.assign( webpack.config, {

                watch: true,
                devtool: 'inline-source-map',

            });

            return gulp.src( PATHS.entries )

                .pipe( named() )

                .pipe( webpackStream( watchConfig, webpack2, webpack.changeHandler )
                    .on( 'error', ( err ) => {

                        log( '[webpack:error]', err.toString({

                            colors: true,

                        }));

                    }),

                )

                .pipe( gulp.dest( PATHS.site + '/assets/js' ) );

        },

    };

    gulp.task( 'webpack:build', webpack.build );
    gulp.task( 'webpack:watch', webpack.watch );

    // copy references folder
    function refs() {

        return gulp.src( 'src/.refs/**' )

            .pipe( gulp.dest( PATHS.site ) );

    }

    // copy deps folder
    function deps() {

        return gulp.src( 'src/assets/js/**' )

            .pipe( gulp.dest( PATHS.site + '/assets/js' ) );

    }

    // compile + minify JavaScript
    function javascript() {

        return gulp.src( PATHS.entries )

            .pipe( named() )

            .pipe( $.sourcemaps.init() )

            .pipe( webpackStream( webpackConfig, webpack2 ) )

            .pipe( $.concat( 'cvmbs.vth.app.min.js' ) )

            .pipe( $.uglify()

                .on( 'error', e => {

                    console.log( e );

                })

            )

            // .pipe( $.sourcemaps.write( './' ) )
            .pipe( $.sourcemaps.write( PATHS.site + '/assets/js' ) )

            .pipe( gulp.dest( PATHS.site + '/assets/js' ) )

            .pipe( notify({

                title: 'compiled',
                message: '<%= file.relative %> : <%= options.timestamp %>',
                onLast: true,
                icon: path.join( __dirname, notifycon_js ),
                templateOptions: {

                    timestamp: timestamp

                }

            } ) )

    }

    // copy + compress images
    function images() {

        return gulp.src( 'src/assets/img/**/*' )

            .pipe( $.if( PRODUCTION, $.imagemin( {

                progressive: true

            } ) ) )

            .pipe( gulp.dest( PATHS.site + '/assets/img' ) );

    }

    // create .zip archive
    function archive() {

        var time  = dateFormat( new Date(), 'yyyy-mm-dd_HH-MM' );
        var pkg   = JSON.parse( fs.readFileSync( './package.json' ) );
        var title = pkg.name + '_' + time + '.zip';

        return gulp.src(PATHS.package)

            .pipe( $.zip( title ) )

            .pipe( gulp.dest( 'packaged' ) );

    }

    // PHP CodeSniffer
    gulp.task( 'phpcs', function() {

        return gulp.src( PATHS.phpcs )

            .pipe( $.phpcs({

                bin: 'wpcs/vendor/bin/phpcs',
                standard: './codesniffer.ruleset.xml',
                showSniffCode: true,

            }))

            .pipe( $.phpcs.reporter( 'log' ) );

    });

    // PHP Code Beautifier
    gulp.task( 'phpcbf', function () {

        return gulp.src( PATHS.phpcs )

            .pipe( $.phpcbf({

                bin: 'wpcs/vendor/bin/phpcbf',
                standard: './codesniffer.ruleset.xml',
                warningSeverity: 0

            }))

            .on( 'error', log )

            .pipe( gulp.dest( '.' ) );

    });

    // start BrowserSync server
    function server( done ) {

        browser.init( {

            proxy: BROWSERSYNC.url,

            ui: {
                port: PORT
            },

        } );

        done();

    }

    // reload BrowserSync
    function reload( done ) {

        browser.reload();

        done();

    }

    // watch task(s)
    function watch() {

        gulp.watch( PATHS.assets, copy );

        gulp.watch( PATHS.docs, refs );

        gulp.watch( 'src/assets/scss/**/*.scss', sass, reload )

            .on( 'change', path => log(

                'file ' + colors.bold( colors.magenta( path ) ) + ' changed' ) )

            .on( 'unlink', path => log(

                'file ' + colors.bold( colors.magenta( path ) ) + ' was removed' ) );

        gulp.watch( '**/*.php', reload )

            .on( 'change', path => log(

                'file ' + colors.bold( colors.magenta( path ) ) + ' changed' ) )

            .on( 'unlink', path => log(

                'file ' + colors.bold( colors.magenta( path ) ) + ' was removed' ) );

        gulp.watch( 'src/assets/img/**/*' ).on( 'all',

            gulp.series( images, browser.reload )

        );

    }

    // notification variables
    var basedate = new Date();
    var timestamp = dateFormat( basedate, 'yyyy.mm.dd hh.MM' );

    var notifycon_scss = './etc/notifycon_scss.png';
    var notifycon_js   = './etc/notifycon_js.png';

    gulp.Gulp.prototype.__runTask = gulp.Gulp.prototype._runTask;
    gulp.Gulp.prototype._runTask = function( task ) {

        this.currentTask = task;
        this.__runTask(task);

    }

    // build production folder
    gulp.task( 'build',

        gulp.series( clean,

            gulp.parallel(

                sass,
                'webpack:build',
                images,
                copy,
                refs

            )

        )

    );

    // build site, run server, watch files
    gulp.task( 'default',

        gulp.series( 'build',

            server,
            gulp.parallel( 'webpack:watch', watch )

        )

    );

    // package
    gulp.task( 'package',

        gulp.series( 'build',

            archive

        )

    );
