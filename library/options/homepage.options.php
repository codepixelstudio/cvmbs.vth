<?php

	if ( function_exists( 'acf_add_options_page' ) ) {

		$homepage_options = array(

			'page_title' 	=> 'Homepage Options',
			'menu_title' 	=> 'Homepage Options',
			'menu_slug' 	=> 'homepage_options',
			'capability' 	=> 'manage_options',
			'position' 		=> '50',
			// 'icon_url' 		=> get_stylesheet_directory_uri() . '/dist/assets/img/icons/icon_site_settings.svg',
            'icon_url'      => 'dashicons-admin-home',
			'redirect' 		=> true

		);

		acf_add_options_page( $homepage_options );

        // options
        acf_add_options_sub_page( array(

			'page_title' 	=> 'Homepage Options',
			'menu_title' 	=> 'Homepage Options',
			'parent_slug'   => 'homepage_options',
			'menu_slug' 	=> 'custom_options',

		));
	}

?>
