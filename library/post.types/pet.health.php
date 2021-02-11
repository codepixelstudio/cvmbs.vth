<?php

    // register custom user role
    function pet_health_author_role() {

        add_role( 'pet_health_author', 'Animal Health Author',

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

            'name'                  => _x( 'Animal Health', 'Post Type General Name', 'vth' ),
            'singular_name'         => _x( 'Animal Health', 'Post Type Singular Name', 'vth' ),
            'menu_name'             => __( 'Animal Health', 'vth' ),
            'name_admin_bar'        => __( 'Animal Health', 'vth' ),
            'archives'              => __( 'Animal Health Archives', 'vth' ),
            'attributes'            => __( 'Animal Health Attributes', 'vth' ),
            'parent_item_colon'     => __( 'Parent Animal Health:', 'vth' ),
            'all_items'             => __( 'All Animal Health', 'vth' ),
            'add_new_item'          => __( 'Add New Animal Health', 'vth' ),
            'add_new'               => __( 'Add New', 'vth' ),
            'new_item'              => __( 'New Animal Health', 'vth' ),
            'edit_item'             => __( 'Edit Animal Health', 'vth' ),
            'update_item'           => __( 'Update Animal Health', 'vth' ),
            'view_item'             => __( 'View Animal Health', 'vth' ),
            'view_items'            => __( 'View Animal Healths', 'vth' ),
            'search_items'          => __( 'Search Animal Health', 'vth' ),
            'not_found'             => __( 'Not found', 'vth' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'vth' ),
            'featured_image'        => __( 'Featured Image', 'vth' ),
            'set_featured_image'    => __( 'Set featured image', 'vth' ),
            'remove_featured_image' => __( 'Remove featured image', 'vth' ),
            'use_featured_image'    => __( 'Use as featured image', 'vth' ),
            'insert_into_item'      => __( 'Insert into item', 'vth' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'vth' ),
            'items_list'            => __( 'Animal Health list', 'vth' ),
            'items_list_navigation' => __( 'Animal Health list navigation', 'vth' ),
            'filter_items_list'     => __( 'Filter items list', 'vth' ),

        );

        $args = array(

            'label'                 => __( 'Animal Health', 'vth' ),
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
            'rewrite'               => array( 'slug' => 'animal-health' ),
            'capabilities'          => array(

                'publish_posts'    => 'publish_pet_health',
                'edit_posts'       => 'edit_pet_health',
                'create_posts'     => 'create_pet_health'

            ),

        );

        register_post_type( 'pet-health', $args );

    }

    // action reference
    add_action( 'init', 'pet_health_post_type', 0 );

    // replace
    function animal_health_archive_title( $title ){

        if ( is_post_type_archive( 'pet-health' ) ){

            $title = 'Animal Health - ' . get_bloginfo('name');
            return $title;

        }

        return $title;
    }

    // filter hook
    // add_filter( 'pre_get_document_title', 'animal_health_archive_title', 1000 );

?>
