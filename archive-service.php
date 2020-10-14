<?php

    // test for URL query string
    if ( $_GET ) {

        // retrieve query string
        $query = $_GET[ 'animal_type' ];

        // setup query
        if ( $query === 'small' ) {

            // query
            $services = array(

                'posts_per_page' => -1,
                'post_type'      => 'service',
                'orderby'        => 'title',
                'order'          => 'ASC',
                'animal'         => array(

                    'exotic',
                    'companion'

                )

            );

            // page title
            $page_title = 'small animal services';

        } else if ( $query === 'large' ) {

            // query
            $services = array(

                'posts_per_page' => -1,
                'post_type'      => 'service',
                'orderby'        => 'title',
                'order'          => 'ASC',
                'animal'         => array(

                    'equine',
                    'livestock'

                )

            );

            // page title
            $page_title = 'large animal services';

        } else {

            // query
            $services = array(

                'posts_per_page' => -1,
                'post_type'      => 'service',
                'animal'         => $query,
                'orderby'        => 'title',
                'order'          => 'ASC'

            );

            // page title
            $page_title = $query . ' services';

        }

    } else {

        // setup query parameters
        $services = array(

            'post_type'      => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC'

        );

        // page title
        $page_title = 'all services';

    }

    // setup query
    $services_query = new WP_Query( $services );

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

                <?php echo $page_title; ?>

            </h1>
            <!-- END heading -->

            <?php if ( $_GET ) : ?>

            <!-- view all -->
            <a href="<?php echo get_site_url() . '/services"'; ?>">

                view all &raquo;

            </a>
            <!-- END view all -->

            <?php endif; ?>

        </div>
        <!-- END header -->

        <!-- news navigation -->
        <div id="news_controls" class="news_navigation">

            <!-- navigation -->
            <aside id="news_taxonomy">

                <!-- metadata group -->
                <section class="metadata animal_types">

                    <!-- title -->
                    <span class="metadata_title">

                        browse services by animal type

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php

                            // setup tag cloud
                            $tags = get_terms( array(

                                'taxonomy' => 'animal',
                                'hide_empty' => true,

                            ));

                            // tag cloud iteration
                            foreach ( $tags as $tag ) {

                                $tag_link = get_tag_link( $tag->term_id );

                                // $tag_list .= '<a href="' . $tag_link . '?animal_type=' . $tag->name . '" class="taxonomy_item">' . $tag->name . '</a>';
                                $tag_list .= '<a href="?animal_type=' . $tag->name . '" class="taxonomy_item">' . $tag->name . '</a>';

                            }

                            // output tags
                            echo $tag_list;

                            // view all
                            echo '<a href="' . get_site_url() . '/services" class="taxonomy_item clear">all</a>';

                        ?>

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

        	<?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>

            <?php

                // service type
                $service_type = get_field( 'post_redirect' );

                // set link
                if ( $service_type ) {

                    $service_link = get_field( 'redirect_url' );

                } else {

                    $service_link = get_the_permalink();

                }

                // post vars
                $topic    = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

            ?>

            <!-- post -->
            <a href="<?php echo $service_link; ?>" <?php post_class(); ?>>

                <!-- image -->
                <div class="article_image" <?php echo $image; ?>>

                    <!--  -->

                </div>
                <!-- END image -->

                <!-- content -->
                <div class="article_content">

                    <!-- heading -->
                    <h3 class="article_title">

                        <?php the_title(); ?>

                    </h3>
                    <!-- END heading -->

                </div>
                <!-- END content -->

            </a>
            <!-- END post -->

        	<?php endwhile; ?>

        </div>
        <!-- END grid -->

    </section>
    <!-- END news -->

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
