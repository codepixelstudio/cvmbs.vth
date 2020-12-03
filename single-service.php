<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);" data-template="parent">

	<!-- container -->
	<div class="service_container">

		<?php while ( have_posts() ) : the_post(); ?>

		<!-- service post -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php

				// service type
				$service_type = get_field( 'service_type' );

				// notification
				$notification_option = get_field( 'notification_option' );

				// appointments
				$appointments_option = get_field( 'appointments_option' );

				// highlight
				$service_highlight_option = get_field( 'service_highlight_option' );

				// contact info
				$contact_option = get_field( 'contact_information_option' );

				// forms
				$forms_option = get_field( 'forms_option' );

				// giving
				$giving_option = get_field( 'giving_option' );

				// image
				$header_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

			?>

			<!-- header -->
			<header class="service-header" style="background-image:url(<?php echo $header_image; ?>);">

				<!-- title -->
				<div class="service-title">

					<!-- label -->
					<span class="header-label">

						service

					</span>
					<!-- END label -->

					<!-- title -->
					<h1 class="entry-title">

						<?php the_title(); ?>

					</h1>
					<!-- END title -->

				</div>
				<!-- END title -->

				<!-- info -->
				<div class="service-info">

					<?php if ( !$service_type ) : ?>

					<?php // get_template_part( 'elements/services/service.referrals' ); ?>

					<?php endif; ?>

					<?php get_template_part( 'elements/services/service.pet.types' ); ?>

				</div>
				<!-- END info -->

			</header>
			<!-- END header -->

			<!-- content -->
			<div class="service_content">

				<?php if ( $appointments_option ) {

					$lead_content_class = 'split';

				} else {

					$lead_content_class = 'unified';

				} ?>

				<!-- conditional layout -->
				<div class="lead_content <?php echo $lead_content_class; ?>">

					<!-- service description -->
					<div class="service_column main">

						<?php if ( $notification_option ) : ?>

						<!-- notification -->
						<div class="notification_wrapper">

						<?php get_template_part( 'elements/services/service.notification' ); ?>

						</div>
						<!-- END notification -->

						<?php endif; ?>

						<?php get_template_part( 'elements/services/service.description' ); ?>

					</div>
					<!-- END service description -->

					<?php if ( $appointments_option ) : ?>

					<!-- service sidebar -->
					<div class="service_column sidebar">

						<?php get_template_part( 'elements/services/service.appointments' ); ?>

					</div>
					<!-- END service sidebar -->

					<?php endif; ?>

				</div>
				<!-- END conditional layout -->

				<?php if ( $contact_option ) : ?>

				<!-- contact -->
				<div class="contact_info">

					<?php get_template_part( 'elements/services/service.contact' ); ?>

					<?php get_template_part( 'elements/services/service.staff' ); ?>

				</div>
				<!-- END contact -->

				<?php endif; ?>

				<?php if ( $forms_option ) : ?>

				<?php get_template_part( 'elements/services/service.forms' ); ?>

				<?php endif; ?>

				<?php if ( $service_highlight_option ) : ?>

				<?php get_template_part( 'elements/services/service.highlight' ); ?>

				<?php endif; ?>

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

					if ( $clinical_trials->have_posts() ) {

						$pet_health_container = 'stacked';

					} else {

						$pet_health_container = 'standalone';

					}

					wp_reset_postdata();

				?>

				<?php get_template_part( 'elements/services/service.clinical.trials' ); ?>

				<!-- service section -->
				<div class="service_section pet_health <?php echo $pet_health_container; ?>">

					<?php get_template_part( 'elements/services/service.pet.health' ); ?>

				</div>
				<!-- END service section -->

				<?php if ( $giving_option ) : ?>

				<?php get_template_part( 'elements/services/service.giving' ); ?>

				<?php endif; ?>

			</div>
			<!-- END content -->

		</article>
		<!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

		<?php get_template_part( 'elements/layout/layout.footer' ); ?>

	</div>
	<!-- END content container -->

</main>
<!-- site.layout -->

<?php get_footer(); ?>
