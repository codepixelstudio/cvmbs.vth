<?php
/**
 * Template Name: Flexible Content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

$block_path = 'elements/blocks/flexible/';
?>

<div id="primary" class="content-area">

	<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php get_template_part( $block_path . 'page-header' ); ?>

			<div class="flexible-page-content">

				<?php
				if ( have_rows('page_blocks') ) :

					while ( have_rows('page_blocks') ) : the_row();

						if ( get_row_layout() == 'accordion_group' ) :

							get_template_part( $block_path . 'accordion-group' );

						elseif ( get_row_layout() == 'contact_group' ) :

							get_template_part( $block_path . 'contact-group' );

						elseif ( get_row_layout() == 'content_area_with_image') :

							get_template_part( $block_path . 'floated-image' );

						elseif ( get_row_layout() == 'ctas_with_image' ) :

							get_template_part( $block_path . 'ctas-with-image' );

						elseif ( get_row_layout() == 'ctas_without_image' ) :

							get_template_part( $block_path . 'ctas-without-image' );

						elseif ( get_row_layout() == 'notification' ) :

							get_template_part( $block_path . 'notification' );

						elseif ( get_row_layout() == 'quotation' ) :

							get_template_part( $block_path . 'quotation' );

						elseif ( get_row_layout() == 'text_editor' ) :

							get_template_part( $block_path . 'text-editor' );

						elseif ( get_row_layout() == 'video' ) :

							get_template_part( $block_path . 'video' );

						elseif ( get_row_layout() == 'single_testimonial' ) :

							get_template_part( $block_path . 'testimonial.single' );

						elseif ( get_row_layout() == 'image_array' ) :

							get_template_part( $block_path . 'image.array' );

						elseif ( get_row_layout() == 'statistics' ) :

							get_template_part( $block_path . 'statistics' );

						elseif ( get_row_layout() == 'steps' ) :

	                        get_template_part( $block_path . 'steps' );

	                    elseif ( get_row_layout() == 'timeline' ) :

	                        get_template_part( $block_path . 'timeline' );

	                    elseif ( get_row_layout() == 'styled_list' ) :

	                        get_template_part( $block_path . 'styled.list' );

						elseif ( get_row_layout() == 'custom_menu' ) :

	                        get_template_part( $block_path . 'custom.menu' );

						else:

							// no blocks found

						endif;

					endwhile;

				endif;
				?>

			</div><!-- .flexible-page-content -->

		</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php get_template_part( 'elements/layout/layout.newsletter' ); ?>

<?php get_template_part( 'elements/layout/layout.footer' ); ?>

<?php get_footer(); ?>
