<?php $pet_types = get_field( 'pet_types' ); ?>

<!-- service section -->
<div class="pet_types">

    <h4>animal types</h4>

    <?php foreach ( $pet_types as $pet_type ) : ?>

    <!-- pet type -->
    <span class="pet_type <?php echo $pet_type; ?>">

        <!-- label -->
        <span class="pet_type_label">

            <?php echo $pet_type; ?>

        </span>
        <!-- END label -->

    </span>
    <!-- END pet type -->

    <?php endforeach; ?>

</div>
<!-- END service section -->
