
// ========================================================================================================
// START :: require + modules + dependencies
// ========================================================================================================

    // import modules
    import $ from 'jquery';

    // slick.js
    require( 'slick-carousel' );
    import slick from 'slick-carousel';

    // initialize foundation
    // $(document).foundation();

// ========================================================================================================
// END :: require + modules + dependencies
// ========================================================================================================



// ========================================================================================================
// START :: config.objects
// ========================================================================================================

    // homepage slideshow
    const slideshow = $( '#custom_billboard.slideshow .slideshow_slides' );

// ========================================================================================================
// END :: config.objects
// ========================================================================================================



// ========================================================================================================
// START :: initialize
// ========================================================================================================

    // you know what it is bruh
    $(document).ready( function() {

        // slick that
        slideshow.slick({

            // slide     : '.slideshow_slide',

            arrows    : true,
            dots      : true,
            dotsClass : 'slideshow_dots',

            prevArrow : '<button id="prev-arrow-control" class="slideshow_control arrow_prev" title="previous slide"><span class="button-label">previous slide</span><svg class="prev-arrow-icon arrow-icon" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><polygon fill="#FFFFFF" points="26.8,30.4 20.3,24 26.8,17.6 27.7,18.4 22.1,24 27.7,29.6" /></svg></button>',
            nextArrow : '<button id="next-arrow-control" class="slideshow_control arrow_next" title="next slide"><span class="button-label">next slide</span><svg class="next-arrow-icon arrow-icon" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><polygon fill="#FFFFFF" points="22.2,30.4 21.3,29.6 26.9,24 21.3,18.4 22.2,17.6 28.7,24" /></svg></button>',

            autoplay       : false,
            // autoplaySpeed  : 10000,
            fade           : true,

            initialSlide   : 0,
            infinite       : true,
            slidesToShow   : 1,
            slidesToScroll : 1,
            adaptiveHeight : true,

            speed     : 720,
            cssEase   : 'cubic-bezier(0.23, 1, 0.32, 1)',

            accessibility  : true,
            waitForAnimate : true

        });

    });

// ========================================================================================================
// END :: initialize
// ========================================================================================================
