<?php

    // register menus
	register_nav_menus(

		array(

			'vth-directory-menu'    => __( 'VTH Directory Menu', 'cvmbs' ),

		)

	);

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

?>
