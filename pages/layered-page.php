<?php
/**
 * Template Name: Layered Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

$block_path = 'elements/blocks/layered/';
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			get_template_part( $block_path . 'page-header' );

			if ( have_rows('page_blocks') ) :

				while ( have_rows('page_blocks') ) : the_row();

					if ( get_row_layout() == 'call_out' ) :

						get_template_part( $block_path . 'call-out' );

					elseif ( get_row_layout() == 'content_area_with_image') :

						get_template_part( $block_path . 'content-area-with-image' );

					elseif ( get_row_layout() == 'dual_ctas' ) :

						get_template_part( $block_path . 'dual-ctas' );

					elseif ( get_row_layout() == 'fast_facts' ) :

						get_template_part( $block_path . 'fast-facts' );

					elseif ( get_row_layout() == 'group_bios' ) :

						get_template_part( $block_path . 'group-bios' );

					elseif ( get_row_layout() == 'highlight_group' ) :

						get_template_part( $block_path . 'highlight-group' );

					elseif ( get_row_layout() == 'junk_drawer' ) :

						get_template_part( $block_path . 'junk-drawer' );

					elseif ( get_row_layout() == 'launch_pads' ) :

						get_template_part( $block_path . 'launch-pads' );

					elseif ( get_row_layout() == 'page_quote' ) :

						get_template_part( $block_path . 'page-quote' );

					elseif ( get_row_layout() == 'single_cta' ) :

						get_template_part( $block_path . 'single-cta' );

					elseif ( get_row_layout() == 'source_stories' ) :

						get_template_part( $block_path . 'source-stories' );

					elseif ( get_row_layout() == 'spotlight' ) :

						get_template_part( $block_path . 'spotlight' );

					elseif ( get_row_layout() == 'video' ) :

						get_template_part( $block_path . 'video' );

					elseif ( get_row_layout() == 'general_content' ) :

						get_template_part( $block_path . 'general-content' );

					elseif ( get_row_layout() == 'single_testimonial' ) :

						get_template_part( $block_path . 'testimonial.single' );

					else:

						// no blocks found

					endif;

				endwhile;

			endif;
			?>

		</article><!-- #post-<?php the_ID(); ?> -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

<?php get_template_part( 'elements/layout/layout.newsletter' ); ?>

<?php get_template_part( 'elements/layout/layout.footer' ); ?>
