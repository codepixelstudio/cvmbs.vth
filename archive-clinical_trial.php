<?php

    // setup default today
    $today = date( 'Ymd' );

    // retrieve query string
    $query_URL = $_GET[ 'clinical_trial_species' ];

    // setup query
    if ( $query_URL ) {

        // dynamic layout class
        $dynamic_layout = 'filtered_view';

        // setup query parameters
        $clinical_trials = array(

            'post_type'          => 'clinical_trial',
            'clinical_trial_species' => $query_URL,
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

    // styled header
    $clinical_trials_header = get_field( 'clinical_trial_archive_header', 'options' );

    $header_background = $clinical_trials_header[ 'image' ];

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content news" data-off-canvas-content>

    <!-- news -->
    <section id="clinical_trials_content" class="<?php echo $dynamic_layout; ?>">

        <?php if ( !$query_URL ) : ?>

        <!-- styled header -->
        <header id="clinical_trials_header" class="styled" style="background-image:url(<?php echo $header_background; ?>);">

            <!-- heading -->
            <h1 class="<?php echo $dynamic_layout; ?>">

                clinical trials

            </h1>
            <!-- END heading -->

            <!-- custom archive page content -->
            <div id="clinical_trial_info" class="fixed_width <?php echo $dynamic_layout; ?>">

                <?php echo $clinical_trials_info; ?>

            </div>
            <!-- END custom archive page content -->

        </header>
        <!-- END styled header -->

        <?php endif; ?>

        <?php if ( $query_URL ) : ?>

        <?php $filtered_species = $query_URL; ?>

        <!-- styled header -->
        <header id="clinical_trials_header" class="filtered" style="background-image:url(<?php echo $header_background; ?>);">

            <!-- heading -->
            <span class="heading_label">

                clinical trials for

            </span>
            <!-- END heading -->

            <!-- heading -->
            <h1 class="<?php echo $dynamic_layout; ?>">

                 <?php echo $filtered_species; ?>

            </h1>
            <!-- END heading -->

        </header>
        <!-- END styled header -->

        <!-- grid -->
        <div id="clinical_trials_list" class="fixed_width experimental filtered_view">

            <?php if ( $clinical_trials_query->have_posts() ) : ?>

            <!-- faux table header -->
            <div id="clinical_trials_list_header">

                <!-- title -->
                <span class="clinical_trial_heading title">

                    trial name

                </span>
                <!-- END title -->

                <!-- conditions -->
                <span class="clinical_trial_heading conditions">

                    conditions

                </span>
                <!-- END conditions -->

                <!-- enrollment -->
                <span class="clinical_trial_heading enrollment">

                    enrollment ends

                </span>
                <!-- END enrollment -->

            </div>
            <!-- END faux table header -->

        	<?php while ( $clinical_trials_query->have_posts() ) : $clinical_trials_query->the_post(); ?>

            <?php

                // post vars
                $topic    = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

                // get redirect status
                $redirect = get_field( 'post_redirect' );

                // get conditions
                $conditions = 'pending';

                // get enrollment deadline
                $clinical_trial_enrollment = get_field( 'trial_expiration' );

                // test for date
                if ( $clinical_trial_enrollment ) {

                    $enrollment = strtotime( $clinical_trial_enrollment );

                } else {

                    $enrollment = '';

                }

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

                <!-- title -->
                <span class="clinical_trial_entry title">

                    <?php the_title(); ?>

                </span>
                <!-- END title -->

                <!-- conditions -->
                <span class="clinical_trial_entry conditions">

                    <?php echo $conditions; ?>

                </span>
                <!-- END conditions -->

                <!-- enrollment -->
                <span class="clinical_trial_entry enrollment">

                    <?php // echo date( 'n/j/Y' , $clinical_trial_enrollment ); ?>
                    <?php echo date( 'F j, Y' , $enrollment ); ?>

                </span>
                <!-- END enrollment -->

            </a>
            <!-- END post -->

        	<?php endwhile; ?>

            <?php else : ?>

            Currently, there are no active/ongoing clinical trials matching the selected criteria.

            <?php endif; ?>

        </div>
        <!-- END grid -->

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

                                'taxonomy'   => 'clinical_trial_species',
                                'hide_empty' => true,

                            ));

                            // tag cloud iteration
                            foreach ( $tags as $tag ) {

                                $tag_link = get_tag_link( $tag->term_id );

                                // retrieve query string
                                $query_URL = $_GET[ 'clinical_trial_species' ];

                                if ( $tag->slug == $query_URL ) {

                                    $active_class = 'active';

                                } else {

                                    $active_class = 'inactive';

                                }

                                $tag_list .= '

                                    <a href="?clinical_trial_species=' . $tag->slug . '" class="taxonomy_item ' . $active_class . '">

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

        <?php else : ?>

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

                                'taxonomy'   => 'clinical_trial_species',
                                'hide_empty' => true,

                            ));

                            // tag cloud iteration
                            foreach ( $tags as $tag ) {

                                $tag_link = get_tag_link( $tag->term_id );

                                // retrieve query string
                                $query_URL = $_GET[ 'clinical_trial_species' ];

                                if ( $tag->slug == $query_URL ) {

                                    $active_class = 'active';

                                } else {

                                    $active_class = 'inactive';

                                }

                                $tag_list .= '

                                    <a href="?clinical_trial_species=' . $tag->slug . '" class="taxonomy_item ' . $active_class . '">

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
        <div id="clinical_trials_list" class="fixed_width experimental">

            <?php if ( $clinical_trials_query->have_posts() ) : ?>

            <!-- faux table header -->
            <div id="clinical_trials_list_header">

                <!-- title -->
                <span class="clinical_trial_heading title">

                    trial name

                </span>
                <!-- END title -->

                <!-- conditions -->
                <span class="clinical_trial_heading conditions">

                    conditions

                </span>
                <!-- END conditions -->

                <!-- enrollment -->
                <span class="clinical_trial_heading enrollment">

                    enrollment ends

                </span>
                <!-- END enrollment -->

            </div>
            <!-- END faux table header -->

        	<?php while ( $clinical_trials_query->have_posts() ) : $clinical_trials_query->the_post(); ?>

            <?php

                // post vars
                $topic    = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

                // get redirect status
                $redirect = get_field( 'post_redirect' );

                // get conditions
                $conditions = 'pending';

                // get enrollment deadline
                $clinical_trial_enrollment = get_field( 'trial_expiration' );

                // test for date
                if ( $clinical_trial_enrollment ) {

                    $enrollment = strtotime( $clinical_trial_enrollment );

                } else {

                    $enrollment = '';

                }

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

                <!-- title -->
                <span class="clinical_trial_entry title">

                    <?php the_title(); ?>

                </span>
                <!-- END title -->

                <!-- conditions -->
                <span class="clinical_trial_entry conditions">

                    <?php echo $conditions; ?>

                </span>
                <!-- END conditions -->

                <!-- enrollment -->
                <span class="clinical_trial_entry enrollment">

                    <?php // echo date( 'n/j/Y' , $clinical_trial_enrollment ); ?>
                    <?php echo date( 'F j, Y' , $enrollment ); ?>

                </span>
                <!-- END enrollment -->

            </a>
            <!-- END post -->

        	<?php endwhile; ?>

            <?php else : ?>

            Currently, there are no active/ongoing clinical trials matching the selected criteria.

            <?php endif; ?>

        </div>
        <!-- END grid -->

        <?php endif; ?>

        <?php if ( !$query_URL ) : ?>

        <?php get_template_part( 'elements/clinical.trials/clinical.trial.source' ); ?>

        <?php endif; ?>

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
