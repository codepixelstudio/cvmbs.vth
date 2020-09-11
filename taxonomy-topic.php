<?php

	// global
	global $post;
	$slug = $post->post_name;

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content news" data-off-canvas-content>

    <!-- news -->
    <section id="news_content">

        <!-- header -->
        <div id="news_header">

            <!-- heading -->
            <h1>

                <?php echo single_term_title(); ?>

            </h1>
            <!-- END heading -->

            <?php get_template_part( 'elements/search/search.posts' ); ?>

        </div>
        <!-- END header -->

        <!-- news navigation -->
        <div id="news_controls" class="news_navigation">

            <!-- navigation -->
            <aside id="news_taxonomy">

                <!-- metadata group -->
                <section class="metadata topics">

                    <!-- title -->
                    <span class="metadata_title">

                        browse pet health articles by topic

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php get_template_part( 'elements/pet.health/pet.health.topics' ); ?>

                    </div>
                    <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

                <!-- metadata group -->
                <section class="metadata tags">

                    <!-- title -->
                    <span class="metadata_title">

                        browse <?php echo single_term_title(); ?> articles by animal

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php get_template_part( 'elements/pet.health/pet.health.tags' ); ?>

                    </div>
                    <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

            </aside>
            <!-- END navigation -->

        </div>
        <!-- END news navigation -->

        <!-- grid -->
        <div id="news_grid">

        	<?php while ( have_posts() ) : the_post(); ?>

            <?php

                // post vars
                $topic    = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

            ?>

            <!-- post -->
            <article <?php post_class(); ?>>

                <!-- image -->
                <div class="article_image" <?php echo $image; ?>>

                    <!-- button -->
                    <a class="article_link" href="<?php the_permalink(); ?>">

                        read more

                    </a>
                    <!-- END button -->

                </div>
                <!-- END image -->

                <!-- content -->
                <div class="article_content">

                    <!-- topic -->
                    <span class="article_topic">

                        <?php echo $topic[ 0 ]->name; ?>

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

    </section>
    <!-- END news -->

    <!-- navigation -->
    <section id="news_navigation">

        <?php echo foundationpress_pagination(); ?>

        <!-- ball so hard -->

        <?php get_template_part( 'elements/news/news.topics' ); ?>

        <?php get_template_part( 'elements/news/news.tags' ); ?>

    </section>
    <!-- END navigation -->

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
