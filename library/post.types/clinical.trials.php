<?php

    // Register Custom Post Type
    function clinical_trials_post_type() {

        $labels = array(

            'name'                  => _x( 'Clinical Trials', 'Post Type General Name', 'vth' ),
            'singular_name'         => _x( 'Clinical Trial', 'Post Type Singular Name', 'vth' ),
            'menu_name'             => __( 'Clinical Trials', 'vth' ),
            'name_admin_bar'        => __( 'Clinical Trials', 'vth' ),
            'archives'              => __( 'Clinical Trials Archives', 'vth' ),
            'attributes'            => __( 'Clinical Trials Attributes', 'vth' ),
            'parent_item_colon'     => __( 'Parent Clinical Trials:', 'vth' ),
            'all_items'             => __( 'All Clinical Trials', 'vth' ),
            'add_new_item'          => __( 'Add New Clinical Trial', 'vth' ),
            'add_new'               => __( 'Add New', 'vth' ),
            'new_item'              => __( 'New Clinical Trial', 'vth' ),
            'edit_item'             => __( 'Edit Clinical Trial', 'vth' ),
            'update_item'           => __( 'Update Clinical Trial', 'vth' ),
            'view_item'             => __( 'View Clinical Trial', 'vth' ),
            'view_items'            => __( 'View Clinical Trials', 'vth' ),
            'search_items'          => __( 'Search Clinical Trials', 'vth' ),
            'not_found'             => __( 'Not found', 'vth' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'vth' ),
            'featured_image'        => __( 'Featured Image', 'vth' ),
            'set_featured_image'    => __( 'Set featured image', 'vth' ),
            'remove_featured_image' => __( 'Remove featured image', 'vth' ),
            'use_featured_image'    => __( 'Use as featured image', 'vth' ),
            'insert_into_item'      => __( 'Insert into item', 'vth' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'vth' ),
            'items_list'            => __( 'Clinical Trials list', 'vth' ),
            'items_list_navigation' => __( 'Clinical Trials list navigation', 'vth' ),
            'filter_items_list'     => __( 'Filter items list', 'vth' ),

        );

        $args = array(

            'label'                 => __( 'Clinical Trials', 'vth' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail', 'post_tag' ),
            'taxonomies'            => array( 'post_tag', 'clinical_trial_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-chart-area',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'rewrite' 				=> array(
				'slug' => 'clinical-trials',
				'with_front' => false
			),
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',

        );

        register_post_type( 'clinical_trial', $args );

    }

    add_action( 'init', 'clinical_trials_post_type', 0 );

?>
