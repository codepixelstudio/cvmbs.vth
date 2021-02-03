<?php

    // template name: Service Directory
    // notes : VTH specific

?>

<?php get_header(); ?>

<?php

    // hit database for ID and pass through
    function get_staff_directory_group_ID ( $topic_ID ) {

        // get topicID
        $group_ID = get_field( 'staff_directory_group_id' );

        return $group_ID;

    }

    // random
    $group_ID = get_field( 'staff_directory_group_id' );

    // set WSDL service URL
    $serviceURL = 'http://www.cvmbs.colostate.edu/directoryservice/DirectoryService.svc?wsdl';

    // instantiate DirectoryService
    $service = new SoapClient( $serviceURL );

    // output list of functions
    $response = $service->__getFunctions();

    // output magic
    $directory = $service->GetMembersByGroupId(

        array( 'id' => get_staff_directory_group_ID( $group_ID ) )

    );

    // get returned data object
    $members = $directory->GetMembersByGroupIdResult->MemberResponse;

    // setup empty storage arrays
    $faculty   = array();
    $residents = array();
    $staff     = array();

    // test for standard object or array
    if ( is_array( $members ) ) {

        // push members to corresponding arrays
        foreach ( $members as $member ) {

            // get employee group
            $memberCategory = $member->EmployeeCategory;

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
        $memberCategory = $members->EmployeeCategory;

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

                return $a->LastName <=> $b->LastName;

            });

            foreach ( $faculty as $faculty_member ) {

                // get contact info
                $contacts = $service->GetMemberContactsByMemberId( array( 'id' => $faculty_member->Id ) );

                // get returned data object(s)
                $memberContacts = $contacts->GetMemberContactsByMemberIdResult->MemberContactResponse;

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->PhoneNumber;

                } else {

                    $phone = $memberContacts->PhoneNumber;

                }

                // test for phone array
                if ( $phone ) {

                    $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

                } else {

                    $phoneHTML = '';

                }

                // setup ID for additional WSDL queries
                $memberID   = $faculty_member->Id;
                // setup variables
                $LastName   = $faculty_member->LastName;
                $FirstName  = $faculty_member->OtherName;
                // $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $faculty_member->EmailAddress );

                $faculty_group .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/' . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $faculty_member->EmployeeTitle .

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

                return $a->LastName <=> $b->LastName;

            });

            foreach ( $residents as $resident ) {

                // get contact info
                $contacts = $service->GetMemberContactsByMemberId( array( 'id' => $resident->Id ) );

                // get returned data object(s)
                $memberContacts = $contacts->GetMemberContactsByMemberIdResult->MemberContactResponse;

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->PhoneNumber;

                } else {

                    $phone = $memberContacts->PhoneNumber;

                }

                // test for phone array
                if ( $phone ) {

                    $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

                } else {

                    $phoneHTML = '';

                }

                // setup ID for additional WSDL queries
                $memberID   = $resident->Id;
                // setup variables
                $LastName   = $resident->LastName;
                // $FirstName  = $resident->FirstName;
                $FirstName  = $resident->OtherName;
                // $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $resident->EmailAddress );

                $residents_group .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/' . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $resident->EmployeeTitle .

                            '</span>'

                            . $phoneHTML .

                            '<a class="email_link" href="mailto:' . $eMail . '">' . $eMail . '</a>

                        </div>

                    </div>

                ';

            }

            // manual member addition
            if ( $group_ID == 556 ) {

                echo '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/37350)">

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
            if ( $group_ID == 579 ) {

                echo '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/39384)">

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

                return $a->LastName <=> $b->LastName;

            });

            foreach ( $staff as $staff_member ) {

                // get contact info
                $contacts = $service->GetMemberContactsByMemberId( array( 'id' => $staff_member->Id ) );

                // get returned data object(s)
                $memberContacts = $contacts->GetMemberContactsByMemberIdResult->MemberContactResponse;

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->PhoneNumber;

                } else {

                    $phone = $memberContacts->PhoneNumber;

                }

                // test for phone array
                if ( $phone ) {

                    $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

                } else {

                    $phoneHTML = '';

                }

                // setup ID for additional WSDL queries
                $memberID   = $staff_member->Id;
                // setup variables
                $LastName   = $staff_member->LastName;
                $FirstName  = $staff_member->OtherName;
                // $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $staff_member->EmailAddress );

                $staff_group .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/' . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $staff_member->EmployeeTitle .

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

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
