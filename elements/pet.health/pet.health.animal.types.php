<?php

    // setup tag cloud
    $tags = get_terms( array(

        'taxonomy' => 'animal',
        'hide_empty' => true,

    ));

    // tag cloud iteration
    foreach ( $tags as $tag ) {

        $tag_link = get_tag_link( $tag->term_id );

        $tag_list .= '<a href="?animal_type=' . $tag->name . '" class="taxonomy_item">' . $tag->name . '</a>';

    }

    // output tags
    echo $tag_list;

    // view all
    echo '<a href="' . get_site_url() . '/services" class="taxonomy_item clear">all</a>';

?>
