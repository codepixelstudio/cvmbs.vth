<?php $header_bg = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : ''; ?>

<?php $parent_link = get_permalink( $post->post_parent ); ?>

<?php if ( have_rows('page_header') ) : ?>

<?php while ( have_rows('page_header') ) : the_row(); ?>

<?php if ( get_sub_field('styled_header') ) : ?>

<!-- header -->
<header class="flexible-page-header--styled" <?php echo $header_bg; ?>>

	<!-- inner -->
	<div class="flexible-page-header--styled__inner">

		<!-- parent link -->
		<a class="parent_link" href="<?php echo $parent_link; ?>">

			&laquo;&nbsp;back to service

		</a>
		<!-- END parent link -->

		<!-- content -->
		<div class="flexible-page-header--styled__content">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<?php if ( have_rows('header_options') ) : ?>

			<?php while ( have_rows('header_options') ) : the_row(); ?>

			<?php if ( $subtitle = get_sub_field('subtitle') ) : ?>

			<!-- subheadline -->
			<p class="entry-subtitle">

				<?php the_sub_field( 'subtitle' ); ?>

			</p>
			<!-- END subheadline -->

			<?php endif; ?>

			<?php the_sub_field('intro'); ?>

			<?php endwhile; ?>

			<?php endif; ?>

		</div>
		<!-- END content -->

	</div>
	<!-- END inner -->

</header>
<!-- END header -->

<?php else : ?>

<!-- basic page heading -->
<div class="flexible-page-header">

	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<!-- parent link -->
	<a class="parent_link" href="<?php echo $parent_link; ?>">

		&laquo;&nbsp;back to service

	</a>
	<!-- END parent link -->

</div>
<!-- END basic page heading -->

<?php endif; ?>

<?php endwhile; ?>

<?php endif; ?>
