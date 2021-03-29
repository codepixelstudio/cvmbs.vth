<?php

    // setup topics list
    $topics = get_terms(

        array(

            'taxonomy' => 'topic',
            'hide_empty' => true,

        )

    );

    // topics list iteration
    foreach ( $topics as $topic ) {

        if ( $topic->slug != 'uncategorized' ) {

            $topic_link = get_category_link( $topic->term_id );

            $topic_list .= '<a href="' . get_site_url() . '/pet-health/?topic=' . $topic->slug . '" class="taxonomy_item">' . $topic->name . '</a>';

        }

    }

    // output topics
    echo $topic_list;

    // setup tags list
    $tags = get_terms(

        array(

            'taxonomy' => 'post_tag',
            'hide_empty' => true,

        )

    );

    // tags list iteration
    foreach ( $tags as $tag ) {

        $tag_list .= '

            <a href="' . get_site_url() . '/pet-health/?tag=' . $tag->slug . '" class="taxonomy_item">

                ' . $tag->name . '

            </a>

        ';

    }

    // output tags
    echo $tag_list;

?>
