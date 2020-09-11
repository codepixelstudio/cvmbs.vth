<?php

    // options group
    $billboard_config = get_field( 'billboard_config', 'options' );

    // billboard class
    if ( $billboard_config ) {

        $billboard_class = 'video_player';

    } else {

        $billboard_class = 'slideshow';

    }

    // slideshow content
    $slides = get_field( 'slideshow', 'options' );

    // video content
    $video = get_field( 'video', 'options' );

?>

<!-- custom billboard -->
<section id="custom_billboard" class="<?php echo $billboard_class; ?>">

    <?php if ( $billboard_config ) : // setup video player layout ?>

    <!-- uiFX layer -->
    <div class="uiFX layers">

        <!-- image -->
        <div class="layer image">

            <!--  -->

        </div>
        <!-- END image -->

        <!-- image -->
        <div class="layer overlay">

            <!--  -->

        </div>
        <!-- END image -->

    </div>
    <!-- END uiFX layer -->

    <!-- content layer -->
    <div class="content layers">

        <!-- container -->
        <div class="video_container">

            <!-- embed -->
            <div class="program-video">

                <!-- <iframe src="<?php echo $video_content[ 'video_url' ]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                <iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $video ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            <!-- END embed -->

        </div>
        <!-- END container -->

        <!-- text -->
        <div class="text_container">

            <!-- headline -->
            <span class="content_layer headline">

                compassionate care

            </span>
            <!-- END headline -->

            <!-- subheadline -->
            <span class="content_layer subheadline">

                providing the best care possible for your best friend

            </span>
            <!-- END subheadline -->

            <!-- button -->
            <span class="content_layer action_button">

                discover our care approach

            </span>
            <!-- END button -->

        </div>
        <!-- END text -->

    </div>
    <!-- END content layer -->

    <?php else : // setup slideshow layout ?>

    <!-- slideshow controls -->
    <span id="slideshow_controls">

        <!--  -->

    </span>
    <!-- END slideshow controls -->

    <!-- slides -->
    <div class="slideshow_slides">

        <?php foreach ( $slides as $slide ) : ?>

        <!-- slideshow slide -->
        <div class="slideshow_slide">

            <!-- uiFX layer -->
            <div class="uiFX layers">

                <!-- image -->
                <div class="layer image" style="background-image:url(<?php echo $slide[ 'background_image' ]; ?>)">

                    <!--  -->

                </div>
                <!-- END image -->

                <!-- image -->
                <div class="layer overlay">

                    <!--  -->

                </div>
                <!-- END image -->

            </div>
            <!-- END uiFX layer -->

            <!-- content layer -->
            <div class="content layers">

                <!-- headline -->
                <span class="content_layer headline">

                    <?php echo $slide[ 'headline' ]; ?>

                </span>
                <!-- END headline -->

                <!-- subheadline -->
                <span class="content_layer subheadline">

                    <?php echo $slide[ 'subheadline' ]; ?>

                </span>
                <!-- END subheadline -->

                <!-- button -->
                <a href="<?php echo $slide[ 'button' ][ 'url' ]; ?>" class="content_layer action_button">

                    <?php echo $slide[ 'button' ][ 'title' ]; ?>

                </a>
                <!-- END button -->

            </div>
            <!-- END content layer -->

        </div>
        <!-- END slideshow slide -->

        <?php endforeach; ?>

    </div>
    <!-- END slides -->

    <?php endif; ?>

</section>
<!-- END custom billboard -->
