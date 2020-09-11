<?php

    // block
    $staff_content = get_field( 'staff' );

?>

<!-- service section -->
<div class="service_sidebar_section staff">

    <h2><?php the_title(); ?> staff</h2>

    <p>

        <?php echo $staff_content[ 'text' ]; ?>

    </p>

    <a class="staff_link" href="<?php echo $staff_content[ 'link' ]; ?>">

        <?php the_title(); ?> staff directory

    </a>

</div>
<!-- END service section -->
