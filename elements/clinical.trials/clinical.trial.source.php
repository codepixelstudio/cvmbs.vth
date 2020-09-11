<?php

    // setup REST API request
    $requestURL  = wp_remote_get( 'https://cvmbs.source.colostate.edu/wp-json/wp/v2/posts/?filter[tag]=clinical-trial&per_page=3' );
    $data        = wp_remote_retrieve_body( $requestURL );
    $articles    = json_decode( $data );
    $sourceURL   = 'https://cvmbs.source.colostate.edu/tag/clinical-trial';

?>

<!-- source feed -->
<div id="clinical_trial_source_feed">

    <a href="<?php echo $sourceURL; ?>">

        <!-- heading -->
        <h3 class="section-title">

            clinical trials in the news

            <!-- label -->
            <span class="title-link">

                view all

            </span>
            <!-- END label -->

        </h3>
        <!-- END heading -->

    </a>
    <!-- END title -->

    <!-- source-feed -->
    <div id="source-feed" class="source-feed">

        <?php

        foreach( $articles as $article ) :

            $permalink = $article->link;
            $thumbnail = $article->featured_image->source_url;
            $title     = $article->title->rendered;
            $excerpt   = $article->excerpt->rendered;

        ?>

        <a href="<?php echo $permalink; ?>" class="article card">

            <div class="header" style="background-image:url( <?php echo $thumbnail; ?> )"></div>

            <div class="content">

                <h4 class="title"><?php echo $title; ?></h4>

                <?php echo $excerpt; ?>

            </div>

        </a>

        <?php endforeach; ?>

    </div>
    <!-- END source-feed -->

</div>
<!-- END source feed -->
