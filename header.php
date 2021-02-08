<?php ?>

<!doctype html>

	<html class="no-js" <?php language_attributes(); ?> >

		<head>

			<meta charset="<?php bloginfo( 'charset' ); ?>" />

			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<meta name="viewport" content="width=device-width, initial-scale=1.0" />

			<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />

			<?php wp_head(); ?>

			<?php $environment = $_SERVER[ 'DOCUMENT_ROOT' ]; ?>

            <?php if ( $environment !== '/var/www/html' ) : ?>

			<script type="text/javascript" src="//cdn.rlets.com/capture_configs/7d5/bc1/c8e/682409b896c129fc25d93d8.js" async="async"></script>

			<?php endif; ?>

		</head>

		<?php

			// site type layout
			$site_type = get_field( 'site_type', 'options' );

			// homepage alert
		    $homepage_alert   = get_field( 'homepage_alert' );

		    // option
		    $alert_option = $homepage_alert[ 'alert_option' ];

			// alert set status
			if ( $alert_option ) {

				$alert_status = 'has_alert';

			} else {

				$alert_status = 'inactive';

			}

		?>

		<body <?php body_class(); ?> data-site-type="<?php echo $site_type; ?>" data-alert-status="<?php echo $alert_status; ?>">

			<a href="#content" class="skip-link screen-reader-text"><?php esc_html_e( 'Skip to content', 'cvmbsPress' ); ?></a>

			<?php if ( $alert_option ) : ?>

			<?php get_template_part( 'elements/homepage/alert/homepage.alert' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'elements/layout/layout.header' ); ?>

			<div id="content">
