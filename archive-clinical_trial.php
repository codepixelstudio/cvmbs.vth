<?php

    // setup today
    $today = date( 'Ymd' );

    // test for URL query string
    if ( $_GET ) {

        echo 'ball so hard';

        // retrieve query string
        $query = $_GET[ 'tag' ];

        // setup query
        if ( $query ) {

            // setup query parameters
            $clinical_trials = array(

                'post_type'      => 'clinical_trial',
                'post_tag'       => $query,
                'posts_per_page' => -1,
                'orderby'        => 'meta_value',
                'meta_query'     => array(

                    array(

                        'key'     => 'trial_expiration',
                        'value'   => $today,
                        'compare' => '>'

                    )

                ),
                'order'          => 'ASC'

            );

        } else {

            // setup query parameters
            $clinical_trials = array(

                'post_type'      => 'clinical_trial',
                'posts_per_page' => -1,
                'orderby'        => 'meta_value',
                'meta_query'     => array(

                    array(

                        'key'     => 'trial_expiration',
                        'value'   => $today,
                        'compare' => '>'

                    )

                ),
                'order'          => 'ASC'

            );

        }

    } else {

        echo 'nice try';

        // setup query parameters
        $clinical_trials = array(

            'post_type'      => 'clinical_trial',
            'posts_per_page' => -1,
            'orderby'        => 'meta_value',
            'meta_query'     => array(

                array(

                    'key'     => 'trial_expiration',
                    'value'   => $today,
                    'compare' => '>'

                )

            ),
            'order'          => 'ASC'

        );

    }

    // setup query
    $clinical_trials_query = new WP_Query( $clinical_trials );

    // text content
    $clinical_trials_info = get_field( 'clinical_trial_info', 'options' );

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

                Clinical Trials

            </h1>
            <!-- END heading -->

        </div>
        <!-- END header -->

        <!-- custom archive page content -->
        <div id="clinical_trial_info">

            <?php echo $clinical_trials_info; ?>
            <br />
            <?php echo $query; ?>

        </div>
        <!-- END custom archive page content -->

        <!-- news navigation -->
        <div id="news_controls" class="news_navigation">

            <!-- navigation -->
            <aside id="news_taxonomy">

                <!-- metadata group -->
                <section class="metadata tags">

                    <!-- title -->
                    <span class="metadata_title">

                        browse clinical trials by <em>some label name here</em>

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php

                            // setup tag cloud
                            $tags = get_terms( array(

                                'taxonomy' => 'post_tag',
                                'hide_empty' => true,

                            ));

                            // tag cloud iteration
                            foreach ( $tags as $tag ) {

                                $tag_link = get_tag_link( $tag->term_id );

                                $tag_list .= '<a href="?tag=' . $tag->slug . '" class="taxonomy_item">' . $tag->name . '</a>';

                            }

                            // output tags
                            echo $tag_list;

                            // view all
                            echo '<a href="' . get_site_url() . '/clinical-trials" class="taxonomy_item clear">all</a>';

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

            <?php if ( $clinical_trials_query->have_posts() ) : ?>

        	<?php while ( $clinical_trials_query->have_posts() ) : $clinical_trials_query->the_post(); ?>

            <?php

                // post vars
                $topic    = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

            ?>

            <!-- post -->
            <a href="<?php the_permalink(); ?>" <?php post_class(); ?>>

                <?php the_title(); ?>

            </a>
            <!-- END post -->

        	<?php endwhile; ?>

            <?php else : ?>

            Currently, there are no active/ongoing clinical trials.

            <?php endif; ?>

        </div>
        <!-- END grid -->

    </section>
    <!-- END news -->

    <!-- navigation -->
    <section id="news_navigation">

        <?php echo foundationpress_pagination(); ?>

    </section>
    <!-- END navigation -->

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
