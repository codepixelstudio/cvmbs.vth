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

                pet health

            </h1>
            <!-- END heading -->

            <?php // print_r( $_GET ); ?>

            <?php get_template_part( 'elements/search/search.posts' ); ?>

        </div>
        <!-- END header -->

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

        <?php // echo foundationpress_pagination(); ?>

    </section>
    <!-- END navigation -->

    <!-- navigation -->
    <section id="news_navigation">

        <?php echo paginate_links(); ?>

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

                    <?php get_template_part( 'elements/pet.health/pet.health.topics' ); ?>

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

                    <?php get_template_part( 'elements/pet.health/pet.health.tags' ); ?>

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
