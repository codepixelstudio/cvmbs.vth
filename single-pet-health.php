<?php // single animal health post template ?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);" data-template="parent">

	<?php while ( have_posts() ) : the_post(); ?>

	<?php // post vars

		$category = get_the_category();
		// $author   = get_the_author();
		$publish  = get_the_date();
		$image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

		$author   = get_field( 'author_name' );

		// test for author
		if ( $author ) {

			// set var
			$author_name = $author;

		} else {

			// set var
			$author_name = get_the_author();

		}

	?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- header -->
		<header class="entry_header">

			<!-- image -->
			<div class="entry_image" <?php echo $image; ?>>

				<!-- archive link -->
				<a class="archive_link" href="<?php echo get_site_url(); ?>/animal-health">

					back to all Animal Health

				</a>
				<!-- END archive link -->

			</div>
			<!-- END image -->

			<!-- title -->
			<h1 class="entry_title">

				<?php the_title(); ?>

			</h1>
			<!-- END title -->

			<!-- metadata -->
			<div class="entry_metadata">

				<?php

					// get topics
					$topics = get_the_terms( $post->ID, 'topic' );

					// topics list iteration
					foreach ( $topics as $topic ) {

						if ( $topic->slug != 'uncategorized' ) {

							$topic_link = get_category_link( $topic->term_id );

							$topic_list .= '<a class="taxonomy_link" href="' . get_site_url() . '/animal-health/?topic=' . $topic->slug . '" class="taxonomy_item">' . $topic->name . '</a>';

						}

					}

				?>

				<!-- author/topic -->
				<div class="author_topic">

					<!-- author -->
					<span class="author">

						<?php echo $author; ?>&nbsp;in&nbsp;<?php echo $topic_list; ?>

					</span>
					<!-- END author -->

				</div>
				<!-- END author/topic -->

				<!-- date -->
				<span class="date">

					<?php echo $publish; ?>

				</span>
				<!-- END date -->

				<?php

					// get tags
					$tags = get_the_tags( $post->ID );

					// tags list iteration
					foreach ( $tags as $tag ) {

						// $tag_list .= '<a class="taxonomy_link" href="' . get_site_url() . '/pet-health/?tag=' . $tag->slug . '" class="taxonomy_item">' . $tag->name . '</a>,&nbsp;';
						$tag_list[] .= '<a class="taxonomy_link" href="' . get_site_url() . '/pet-health/?tag=' . $tag->slug . '" class="taxonomy_item">' . $tag->name . '</a>';

					}

				?>

				<!-- tags -->
				<div class="tags">

					Tags: <?php echo implode( ', ', $tag_list ); ?>

				</div>
				<!-- END tags -->

			</div>
			<!-- END metadata -->

		</header>
		<!-- END header -->

		<div class="post-content">

			<?php the_content(); ?>

		</div>

	</article>
	<!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

</main>
<!-- site.layout -->

<?php get_template_part( 'elements/layout/layout.footer' ); ?>

<?php get_footer(); ?>
