<?php

    // global
    global $post;
    $slug = $post->post_name;

    // setup today
    $today = date( 'Ymd' );

    // setup query parameters
    $clinical_trials_query = array(

        'post_type'      => 'clinical_trial',
        'tag'            => $slug,
        'posts_per_page' => 3,
        'orderby'        => 'meta_value',
        'meta_query'     => array(

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
        'order'          => 'ASC'

    );

    // setup query
    $clinical_trials = new WP_Query( $clinical_trials_query );

    // test for number of queried posts
    $count = count( $clinical_trials->posts );

    // setup query parameters
    $view_all_query = array(

        'post_type'      => 'clinical_trial',
        'tag'            => $slug,
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

    // setup query
    $view_all = new WP_Query( $view_all_query );

    // count total posts
    $total_posts = count( $view_all->posts );

    // clinical trial text
    $clinical_trial_text = get_field( 'clinical_trial_service_page', 'options' );

?>

<?php if ( $clinical_trials->have_posts() ) : ?>

<!-- service section -->
<div class="service_section clinical_trials">

    <!-- header -->
    <div class="header_block">

        <h2>

            clinical trials

        </h2>

        <?php if ( $total_posts > 3 ) : ?>

        <a href="<?php echo get_site_url() . '/clinical-trials/?tag=' . $slug; ?>">

            view all &raquo;

        </a>

        <?php endif; ?>

    </div>
    <!-- END header -->

    <!-- text info -->
    <div class="text_info">

        <?php echo $clinical_trial_text; ?>

    </div>
    <!-- END text info -->

    <!-- container -->
    <div class="links">

        <?php while ( $clinical_trials->have_posts() ) : $clinical_trials->the_post(); ?>

        <?php

            // get redirect status
            $redirect = get_field( 'post_redirect' );

            // test for redirect
            if ( $redirect ) {

                $permalink = get_field( 'redirect_url' );

            } else {

                $permalink = get_the_permalink();

            }

        ?>

        <a class="post_link" href="<?php echo $permalink; ?>">

            <?php the_title(); ?>

        </a>

        <?php endwhile; ?>

    </div>
    <!-- END container -->

    <?php wp_reset_postdata(); ?>

</div>
<!-- END service section -->

<?php endif; ?>
