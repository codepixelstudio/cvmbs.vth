<?php

    // template name: Service Directory [API]
    // notes : VTH specific

?>

<?php get_header(); ?>

<?php

    // get topic ID
    $service_ID = get_field( 'staff_directory_group_id' );

    // construct member detail query
    $service_api = 'https://webservicesdev.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberList?groupId=' . $service_ID;

    // construct member photo query
    $member_photo  = 'https://webservicesdev.cvmbs.colostate.edu/pmiservice/api/directory/GetPublicDirectoryMemberPhoto?memberId=';

    // debug output
    $service_members = json_decode( file_get_contents( $service_api ) );

    // setup empty storage arrays
    $faculty   = array();
    $residents = array();
    $staff     = array();

    // test for standard object or array
    if ( is_array( $service_members ) ) {

        // push members to corresponding arrays
        foreach ( $service_members as $member ) {

            // get employee group
            $memberCategory = $member->employeeCategory;

            if ( $memberCategory === 'Faculty' ) {

                array_push( $faculty, $member );

            } elseif ( $memberCategory === 'PostDoctoral' || $memberCategory === 'ResidentsInterns' ) {

                array_push( $residents, $member );

            } elseif ( $memberCategory === 'Staff' ) {

                array_push( $staff, $member );

            }

        }

    } else {

        // get employee group
        $memberCategory = $members->employeeCategory;

        if ( $memberCategory === 'Faculty' ) {

            array_push( $faculty, $members );

        } elseif ( $memberCategory === 'PostDoctoral' || $memberCategory === 'ResidentsInterns' ) {

            array_push( $residents, $members );

        } elseif ( $memberCategory === 'Staff' ) {

            array_push( $staff, $members );

        }

    }

    // count members
    $count = count( $members );

    // set global post object
    global $post;

    // get site path
    $siteinfo = get_blog_details();

    // parse URL for site path
    $siteurl = str_replace( '/', '', $siteinfo->path );

    // set member bio link URL
    $directoryURL = '//vetmedbiosci.colostate.edu';

?>

<!-- directory -->
<main id="site-layout" class="off-canvas-content <?php echo $site_type; ?>" data-off-canvas-content>

    <!-- directory -->
    <div id="directory" class="vth page-container">

        <!-- page header -->
        <header class="header">

            <h1>

                <span>

                    <?php echo get_the_title( $post->post_parent ); ?>

                </span>

                <?php echo the_title(); ?>

            </h1>

        </header>
        <!-- END page header -->

        <?php if ( $faculty ) : ?>

        <h2>Faculty</h2>

        <!-- contact cards -->
        <div class="contact_cards">

        <?php

            usort( $faculty, function( $a, $b ) {

                return $a->lastName <=> $b->lastName;

            });

            foreach ( $faculty as $faculty_member ) {

                // get returned data object(s)
                $memberContacts = $member->publicContactList;

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->phoneNumber;

                } else {

                    $phone = $memberContacts->phoneNumber;

                }

                // test for phone array
                if ( $phone ) {

                    $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

                } else {

                    $phoneHTML = '';

                }

                // setup ID for additional WSDL queries
                $memberID   = $faculty_member->memberId;
                // setup variables
                $LastName   = $faculty_member->lastName;
                $FirstName  = $faculty_member->preferredFirstName;
                // $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $faculty_member->emailAddress );

                $faculty_group .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(' . $member_photo . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $faculty_member->workingTitle .

                            '</span>

                            <a class="email_link" href="mailto:' . $eMail . '">' . $eMail . '</a>

                        </div>

                    </div>

                ';

            }

            echo $faculty_group;

        ?>

        </div>
        <!-- END contact cards -->

        <?php endif; ?>

        <?php if ( $residents ) : ?>

        <h2>Residents, Interns, and Post Docs</h2>

        <!-- contact cards -->
        <div class="contact_cards">

        <?php

            usort( $residents, function( $a, $b ) {

                return $a->lastName <=> $b->lastName;

            });

            foreach ( $residents as $resident ) {

                // get returned data object(s)
                $memberContacts = $member->publicContactList;

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->phoneNumber;

                } else {

                    $phone = $memberContacts->phoneNumber;

                }

                // test for phone array
                if ( $phone ) {

                    $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

                } else {

                    $phoneHTML = '';

                }

                // setup ID for additional WSDL queries
                $memberID   = $resident->memberId;
                // setup variables
                $LastName   = $resident->lastName;
                // $FirstName  = $resident->FirstName;
                $FirstName  = $resident->preferredFirstName;
                // $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $resident->emailAddress );

                $residents_group .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(' . $member_photo . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $resident->workingTitle .

                            '</span>'

                            . $phoneHTML .

                            '<a class="email_link" href="mailto:' . $eMail . '">' . $eMail . '</a>

                        </div>

                    </div>

                ';

            }

            // manual member addition
            if ( $service_ID == 556 ) {

                echo '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(' . $member_photo . '37350)">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=37350"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=37350">I Jung Chi</a>

                            <span class="contact_title">PhD Candidate</span>

                            <a class="email_link" href="mailto:i.chi@colostate.edu">i.chi@colostate.edu</a>

                        </div>

                    </div>

                ';

            }

            echo $residents_group;

            // manual member addition
            if ( $service_ID == 579 ) {

                echo '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(' . $member_photo . '39384)">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=39384"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=39384">Tricia Culbertson</a>

                            <span class="contact_title">Veterinary Resident</span>

                            <a class="email_link" href="mailto:tricia.culbertson@colostate.edu">tricia.culbertson@colostate.edu</a>

                        </div>

                    </div>

                ';

            }

        ?>

        </div>
        <!-- END contact cards -->

        <?php endif; ?>

        <?php if ( $staff ) : ?>

        <h2>Staff</h2>

        <!-- contact cards -->
        <div class="contact_cards">

        <?php

            usort( $staff, function( $a, $b ) {

                return $a->lastName <=> $b->lastName;

            });

            foreach ( $staff as $staff_member ) {

                // get returned data object(s)
                $memberContacts = $member->publicContactList;

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->phoneNumber;

                } else {

                    $phone = $memberContacts->phoneNumber;

                }

                // test for phone array
                if ( $phone ) {

                    $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

                } else {

                    $phoneHTML = '';

                }

                // setup ID for additional WSDL queries
                $memberID   = $staff_member->memberId;
                // setup variables
                $LastName   = $staff_member->lastName;
                $FirstName  = $staff_member->preferredFirstName;
                // $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $staff_member->emailAddress );

                $staff_group .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(' . $member_photo . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $staff_member->workingTitle .

                            '</span>'

                            . $phoneHTML .

                            '<a class="email_link" href="mailto:' . $eMail . '">' . $eMail . '</a>

                        </div>

                    </div>

                ';

            }

            echo $staff_group;

        ?>

        </div>
        <!-- END contact cards -->

        <?php endif; ?>

        <pre class="developer">

            <br />
            Service Directory Query : <?php echo $service_ID; ?>
            <br />
            <?php print_r( $service_members ); ?>

        </pre>

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
