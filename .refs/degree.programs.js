headline = $('#degree-programs-title');

var degrees = $('#explore-degrees');
var careers = $('#explore-careers');
var options = $('#degree-programs-form-button');

contentFX.loadtime = [

    {

        e : $( degrees ),

        p : {

            translateX : [ 0, '-10%' ],
            opacity    : [ 1, 0 ]

        },

        o : {

            begin         : function() {

                //

            },
            queue 		  : false,
            duration 	  : 960,
            delay 		  : 960,
            easing 		  : 'easeOutQuint',
            sequenceQueue : false,
            complete 	  : function() {

                //

            }

        }

    }, {

        e : $( careers ),

        p : {

            translateX : [ 0, '10%' ],
            opacity    : [ 1, 0 ]

        },

        o : {

            begin         : function() {

                //

            },
            queue 		  : false,
            duration 	  : 960,
            delay 		  : 0,
            easing 		  : 'easeOutQuint',
            sequenceQueue : false,
            complete 	  : function() {

                //

            }

        }

    }, {

        e : $( headline ),

        p : {

            translateY : [ 0, '-200%' ],
            opacity    : [ 1, 0 ]

        },

        o : {

            begin         : function() {

                //

            },
            queue 		  : false,
            duration 	  : 640,
            delay 		  : 0,
            easing 		  : 'easeOutQuint',
            sequenceQueue : false,
            complete 	  : function() {

                headline.addClass( 'loaded' );

            }

        }

    }, {

        e : $( options ),

        p : {

            translateY : [ 0, '100%' ],
            opacity    : [ 1, 0 ]

        },

        o : {

            begin         : function() {

                //

            },
            queue 		  : false,
            duration 	  : 480,
            delay 		  : 0,
            easing 		  : 'easeOutQuint',
            sequenceQueue : false,
            complete 	  : function() {

                //

            }

        }

    }

];

if ( targetID === 'academics' ) {

    // sequence
    $.Velocity.RunSequence( contentFX.loadtime );

} else {

    return;

}

contentFX.loadtime = [

    {

        e : $( degrees ),

        p : {

            translateX : [ 0, '-10%' ],
            opacity    : [ 1, 0 ]

        },

        o : {

            begin         : function() {

                //

            },
            queue 		  : false,
            duration 	  : 960,
            delay 		  : 960,
            easing 		  : 'easeOutQuint',
            sequenceQueue : false,
            complete 	  : function() {

                //

            }

        }

    }

];

// assign globaals
var targetID;
var viewport;

// academics global
academics = site.ui.sections.academics;

// contact form button
var contactFX = $('#degree-programs-form-button');
var contactUI = $('#degree-programs-form .select-list');

// sequence storage object
var runtimeFX = {

    expand   : {},
    collapse : {}

};

// degrees control object
var degreesFX = {

    expand   : $('#explore-degrees-button'),
    collapse : $('#collapse-degrees')

};
// degrees content object
var degreesUI = {

    element : $('#explore-degrees'),
    initial : $('#explore-degrees-intro'),
    content : $('#explore-degrees-content')

};

// careers control object
var careersFX = {

    expand   : $('#explore-careers-button'),
    collapse : $('#collapse-careers')

};
// careers content
var careersUI = {

    element : $('#explore-careers'),
    initial : $('#explore-careers-intro'),
    content : $('#explore-careers-content'),
    tag     : $('#careers-tag-list .tag'),
    cards   : $('#careers-degree-cards'),
    degree  : $('#careers-degree-cards .degree-card')

};

var tagID = $(this).attr( 'id' );

// event listener
careersUI.tag.on( 'click', function( e ) {

    $(this).toggleClass( 'selected' );

    if ( careersUI.tag.is( '.selected' ) ) {

        console.log( 'showtime' );

        careersUI.degree.velocity( 'transition.slideUpIn', {

            begin      : function() {

                //

            },
            visibility : 'visible',
            duration   : 360,
            delay 	   : 0,
            stagger    : 60,
            drag       : true,
            easing     : 'easeOutCirc',
            complete   :  function() {

                //

            }

        });

    }

});

// event handler
careersUI.degree.on( 'cards.load.degrees', function( e ) {

    console.log( e );

    console.log( 'ball so hard' );

});

// expand degrees listener
degreesFX.expand.on( 'click', function( e, viewport, headline ) {

    // viewport width
    viewport = $('body').width();

    // headline
    headline  = $('#degree-programs-title');

    // define sequence
    runtimeFX.expand.degrees = [

        {

            e : $( degreesUI.element ),

            p : {

                width    : [ viewport, '50%' ]

            },

            o : {

                begin         : function() {

                    // headline
                    headline.toggleClass( 'sequenced' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            e : $( careersUI.element ),

            p : {

                translateX : [ '100%', 0 ],
                opacity    : [ 0, 1 ]

            },

            o : {

                begin         : function() {

                    // toggle states
                    degreesUI.element.attr( 'data-active', 'true' );
                    careersUI.element.attr( 'data-active', 'false' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            e : $( degreesUI.initial ),

            p : {

                translateY : [ -96, 0 ]

            },

            o : {

                begin         : function() {

                    // toggle expand button
                    degreesFX.expand.toggleClass( 'active inactive' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : true,
                complete 	  : function() {

                    // toggle close button
                    degreesFX.collapse.toggleClass( 'active inactive' );

                }

            }

        }, {

            e : $( headline ),

            p : {

                translateY    : [ '-100%', 0 ],
                opacity       : [ 0, 1 ]

            },

            o : {

                begin         : function() {



                },
                queue 		  : false,
                duration 	  : 360,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            e : $( degreesUI.content ),

            p : {

                translateY : [ -96, 96 ],
                opacity    : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    //

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 120,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }

    ];

    // run sequence
    $.Velocity.RunSequence( runtimeFX.expand.degrees );

});

// collapse degrees listener
degreesFX.collapse.on( 'click', function( e, viewport, headline ) {

    // viewport width
    viewport = $('body').width();

    // headline
    headline  = $('#degree-programs-title');

    // define sequence
    runtimeFX.collapse.degrees = [

        {

            // degrees content
            e : $( degreesUI.content ),

            p : {

                translateY : [ '10%', '-10%' ],
                opacity    : [ 0, 1 ]

            },

            o : {

                begin         : function() {



                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // degrees panel
            e : $( degreesUI.element ),

            p : {

                width    : [ '50%', viewport ]

            },

            o : {

                begin         : function() {

                    // toggle close button
                    degreesFX.collapse.toggleClass( 'active inactive' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 240,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // careers panel
            e : $( careersUI.element ),

            p : {

                translateX : [ 0, '100%' ],
                opacity    : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    // toggle states
                    degreesUI.element.attr( 'data-active', 'null' );
                    careersUI.element.attr( 'data-active', 'null' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // intro content
            e : $( degreesUI.initial ),

            p : {

                translateY : [ 0, '-20%' ]
                // opacity    : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    // toggle expand button
                    degreesFX.expand.toggleClass( 'active inactive' );

                },
                queue 		  : false,
                duration 	  : 240,
                delay 		  : 360,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {



                }

            }

        }, {

            e : $( headline ),

            p : {

                translateY    : [ 0, '-200%' ],
                opacity       : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    // headline
                    headline.toggleClass( 'sequenced' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }

    ];

    // run sequence
    $.Velocity.RunSequence( runtimeFX.collapse.degrees );

});

// expand careers listener
careersFX.expand.on( 'click', function( e, headline, viewport ) {

    // viewport width
    viewport = $('body').width();

    // headline
    headline  = $('#degree-programs-title');

    // define sequence
    runtimeFX.expand.careers = [

        {

            e : $( careersUI.element ),

            p : {

                width    : [ viewport, '50%' ]

            },

            o : {

                begin         : function() {

                    // headline
                    headline.toggleClass( 'sequenced' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            e : $( degreesUI.element ),

            p : {

                translateX : [ '-100%', 0 ],
                opacity    : [ 0, 1 ]

            },

            o : {

                begin         : function() {

                    // toggle states
                    careersUI.element.attr( 'data-active', 'true' );
                    degreesUI.element.attr( 'data-active', 'false' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {



                }

            }

        }, {

            e : $( careersUI.initial ),

            p : {

                translateY : [ '-20%', 0 ]
                // opacity    : [ 0, 1 ]

            },

            o : {

                begin         : function() {

                    // toggle expand button
                    careersFX.expand.toggleClass( 'active inactive' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : true,
                complete 	  : function() {

                    // toggle close button
                    careersFX.collapse.toggleClass( 'active inactive' );

                }

            }

        }, {

            e : $( headline ),

            p : {

                translateY    : [ '-100%', 0 ],
                opacity       : [ 0, 1 ]

            },

            o : {

                begin         : function() {



                },
                queue 		  : false,
                duration 	  : 360,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            e : $( careersUI.content ),

            p : {

                translateY : [ '-10%', '10%' ],
                opacity    : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    //

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 120,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }

    ];

    // run sequence
    $.Velocity.RunSequence( runtimeFX.expand.careers );

});

// collapse careers listener
careersFX.collapse.on( 'click', function( e, viewport ) {

    // viewport width
    viewport = $('body').width();

    // define sequence
    runtimeFX.collapse.careers = [

        {

            // career tags
            e : $( careersUI.content ),

            p : {

                translateY : [ '10%', '-10%' ],
                opacity    : [ 0, 1 ]

            },

            o : {

                begin         : function() {

                    //

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // careers panel
            e : $( careersUI.element ),

            p : {

                width    : [ '50%', viewport ]

            },

            o : {

                begin         : function() {

                    // toggle close button
                    careersFX.collapse.toggleClass( 'active inactive' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 240,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // degrees panel
            e : $( degreesUI.element ),

            p : {

                translateX : [ 0, '-100%' ],
                opacity    : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    // toggle states
                    degreesUI.element.attr( 'data-active', 'null' );
                    careersUI.element.attr( 'data-active', 'null' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // intro content
            e : $( careersUI.initial ),

            p : {

                translateY : [ 0, '-20%' ]
                // opacity    : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    // toogle button visibility
                    careersFX.expand.toggleClass( 'active inactive' );

                },
                queue 		  : false,
                duration 	  : 240,
                delay 		  : 360,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }, {

            // headline
            e : $( headline ),

            p : {

                translateY    : [ 0, '-200%' ],
                opacity       : [ 1, 0 ]

            },

            o : {

                begin         : function() {

                    // headline
                    headline.toggleClass( 'sequenced' );

                },
                queue 		  : false,
                duration 	  : 480,
                delay 		  : 0,
                easing 		  : 'easeOutCirc',
                sequenceQueue : false,
                complete 	  : function() {

                    //

                }

            }

        }

    ];

    // run sequence
    $.Velocity.RunSequence( runtimeFX.collapse.careers );

});

// reveal contact form
contactFX.on( 'click', function( e ) {

    academics.toggleClass( 'hide-form reveal-form' );

    $('#degree-programs-form').toggleClass( 'visible' );

    contactUI.toggleClass( 'visible' );

});

// toggle select lists
contactUI.on( 'click', function( e ) {

    $(this).toggleClass( 'showtime' );

});
