<?php

    // function
    function pet_health_tag_taxonomy() {

        // admin labels
        $labels = array(

            'name'              => _x( 'Animal Types', 'taxonomy general name', 'vth' ),
    		'singular_name'     => _x( 'Animal Type', 'taxonomy singular name', 'vth' ),
    		'menu_name'         => __( 'Animal Types', 'vth' ),
    		'all_items'         => __( 'All Animal Types', 'vth' ),
    		'edit_item'         => __( 'Edit Animal Type', 'vth' ),
    		'view_item'         => __( 'View Animal Type', 'vth' ),
    		'update_item'       => __( 'Update Animal Type', 'vth' ),
    		'add_new_item'      => __( 'Add New Animal Type', 'vth' ),
    		'new_item_name'     => __( 'New Animal Type Name', 'vth' ),
    		'search_items'      => __( 'Search Animal Types', 'vth' ),
            'not_found'         => __( 'No pet health tags found', 'vth' ),

    	);

        // config
    	$args = array(

    		'public'             =>  true,
            'publicly_queryable' => true,
    		'show_admin_column'  =>  true, // allow automatic creation of taxonomy columns on associated post-types table
    		'show_in_rest'       =>  true,
    		'hierarchical'       =>  false,
            // 'rewrite'            => array( 'slug' => 'animal/clinical_trial' ),
    		'labels'             => $labels,

    	);

        // associated post types
    	$post_types = array(

            // 'pet-health',
            // 'clinical_trial',
            'service'

    	);

        // register
    	register_taxonomy( 'animal', $post_types, $args );

    }

    // action reference
    add_action( 'init', 'pet_health_tag_taxonomy', 0 );

?>
