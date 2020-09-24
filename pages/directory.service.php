<?php

    // template name: Service Directory

?>

<?php get_header(); ?>

<?php

    // hit database for ID and pass through
    function get_research_topic_ID ( $topic_ID ) {

        // get topicID
        $topic_ID = get_field( 'research_topic_id' );

        return $topic_ID;

    }

    // set WSDL service URL
    $serviceURL = 'http://www.cvmbs.colostate.edu/directoryservice/DirectoryService.svc?wsdl';

    // instantiate DirectoryService
    $service = new SoapClient( $serviceURL );

    // output list of functions
    $response = $service->__getFunctions();

    // output magic
    $directory = $service->GetMembersByGroupId(

        array( 'id' => get_research_topic_ID( $topic_ID ) )

    );

    // get returned data object
    $members = $directory->GetMembersByGroupIdResult->MemberResponse;

    // set global post object
    global $post;

    // get site path
    $siteinfo = get_blog_details();

    // parse URL for site path
    $siteurl = str_replace( '/', '', $siteinfo->path );

    // set member bio link URL
    if ( $siteurl === 'dvm' ) {

        $directoryURL = '//vetmedbiosci.colostate.edu';

    } else {

        // $directoryURL = esc_url( home_url() );
        $directoryURL = '//vetmedbiosci.colostate.edu';

    }

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

        <!-- contact cards -->
        <div class="contact_cards">

        <?php

            foreach ( $members as $member ) {

                // setup ID for additional WSDL queries
                $memberID = $member->Id;

                // get department groups
                $groups = $service->GetGroupsByMemberId( array( 'memberId' => $memberID ) );

                // get contact info
                $contacts = $service->GetMemberContactsByMemberId( array( 'id' => $memberID ) );

                // get returned data object(s)
                $memberGroups   = $groups->GetGroupsByMemberIdResult->GroupResponse;
                $memberContacts = $contacts->GetMemberContactsByMemberIdResult->MemberContactResponse;

                // test for department group data type
                if ( is_array( $memberGroups ) ) {

                    $multipleGroups = true;

                    foreach ( $memberGroups as $memberGroup ) {

                        $departmentID = $memberGroup->IsPrimaryGroup;

                        if ( $departmentID ) {

                            $department     = $memberGroup->GroupFriendlyName;
                            $primaryGroupId = $memberGroup->Id;

                        }

                    }

                } else {

                    $multipleGroups = false;

                    $department     = $memberGroups->GroupFriendlyName;
                    $primaryGroupId = $memberGroups->Id;

                }

                // test for contact info data type
                if ( is_array( $memberContacts ) ) {

                    $phone = $memberContacts[0]->PhoneNumber;

                } else {

                    $phone = $memberContacts->PhoneNumber;

                }

                // setup variables
                // $staffID    = $member->Id;
                $LastName   = $member->LastName;
                $FirstName  = $member->FirstName;
                $tableName  = $LastName . ', ' . $FirstName;
                $eMail      = strtolower( $member->EmailAddress );
                // $phone      = $phone;
                $department = $directoryGroupName;

                $records .= '

                    <div class="contact">

                        <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/' . $memberID . ')">

                            <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                        </div>

                        <div class="contact_info">

                            <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                            <span class="contact_title">'

                                . $member->EmployeeTitle .

                            '</span>

                            <span class="contact_phone">

                                Phone: ' . $phone . '

                            </span>

                            <a class="email_link" href="mailto:' . $eMail . '">' . $eMail . '</a>

                        </div>

                    </div>';

            }

            echo $records;

        ?>

        </div>
        <!-- END contact cards -->

        <pre class="developer">

            <?php print_r( $members ); ?>

        </pre>

    </div>
    <!-- END directory -->

    <?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- END directory -->

<?php get_footer(); ?>
