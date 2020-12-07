
<?php $contacts = get_field( 'contact_information' ); ?>

<!-- service section -->
<div class="service_sidebar_section contact">

    <h2>contact information</h2>

    <?php foreach ( $contacts as $contact ) : ?>

    <?php $contact_entry = $contact[ 'contact_entry' ]; ?>

    <!-- contact entry -->
    <div class="entry <?php echo $contact[ 'type' ]; ?>">

        <?php if ( $contact[ 'contact_label' ] ) : ?>

        <span class="contact_label">

            <?php echo $contact[ 'contact_label' ]; ?>

        </span>

        <?php endif; ?>

        <?php foreach ( $contact_entry as $entry ) : ?>

        <?php if ( $entry[ 'contact_type'][ 'value' ] == 'phone' || $entry[ 'contact_type'][ 'value' ] == 'fax' ) : ?>

        <span class="contact_info phone">

            <?php echo $entry[ 'contact_type' ][ 'label' ]; ?>: <?php echo $entry[ 'contact_info' ]; ?>

        </span>

        <?php elseif ( $entry[ 'contact_type'][ 'value' ] == 'name' ) : ?>

        <span class="contact_info name">

            <?php echo $entry[ 'contact_info' ]; ?>

        </span>

        <?php elseif ( $entry[ 'contact_type' ][ 'value' ] == 'email' ) : ?>

        <span class="contact_info email">E-mail:

            <!-- email -->
            <a class="email_link" href="mailto:<?php echo $entry[ 'contact_info' ]; ?>">

                <?php echo $entry[ 'contact_info' ]; ?>

            </a>
            <!-- END email -->

        </span>

        <?php endif; ?>

        <?php endforeach; ?>

    </div>
    <!-- END contact entry -->

    <?php endforeach; ?>

</div>
<!-- END service section -->
