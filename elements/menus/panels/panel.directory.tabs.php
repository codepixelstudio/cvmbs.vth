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

<!-- panel.directory -->
<section id="menu-panel-directory" class="tabs-panel menu-panel">

    <!-- panel.header -->
    <header id="menu-panel-directory-header" class="panel-header">

        <?php

            $directory_page = get_the_title();

            if ( $site_type == 'department' ) {

                $directory_type = 'department';

            // } elseif ( $site_type == 'college' ) {
            } else {

                $directory_type = 'college';

            }

            echo $directory_type . ' directory';

        ?>

    </header>
    <!-- END panel.header -->

    <!-- panel interior -->
    <div class="panel-interior" id="directory-panel">

        <!-- panel content -->
        <div class="panel-content">

            <!-- directory views -->
            <div id="menu-directory-views" class="toolbar-control-group">



            </div>
            <!-- END directory views -->

            <!-- table -->
            <table id="menu-directory-records" class="directory menu-directory" width="100%">

                <!-- sortable header -->
                <thead>

                    <tr>

                        <!-- <th width="180"> -->
                        <th>

                            Name

                        </th>

                        <th align="right" width="180">
                        <!-- <th> -->

                            Phone

                        </th>

                    </tr>

                </thead>
                <!-- END sortable header -->

                <!-- data table -->
                <tbody>

                    <?php

                        // college data
                        if ( $site_type == 'college' || $site_type == 'dvm' || $site_type == 'special' || $site_type == 'laboratory' ) {

                            foreach ( $members as $member ) {

                                $query      = $member->memberID;
                                $ename      = $member->eName;
                                $lastName   = $member->lastName;
                                $firstName  = $member->firstName;
                                $tableName  = $lastName . ', ' . $firstName;
                                $eMail      = strtolower( $member->email );
                                $phone      = $member->phone;
                                $department = $member->directoryGroup;

                                $results .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="' . esc_url( home_url() ) . '/directory/member/?id=' . $query . '">' . $tableName . '</a></td><td>' . $phone . '</td></tr>';

                            }

                            echo $results;

                        }

                        // department data
                        if ( $site_type == 'department' ) {

                            foreach ( $members as $member ) {

                                if ( $member->directoryGroupID == $department_ID ) {

                                    $query      = $member->memberID;
                                    $ename      = $member->eName;
                                    $lastName   = $member->lastName;
                                    $firstName  = $member->firstName;
                                    $tableName  = $lastName . ', ' . $firstName;
                                    $eMail      = strtolower( $member->email );
                                    $phone      = $member->phone;
                                    $department = $member->directoryGroup;

                                    $results .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="' . esc_url( home_url() ) . '/member/?id=' . $query . '">' . $tableName . '</a></td><td>' . $phone . '</td></tr>';

                                }

                            }

                            echo $results;

                        }

                    ?>

                </tbody>
                <!-- END data table -->

            </table>
            <!-- END table -->

            <!-- pagination -->
            <div id="menu-directory-controls" class="toolbar">



            </div>
            <!-- END pagination -->

            <!-- info -->
            <div id="menu-directory-info" class="toolbar">



            </div>
            <!-- END info -->

        </div>
        <!-- END panel content -->

    </div>
    <!-- END panel interior -->

</section>
<!-- END panel.directory -->
