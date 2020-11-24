<?php

    // test for URL query string
    if ( $_GET ) {

        // retrieve query string
        $query = $_GET[ 'tag' ];

        // setup query
        if ( $query ) {

            // query
            $pet_health = array(

                'post_type' => 'pet-health',
                'post_tag'  => $query

            );

        }

    } else {

        // setup query parameters
        $pet_health = array(

            'post_type'      => 'pet-health',
            'posts_per_page' => -1,
            // 'paged'          => 1

        );

    }

    // setup query
    $pet_health_query = new WP_Query( $pet_health );

    // text content
    $pet_health_info = get_field( 'pet_health_info', 'options' );

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content news" data-off-canvas-content>

    <!-- news -->
    <section id="news_content">

        <!-- header -->
        <header id="news_header">

            <!-- heading -->
            <h1>

                <?php if ( $_GET ) : ?>

                <span class="tagline">

                    pet health articles

                </span>

                <?php echo $_GET[ 'tag' ]; ?>

                <?php else : ?>

                pet health

                <?php endif; ?>

            </h1>
            <!-- END heading -->

            <?php // get_template_part( 'elements/search/search.posts' ); ?>

        </header>
        <!-- END header -->

        <?php if ( !$_GET ) : ?>

        <!-- custom archive page content -->
        <div id="pet_health_info" class="fixed_width">

            <?php echo $pet_health_info; ?>

        </div>
        <!-- END custom archive page content -->

        <?php endif; ?>

        <?php if ( have_posts() ) : ?>

        <!-- grid -->
        <div id="news_grid">

        	<?php // while ( $pet_health_query->have_posts() ) : $pet_health_query->the_post(); ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <?php

                // post vars
                $topic    = get_the_category();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';
                $redirect = get_field( 'post_redirect' );
                $post_url = get_field( 'redirect_url' );

                // some author eval
                // $author   = get_the_author();
                $author   = get_field( 'author_name' );

                // test for author
                if ( $author ) {

                    // set var
                    $author_name = $author;

                } else {

                    // set var
                    $author_name = get_the_author();

                }

                // test for redirect
                if ( $redirect ) {

                    // external
                    $post_link = get_field( 'redirect_url' );

                } else {

                    // standard
                    $post_link = get_the_permalink();

                }

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

                        <a href="<?php echo $post_link; ?>">

                            <?php the_title(); ?>

                        </a>

                    </h3>
                    <!-- END heading -->

                    <!-- metadata -->
                    <div class="article_metadata">

                        <!-- author -->
                        <span class="author">

                            <?php echo $author_name; ?>

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

        <?php endif; ?>

    </section>
    <!-- END news -->

    <!-- navigation -->
    <section id="news_navigation">

        <?php echo paginate_links( array(

            'prev_text' => '&laquo;',
            'next_text' => '&raquo;'

        )); ?>

        <?php // echo get_posts_nav_link(); ?>

    </section>
    <!-- END navigation -->

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

                                $topic_list .= '<a href="?topic=' . $topic->slug . '" class="taxonomy_item">' . $topic->name . '</a>';

                            }

                        }

                        // output topics
                        echo $topic_list;

                        // view all
                        echo '<a href="' . get_site_url() . '/pet-health" class="taxonomy_item clear">all</a>';

                    ?>

                </div>
                <!-- END taxonomy group -->

            </section>
            <!-- END metadata group -->

            <!-- metadata group -->
            <section id="metadata_tags" class="metadata tags">

                <!-- title -->
                <span class="metadata_title">

                    browse articles by tag

                </span>
                <!-- END title -->

                <!-- taxonomy group -->
                <div class="taxonomy_group">

                    <?php // get_template_part( 'elements/pet.health/pet.health.tags' ); ?>

                    <?php

                        // setup topics list
                        $tags = get_terms( array(

                            'taxonomy' => 'post_tag',
                            'hide_empty' => true,

                        ));

                        // topics list iteration
                        foreach ( $tags as $tag ) {

                            if ( $tag->slug != 'uncategorized' ) {

                                $tag_link = get_category_link( $tag->term_id );

                                $tag_list .= '<a href="?tag=' . $tag->slug . '" class="taxonomy_item">' . $tag->name . '</a>';

                            }

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

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
