<?php

    // service type
    $service_type = get_field( 'service_type' );

    // block
    $appointments = get_field( 'appointments' );

?>

<!-- service section -->
<div class="service_section appointments">

    <?php if ( !$service_type ) : ?>

    <?php if ( $appointments[ 'appointment_info' ] ) : ?>

    <h2>visit information</h2>

    <?php echo $appointments[ 'appointment_info' ]; ?>

    <?php endif; ?>

    <?php else : ?>

    <?php if ( $appointments[ 'client_info' ] ) : ?>

    <h2>visit information</h2>

    <?php echo $appointments[ 'client_info' ]; ?>

    <?php endif; ?>

    <?php endif; ?>

    <?php if ( $appointments[ 'veterinarian_info' ] ) : ?>

    <h2>consultations and referrals</h2>

    <?php echo $appointments[ 'veterinarian_info' ]; ?>

    <?php endif; ?>

</div>
<!-- END service section -->
