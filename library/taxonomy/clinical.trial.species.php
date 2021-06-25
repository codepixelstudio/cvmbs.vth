<?php

    // function
    function clinical_trial_species_taxonomy() {

        // admin labels
        $labels = array(

            'name'              => _x( 'Clinical Trial Species', 'taxonomy general name', 'vth' ),
    		'singular_name'     => _x( 'Clinical Trial Species', 'taxonomy singular name', 'vth' ),
    		'menu_name'         => __( 'Clinical Trial Species', 'vth' ),
    		'all_items'         => __( 'All Clinical Trial Species', 'vth' ),
    		'edit_item'         => __( 'Edit Clinical Trial Species', 'vth' ),
    		'view_item'         => __( 'View Clinical Trial Species', 'vth' ),
    		'update_item'       => __( 'Update Clinical Trial Species', 'vth' ),
    		'add_new_item'      => __( 'Add New Clinical Trial Species', 'vth' ),
    		'new_item_name'     => __( 'New Clinical Trial Species Name', 'vth' ),
    		'search_items'      => __( 'Search Clinical Trial Species', 'vth' ),
            'not_found'         => __( 'No clinical trial species found', 'vth' ),

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
    	register_taxonomy( 'clinical_trial_species', $post_types, $args );

    }

    // action reference
    add_action( 'init', 'clinical_trial_species_taxonomy', 0 );

?>
