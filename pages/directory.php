<?php

    // template name: Directory
    // notes : VTH specific
?>

<?php get_header(); ?>

<?php

    // determine directory data source
    $site_type = get_field( 'site_type', 'options' );

    // create json store
    $filestore = $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-content/themes/cvmbsPress/data/directory.json';

    // convert store to data
    $getdata     = file_get_contents( $filestore );
    $membersdata = json_decode( $getdata );

    // setup data object
    $members = $membersdata->members;

    // get site path
    $siteinfo = get_blog_details();

    // parse URL for site path
    $siteurl = str_replace( '/', '', $siteinfo->path );

    // set department ID for REST API tasks
    switch ( $siteurl ) {

        case 'cs' :

            $department_ID = 1002;
            break;

        case 'bms' :

            $department_ID = 1003;
            break;

        case 'mip' :

            $department_ID = 1004;
            break;

        case 'erhs' :

            $department_ID = 1005;
            break;

    }

?>

<!-- directory -->
<main id="site-layout" class="off-canvas-content <?php echo $site_type; ?>" data-off-canvas-content>

    <!-- directory -->
    <div id="directory" class="page-container vth-main">

        <!-- page header -->
        <header class="header">

            <h1>

                <?php

                    $directory_page = get_the_title();

                    if ( $site_type == 'department' ) {

                        $directory_type = 'department';

                    } elseif ( $site_type == 'college' ) {

                        $directory_type = 'college';

                    }

                    echo $directory_type . ' ' . $directory_page;

                ?>

            </h1>

        </header>
        <!-- END page header -->

        <!-- special buttons -->
        <div id="directory_buttons">

            <!-- cue -->
            <h4 class="header">

                view by service area

            </h4>
            <!-- END cue -->

            <!-- custom menu -->
            <div id="service_directory_menu">

                <?php vth_directory_menu(); ?>

            </div>
            <!-- END custom menu -->

        </div>
        <!-- END special buttons -->

        <!-- refine container -->
        <div class="refine-me">

            <!-- cue -->
            <h4 class="header">

                search by name

            </h4>
            <!-- END cue -->

        </div>
        <!-- END refine container -->

        <!-- toolbar.DEV -->
        <div id="directory-toolbar" class="toolbar">

            <!-- alphabet -->
            <div id="directory-alphabet" class="toolbar-control-group">



            </div>
            <!-- END alphabet -->

            <!-- fiels -->
            <div id="directory-fields" class="toolbar-control-group">



            </div>
            <!-- END fiels -->

        </div>
        <!-- END toolbar.DEV -->

        <!-- table -->
        <table id="directory-records" class="directory">

            <!-- sortable header -->
            <thead>

                <tr>

                    <!-- <th width="180"> -->
                    <th>

                        Name

                    </th>

                    <th>

                        E-mail Address

                    </th>

                    <th width="180">
                    <!-- <th> -->

                        Phone

                    </th>

                    <th>

                        Title

                    </th>

                </tr>

            </thead>
            <!-- END sortable header -->

            <!-- data table -->
            <tbody>

                <?php

                    // the data (!)
                    foreach ( $members as $member ) {

                        $query      = $member->memberID;
                        $ename      = $member->eName;
                        $lastName   = $member->lastName;
                        $firstName  = $member->otherName;
                        $tableName  = $lastName . ', ' . $firstName;
                        $eMail      = strtolower( $member->email );
                        $phone      = $member->phone;
                        $department = $member->directoryGroup;
                        $title      = $member->title;

                        $results .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="//vetmedbiosci.colostate.edu/directory/member/?id=' . $query . '">' . $tableName . '</a></td><td class="link-column"><a class="email-link" href="mailto:' . $eMail . '">' . $eMail . '</a></td><td>' . $phone . '</td><td>' . $title . '</td></tr>';

                    }

                    echo $results;

                ?>

            </tbody>
            <!-- END data table -->

        </table>
        <!-- END table -->

        <!-- pagination -->
        <div id="directory-controls" class="toolbar">



        </div>
        <!-- END pagination -->

        <!-- info -->
        <div id="directory-info" class="toolbar">



        </div>
        <!-- END info -->

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
