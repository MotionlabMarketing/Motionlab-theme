jQuery(document).ready(function($) {

    /*========================
    Simple Parallax
    ==========================*/
    if ($('.rellax').length > 0) { 
        var rellax = new Rellax('.rellax', {
            speed: -2,
            center: false,
            round: true,
            vertical: true,
            horizontal: false
        });
    }


    /*========================
    Animate On Scroll
    ==========================*/
    AOS.init();

    /*========================
    Mobile Menu
    ==========================*/

    // Push mobile menu below header
    function mobileMenuSpacer(){
        var header = $('[data-role="header"]');
        var headerHeight = header.outerHeight();
        $('.menu').css('padding-top',headerHeight);
    }

    // Mobile menu
    $('.js-menu-trigger').click(function (e) {
        $('html').toggleClass('menu-open');
        if ($(this).find('i').hasClass('fa-navicon')) {
            $(this).find('i').removeClass('fa-navicon').addClass('fa-close');
        } else {
            $(this).find('i').removeClass('fa-close').addClass('fa-navicon');
        }
    });

    //Run'em
    mobileMenuSpacer();

    //Run 'em on resize'
    $(window).resize(function() {
        mobileMenuSpacer();
    });


    /*======================
    Double Tap To Go
    ======================*/

    $('nav li:has(ul)').doubleTapToGo();
    $('nav li:has(div)').doubleTapToGo();


    /*======================================================
    Headroom Height
    ========================================================*/
    // function headroomsize() {
    //     $('[js-headroom-height]').each(function(){
    //         if( $(this).is(':visible')) {
    //             var headroomHeight = $(this).height();
    //             $('[headroom-space]').css('padding-top',+ headroomHeight + 'px');
    //             $('[headroom-negative-space]').css('margin-bottom', '-' + headroomHeight + 'px');
    //         } else {
    //         }
    //     });
    // }
    // headroomsize();
    // $(window).resize(function(){
    //     headroomsize();
    // });
    //
    //
    // /*======================================================
    // Headroom Height for 100vh
    // ========================================================*/
    // function heightheadroomsize() {
    //
    //     $('.height-js-header').each(function(){
    //         //if( $(this).is(':visible')) {
    //             var headroomHeight = $('[js-headroom-height]').height();
    //             console.log(headroomHeight, 'here');
    //             $(this).css('height', + headroomHeight + 'px');
    //
    //         //} else {
    //         //}
    //     });
    // }
    // heightheadroomsize();
    // $(window).resize(function(){
    //     heightheadroomsize();
    // });



    /*======================================================
    Mega Menu
    ========================================================*/


    $('[data-toggle-section]').hoverIntent({
        sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)
        interval: 60,  // number = milliseconds of polling interval
        over: function () {
            var section = $(this).data('toggle-section');

            //console.log(section);

            $(this).closest('ul').find('li').removeClass('section-active');
            $(this).parent().addClass('section-active');

            $('[data-section]').hide();
            $('[data-section="' + section + '"]').show();
        },
        timeout: 0,
        out: function () {

        }
    });

    /*======================================================
    Mobile Trigger
    ========================================================*/
    // $('[data-role="mobile-trigger"]').click(function () {
    //   $('#page').toggleClass("revealed");
    //   $('[data-nav="mobile-nav"]').toggleClass("revealed");
    // });




    /*======================================================
    LAZYLOAD
    ========================================================*/
    // $('.js-lazy').Lazy();
    // $('.js-bgFromSrcSetLazy').Lazy();
    //
    // //Trigger a fake scroll so above-the-fold contents load. Awaiting answer to hotmail.
    // // http://jquery.eisbehr.de/lazy/#contact
    // $("html, body").animate({scrollTop: 1});
    // $("html, body").animate({scrollTop: 0});


    /*======================================================
    HEADER SPACE
    ========================================================*/

    function headerSpace(){
        var headerHeight = $('#masthead').outerHeight();
        $('.js-header-space').css('padding-top', + headerHeight + "px");
    }

    headerSpace();
    $(window).resize(function(){
        headerSpace();
    });



    function heightHeaderSpace(){
        var headerHeight = $('#masthead').outerHeight();
        $('.minus-js-header-height').css('min-height', 'calc(100vh - '+ headerHeight + "px)");
    }

    heightHeaderSpace();
    $(window).resize(function(){
        heightHeaderSpace();
    });



    // function negativeHeaderSpace(){
    //     var headerHeight = $('#masthead').outerHeight();
    //     var bodyHeight = $('body').outerHeight();
    //     $('.no-js-header-space').css('height', bodyHeight - headerHeight + "px");
    // }
    //
    // negativeHeaderSpace();
    // $(window).resize(function(){
    //     negativeHeaderSpace();
    // });


    /*======================================================
    MIN PAGE HEIGHT
    ========================================================*/
    // function pageHeight(){
    //   var headerHeight = $('#masthead').outerHeight();
    //   var footerHeight = $('#colophon').outerHeight();
    //   var windowHeight = $(window).outerHeight();
    //   //console.log(footerHeight)
    //   var mainHeight = windowHeight - headerHeight - footerHeight;
    //   $('#main').css('min-height', mainHeight + "px");
    // }
    //
    // pageHeight();
    // $(window).on('resize', function() {
    //   headerSpace();
    //   pageHeight();
    // });


    /*======================================================
    STICKY HEADER
    ========================================================*/

    // $(window).scroll(function(){
    //   if($(this).scrollTop() >= $('#masthead').height() + 100 ){
    //       $('[data-nav="sticky-nav"]').removeClass('translate-y-150');
    //   } else {
    //     $('[data-nav="sticky-nav"]').addClass('translate-y-150');
    //   }
    // });


    /*======================================================
    RESPONSIVE YOUTUBE
    ========================================================*/

    // $(".js-fitvids").fitVids();


    /*======================================================
    SLIDER
    ========================================================*/

    //Initialise the main slider
    $('[data-slick="banner"]').slick({
        lazyLoad: 'ondemand',
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3500,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
    });

    $('[data-slick="slider-auto-arrows"]').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
        adaptiveHeigh: true,
    });
    // additional code to make the content animate
    // https://github.com/marvinhuebner/slick-animation
    $('[data-slick="slider-auto-arrows"]').slickAnimation();

    $('[data-slick="slider-auto"]').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    $('[data-slick="slider-auto"]').slickAnimation();

    $('[data-slick="logo-slider"]').slick({
        slidesToShow: 3,
        variableWidth: true,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        draggable: false,
        pauseOnHover: false,
        mobileFirst: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.js-hero-slider-image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.js-hero-slider-copy'
    });

    $('.js-hero-slider-copy').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.js-hero-slider-image',
        dots: true,
        easing: 'easeInOutExpo'
    });

    $('.js-category-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: true
    });

    $('.js-product-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        easing: 'easeInOutExpo',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // {
            //    breakpoint: 480,
            //    settings: {
            //       slidesToShow: 1,
            //       slidesToScroll: 1
            //    }
            // }
        ]
    });

    $('.productSlider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productSliderNav',
        infinite: true,
    });
    $('.productSliderNav').slick({
        speed:800,
        slidesToShow:3,
        slidesToScroll:1,
        pauseOnHover:false,
        vertical:true,
        verticalSwiping:true,
        asNavFor: '.productSlider',
        focusOnSelect: true,
        easing: 'easeInOutExpo'
    });



    /*======================
    POPOVER
    ======================*/

    $('[data-toggle="popover"]').on('click', function(e) {
        e.preventDefault();
    });

    $('[data-toggle="popover"]').webuiPopover({
        trigger: 'hover',
        animation: 'pop'
    });



    /*======================================================
    COLLAPSE / ACCORDION
    ========================================================*/

    $('[data-toggle="collapse"]').on('click', function(e) {

        e.preventDefault();

        var current = $(this).attr('href');
        var parent = $(this).data('parent');

        var openIcon = $(this).data('icon-open');
        var closedIcon = $(this).data('icon-closed');

        if ($(e.target).is('.active')) {

            $(parent).find('[data-toggle="collapse"]').removeClass('active');
            $(parent).find('.collapse').slideUp(300).removeClass('open');

            if ($(this).attr('data-icon-open')) {
                // console.log('active with icon');

                $(parent).find('i').removeClass(openIcon).addClass(closedIcon);

            }

        } else {

            $(parent).find('[data-toggle="collapse"]').removeClass('active');
            $(parent).find('.collapse').slideUp(300).removeClass('open');

            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $(parent).find(current).slideDown(300).addClass('open');

            if ($(this).attr('data-icon-open')) {
                // console.log('non-active with icon');

                $(parent).find('i').removeClass(openIcon).addClass(closedIcon);
                $(this).find('i').removeClass(closedIcon).addClass(openIcon);

            }

        }

    });

    function resizeCollapse(){
        $('[data-toggle="collapse"]').each(function(){
            if ($(this).is(':hidden')){
                $(this).removeClass('active');
                $(this).next().removeAttr('style').removeClass('open');
            }
        });
    }


    $(window).on('resize', function() {
        resizeCollapse();
    });



    /*======================================================
    MATCHHEIGHT
    ========================================================*/

    $('.js-match-height').matchHeight();

    $.fn.matchHeight._afterUpdate = function(resize) {
        $.fn.matchHeight._apply('.js-match-height');
    }


    $('.js-match-height-alt').matchHeight();

    $.fn.matchHeight._afterUpdate = function(resize) {
        $.fn.matchHeight._apply('.js-match-height-alt');
        console.log('done');
    }


    /*========================
    SMOOTH SCROLL
    ==========================*/

    $('a[href*=\\#]:not([href=\\#]):not([data-toggle])').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            var headerHeight = $('#masthead').outerHeight();
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - headerHeight
                }, 750);
                return false;
            }
        }
    });


    /*======================================================
    LIGHTBOX VIDEO & GALLERY
    ========================================================*/
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.gallery').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery:{
            enabled:true
        }
        // other options
    });


    $('.magnificForm').magnificPopup({
        type: 'inline',
        midClick: true
    });




    /*======================================================
    TABS
    ========================================================*/

    $('[data-section]').on('click', function(e) {
        e.preventDefault();
        var $wrapper = $(this).parents('[data-tabs="wrapper"]');
        var target = $(this).attr('data-section');

        $(this).siblings().removeClass('tab-active');
        $(this).addClass('tab-active');

        $wrapper.find('[data-tabs="content"]').children('section').addClass('hide');
        $wrapper.find('[data-tabs="content"]').find('section[id=' + target + ']').removeClass('hide');
    });


    /*======================================================
    HOTSPOT : HOVER
    ========================================================*/

    $('[data-spot]').each(function(){
        var $wrapper = $(this).parents('[data-hotspot="wrapper"]');
        var target = $(this).attr('data-spot');
        $(this).mouseover(function() {
            $wrapper.find('[data-hotspot="content"]').find('div[id=' + target + ']').addClass('hotspot-active');
        }).mouseout(function() {
            $wrapper.find('[data-hotspot="content"]').children('div').removeClass('hotspot-active');
        });
    });



    /*======================================================
    PRELOADER
    ========================================================*/
    var timer = function(){
        $('[data-content]').fadeTo(600, 1);
        $('[data-loader]').delay(200).fadeOut(600);
    };
    timer();



    /*======================================================
    ROTATING SEARCH PLACEHOLDER
    ========================================================*/

    var vals = $('.js-search').data('placeholder').split(',');
    var keyframes = [vals[0]];

    // generate keyframes
    var count = 0;
    while (count < vals.length) {
        last_frame = keyframes[keyframes.length - 1];
        if (vals[(count + 1) % vals.length] == last_frame) { // if the keyframe is the current string
            count++;
        } else if (vals[(count + 1) % vals.length].lastIndexOf(last_frame, 0) === 0) { // if the current keyframe is part of the desired goal
            keyframes.push(last_frame + vals[(count + 1) % vals.length][last_frame.length]);
        } else { // delete from keyframe
            keyframes.push(last_frame.substring(0, last_frame.length - 1));
        }
    }

    var input = document.getElementById('js-search-id');

    function ph_add(i) {
        setTimeout(function() {
            input.setAttribute('placeholder', keyframes[i]);
            if (keyframes[(i + 1) % keyframes.length].length > keyframes[i].length) {
                ph_add((i + 1) % keyframes.length);
            } else {
                setTimeout(function() {
                    ph_del((i + 1) % keyframes.length);
                }, 2500)
            }
        }, 110 * Math.random());
    }

    function ph_del(i) {
        setTimeout(function() {
            input.setAttribute('placeholder', keyframes[i]);
            if (keyframes[(i + 1) % keyframes.length].length > keyframes[i].length) {
                ph_add((i + 1) % keyframes.length);
            } else {
                ph_del((i + 1) % keyframes.length);
            }
        }, 65);
    }

    ph_add(0);



    /*======================================================
    HIDE / SHOW
    ========================================================*/


    $('.js-hide-show').each(function(){

        $(this).click(function(){

            var show = $(this).attr('data-show');
            data_icon_show = $(this).data('icon-show');
            data_icon_hide = $(this).data('icon-hide');
            iconToggle = ($(this).find('i').html() === data_icon_show) ? data_icon_hide:data_icon_show;

            $("#"+show).toggle();
            $(this).find('i').text(iconToggle);

            $('[toggle-relative-search]').toggleClass('relative');

            if($(this).data('blur') == true){
                $("#"+show).find('input')[0].focus();
            }

            return false;

        });

    });



    /*======================================================
    UNSTICK FIXED POSITION ELEMENT (used on case study page)
    ========================================================*/

    $('.product-tile button').click(function(){
        alert('hi')
    });

    function stickyDiv() {
        if ( $('[data-stick]').length ) {
            var div = $('[data-stick]');
            var winHeight = $(window).height();
            var ftrOffsetTop = $('[data-unstick-trigger]').offset().top;
            var scrollTop = $(window).scrollTop();
            if ((winHeight + scrollTop) >= ftrOffsetTop) {
                div.is(".fixed") && div.removeClass("fixed");
            } else {
                div.is(":not(.fixed)") && div.addClass("fixed");
            }
        }
    }

    $(document).scroll(function () {
        stickyDiv();
    });

    $(window).on('resize', function() {
        stickyDiv();
    });

}); // ENDS DOC READY AT TOP



/*======================================================
GOOGLE MAP
========================================================*/
//https://snazzymaps.com/style/60/blue-gray
var styles=[{featureType:"water",stylers:[{visibility:"on"},{color:"#b5cbe4"}]},{featureType:"landscape",stylers:[{color:"#efefef"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"#83a5b0"}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#bdcdd3"}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#ffffff"}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#e3eed3"}]},{featureType:"administrative",stylers:[{visibility:"on"},{lightness:33}]},{featureType:"road"},{featureType:"poi.park",elementType:"labels",stylers:[{visibility:"on"},{lightness:20}]},{},{featureType:"road",stylers:[{lightness:20}]}];
var map;
var markers = [];
var infowindow = [];
var mapOptions = {
    zoom: 6,
    styles: styles,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

function initialize() {

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var bound = new google.maps.LatLngBounds();

    for (var i=0; i<markerData.length; i++) {
        markers.push(
            new google.maps.Marker({
                position: new google.maps.LatLng(markerData[i].lat, markerData[i].lng),
                title: markerData[i].title,
                map: map,
                id: i,
                icon: normalIcon()
            })
        );
        bound.extend(markers[i].getPosition());

        infowindow[i] = new google.maps.InfoWindow({
            content: markerData[i].title
        });

        google.maps.event.addListener(markers[i], 'click', function () {
            id = this.id
            infowindow[id].open(map, markers[id]);
        })
    }

    map.fitBounds(bound, 50);

    // center google map on window resize
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
}
// functions that return icons.  Make or find your own markers.
function normalIcon() {
    return {
        url: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|1d202a'
    };
}
function highlightedIcon() {
    return {
        url: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|cc3737'
    };
}
//google.maps.event.addDomListener(window, 'load', initialize);

jQuery(document).ready(function($) {
    setTimeout(function () {
        $('[data-content]').fadeTo(600, 1);
        $('[data-loader]').delay(200).fadeOut(600);
    }, 2000);
    2000;
});
