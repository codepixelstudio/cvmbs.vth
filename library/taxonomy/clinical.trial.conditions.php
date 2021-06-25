<?php

    // function
    function clinical_trial_condition_taxonomy() {

        // admin labels
        $labels = array(

            'name'              => _x( 'Clinical Trial Conditions', 'taxonomy general name', 'vth' ),
    		'singular_name'     => _x( 'Clinical Trial Condition', 'taxonomy singular name', 'vth' ),
    		'menu_name'         => __( 'Clinical Trial Conditions', 'vth' ),
    		'all_items'         => __( 'All Clinical Trial Conditions', 'vth' ),
    		'edit_item'         => __( 'Edit Clinical Trial Condition', 'vth' ),
    		'view_item'         => __( 'View Clinical Trial Condition', 'vth' ),
    		'update_item'       => __( 'Update Clinical Trial Condition', 'vth' ),
    		'add_new_item'      => __( 'Add New Clinical Trial Condition', 'vth' ),
    		'new_item_name'     => __( 'New Clinical Trial Condition Name', 'vth' ),
    		'search_items'      => __( 'Search Clinical Trial Conditions', 'vth' ),
            'not_found'         => __( 'No clinical trial conditions found', 'vth' ),

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
    	register_taxonomy( 'clinical_trial_condition', $post_types, $args );

    }

    // action reference
    add_action( 'init', 'clinical_trial_condition_taxonomy', 0 );

?>
