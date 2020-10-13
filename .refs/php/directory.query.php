<?php

    foreach ( $members as $member ) {

        // setup ID for additional WSDL queries
        $memberID = $member->Id;

        // get contact info
        $contacts = $service->GetMemberContactsByMemberId( array( 'id' => $memberID ) );

        // get returned data object(s)
        $memberContacts = $contacts->GetMemberContactsByMemberIdResult->MemberContactResponse;

        // test for contact info data type
        if ( is_array( $memberContacts ) ) {

            $phone = $memberContacts[0]->PhoneNumber;

        } else {

            $phone = $memberContacts->PhoneNumber;

        }

        // setup variables
        $LastName   = $member->LastName;
        $FirstName  = $member->FirstName;
        $tableName  = $LastName . ', ' . $FirstName;
        $eMail      = strtolower( $member->EmailAddress );

        // test for phone array
        if ( $phone ) {

            $phoneHTML = '<span class="contact_phone">Phone: ' . $phone . '</span>';

        } else {

            $phoneHTML = '';

        }

        $records .= '

            <div class="contact">

                <div class="contact_photo" style="background-image:url(https://www.cvmbs.colostate.edu/DirectorySearch/Search/MemberPhoto/' . $memberID . ')">

                    <a class="contact_photo_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '"></a>

                </div>

                <div class="contact_info">

                    <a class="contact_link" href="' . $directoryURL . '/directory/member/?id=' . $memberID . '">' . $FirstName . ' ' . $LastName . '</a>

                    <span class="contact_title">'

                        . $member->EmployeeTitle .

                    '</span>'

                    . $phoneHTML .

                    '<a class="email_link" href="mailto:' . $eMail . '">' . $eMail . '</a>

                </div>

            </div>';

    }

    echo $records;

?>
