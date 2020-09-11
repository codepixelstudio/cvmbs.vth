<?php

    // action reference
    add_action( 'add_meta_boxes', 'set_default_page_template', 1 );

    // default page template function
    function set_default_page_template() {

        // global post object
        global $post;

        // conditions
        if ( 'page' == $post->post_type
        && 0 != count( get_page_templates( $post ) )
        && get_option( 'page_for_posts' ) != $post->ID // Not the page for listing posts
        && '' == $post->page_template // Only when page_template is not set
        ) {

            $post->page_template = 'pages/flexible-page.php';

        }

    }

?>
