<?php

    // Template Name: Service Child Page
    // Template Post Type: service

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);" data-template="parent">

	<!-- container -->
	<div class="service_container child_service">

		<?php while ( have_posts() ) : the_post(); ?>

		<!-- service post -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <h1>

                <?php the_title(); ?>

            </h1>

            <?php the_content(); ?>

		</article>
		<!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

		<?php get_template_part( 'elements/layout/layout.footer' ); ?>

	</div>
	<!-- END content container -->

</main>
<!-- site.layout -->

<?php get_footer(); ?>
