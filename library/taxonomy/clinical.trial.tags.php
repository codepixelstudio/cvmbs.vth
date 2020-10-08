<?php

    // function
    function clinical_trial_tag_taxonomy() {

        // admin labels
        $labels = array(

            'name'              => _x( 'Clinical Trial Tags', 'taxonomy general name', 'vth' ),
    		'singular_name'     => _x( 'Clinical Trial Tag', 'taxonomy singular name', 'vth' ),
    		'menu_name'         => __( 'Clinical Trial Tags', 'vth' ),
    		'all_items'         => __( 'All Clinical Trial Tags', 'vth' ),
    		'edit_item'         => __( 'Edit Clinical Trial Tag', 'vth' ),
    		'view_item'         => __( 'View Clinical Trial Tag', 'vth' ),
    		'update_item'       => __( 'Update Clinical Trial Tag', 'vth' ),
    		'add_new_item'      => __( 'Add New Clinical Trial Tag', 'vth' ),
    		'new_item_name'     => __( 'New Clinical Trial Tag Name', 'vth' ),
    		'search_items'      => __( 'Search Clinical Trial Tags', 'vth' ),
            'not_found'         => __( 'No clinical trial tags found', 'vth' ),

    	);

        // config
    	$args = array(

    		'public'             =>  true,
            'publicly_queryable' =>  true,
    		'show_admin_column'  =>  true, // allow automatic creation of taxonomy columns on associated post-types table
    		'show_in_rest'       =>  true,
    		'hierarchical'       =>  false,
            // 'rewrite'            => array( 'slug' => 'animal/clinical_trial' ),
    		'labels'             => $labels,

    	);

        // associated post types
    	$post_types = array(

            // 'pet-health',
            'clinical_trial',
            // 'service'

    	);

        // register
    	register_taxonomy( 'clinical_trial_tag', $post_types, $args );

    }

    // action reference
    add_action( 'init', 'clinical_trial_tag_taxonomy', 0 );

?>
