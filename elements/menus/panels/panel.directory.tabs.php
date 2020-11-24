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

?>

<!-- panel.directory -->
<section id="menu-panel-directory" class="tabs-panel menu-panel">

    <!-- panel.header -->
    <header id="menu-panel-directory-header" class="panel-header">

        <?php

            $directory_page = get_the_title();

            if ( $site_type == 'department' ) {

                $directory_type = 'department';

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

                        foreach ( $members as $member ) {

                            $query      = $member->memberID;
                            $ename      = $member->eName;
                            $lastName   = $member->lastName;
                            $firstName  = $member->otherName;
                            $tableName  = $lastName . ', ' . $firstName;
                            $eMail      = strtolower( $member->email );
                            $phone      = $member->phone;
                            $department = $member->directoryGroup;

                            $results .= '<tr class="record"><td class="link-column"><span class="mobile-toggle"></span><a class="member-link" href="https://vetmedbiosci.colostate.edu/directory/member/?id=' . $query . '">' . $tableName . '</a></td><td>' . $phone . '</td></tr>';

                        }

                        echo $results;

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
