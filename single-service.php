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

					<!-- service sidebar -->
					<div class="service_column sidebar">

						<?php if ( $appointments_option ) : ?>

						<?php get_template_part( 'elements/services/service.appointments' ); ?>

						<?php endif; ?>

					</div>
					<!-- END service sidebar -->

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

				<?php get_template_part( 'elements/services/service.clinical.trials' ); ?>

				<?php get_template_part( 'elements/services/service.pet.health' ); ?>

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
