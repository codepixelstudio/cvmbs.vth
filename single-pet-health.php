<?php


?>

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

				<!--  -->

			</div>
			<!-- END image -->

			<!-- title -->
			<h1 class="entry_title">

				<?php the_title(); ?>

			</h1>
			<!-- END title -->

			<!-- metadata -->
			<div class="entry_metadata">

				<!-- author -->
				<span class="author">

					<?php echo $author; ?>

				</span>
				<!-- END author -->

				&nbsp;|&nbsp;

				<!-- date -->
				<span class="date">

					<?php echo $publish; ?>

				</span>
				<!-- END date -->

			</div>
			<!-- END metadata -->

		</header>
		<!-- END header -->

		<div class="post-content">

			<?php the_content(); ?>

		</div>

		<!-- news navigation -->
        <div id="news_controls" class="news_navigation">

            <!-- navigation -->
            <aside id="news_taxonomy">

                <!-- metadata group -->
                <section class="metadata topics">

                    <!-- title -->
                    <span class="metadata_title">

                        browse articles by topic

                    </span>
                    <!-- END title -->

					<!-- taxonomy group -->
	                <div class="taxonomy_group">

	                    <?php // get_template_part( 'elements/pet.health/pet.health.topics' ); ?>

	                    <?php

	                        // setup topics list
	                        $topics = get_terms( array(

	                            'taxonomy' => 'topic',
	                            'hide_empty' => true,

	                        ));

	                        // topics list iteration
	                        foreach ( $topics as $topic ) {

	                            if ( $topic->slug != 'uncategorized' ) {

	                                $topic_link = get_category_link( $topic->term_id );

	                                $topic_list .= '<a href="' . get_site_url() . '/pet-health/?topic=' . $topic->slug . '" class="taxonomy_item">' . $topic->name . '</a>';

	                            }

	                        }

	                        // output topics
	                        echo $topic_list;

	                    ?>

	                </div>
	                <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

                <!-- metadata group -->
                <section class="metadata tags">

                    <!-- title -->
                    <span class="metadata_title">

                        browse articles by tag

                    </span>
                    <!-- END title -->

					<!-- taxonomy group -->
	                <div class="taxonomy_group">

	                    <?php

	                        // setup topics list
	                        $tags = get_terms( array(

	                            'taxonomy' => 'post_tag',
	                            'hide_empty' => true,

	                        ));

						?>

						<?php

	                        // topics list iteration
	                        foreach ( $tags as $tag ) {

								$tag_list .= '

									<a href="' . get_site_url() . '/pet-health/?tag=' . $tag->slug . '" class="taxonomy_item">

										' . $tag->name . '

									</a>

								';

	                        }

	                        // output topics
	                        echo $tag_list;

	                    ?>

	                </div>
	                <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

            </aside>
            <!-- END navigation -->

        </div>
        <!-- END news navigation -->

	</article>
	<!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

</main>
<!-- site.layout -->

<?php get_template_part( 'elements/layout/layout.footer' ); ?>

<?php get_footer(); ?>
