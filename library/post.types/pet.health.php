<?php

    // register custom user role
    function pet_health_author_role() {

        add_role( 'pet_health_author', 'Pet Health Author',

            array(

                'read'          => true,
                'edit_posts'    => false,
                'delete_posts'  => false,
                'publish_posts' => false,
                'upload_files'  => true,

            )

        );

    }

    // hook
    register_activation_hook( __FILE__, 'pet_health_author_role' );

    // Register Custom Post Type
    function pet_health_post_type() {

        $labels = array(

            'name'                  => _x( 'Pet Health', 'Post Type General Name', 'vth' ),
            'singular_name'         => _x( 'Pet Health', 'Post Type Singular Name', 'vth' ),
            'menu_name'             => __( 'Pet Health', 'vth' ),
            'name_admin_bar'        => __( 'Pet Health', 'vth' ),
            'archives'              => __( 'Pet Health Archives', 'vth' ),
            'attributes'            => __( 'Pet Health Attributes', 'vth' ),
            'parent_item_colon'     => __( 'Parent Pet Health:', 'vth' ),
            'all_items'             => __( 'All Pet Health', 'vth' ),
            'add_new_item'          => __( 'Add New Pet Health', 'vth' ),
            'add_new'               => __( 'Add New', 'vth' ),
            'new_item'              => __( 'New Pet Health', 'vth' ),
            'edit_item'             => __( 'Edit Pet Health', 'vth' ),
            'update_item'           => __( 'Update Pet Health', 'vth' ),
            'view_item'             => __( 'View Pet Health', 'vth' ),
            'view_items'            => __( 'View Pet Healths', 'vth' ),
            'search_items'          => __( 'Search Pet Health', 'vth' ),
            'not_found'             => __( 'Not found', 'vth' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'vth' ),
            'featured_image'        => __( 'Featured Image', 'vth' ),
            'set_featured_image'    => __( 'Set featured image', 'vth' ),
            'remove_featured_image' => __( 'Remove featured image', 'vth' ),
            'use_featured_image'    => __( 'Use as featured image', 'vth' ),
            'insert_into_item'      => __( 'Insert into item', 'vth' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'vth' ),
            'items_list'            => __( 'Pet Health list', 'vth' ),
            'items_list_navigation' => __( 'Pet Health list navigation', 'vth' ),
            'filter_items_list'     => __( 'Filter items list', 'vth' ),

        );

        $args = array(

            'label'                 => __( 'Pet Health', 'vth' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
            'taxonomies'            => array( 'post_tag', 'topic', 'animal' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-heart',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'pet_health_author',
            'map_meta_cap'          => true,
            'capabilities'          => array(

                'publish_posts'    => 'publish_pet_health',
                'edit_posts'       => 'edit_pet_health',
                'create_posts'     => 'create_pet_health'

            ),

        );

        register_post_type( 'pet-health', $args );

    }

    add_action( 'init', 'pet_health_post_type', 0 );

?>
