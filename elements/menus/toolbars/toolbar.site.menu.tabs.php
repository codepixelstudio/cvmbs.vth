<?php

    // test for site type
    $site_type = get_field( 'site_type', 'options' );

    // set global post object
    global $post;

    // test for page slug
    $directory_page = $post->post_name;

?>

<!-- site.toolbar -->
<ul id="site-menu-toolbar" class="tabs" data-tabs>

    <!-- list item -->
    <li class="tabs-title is-active">

        <?php get_template_part( 'elements/menus/buttons/button.main.menu.tabs' ); ?>

    </li>
    <!-- END list item -->

    <!-- list item -->
    <li class="tabs-title">

        <?php get_template_part( 'elements/menus/buttons/button.search.tabs' ); ?>

    </li>
    <!-- END list item -->

    <?php if ( $site_type !== 'special' ) : ?>

    <!-- list item -->
    <li class="tabs-title">

        <?php get_template_part( 'elements/menus/buttons/button.events.tabs' ); ?>

    </li>
    <!-- END list item -->

    <?php endif; ?>

    <!-- list item -->
    <li class="tabs-title">

        <?php get_template_part( 'elements/menus/buttons/button.directory.tabs' ); ?>

    </li>
    <!-- END list item -->

</ul>
<!-- END site.toolbar -->
