
<?php $contacts = get_field( 'contact_information' ); ?>

<!-- service section -->
<div class="service_sidebar_section contact">

    <h2>contact information</h2>

    <?php foreach ( $contacts as $contact ) : ?>

    <!-- contact entry -->
    <div class="entry <?php echo $contact[ 'type' ]; ?>">

        <?php if ( $contact[ 'type' ][ 'value' ] !== 'name' ) : ?>

        <span class="type">

            <?php echo $contact[ 'type' ][ 'label' ]; ?>:

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
