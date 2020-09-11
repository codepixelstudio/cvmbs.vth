<?php

    // get raw date
    $clinical_trial_expiration = get_field( 'trial_expiration' );

    // set human readable
    $expiration_date = strtotime( $clinical_trial_expiration );

?>

<!-- service section -->
<div class="trial_section expiration">

    <h3>

        dates and deadlines

    </h3>

    <p class="expiration_text">

        trial applications close after <?php echo date( 'F j, Y' , $expiration_date ); ?>

    </p>

</div>
<!-- END service section -->
