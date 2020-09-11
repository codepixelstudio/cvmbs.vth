<?php

    // footer contact info group
    $footer_contact_info = get_field( 'footer_contact_info', 'options' );

    // social media links
    $facebook   = $footer_contact_info[ 'facebook_link' ];
    $twitter    = $footer_contact_info[ 'twitter_link' ];
    $instagram  = $footer_contact_info[ 'instagram_link' ];
    $youtube    = $footer_contact_info[ 'youtube_link' ];
    $linkedin   = $footer_contact_info[ 'linkedin_link' ];

?>

<!-- button -->
<a href="<?php echo $facebook; ?>" title="Facebook" class="social-media button facebook">

    <!-- label -->
    <span class="link-label">

        facebook

    </span>
    <!-- END label -->

    <svg x="0px" y="0px" viewBox="-786 630 32 32" enable-background="new -786 630 32 32" xml:space="preserve">

    	<path fill="#FFFFFF" d="M-768,662v-16h5.1l0.9-5h-6v-2.9c0-1.6,0.8-2.6,3.1-2.6h2.9v-5.3c-0.5-0.1-2.2-0.2-4.2-0.2 c-4.2,0-7.8,2.7-7.8,7.5v3.5h-4v5h4v16H-768z"/>

    </svg>

</a>
<!-- END button -->

<!-- button -->
<a href="<?php echo $twitter; ?>" title="Twitter" class="social-media button twitter">

    <!-- label -->
    <span class="link-label">

        twitter

    </span>
    <!-- END label -->

    <svg x="0px" y="0px" viewBox="-786 630 32 32" enable-background="new -786 630 32 32" xml:space="preserve">

    	<path fill="#FFFFFF" d="M-754.9,634.5c-1.3,0.8-2.7,1.3-4.2,1.6c-1.2-1.3-2.9-2.1-4.8-2.1c-3.6,0-6.6,3-6.6,6.7c0,0.5,0.1,1,0.2,1.5 c-5.5-0.3-10.3-3-13.5-7c-0.6,1-2.5,5.5,2,9c-1.5,0-3-0.8-3-0.8s-0.2,5.4,5.3,6.7c-1.5,0.4-3,0.1-3,0.1s1.2,4.5,6.1,4.7 c-4.1,3.4-9.2,2.8-9.7,2.8c2.9,1.9,6.4,3,10.1,3c12.1,0,18.7-10.3,18.7-19.2c0-0.3,0-0.6,0-0.9c1.3-0.9,2.4-2.1,3.3-3.5 c-1.2,0.5-2.4,0.9-3.8,1.1C-756.4,637.4-755.4,636.1-754.9,634.5z"/>

    </svg>

</a>
<!-- END button -->

<!-- button -->
<a href="<?php echo $instagram; ?>" title="Instagram" class="social-media button instagram">

    <!-- label -->
    <span class="link-label">

        instagram

    </span>
    <!-- END label -->

    <svg x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve">

    	<path class="path" fill="#FFFFFF" d="M24,3c2.8,0,5,2.2,5,5v16c0,2.8-2.2,5-5,5H8c-2.8,0-5-2.2-5-5V8c0-2.8,2.2-5,5-5H24 M24,0H8C3.6,0,0,3.6,0,8 v16c0,4.4,3.6,8,8,8h16c4.4,0,8-3.6,8-8V8C32,3.6,28.4,0,24,0L24,0z"/>

    	<path class="path" fill="#FFFFFF" d="M16,11c2.8,0,5,2.2,5,5s-2.2,5-5,5s-5-2.2-5-5S13.2,11,16,11 M16,8c-4.4,0-8,3.6-8,8s3.6,8,8,8s8-3.6,8-8 S20.4,8,16,8L16,8z"/>

    	<circle class="path" fill="#FFFFFF" cx="24.5" cy="7.5" r="2"/>

    </svg>

</a>
<!-- END button -->
