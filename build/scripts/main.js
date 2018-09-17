/**
 * TODO: Review all of these functions and remove any that are not used. We are loading a large number of plugins which may not be used.
 */

jQuery(document).ready(function ($) {


    // TODO: Make this work by checking the tallest item.
    var tabheight = $('.dot-target').actual('height');
    $('.dot-target').height(tabheight);

    function jsMatchHeightTrigger() {
        $.fn.matchHeight._update();
    }

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

    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {

            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                var spacing = 40; 
                if ($('.js-sticky-nav').outerHeight() > 0) { spacing = 20; }
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                var scrollTo = target.position().top - $("#masthead").outerHeight() - $('.js-sticky-nav').outerHeight() - spacing;
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: scrollTo
                    }, 1000);
                    return false;
                }
            }
        
        });
    });

    /*========================
    Animate On Scroll
    ==========================*/
    // AOS.init();

    /*========================
    Mobile Menu
    ==========================*/

    // Push mobile menu below header
    function mobileMenuSpacer() {
        var header = $('[data-role="header"]');
        var headerHeight = header.outerHeight();
        $('.menu').css('padding-top', headerHeight);
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
    $(window).resize(function () {
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
    Mega Menu - Updated 13 Apr 2018
    ========================================================*/

    $('[data-toggle-section]').hoverIntent({
        over: function () {
            var parent = $(this).closest('[data-tabs="wrapper"]');
            var section = $(this).data('toggle-section');
            $('[data-element="mega-dropdown"] .section-active').removeClass('section-active');

            $(this).parent().addClass('section-active');
            $(parent).find('[data-section]').hide();
            $(parent).find('[data-section="' + section + '"]').show();
        },
        timeout: 0,
        out: function () {

        }
    });

    /*======================================================
    HEADER SPACE
    ========================================================*/

    function headerSpace() {
        var headerHeight = $('header').outerHeight();
        $('.js-header-space').css('padding-top', +headerHeight + "px");
        $('.js-negative-offset-header-space').css('margin-top', "-" + headerHeight + "px");
    }

    headerSpace();
    $(window).resize(function () {
        headerSpace();
    });


    function heightHeaderSpace() {

        var headerHeight = $('header').outerHeight();
        $('.minus-js-header-height').css('min-height', 'calc(100vh - ' + headerHeight + "px)");
    }

    heightHeaderSpace();
    $(window).resize(function () {
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

    // LOGO SLIDER SETTINGS.
    $('[data-slick="logo-slider"]').slick({
        slidesToShow: 5,
        variableWidth: false,
        autoplay: true,
        autoplaySpeed: 3000,
        centerPadding: '30px',
        arrows: false,
        draggable: false,
        pauseOnHover: false,
        mobileFirst: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
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
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                centerMode: true,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('[data-slick="gallery-slider-main"]').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '[data-slick="gallery-slider-thumb"]'
    });
    $('[data-slick="gallery-slider-thumb"]').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '[data-slick="gallery-slider-main"]',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

    $('[data-slick="logo-slider-partners"]').slick({
        slidesToShow: 5,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 3,
                    arrows: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    arrows: true
                }
            },
            {
                breakpoint: 480,
                centerMode: true,
                settings: {
                    slidesToShow: 2,
                    arrows: true
                }
            }
        ]
    });


    $('[data-slick="product-images"]').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
        cssEase: 'linear',
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 5000,
        asNavFor: '.product-images-preview',
        focusOnSelect: true,
    });

    $('[data-slick="product-preview"]').slick({
        slidesToShow: 4,
        variableWidth: false,
        autoplay: true,
        autoplaySpeed: 5000,
        centerPadding: '30px',
        arrows: true,
        draggable: false,
        pauseOnHover: false,
        mobileFirst: false,
        asNavFor: '.product-images-slider',
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
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
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    // GALLERY SLIDER SETTINGS.
    $('[data-slick="galleryThin-slider"]').slick({
        slidesToShow: 4,
        variableWidth: false,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        centerPadding: '30px',
        draggable: false,
        pauseOnHover: false,
        mobileFirst: false,
        prevArrow: '<button type="button" class="slick-prev fa fa-chevron-right"></button>',
        nextArrow: '<button type="button" class="slick-next fa fa-chevron-next"></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
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
                    slidesToShow: 2
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

    $('[data-slick="galleryGridPanels-slider"]').slick({
        slidesToShow: 1,
        variableWidth: false,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows: true,
        draggable: false,
        pauseOnHover: false,
        mobileFirst: false
    });

    $('[data-slick="storeSlidingPanels-slider"]').slick({
        slidesToShow: 5,
        variableWidth: false,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows: true,
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

    if ($('[data-slick="storeSlidingPanels-slider"]').length) {
        productsZoom();
    }
    $('[data-slick="storeSlidingPanels-slider"]').on('beforeChange', function () {
        productsZoom();
    });

    function productsZoom() {
        var number;

        if ($(window).width() > 1200) {
            number = 3;
        } else if ($(window).width() > 600) {
            number = 2;
        }

        $(".panels").each(function () {
            $(this).removeClass('animate');
            // $(this).css("transform", "scale(0.8)");
            // $(this).animate({transform: "scale(0.8)"}, 5000, 'linear');
        });

        setTimeout(function () {
            $(".panels.slick-active:eq(2)").each(function () {
                // $(this).css("transform", "scale(1)");
                $(this).addClass('animate');
                // $(this).animate({transform: "scale(1)"}, 500, 'linear');
            });
        }, 100);
    }

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
        speed: 800,
        slidesToShow: 3,
        slidesToScroll: 1,
        pauseOnHover: false,
        vertical: true,
        verticalSwiping: true,
        asNavFor: '.productSlider',
        focusOnSelect: true,
        easing: 'easeInOutExpo'
    });


    /*======================
    POPOVER
    ======================*/

    $('[data-toggle="popover"]').on('click', function (e) {
        e.preventDefault();
    });

    $('[data-toggle="popover"]').webuiPopover({
        trigger: 'hover',
        animation: 'pop',
        placement: 'top',
        width: 360,
    });

    /*======================================================
    COLLAPSE / ACCORDION
    ========================================================*/

    $('[data-toggle="collapse"]').on('click', function (e) {

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
            $(this).toggleClass('active');
            // Open up the hidden content panel
            $(parent).find(current).slideToggle(300).addClass('open');

            if ($(this).attr('data-icon-open')) {
                // console.log('non-active with icon');

                $(parent).find('i').removeClass(openIcon).addClass(closedIcon);
                $(this).find('i').removeClass(closedIcon).addClass(openIcon);

            }

        }

    });

    function resizeCollapse() {
        $('[data-toggle="collapse"]').each(function () {
            if ($(this).is(':hidden')) {
                $(this).removeClass('active');
                $(this).next().removeAttr('style').removeClass('open');
            }
        });
    }


    $(window).on('resize', function () {
        resizeCollapse();
    });


    /*======================================================
    MATCHHEIGHT
    ========================================================*/

    $('.js-match-height').matchHeight();

    $.fn.matchHeight._afterUpdate = function (resize) {
        $.fn.matchHeight._apply('.js-match-height');
    }


    $('.js-match-height-alt').matchHeight();

    $.fn.matchHeight._afterUpdate = function (resize) {
        $.fn.matchHeight._apply('.js-match-height-alt');
    }


    /**
     * -----------------------------------------------------------------------------------------------------------------
     * MAGNIFIC POPUP MODEL WINDOWS.
     *
     * @author  Joe Curran
     * @date    24 Apr 2018
     * -----------------------------------------------------------------------------------------------------------------
     */

    // OPEN AN INLINE MODEL WINDOW.
    $('.model').magnificPopup({
        type: 'inline',
        midClick: true
    });

    $('.model-youtube, .model-vimeo, .model-gmaps, .model-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false
    });

    $('.gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true,
            preload: [0, 2],
            navigateByImgClick: true,
            tPrev: 'Previous',
            tNext: 'Next',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
        }
    });

    $('.gallery-img').magnificPopup({
        delegate: 'img',
        type: 'image',
        removalDelay: 500, //delay removal by X to allow out-animation
        closeOnContentClick: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'mfp-with-fade',
        gallery: {
            enabled: true,
            preload: [0],
            navigateByImgClick: true,
            tPrev: 'Previous',
            tNext: 'Next',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
        }
    });

    /*======================================================
    TABS
    ========================================================*/

    $('[data-section]').on('click', function (e) {
        e.preventDefault();
        var $wrapper = $(this).parents('[data-tabs="wrapper"]');
        var target = $(this).attr('data-section');

        $(this).siblings().removeClass('tab-active');
        $(this).addClass('tab-active');

        $wrapper.find('[data-tabs="content"]').children('section').addClass('hide');
        $wrapper.find('[data-tabs="content"]').find('section[id=' + target + ']').removeClass('hide');
    });

    // TODO: EDIT THE TIMELINE STUFF //
    $('#changeDropdown').on('change', function () {
        changeTimeline($(this).val());
    });

    function changeTimeline(ev) {
        var $wrapper = $('[data-tabs="wrapper"]');
        $wrapper.find('[data-tabs="content"]').children('section').addClass('hide');
        $wrapper.find('[data-tabs="content"]').find('section[id=date-id-' + ev + ']').removeClass('hide');
    }

    /**
     * CHECK IF AN ELEMENT EXISTS
     *
     * @param callback
     * @returns {$.fn}
     */
    $.fn.exists = function (callback) {
        var args = [].slice.call(arguments, 1);

        if (this.length) {
            callback.call(this, args);
        }

        return this;
    };

    $('.tabs-dots').exists(function () {
        var blockID = this.data('block-id');
    });


    /*======================================================
    HOTSPOT : HOVER
    ========================================================*/

    // $('[data-spot]').each(function () {
    //     var $wrapper = $(this).parents('[data-hotspot="wrapper"]');
    //     var target = $(this).attr('data-spot');
    //     $(this).mouseover(function () {
    //         $wrapper.find('[data-hotspot="content"]').find('div[id=' + target + ']').addClass('hotspot-active');
    //     }).mouseout(function () {
    //         $wrapper.find('[data-hotspot="content"]').children('div').removeClass('hotspot-active');
    //     });
    // });


    /*======================================================
    PRELOADER
    ========================================================*/
    // var timer = function () {
    //     $('[data-content]').fadeTo(600, 1);
    //     $('[data-loader]').delay(200).fadeOut(600);
    // };
    // timer();


    /*======================================================
    ROTATING SEARCH PLACEHOLDER
    ========================================================*/

    // var vals = $('.js-search').data('placeholder').split(',');
    // var keyframes = [vals[0]];
    //
    // // generate keyframes
    // var count = 0;
    // while (count < vals.length) {
    //     last_frame = keyframes[keyframes.length - 1];
    //     if (vals[(count + 1) % vals.length] == last_frame) { // if the keyframe is the current string
    //         count++;
    //     } else if (vals[(count + 1) % vals.length].lastIndexOf(last_frame, 0) === 0) { // if the current keyframe is part of the desired goal
    //         keyframes.push(last_frame + vals[(count + 1) % vals.length][last_frame.length]);
    //     } else { // delete from keyframe
    //         keyframes.push(last_frame.substring(0, last_frame.length - 1));
    //     }
    // }
    //
    // var input = document.getElementById('js-search-id');
    //
    // function ph_add(i) {
    //     setTimeout(function() {
    //         input.setAttribute('placeholder', keyframes[i]);
    //         if (keyframes[(i + 1) % keyframes.length].length > keyframes[i].length) {
    //             ph_add((i + 1) % keyframes.length);
    //         } else {
    //             setTimeout(function() {
    //                 ph_del((i + 1) % keyframes.length);
    //             }, 2500)
    //         }
    //     }, 110 * Math.random());
    // }
    //
    // function ph_del(i) {
    //     setTimeout(function() {
    //         input.setAttribute('placeholder', keyframes[i]);
    //         if (keyframes[(i + 1) % keyframes.length].length > keyframes[i].length) {
    //             ph_add((i + 1) % keyframes.length);
    //         } else {
    //             ph_del((i + 1) % keyframes.length);
    //         }
    //     }, 65);
    // }
    //
    // ph_add(0);


    /*======================================================
    HIDE / SHOW
    ========================================================*/


    // $('.js-hide-show').each(function () {
    //
    //     $(this).click(function () {
    //
    //         var show = $(this).attr('data-show');
    //         data_icon_show = $(this).data('icon-show');
    //         data_icon_hide = $(this).data('icon-hide');
    //         iconToggle = ($(this).find('i').html() === data_icon_show) ? data_icon_hide : data_icon_show;
    //
    //         $("#" + show).toggle();
    //         $(this).find('i').text(iconToggle);
    //
    //         $('[toggle-relative-search]').toggleClass('relative');
    //
    //         if ($(this).data('blur') == true) {
    //             $("#" + show).find('input')[0].focus();
    //         }
    //
    //         return false;
    //
    //     });
    //
    // });

    $('.grid').packery({
        itemSelector: '.grid-item, .grid-item-inline-size',
        columnWidth: '.grid-sizer',
        // itemSelector: '.grid-item',
        layoutMode: 'packery',
        gutter: 0
    });

    /*======================================================
    UNSTICK FIXED POSITION ELEMENT (used on case study page)
    ========================================================*/

    function stickyDiv() {
        if ($('[data-stick]').length) {
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

    $(window).on('resize', function () {
        stickyDiv();
    });



    /**
     * VIDEO STORIES
     * This funciton updates the video watching box with the selected video and data. This also marks the current video
     * with a border.
     *
     * @created 12 Mar 2018
     * @author Joe Curran
     * @version 1.00
     */
    $('.video-embed').on('click', function (e) {
        e.preventDefault();

        // RESET THE BORDERS FOR ALL ELEMENTS.
        $($(this).parent()).each(function () {
            $(this).find('img').removeClass('border-light-1').addClass('border-transparent');
        });

        // ADD THE NEW VIDEO TO THE VIDEO BOX.
        $(this).find("img").removeClass('border-transparent').addClass('border-light-1');
        $('.video-embed-frame').html($(this).find('iframe').clone().attr('width', '100%').attr('height', '280'));
        $('.video-embed-author').html($(this).find('.video-title').text());
        $('.video-embed-role').html($(this).find('.video-role').text());
    });


}); // ENDS DOC READY AT TOP


/*======================================================
GOOGLE MAP
========================================================*/


function initialize() {

    //https://snazzymaps.com/style/60/blue-gray
    var styles = [{ featureType: "water", stylers: [{ visibility: "on" }, { color: "#b5cbe4" }] }, {
        featureType: "landscape",
        stylers: [{ color: "#efefef" }]
    }, { featureType: "road.highway", elementType: "geometry", stylers: [{ color: "#83a5b0" }] }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{ color: "#bdcdd3" }]
    }, { featureType: "road.local", elementType: "geometry", stylers: [{ color: "#ffffff" }] }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{ color: "#e3eed3" }]
    }, {
        featureType: "administrative",
        stylers: [{ visibility: "on" }, { lightness: 33 }]
    }, { featureType: "road" }, {
        featureType: "poi.park",
        elementType: "labels",
        stylers: [{ visibility: "on" }, { lightness: 20 }]
    }, {}, { featureType: "road", stylers: [{ lightness: 20 }] }];
    var map;
    var markers = [];
    var infowindow = [];
    var mapOptions = {
        zoom: 6,
        styles: styles,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var bound = new google.maps.LatLngBounds();

    for (var i = 0; i < markerData.length; i++) {
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
    google.maps.event.addDomListener(window, "resize", function () {
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

jQuery(document).ready(function ($) {
    setTimeout(function () {
        $('[data-content]').fadeTo(600, 1);
        $('[data-loader]').delay(200).fadeOut(600);
    }, 2000);
    2000;

    // SUPPORT FOR RESPONSIVE EMBEDDED VIDEOS //
    var $all_oembed_videos = $("iframe[src*='youtube'],iframe[src*='vimeo.com']");

    $all_oembed_videos.each(function () {

        if ($all_oembed_videos.parent().hasClass('no-resize')) {

        } else {
            $(this).removeAttr('height').removeAttr('width').wrap("<div class='embed-container'></div>");
        }

    });

    // NAVIGATION SMALLIFICATION //
    // to use remove class 'smallification' and add 'data-smallification' on the header.
    function navigationSmallification() {
        if ($('[data-smallification]').length > 0) {
            var viewportWidth = $(window).width();
            // var viewportHeight   = $(window).height();
            var headerHeight = $('header').height();
            var headerLogo = $('#main-logo').data('logo');
            var headerLogoScroll = $('#main-logo').data('scrolllogo');

            if (viewportWidth > 680) {

                if ($(window).scrollTop() > ((headerHeight))) {
                    $('#main-logo').attr('src', headerLogoScroll);
                    // $('.logo-holder').css('background', 'transparent');
                    $('header').addClass("smallification");
                } else {
                    $('#main-logo').attr('src', headerLogo);
                    // $('.logo-holder').removeAttr('style');
                    $('header').removeClass("smallification");
                }
            }
        }
    }

    $(window).scroll(function () {
        navigationSmallification();
    });

    $(window).resize(function () {
        navigationSmallification();
    });

    navigationSmallification();

    // VIDEO MATCH HEIGHT FOR ALTERNATING MEDIA.
    $('[data-imatch]').each(function () {
        var height = $('[data-imatchto="' + $(this).data('imatch') + '"]').height();
        $('[data-imatch="' + $(this).data('imatch') + '"]').height(height);
    });

});

(function ($) {

    /*
    *  new_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$el (jQuery element)
    *  @return	n/a
    */

    function new_map($el) {

        // var
        var $markers = $el.find('.marker');


        // // vars
        // var args = {
        //     zoom		: 16,
        //     center		: new google.maps.LatLng(0, 0),
        //     mapTypeId	: google.maps.MapTypeId.ROADMAP
        // };
        var args = {
            zoom: 15,
            center: new google.maps.LatLng(0, 0),
            mapTypeControl: false,
            panControl: false,
            scrollwheel: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            }
        };


        // create map
        var map = new google.maps.Map($el[0], args);


        // add a markers reference
        map.markers = [];


        // add markers
        $markers.each(function () {

            add_marker($(this), map);

        });


        // center map
        center_map(map);


        // return
        return map;

    }

    function add_marker($marker, map) {

        // var
        var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

        // create marker
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

        // add to array
        map.markers.push(marker);

        // if marker contains HTML, add it to an infoWindow
        if ($marker.html()) {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function () {

                infowindow.open(map, marker);

            });
        }

    }

    function center_map(map) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each(map.markers, function (i, marker) {

            var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

            bounds.extend(latlng);

        });

        // only 1 marker?
        if (map.markers.length == 1) {
            // set center of map
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        }
        else {
            // fit to bounds
            map.fitBounds(bounds);
        }

    }

    var map = null;

    $(document).ready(function () {

        $('.acf-map').each(function () {

            // create map
            map = new_map($(this));

        });

    });

})(jQuery);
