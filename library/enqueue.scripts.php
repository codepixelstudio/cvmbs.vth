<?php

if ( ! function_exists( 'foundationpress_asset_path' ) ) :

	function foundationpress_asset_path( $filename ) {

		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {

			$manifest = json_decode( file_get_contents( $manifest_path ), true );

		} else {

			$manifest = [];

		}

		if ( array_key_exists( $filename, $manifest ) ) {

			return $manifest[ $filename ];

		}

		return $filename;

	}

endif;


if ( ! function_exists( 'foundationpress_scripts' ) ) :

	function foundationpress_scripts() {

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path( 'cvmbs.ui.css' ), array(), '1.0.0', 'all' );

        // Enqueue the main Stylesheet.
		wp_enqueue_style( 'local-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path( 'cvmbs.vth.ui.css' ), array(), '1.0.0', 'all' );

		// Deregister the jquery version bundled with WordPress.
		// wp_deregister_script( 'jquery' );
		wp_deregister_script( 'wp-embed' );

		// dequeue Gutenburg bloat
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'cvmbs', get_template_directory_uri() . '/dist/assets/js/' . foundationpress_asset_path( 'cvmbs.app.js' ), array( 'jquery' ), false, true );

        // Enqueue Foundation scripts
		wp_enqueue_script( 'local', get_stylesheet_directory_uri() . '/dist/assets/js/' . foundationpress_asset_path( 'cvmbs.vth.app.js' ), array( 'jquery' ), '1.0.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );

	// defer.js
	function defer_cvmbs_scripts_and_styles( $tag, $handle, $src ) {

        if ( 'cvmbs' === $handle ){

			// return str_replace(' src', ' defer="defer" src', $tag );
	        return str_replace( ' src=', ' async src=', $tag );

		}

        return $tag;

    }

	// add filter
	add_filter( 'script_loader_tag', 'defer_cvmbs_scripts_and_styles', 10, 3 );

	// defer.js
	function defer_jquery_load( $tag, $handle, $src ) {

        if ( 'jquery' === $handle ){

			// return str_replace(' src', ' defer="defer" src', $tag );
	        return str_replace( ' src=', ' async src=', $tag );

		}

        return $tag;

    }

	// add filter
	add_filter( 'script_loader_tag', 'defer_jquery_load', 10, 3 );

endif;

?>
