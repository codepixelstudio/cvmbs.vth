<?php // developer sandbox

    // create json store
    $filestore = $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-content/themes/cvmbsPress/data/directory.json';

    // convert store to data
    $getdata     = file_get_contents( $filestore );
    $membersdata = json_decode( $getdata );

    // setup data object
    $members = $membersdata->members;

    // get VTH groups
    $directory_groups = array( 556, 571, 579, 703 );

?>

<!-- debug -->
<pre class="developer">

<?php print_r( $directory_groups ); ?>

</pre>
<!-- END debug -->
