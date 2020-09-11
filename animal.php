<?php

    // setup query parameters
    $news = array(
        'post_type'      => 'post',
        // 'posts_per_page' => 3

    );

    // setup query
    $news_query = new WP_Query( $news );

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);" data-template="parent">

	<!-- news -->
    <section id="news_content">

        <!-- header -->
        <div id="news_header">

            <!-- heading -->
            <h2>

                <!-- icon -->
                <div class="local_icon">

                    <svg x="0px" y="0px" width="80px" height="80px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve">

                        <path class="path" d="M32,50.8c-0.14-0.71-0.14-1.42,0.14-1.98c0.57-1.98,1.7-3.82,2.97-5.67c0.71-0.99,1.56-1.84,2.41-2.55 c4.67-4.39,9.35-6.09,11.9-6.52c-1.27-1.42-2.69-2.69-4.11-3.82c-0.42-0.28-0.85-0.71-1.42-0.85c-2.55-1.27-5.52-1.27-8.22,0 c-0.42,0.28-0.99,0.57-1.42,0.85c-2.41,1.98-4.67,4.25-6.66,6.8c-1.56,2.41-3.12,4.67-4.39,7.08C23.78,45.27,26.76,48.67,32,50.8z
                    	 M55.94,26.58c-0.42-0.28-1.13-0.42-1.7-0.14c-0.42,0.28-0.85,0.71-0.85,1.27s-0.57,3.26,0.14,5.67c0.42,1.56,3.12,5.81,5.24,5.81
                    	h0.28c0.57-0.14,1.42-0.42,1.56-2.41l0.14-0.99C60.61,32.1,58.91,28.7,55.94,26.58z M20.95,39.04h0.28c2.12,0,4.67-4.25,5.24-5.81
                    	c0.71-2.41,0.28-5.24,0.14-5.67c-0.14-0.42-0.57-0.99-0.99-1.13c-0.57-0.28-1.27-0.28-1.7,0.14c-3.12,2.12-4.82,5.52-4.67,9.07
                    	l0.14,0.99C19.39,38.62,20.39,39.04,20.95,39.04z M48.15,28.56h0.28c0.57-0.14,1.56-0.42,1.56-2.27l0.14-1.42
                    	c0.14-3.26-1.7-6.37-4.96-8.36l-0.57-0.28c-0.57-0.28-1.27-0.28-1.84-0.14c-0.42,0.28-0.85,0.71-0.85,1.13
                    	c-0.14,0.42-0.71,3.26,0.28,5.52C42.77,24.45,45.88,28.56,48.15,28.56z M29.73,26.29c0.14,1.84,0.99,2.12,1.56,2.41h0.28
                    	c2.27,0,5.38-4.11,5.95-5.67c0.85-2.41,0.28-5.1,0.28-5.52c-0.14-0.71-0.42-0.99-0.85-1.27c-0.57-0.28-1.27-0.28-1.84,0.14
                    	l-0.42,0.28c-3.26,1.84-5.1,5.1-4.96,8.22V26.29z M51.97,37.2c-0.42-0.71-0.99-1.27-1.56-1.84c-1.27-0.14-5.38,0.71-10.06,4.39
                    	c0.42,0.14,0.71,0.14,0.99,0.28c0.28,0.14,0.42,0.28,0.57,0.42c0.85,0.71,1.84,1.7,2.55,2.69c1.13,1.42,2.12,3.12,2.69,4.67
                    	c0.14,0.14,0.14,0.28,0.14,0.57c2.41,6.94,1.84,12.47,0.85,15.02c0.28-0.14,0.57-0.14,0.85-0.14c0.42-0.14,0.85-0.14,1.27-0.28
                    	c0.85-0.14,1.84-0.42,2.55-0.57c7.08-2.12,7.93-6.52,6.8-10.77C58.35,46.83,55.37,41.59,51.97,37.2z M45.03,53.06
                    	c-0.42,0.14-0.85,0.28-1.42,0.28c-2.41,0.42-4.82,0.42-7.22,0c-0.28,0-0.42-0.14-0.71-0.14c-0.42-0.14-0.71-0.14-0.85-0.14h-0.14
                    	c-0.14,0-0.14,0-0.14-0.14c-6.23-1.7-10.48-5.38-11.9-7.65c0,0.14-0.14,0.14-0.14,0.14v0.14c-0.99,1.98-1.84,4.11-2.41,6.09
                    	c-1.27,4.39-0.28,8.64,6.8,10.77c0.99,0.28,2.27,0.57,3.68,0.85c5.38,0.85,10.91,0.99,16.29,0.28c0.71-1.27,1.84-5.52,0.28-11.9
                    	C46.73,52.21,46.17,52.78,45.03,53.06z"/>

                    </svg>

                </div>
                <!-- END icon -->

                <?php the_archive_title(); ?>

            </h2>
            <!-- END heading -->

            <?php get_template_part( 'elements/search/search.posts' ); ?>

        </div>
        <!-- END header -->

        <!-- grid -->
        <div id="news_grid">

        	<?php while ( have_posts() ) : the_post(); ?>

            <?php

                // post vars
                $category = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

            ?>

            <!-- post -->
            <article <?php post_class(); ?>>

                <!-- image -->
                <a href="<?php the_permalink(); ?>" class="article_image" <?php echo $image; ?>>

                    read more

                </a>
                <!-- END image -->

                <!-- content -->
                <div class="article_content">

                    <!-- topic -->
                    <span class="article_topic">

                        <?php echo $category[ 0 ]->name; ?>

                    </span>
                    <!-- END topic -->

                    <!-- heading -->
                    <h3 class="article_title">

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a>

                    </h3>
                    <!-- END heading -->

                    <!-- metadata -->
                    <div class="article_metadata">

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

                    <?php the_excerpt(); ?>

                </div>
                <!-- END content -->

            </article>
            <!-- END post -->

        	<?php endwhile; ?>

        </div>
        <!-- END grid -->

        <!-- pagination -->
        <div id="news_pagination">

            <?php echo foundationpress_pagination(); ?>

        </div>
        <!-- END pagination -->

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

                        <?php get_template_part( 'elements/news/news.topics' ); ?>

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

                        <?php get_template_part( 'elements/news/news.tags' ); ?>

                    </div>
                    <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

            </aside>
            <!-- END navigation -->

        </div>
        <!-- END news navigation -->

    </section>
    <!-- END news -->

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
