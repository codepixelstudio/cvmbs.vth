<?php $giving_button = get_field( 'giving_button' ); ?>

<!-- service section -->
<div class="service_section giving last">

    <!-- visual FX -->
    <div class="design-layer">

        <!-- image -->
        <div class="image fx-layer layer" style="background-image:url(<?php echo $giving_button[ 'background' ]; ?>)">

            <!-- empty -->

        </div>
        <!-- END image -->

        <!-- color -->
        <div class="color fx-layer layer">

            <!--  -->

        </div>
        <!-- END color -->

    </div>
    <!-- END visual FX -->

    <!-- content -->
    <div class="content-layer">

        <span class="headline">

            <?php echo $giving_button[ 'title' ]; ?>

        </span>

        <span class="text">

            <?php echo $giving_button[ 'text' ]; ?>

        </span>

        <a href="<?php echo $giving_button[ 'button' ][ 'url' ]; ?>" class="content-button">

            <?php echo $giving_button[ 'button' ][ 'title' ]; ?>

        </a>

    </div>
    <!-- END content -->

</div>
<!-- END service section -->
