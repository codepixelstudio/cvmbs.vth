<?php

    // save any ACF data to child theme
    add_filter( 'acf/settings/save_json', function() {

        return get_stylesheet_directory() . '/acf-json';

    });

    // load ACF from parent theme
    add_filter( 'acf/settings/load_json', function( $paths ) {

        $paths = array( get_template_directory() . '/acf-json' );

        if ( is_child_theme() ) {

            $paths[] = get_stylesheet_directory() . '/acf-json';

        }

        return $paths;

    });

?>
