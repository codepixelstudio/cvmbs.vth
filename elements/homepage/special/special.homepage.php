<?php

    // template path
    $template_path = 'elements/homepage/special/content/';

?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content special page-template-flexible-page" data-off-canvas-content>

    <?php get_template_part( 'elements/layout/layout.billboard' ); ?>

    <!-- special.content -->
    <div id="special-content" class="homepage-content special">

        <?php

            if ( have_rows( 'special_homepage_content' ) ) :

                while ( have_rows( 'special_homepage_content' ) ) : the_row();

                    if ( get_row_layout() == 'description' ) :

                        get_template_part( $template_path . 'special.description' );

                    elseif ( get_row_layout() == 'launchpad_section' ) :

                        get_template_part( $template_path . 'special.launchpads' );

                    elseif ( get_row_layout() == 'events' ) :

                        get_template_part( $template_path . 'special.events' );

                    elseif ( get_row_layout() == 'news' ) :

                        get_template_part( $template_path . 'special.news' );

                    elseif ( get_row_layout() == 'contact' ) :

                        // get_template_part( $template_path . 'special.contact' );
                        get_template_part( $template_path . 'special.contact.build' );

                    elseif ( get_row_layout() == 'giving' ) :

                        get_template_part( $template_path . 'special.giving' );

                    else :

                        // the emptiness

                    endif;

                endwhile;

            endif;

        ?>

    </div>
    <!-- END department.content -->

    <?php get_template_part( 'elements/layout/layout.newsletter' ); ?>

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->
