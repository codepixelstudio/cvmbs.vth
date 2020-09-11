<?php

    $appointments = get_field( 'appointments' );
    $referrals    = $appointments[ 'referral_status' ];

?>

<!-- service section -->
<div class="referrals">

    <?php if ( !$referrals ) : ?>

    <span class="referral_block schedule">no referral needed</span>

    <?php else : ?>

    <span class="referral_block required">referral required</span>

    <?php endif; ?>

</div>
<!-- END service section -->
