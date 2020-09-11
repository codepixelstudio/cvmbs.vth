<?php

    // Template Name: Calendar Page

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);" data-template="parent">

    <!-- <div class="service_container"> -->

        <?php while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; ?>

    <!-- </div> -->

    <?php get_sidebar(); ?>

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
