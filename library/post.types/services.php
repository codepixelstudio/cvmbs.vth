<?php

    // Register Custom Post Type
    function services_post_type() {

        $labels = array(

            'name'                  => _x( 'Services', 'Post Type General Name', 'vth' ),
            'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'vth' ),
            'menu_name'             => __( 'Services', 'vth' ),
            'name_admin_bar'        => __( 'Services', 'vth' ),
            'archives'              => __( 'Services Archives', 'vth' ),
            'attributes'            => __( 'Service Attributes', 'vth' ),
            'parent_item_colon'     => __( 'Parent Services:', 'vth' ),
            'all_items'             => __( 'All Services', 'vth' ),
            'add_new_item'          => __( 'Add New Service', 'vth' ),
            'add_new'               => __( 'Add New', 'vth' ),
            'new_item'              => __( 'New Service', 'vth' ),
            'edit_item'             => __( 'Edit Service', 'vth' ),
            'update_item'           => __( 'Update Service', 'vth' ),
            'view_item'             => __( 'View Service', 'vth' ),
            'view_items'            => __( 'View Services', 'vth' ),
            'search_items'          => __( 'Search Services', 'vth' ),
            'not_found'             => __( 'Not found', 'vth' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'vth' ),
            'featured_image'        => __( 'Featured Image', 'vth' ),
            'set_featured_image'    => __( 'Set featured image', 'vth' ),
            'remove_featured_image' => __( 'Remove featured image', 'vth' ),
            'use_featured_image'    => __( 'Use as featured image', 'vth' ),
            'insert_into_item'      => __( 'Insert into item', 'vth' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'vth' ),
            'items_list'            => __( 'Services list', 'vth' ),
            'items_list_navigation' => __( 'Services list navigation', 'vth' ),
            'filter_items_list'     => __( 'Filter items list', 'vth' ),

        );

        $args = array(

            'label'                 => __( 'Services', 'vth' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'template', 'page-attributes' ),
            // 'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 4,
            'menu_icon'             => 'dashicons-tag',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'rewrite' 				=> array(
				'slug' => 'services',
				'with_front' => false
			),
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',

        );

        register_post_type( 'service', $args );

    }

    add_action( 'init', 'services_post_type', 0 );

?>
