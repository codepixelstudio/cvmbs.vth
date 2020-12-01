<?php

    $homepage_options = get_field( 'vth_homepage_options' );

    $billboard_content = $homepage_options[ 'billboard_content' ];

    // homepage alert
    $homepage_alert   = get_field( 'homepage_alert' );

    // option
    $alert_option = $homepage_alert[ 'alert_option' ];

    // toolbar links
    $quick_links        = $homepage_options[ 'links' ];
    $veterinarians_link = $toolbar_links[ 'veterinarians_button' ];
    $directory_link     = $toolbar_links[ 'directory_button' ];
    $emergency_link     = $toolbar_links[ 'emergency_button' ];

?>

<!-- special.billboard -->
<section id="special-billboard" class="ui-billboard pattern vth" tabindex="-1" style="background-image:url(<?php echo $billboard_content[ 'image' ]; ?>);">

    <!-- overlay -->
    <div class="billboard-overlay">

        <!--  -->

    </div>
    <!-- END overlay -->

    <?php if ( $alert_option ) : ?>

    <!-- emergency alert -->
    <div id="homepage_alert" class="ui_alert <?php echo $homepage_alert[ 'alert_type' ]; ?>">

        <!-- alert text -->
        <div class="alert_text">

            <?php if ( $homepage_alert[ 'alert_title' ] ) : ?>

            <!-- title -->
            <span class="alert_title">

                <?php echo $homepage_alert[ 'alert_title' ]; ?>

            </span>
            <!-- END title -->

            <?php endif; ?>

            <!-- message -->
            <span class="alert_message">

                <?php echo $homepage_alert[ 'alert_text' ]; ?>&nbsp;-&nbsp;

            </span>
            <!-- END message -->

            <!-- link -->
            <a class="alert_link" href="<?php echo $homepage_alert[ 'alert_link' ][ 'url' ]; ?>">

                <?php echo $homepage_alert[ 'alert_link' ][ 'title' ]; ?>

            </a>
            <!-- END link -->

        </div>
        <!-- END alert text -->

        <!-- dismiss alert -->
        <button id="dismiss_alert">

            <!-- label -->
            <span>

                dismiss

            </span>
            <!-- END label -->

        </button>
        <!-- END dismiss alert -->

    </div>
    <!-- END emergency alert -->

    <?php endif; ?>

    <!-- toolbar -->
    <div id="vth-toolbar">

        <?php if ( $quick_links ) : ?>

        <?php foreach( $quick_links as $quick_link ) : ?>

        <?php

            // get titles
            $quick_link_title = $quick_link[ 'link' ][ 'title' ];

            // setup icons
            switch ( true ) {

                case $quick_link_title == 'for clients' :

                    $link_ID = 'client-portal';
                    break;

                case $quick_link_title == 'for veterinarians' :

                    $link_ID = 'veterinarians';
                    break;

                case $quick_link_title == 'staff directory' :

                    $link_ID = 'staff-directory';
                    break;

                case $quick_link_title == 'emergency' :

                    $link_ID = 'emergency';
                    break;

            }

        ?>

        <!-- clients -->
        <a href="<?php echo $quick_link[ 'link' ][ 'url' ]; ?>" id="<?php echo $link_ID; ?>" class="toolbar-button">

            <!-- text -->
            <span>

                <?php echo $quick_link[ 'link' ][ 'title' ]; ?>

            </span>
            <!-- END text -->

        </a>
        <!-- END clients -->

        <?php endforeach; ?>

        <?php endif; ?>

    </div>
    <!-- END toolbar -->

    <!-- content -->
    <div id="billboard-container">

        <!-- headline -->
        <span class="headline">

            <?php echo $billboard_content[ 'headline' ]; ?>

        </span>
        <!-- END headline -->

        <!-- description -->
        <span class="description">

            <?php echo $billboard_content[ 'description' ]; ?>

        </span>
        <!-- END description -->

        <?php if ( $billboard_content[ 'button' ] ) : ?>

        <!-- button -->
        <a class="billboard-button" href="<?php echo $billboard_content[ 'button' ][ 'url' ]; ?>">

            <?php echo $billboard_content[ 'button' ][ 'title' ]; ?>

        </a>
        <!-- END button -->

        <?php endif; ?>

    </div>
    <!-- END content -->

    <!-- buttons -->
    <div id="service-buttons">

        <?php $service_links = $homepage_options[ 'service_links' ]; ?>

        <?php foreach( $service_links as $service_link ) : ?>

        <!-- link -->
        <a class="button-link" href="<?php echo $service_link[ 'link' ]; ?>">

            <!-- title -->
            <span class="button-title">

                <?php echo $service_link[ 'title' ]; ?>

            </span>
            <!-- END title -->

            <!-- text -->
            <span class="button-text">

                <?php echo $service_link[ 'text' ]; ?>

            </span>
            <!-- END text -->

        </a>
        <!-- END link -->

        <?php endforeach; ?>

    </div>
    <!-- END buttons -->

    <!-- infobar -->
    <div id="infobar">

        <!-- item -->
        <div id="info-hours" class="infobar-box">

            <!-- icon -->
            <span class="icon">

                <!--  -->

            </span>
            <!-- END icon -->

            <!-- label -->
            <span class="label">

                open monday - friday

            </span>
            <!-- END label -->

            <!-- info -->
            <span class="info">

                8:00 AM - 5:00 PM

            </span>
            <!-- END info -->

        </div>
        <!-- END item -->

        <!-- item -->
        <div id="info-emergency" class="infobar-box">

            <!-- icon -->
            <span class="icon">

                <!--  -->

            </span>
            <!-- END icon -->

            <!-- label -->
            <span class="label">

                emergency

            </span>
            <!-- END label -->

            <!-- info -->
            <span class="info">

                open 24 hours

            </span>
            <!-- END info -->

        </div>
        <!-- END item -->

        <!-- item -->
        <div id="info-directions" class="infobar-box">

            <!-- icon -->
            <span class="icon">

                <!--  -->

            </span>
            <!-- END icon -->

            <!-- label -->
            <span class="label">

                directions

            </span>
            <!-- END label -->

            <!-- info -->
            <span class="info">

                300 west drake road

            </span>
            <!-- END info -->

        </div>
        <!-- END item -->

        <!-- item -->
        <div id="info-appointment" class="infobar-box">

            <!-- icon -->
            <span class="icon">

                <!--  -->

            </span>
            <!-- END icon -->

            <!-- label -->
            <span class="label">

                make an appointment

            </span>
            <!-- END label -->

            <!-- info -->
            <span class="info">

                (970) 297-5000

            </span>
            <!-- END info -->

        </div>
        <!-- END item -->

    </div>
    <!-- END infobar -->

</section>
<!-- END special.billboard -->
