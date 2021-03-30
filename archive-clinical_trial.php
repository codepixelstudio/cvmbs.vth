<?php

    // setup default today
    $today = date( 'Ymd' );

    // retrieve query string
    $query_URL = $_GET[ 'tag' ];

    // setup query
    if ( $query_URL ) {

        // dynamic layout class
        $dynamic_layout = 'filtered_view';

        // setup query parameters
        $clinical_trials = array(

            'post_type'          => 'clinical_trial',
            'clinical_trial_tag' => $query_URL,
            'posts_per_page'     => -1,
            'orderby'            => 'title',
            'meta_query'         => array(

                'relation'       => 'OR',
                array(

                    'key'        => 'trial_expiration',
                    'value'      => $today,
                    'compare'    => '>'

                ),

                array(

                    'key'        => 'trial_expiration',
                    'compare'    => 'NOT EXISTS'

                ),

                array(

                    'key'        => 'trial_expiration',
                    'value'      => '',
                    'compare'    => '='

                ),

            ),

            'order'              => 'ASC'

        );

    } else {

        // dynamic layout class
        $dynamic_layout = 'default_view';

        // setup query parameters
        $clinical_trials = array(

            'post_type'          => 'clinical_trial',
            // 'clinical_trial_tag' => $query_URL,
            'posts_per_page'     => -1,
            'orderby'            => 'title',
            'meta_query'         => array(

                'relation'       => 'OR',
                array(

                    'key'        => 'trial_expiration',
                    'value'      => $today,
                    'compare'    => '>'

                ),

                array(

                    'key'        => 'trial_expiration',
                    'compare'    => 'NOT EXISTS'

                ),

                array(

                    'key'        => 'trial_expiration',
                    'value'      => '',
                    'compare'    => '='

                ),

            ),

            'order'              => 'ASC'

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
        <div id="news_header" class="fixed_width">

            <!-- heading -->
            <h1>

                <?php if ( $_GET ) : ?>

                <span class="tagline">

                    clinical trials

                </span>

                <?php // echo key( $_GET ); ?>

                <?php

                    if ( key( $_GET ) === 'tag' ) {

                        $get_title   = $_GET[ 'tag' ];
                        $page_title  = explode( '-', $get_title );
                        $query_title = get_term_by(

                            'name', $_GET[ 'tag' ], 'post_tag'

                        );

                    } else if ( key( $_GET ) === 'topic' ) {

                        $get_title   = $_GET[ 'topic' ];
                        $page_title  = explode( '-', $get_title );
                        $query_title = get_term_by(

                            'name', $_GET[ 'topic' ], 'topic'

                        );

                    }

                ?>

                <?php foreach ( $page_title as $title ) {

                    echo $title . '&nbsp;';

                } ?>

                <?php else : ?>

                clinical trials

                <?php endif; ?>

            </h1>
            <!-- END heading -->

        </div>
        <!-- END header -->

        <!-- custom archive page content -->
        <div id="clinical_trial_info" class="fixed_width <?php echo $dynamic_layout; ?>">

            <?php echo $clinical_trials_info; ?>

        </div>
        <!-- END custom archive page content -->

        <?php if ( !$query_URL ) : ?>

        <?php get_template_part( 'elements/clinical.trials/clinical.trial.statistics' ); ?>

        <?php endif; ?>

        <!-- news navigation -->
        <div id="news_controls" class="news_navigation fixed_width <?php echo $dynamic_layout; ?>">

            <!-- navigation -->
            <aside id="news_taxonomy">

                <!-- metadata group -->
                <section class="metadata tags">

                    <!-- title -->
                    <span class="metadata_title">

                        browse clinical trials

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php

                            // setup tag cloud
                            $tags = get_terms( array(

                                'taxonomy'   => 'clinical_trial_tag',
                                'hide_empty' => true,

                            ));

                            // tag cloud iteration
                            foreach ( $tags as $tag ) {

                                $tag_link = get_tag_link( $tag->term_id );

                                // retrieve query string
                                $query_URL = $_GET[ 'tag' ];

                                if ( $tag->slug == $query_URL ) {

                                    $active_class = 'active';

                                } else {

                                    $active_class = 'inactive';

                                }

                                $tag_list .= '

                                    <a href="?tag=' . $tag->slug . '" class="taxonomy_item ' . $active_class . '">

                                        ' . $tag->name . '

                                    </a>

                                ';

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
        <div id="news_grid" class="fixed_width">

            <?php if ( $clinical_trials_query->have_posts() ) : ?>

        	<?php while ( $clinical_trials_query->have_posts() ) : $clinical_trials_query->the_post(); ?>

            <?php

                // post vars
                $topic    = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

                // get redirect status
                $redirect = get_field( 'post_redirect' );

                // set link var
                $permalink;

                // test for redirect
                if ( $redirect ) {

                    $permalink = get_field( 'redirect_url' );

                } else {

                    $permalink = get_the_permalink();

                }

            ?>

            <!-- post -->
            <a href="<?php echo $permalink; ?>" <?php post_class(); ?>>

                <?php the_title(); ?>

            </a>
            <!-- END post -->

        	<?php endwhile; ?>

            <?php else : ?>

            Currently, there are no active/ongoing clinical trials matching the selected criteria.

            <?php endif; ?>

        </div>
        <!-- END grid -->

        <?php get_template_part( 'elements/clinical.trials/clinical.trial.source' ); ?>

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
