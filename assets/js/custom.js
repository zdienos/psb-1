/*global jQuery:false */
(function ($) {

    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: false // trigger animations on mobile devices (true is default)
    });
    wow.init();

    var isMobile = mobilecheck();
    function mobilecheck() {
        var check = false;
        (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }
    $(".btn-wa").click(function () {
        var apilink = 'http://';
        apilink += isMobile ? 'api' : 'web';
        apilink += '.whatsapp.com/send?phone=' + wa_number + '&text=' + encodeURI('Assalamualaikum... Saya ingin bertanya tentang pendaftaran');

        window.open(apilink);
    })
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function () {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
            $(".top-area").addClass("top-padding");
            $(".navbar-brand").addClass("reduce");

            $(".navbar-custom ul.nav ul.dropdown-menu").css("margin-top", "11px");

        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
            $(".top-area").removeClass("top-padding");
            $(".navbar-brand").removeClass("reduce");

            $(".navbar-custom ul.nav ul.dropdown-menu").css("margin-top", "16px");

        }
    });

    var navMain = $(".navbar-collapse");
    navMain.on("click", "a:not([data-toggle])", null, function () {
        navMain.collapse('hide');
    });

    //scroll to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function () {
        $('.navbar-nav li a').bind('click', function (event) {
            var $anchor = $(this);
            var nav = $($anchor.attr('href'));
            if (nav.length) {
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1500, 'easeInOutExpo');

                event.preventDefault();
            }
        });
        $('.page-scroll a').bind('click', function (event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });

    //owl carousel
    $('#owl-works').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 5],
        itemsDesktopSmall: [980, 5],
        itemsTablet: [768, 5],
        itemsTabletSmall: [550, 2],
        itemsMobile: [480, 2],
    });

    //nivo lightbox
    $('.owl-carousel .item a').nivoLightbox({
        effect: 'fadeScale', // The effect to use when showing the lightbox
        theme: 'default', // The lightbox theme to use
        keyboardNav: true, // Enable/Disable keyboard navigation (left/right/escape)
        clickOverlayToClose: true, // If false clicking the "close" button will be the only way to close the lightbox
        onInit: function () {}, // Callback when lightbox has loaded
        beforeShowLightbox: function () {}, // Callback before the lightbox is shown
        afterShowLightbox: function (lightbox) {}, // Callback after the lightbox is shown
        beforeHideLightbox: function () {}, // Callback before the lightbox is hidden
        afterHideLightbox: function () {}, // Callback after the lightbox is hidden
        onPrev: function (element) {}, // Callback when the lightbox gallery goes to previous item
        onNext: function (element) {}, // Callback when the lightbox gallery goes to next item
        errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
    });

    jQuery('.appear').appear();
    jQuery(".appear").on("appear", function (data) {
        var id = $(this).attr("id");
        jQuery('.nav li').removeClass('active');
        jQuery(".nav a[href='#" + id + "']").parent().addClass("active");
    });


    //parallax
    if ($('.parallax').length) {
        $(window).stellar({
            responsive: true,
            scrollProperty: 'scroll',
            parallaxElements: false,
            horizontalScrolling: false,
            horizontalOffset: 0,
            verticalOffset: 0
        });

    }


    (function ($, window, document, undefined) {

        var gridContainer = $('#grid-container'),
            filtersContainer = $('#filters-container');

        // init cubeportfolio
        gridContainer.cubeportfolio({

            defaultFilter: '*',

            animationType: 'sequentially',

            gapHorizontal: 50,

            gapVertical: 40,

            gridAdjustment: 'responsive',

            caption: 'fadeIn',

            displayType: 'lazyLoading',

            displayTypeSpeed: 100,

            // lightbox
            lightboxDelegate: '.cbp-lightbox',
            lightboxGallery: true,
            lightboxTitleSrc: 'data-title',
            lightboxShowCounter: true,

            // singlePage popup
            singlePageDelegate: '.cbp-singlePage',
            singlePageDeeplinking: true,
            singlePageStickyNavigation: true,
            singlePageShowCounter: true,
            singlePageCallback: function (url, element) {

                // to update singlePage content use the following method: this.updateSinglePage(yourContent)
                var t = this;

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html',
                        timeout: 5000
                    })
                    .done(function (result) {
                        t.updateSinglePage(result);
                    })
                    .fail(function () {
                        t.updateSinglePage("Error! Please refresh the page!");
                    });

            },

            // singlePageInline
            singlePageInlineDelegate: '.cbp-singlePageInline',
            singlePageInlinePosition: 'above',
            singlePageInlineShowCounter: true,
            singlePageInlineInFocus: true,
            singlePageInlineCallback: function (url, element) {
                // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
            }
        });

        // add listener for filters click
        filtersContainer.on('click', '.cbp-filter-item', function (e) {

            var me = $(this),
                wrap;

            // get cubeportfolio data and check if is still animating (reposition) the items.
            if (!$.data(gridContainer[0], 'cubeportfolio').isAnimating) {

                if (filtersContainer.hasClass('cbp-l-filters-dropdown')) {
                    wrap = $('.cbp-l-filters-dropdownWrap');

                    wrap.find('.cbp-filter-item').removeClass('cbp-filter-item-active');

                    wrap.find('.cbp-l-filters-dropdownHeader').text(me.text());

                    me.addClass('cbp-filter-item-active');
                } else {
                    me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');
                }

            }

            // filter the items
            gridContainer.cubeportfolio('filter', me.data('filter'), function () {});

        });

        // activate counter for filters
        gridContainer.cubeportfolio('showCounter', filtersContainer.find('.cbp-filter-item'));

    })(jQuery, window, document);


})(jQuery);
$(window).load(function () {
    $(".loader").delay(100).fadeOut();
    $("#page-loader").delay(100).fadeOut("fast");
});
