<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content default" data-off-canvas-content style="background-image:url(<?php echo $place_image; ?>);" data-template="parent">

	<!-- content container -->
	<div class="clinical_trial_container">

		<?php while ( have_posts() ) : the_post(); ?>

		<!-- clinical trial post -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php

				// notification
				$notification_option = get_field( 'notification_option' );

				// image
				$header_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

				// get raw date
			    $clinical_trial_expiration = get_field( 'trial_expiration' );

				// set human readable
			    $expiration_date = strtotime( $clinical_trial_expiration );

			?>

			<div class="post-header">

				<h1 class="entry-title">

					<?php the_title(); ?>

				</h1>

			</div>

			<?php if ( $notification_option ) : ?>

			<!-- notification -->
			<div class="notification_wrapper">

			<?php get_template_part( 'elements/clinical.trials/clinical.trial.notification' ); ?>

			</div>
			<!-- END notification -->

			<?php endif; ?>

			<?php get_template_part( 'elements/clinical.trials/clinical.trial.description' ); ?>

			<?php get_template_part( 'elements/clinical.trials/clinical.trial.eligibility' ); ?>

			<?php if ( $clinical_trial_expiration ) : ?>

			<?php get_template_part( 'elements/clinical.trials/clinical.trial.expiration' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'elements/clinical.trials/clinical.trial.contact' ); ?>

		</article>
		<!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

		<?php get_template_part( 'elements/layout/layout.footer' ); ?>

	</div>
	<!-- END content container -->

</main>
<!-- site.layout -->

<?php get_footer(); ?>
