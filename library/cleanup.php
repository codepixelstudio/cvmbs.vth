<?php

    // remove pages from admin
    function remove_admin_pages() {

        // comments
        remove_menu_page( 'edit-comments.php' );

        // test for user role -> conditionally remove tools.php
        if ( !current_user_can( 'administrator' ) ) {

            // tools
            remove_menu_page( 'tools.php' );

        }

    }

    // action reference
    add_action( 'admin_menu', 'remove_admin_pages' );

?>
