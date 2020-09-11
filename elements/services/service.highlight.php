<?php

    // highlight
    $service_highlight = get_field( 'service_highlight' );
    $highlight_type    = $service_highlight[ 'highlight_type' ];

?>

<!-- service section -->
<div class="service_section highlights <?php echo $highlight_type; ?>">

    <?php if ( $highlight_type == 'video' ) : ?>

    <!-- video -->
    <div class="highlight video">

        <!-- layers -->
        <div class="layers">

            <!-- container -->
            <div class="video-container">

                <!-- embed -->
                <div class="video">

                    <iframe src="<?php echo $service_highlight[ 'video_url' ]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
                <!-- END embed -->

            </div>
            <!-- END container -->

        </div>
        <!-- END layers -->

    </div>
    <!-- END video -->

    <?php elseif ( $highlight_type == 'stats' ) : ?>

    <?php $statistic = $service_highlight[ 'statistic_block' ]; ?>

    <!-- statistics -->
    <div class="highlight statistic">

        <span class="entry number">

            <?php echo $statistic[ 'number' ]; ?>

        </span>

        <span class="entry label">

            <?php echo $statistic[ 'label' ]; ?>

        </span>

        <span class="entry text">

            <?php echo $statistic[ 'description' ]; ?>

        </span>

    </div>
    <!-- END statistics -->

    <?php elseif ( $highlight_type == 'testimonial' ) : ?>

    <?php $testimonial = $service_highlight[ 'testimonial' ]; ?>

    <!-- statistics -->
    <div class="highlight testimonial">

        <!-- testimonial -->
		<div class="testimonial_content">

			<!-- container -->
			<div class="testimonial_content-wrap">

				<!-- content -->
				<p class="testimonial_quotation">

					<span class="quote open">

                        &ldquo;

                    </span>

                    <?php echo $testimonial[ 'quotation' ]; ?>

                    <span class="quote close">

                        &rdquo;

                    </span>

				</p>
				<!-- END content -->

                <?php if ( $testimonial[ 'attribution' ] ) : ?>

				<!-- attribution -->
				<p class="testimonial_attribution">

					<?php echo $testimonial[ 'attribution' ]; ?>

				</p>
				<!-- END attribution -->

                <?php endif; ?>

                <?php if ( $testimonial[ 'context' ] ) : ?>

				<!-- context -->
				<p class="testimonial_context">

					<?php echo $testimonial[ 'context' ]; ?>

				</p>
				<!-- END context -->

                <?php endif; ?>

			</div>
			<!-- END container -->

		</div>
		<!-- END testimonial -->

    </div>
    <!-- END statistics -->

    <?php endif; ?>

</div>
<!-- END service section -->
