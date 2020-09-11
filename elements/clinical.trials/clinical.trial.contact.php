<?php

    $contacts = get_field( 'contact' );

    // contact info test
    $contact_info = get_field( 'contact_info_text' );

?>

<!-- service section -->
<div class="trial_section contact">

    <h3>

        contact information

    </h3>

    <?php if ( $contact_info ) : ?>

    <!-- contact text -->
    <div class="contact_text">

        <?php echo $contact_info; ?>

    </div>
    <!-- END contact text -->

    <?php endif; ?>

    <?php foreach ( $contacts as $contact ) : ?>

    <!-- contact entry -->
    <div class="entry <?php echo $contact[ 'type' ]; ?>">

        <?php if ( $contact[ 'type' ][ 'value' ] !== 'name' ) : ?>

        <span class="type">

            <?php echo $contact[ 'type' ][ 'label' ]; ?> :

        </span>

        <?php endif; ?>

        <?php if ( $contact[ 'type' ][ 'value' ] == 'email' ) : ?>

        <!-- email -->
        <a class="email" href="mailto:<?php echo $contact[ 'info' ]; ?>">

            <?php echo $contact[ 'info' ]; ?>

        </a>
        <!-- END email -->

        <?php else : ?>

        <!-- text -->
        <span class="info">

            <?php echo $contact[ 'info' ]; ?>

        </span>
        <!-- END text -->

        <?php endif; ?>

    </div>
    <!-- END contact entry -->

    <?php endforeach; ?>

</div>
<!-- END service section -->
