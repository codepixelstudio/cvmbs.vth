<?php

    // remove pages from admin
    function remove_admin_pages() {

        // comments
        remove_menu_page( 'edit-comments.php' );

        // tools
        remove_menu_page( 'tools.php' );

    }

    // action reference
    add_action( 'admin_menu', 'remove_admin_pages' );

?>
