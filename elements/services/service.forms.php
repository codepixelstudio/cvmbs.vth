<?php

    // block
    $forms = get_field( 'forms' );

?>

<!-- service section -->
<div class="service_section forms">

    <h2>forms and resources</h2>

    <!-- links -->
    <div class="forms_container">

        <?php foreach ( $forms as $form ) : ?>

        <?php

            $form_class = $form[ 'resource_class' ];

            if ( $form[ 'form_type' ] === 'upload' ) {

                $form_url   = $form[ 'url' ];

            } elseif ( $form[ 'form_type' ] === 'digital' ) {

                $form_url   = $form[ 'form_page' ][ 'url' ];
                $form_open  = $form[ 'form_page' ][ 'target' ];

            }

        ?>

        <!-- link -->
        <a class="form_link <?php echo $form_class; ?>" href="<?php echo $form_url; ?>" <?php if ( $form[ 'form_page' ][ 'target' ] ) { echo 'target="_blank"'; }?>>

            <?php echo $form[ 'name' ]; ?>

        </a>
        <!-- END link -->

        <?php endforeach; ?>

    </div>
    <!-- END links -->

</div>
<!-- END service section -->
