<?php

    // function
    function pet_health_topic_taxonomy() {

        // admin labels
        $labels = array(

            'name'              => _x( 'Pet Health Topics', 'taxonomy general name', 'vth' ),
    		'singular_name'     => _x( 'Pet Health Topic', 'taxonomy singular name', 'vth' ),
    		'menu_name'         => __( 'Pet Health Topics', 'vth' ),
    		'all_items'         => __( 'All Pet Health Topics', 'vth' ),
    		'edit_item'         => __( 'Edit Pet Health Topic', 'vth' ),
    		'view_item'         => __( 'View Pet Health Topic', 'vth' ),
    		'update_item'       => __( 'Update Pet Health Topic', 'vth' ),
    		'add_new_item'      => __( 'Add New Pet Health Topic', 'vth' ),
    		'new_item_name'     => __( 'New Pet Health Topic Name', 'vth' ),
    		'search_items'      => __( 'Search Pet Health Topics', 'vth' ),
            'not_found'         => __( 'No pet health topics found', 'vth' ),
            'parent_item'       => __( 'Parent Pet Health Topic', 'vth' ),
    		'parent_item_colon' => __( 'Parent Pet Health Topic:', 'vth' )

    	);

        // config
    	$args = array(

    		'public'            => true,
    		'show_admin_column' => true,
    		'show_in_rest'      => true,
    		'hierarchical'      => true,
    		'labels'            => $labels,

    	);

        // associated post types
    	$post_types = array(

            'pet-health'

    	);

        // register
    	register_taxonomy( 'topic', $post_types, $args );

    }

    // action reference
    add_action( 'init', 'pet_health_topic_taxonomy', 0 );

?>
