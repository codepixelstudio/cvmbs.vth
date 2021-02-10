<?php

    // register menus
	register_nav_menus(

		array(

			'vth-directory-menu'    => __( 'VTH Directory Menu', 'cvmbs' ),

		)

	);

	// vth directory
	function vth_directory_menu() {

		wp_nav_menu( array(

			'container'		  	=> false,
			'container_class' 	=> '',
			'menu' 				=> '',
			'menu_class' 		=> 'vth-directory-menu',
			'theme_location'  	=> 'vth-directory-menu',
			'before' 		  	=> '',
			'after' 			=> '',
			'link_before' 		=> '',
			'link_after' 		=> '',
			'fallback_cb' 		=> false,

		));

	}

	// unregister research topic menu
	function unregister_parent_menus() {

		unregister_nav_menu( 'research-topics-menu' );

	}

	// action reference
	add_action( 'after_setup_theme', 'unregister_parent_menus', 10 );

?>
