
<!-- service section -->
<div class="service_section notification">

    <?php

        $notification = get_field( 'notification' );

    	$expired = is_this_item_expired( $notification[ 'expiration' ] );

    	if ( ! ( $expired ) ) :

    	$type = get_sub_field( 'type' );

    ?>

    <!-- .notification-block -->
    <div class="template-block notification-block">

    	<!-- .notification-box -->
    	<div class="notification-box box--<?php echo esc_attr( $notification[ 'type' ] ); ?>">

    		<!-- .notification-box__content -->
    		<div class="notification-box__content">

    			<?php if ( $notification[ 'heading' ] ) : ?>

    			<h2 class="notification-box__title"><?php echo $notification[ 'heading' ]; ?></h2>

    			<?php endif; ?>

    			<?php echo $notification[ 'message' ]; ?>

    		</div>
    		<!-- .notification-box__content -->

    	</div>
    	<!-- .notification-box -->

    </div>
    <!-- .notification-block -->

    <?php endif; ?>

</div>
<!-- END service section -->
