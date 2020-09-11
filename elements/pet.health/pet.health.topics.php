<?php

    // setup topics list
    $topics = get_terms( array(

        'taxonomy' => 'topic',
        'hide_empty' => true,

    ));

    // topics list iteration
    foreach ( $topics as $topic ) {

        if ( $topic->slug != 'uncategorized' ) {

            $topic_link = get_category_link( $topic->term_id );

            $topic_list .= '<a href="?topic=' . $topic->slug . '" class="taxonomy_item">' . $topic->name . '</a>';

        }

    }

    // output topics
    echo $topic_list;

?>
