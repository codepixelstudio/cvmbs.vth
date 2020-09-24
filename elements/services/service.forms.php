<?php

    // block
    $forms = get_field( 'forms' );

?>

<!-- service section -->
<div class="service_section forms">

    <h2>forms</h2>

    <!-- links -->
    <div class="forms_container">

        <?php foreach ( $forms as $form ) : ?>

        <?php

            if ( $form[ 'form_type' ] === 'upload' ) {

                $form_url   = $form[ 'url' ];
                $form_class = 'upload';

            } elseif ( $form[ 'form_type' ] === 'digital' ) {

                $form_url   = $form[ 'form_page' ];
                $form_class = 'digital';

            }

        ?>

        <!-- link -->
        <a class="form_link <?php echo $form_class; ?>" href="<?php echo $form_url; ?>">

            <?php echo $form[ 'name' ]; ?>

        </a>
        <!-- END link -->

        <?php endforeach; ?>

    </div>
    <!-- END links -->

</div>
<!-- END service section -->
