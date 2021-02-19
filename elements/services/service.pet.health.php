<?php

    // global
    global $post;
    $slug = $post->post_name;

    // setup query parameters
    $pet_health_query = array(

        'post_type'      => 'pet-health',
        'posts_per_page' => 3,
        'tag'            => $slug

    );

    // test for number of posts
    $count = count( $pet_health_query->posts );

    // setup query
    $pet_health = new WP_Query( $pet_health_query );

    // setup query parameters
    $view_all_query = array(

        'post_type'      => 'pet-health',
        'tag'            => $slug,
        'posts_per_page' => -1,

    );

    // setup query
    $view_all = new WP_Query( $view_all_query );

    // count total posts
    $total_posts = count( $view_all->posts );

    // animal health text
    $pet_health_text = get_field( 'pet_health_service_page', 'options' );

?>

<?php if ( $pet_health->have_posts() ) : ?>

<!-- header -->
<div class="header_block">

    <h2>

        animal health

    </h2>

    <?php if ( $total_posts > 3 ) : ?>

    <a href="<?php echo get_site_url() . '/animal-health/?tag=' . $slug; ?>">

        view all &raquo;

    </a>

    <?php endif; ?>

</div>
<!-- END header -->

<!-- text info -->
<div class="text_info">

    <?php echo $pet_health_text; ?>

</div>
<!-- END text info -->

<!-- container -->
<div class="links">

    <?php while ( $pet_health->have_posts()) : $pet_health->the_post(); ?>

    <?php

        // get featured image
        $header_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

        // setup URL redirect
        $post_redirect = get_field( 'post_redirect' );

        // test for redirect
        if ( $post_redirect ) {

            $post_link = get_field( 'redirect_url' );

        } else {

            $post_link = get_permalink();

        }

    ?>

    <a class="post_link" href="<?php echo $post_link; ?>" style="background-image:url(<?php echo $header_image; ?>);">

        <div class="post_link_header" >



        </div>

        <span class="post_link_label">

            <?php the_title(); ?>

        </span>

    </a>

    <?php endwhile; ?>

</div>
<!-- END container -->

<?php wp_reset_postdata(); ?>

<?php endif; ?>
