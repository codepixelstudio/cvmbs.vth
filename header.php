<?php ?>

<!doctype html>

	<html class="no-js" <?php language_attributes(); ?> >

		<head>

			<meta charset="<?php bloginfo( 'charset' ); ?>" />

			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<meta name="viewport" content="width=device-width, initial-scale=1.0" />

			<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />

			<?php wp_head(); ?>

			<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-5T2DV98');</script>
			<!-- End Google Tag Manager -->

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

			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5T2DV98"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->

			<a href="#content" class="skip-link screen-reader-text"><?php esc_html_e( 'Skip to content', 'cvmbsPress' ); ?></a>

			<?php if ( $alert_option ) : ?>

			<?php get_template_part( 'elements/homepage/alert/homepage.alert' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'elements/layout/layout.header' ); ?>

			<div id="content">
