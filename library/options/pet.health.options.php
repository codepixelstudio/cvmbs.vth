<?php

	if ( function_exists( 'acf_add_options_page' ) ) {

		$cvmbs_site_options = array(

            'page_title' 	=> 'Pet Health Options',
			'menu_title' 	=> 'Pet Health Options',
			'menu_slug' 	=> 'pet_health_options',
			'capability' 	=> 'manage_options',
			// 'position' 		=> '61',
			// 'icon_url' 		=> get_stylesheet_directory_uri().'/assets/img/icons/admin/icon_site_settings.svg',
            // 'icon_url'      => 'dashicons-controls-repeat',
			'redirect' 		=> true,
			'parent_slug'   => 'edit.php?post_type=pet-health'

		);

		acf_add_options_page( $cvmbs_site_options );

        // options
        acf_add_options_sub_page( array(

			'page_title' 	=> 'General Site Options',
			'menu_title' 	=> 'General Site Options',
			'parent_slug'   => 'site_options',
			'menu_slug' 	=> 'general_options',

		));

	}

?>
