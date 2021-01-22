<?php

    // block
    $staff_content = get_field( 'staff' );

?>

<!-- service section -->
<div class="service_sidebar_section staff">

    <!-- overlay -->
    <div class="section_overlay">

        <!--  -->

    </div>
    <!-- END overlay -->

    <!-- content -->
    <div class="section_content">

        <h2><?php echo $staff_content[ 'section_title' ]; ?></h2>

        <p>

            <?php echo $staff_content[ 'text' ]; ?>

        </p>

        <a class="staff_link" href="<?php echo $staff_content[ 'link' ][ 'url' ]; ?>">

            <?php echo $staff_content[ 'link' ][ 'title' ]; ?>

        </a>

    </div>
    <!-- END content -->

</div>
<!-- END service section -->
