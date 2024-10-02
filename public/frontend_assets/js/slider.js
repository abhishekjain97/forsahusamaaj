$(document).ready(function() {
    "use strict";

    $('#slider').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        smartSpeed: 450,
        autoPlay: true
    });
    $('#sliders').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        smartSpeed: 450,
        autoPlay: true
    });

    $("#slider1").owlCarousel({
        navigation: false, // Set True show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        transitionStyle: "fade",
        autoPlay: 4000,
        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });

    $("#slider1").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        transitionStyle: "fade",
        autoPlay: 4000,
        autoplayHoverPause: true,
        pagination: false,
    });

    $("#slider2").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        transitionStyle: "fade",
        autoPlay: 4000,
        autoplayHoverPause: true,
        pagination: false,
    });
    $('#slider3').owlCarousel({
        navigation: true, // Set True show next and prev buttons
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450,
        autoPlay: true,
        pagination: false,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    $('#sliderKeyPerson').owlCarousel({
        //navigation : true, // Set True show next and prev buttons
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450,
        autoPlay: true,
        pagination: false,
        //navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    $('#sliderDonation').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items: 1,
        margin: 30,
        stagePadding: 30,
        slideSpeed: 500,
        paginationSpeed: 500,
        autoPlay: 2000,
        pagination: false
    });

    $("#slider6_").owlCarousel({
        navigation: true, // Set True show next and prev buttons
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        transitionStyle: "fade",
        autoPlay: 4000,
        pagination: false,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    $("#slider4").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        transitionStyle: "fade",
        autoPlay: 4000,
        autoplayHoverPause: true,
        pagination: false,


    });

    $("#slider-single").owlCarousel({
        navigation: false, // Set True show next and prev buttons
        singleItem: true,
        loop: false
    });
    $('#promotion-header').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        nav: true,
        dots: false
    });
    $("#promotions1").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        nav: true,
        dots: false
    });

    $('#promotionSecond').owlCarousel({
        margin: 20,
        loop: true,
        nav: true,
        dots: true,
        autoPlay: true,
        autoplayTimeout: 3000,
        responsive: {
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 4
            }
        }
    });
});