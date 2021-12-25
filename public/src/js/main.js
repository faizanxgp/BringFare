jQuery(document).ready(function(){

    $('#category').selectize({
        create: false,
        sortField: 'text'
    });

    $('#country').selectize({
        create: true,
        sortField: 'text'
    });
    $('#dcountry').selectize({
        create: false,
        sortField: 'text'
    });

    $( function() {
        $( "#datepicker1" ).datepicker( {
            dateFormat: "yy-mm-dd"
        } );
        $( "#datepicker2" ).datepicker( {
            dateFormat: "yy-mm-dd"
        });

        $( ".datepickerfield" ).datepicker( {
            dateFormat: "yy-mm-dd"
        });


        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 10000,
            values: [ 0, 1000 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                $("#price1").val(ui.values[0]);
                $("#price2").val(ui.values[1]);
            }
        });
        //$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

    } );







    jQuery('.slider').owlCarousel({
        loop:true,
        margin:10,

        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        },
        items:4,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        nav:true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ]
    });

    jQuery('.slider2').owlCarousel({
        loop:true,
        margin:10,

        responsive:{
            0:{
                items:1
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        },
        items:6,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav:true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ]
    });


    jQuery('#product-slider').owlCarousel({
        loop:true,
        margin:10,

        responsive:{
            0:{
                items:1
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        },
        items:6,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav:true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ]
    });

    jQuery('.reviews').owlCarousel({
        loop:true,
        margin:10,

        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        },
        items:1,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav:false,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ]
    });
});