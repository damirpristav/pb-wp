/* ***********************************
 * PinkButterflies - main.js file
 * **********************************/
(function($){

    var PBModel = function(){

    }();

    var PBView = function(){
        var elements = {
            pbLightboxTrigger: $('[data-pb-lightbox]'),
            pbLightboxClose: $('.pb-lightbox-content .close'),
            featuredSlider: $('#featured-slider'),
            featuredSlider2: $('#featured-slider-2'),
            featuredSlider3: $('#featured-slider-3'),
            featuredSlider4: $('#featured-slider-4'),
            featuredSliderPrev: $('#featured-slider-wrap .prev'),
            featuredSliderNext: $('#featured-slider-wrap .next'),
            featuredSlider2Prev: $('#featured-slider-wrap .prev-2'),
            featuredSlider2Next: $('#featured-slider-wrap .next-2'),
            featuredSlider3Prev: $('#featured-slider-wrap .prev-3'),
            featuredSlider3Next: $('#featured-slider-wrap .next-3'),
            featuredSlider4Prev: $('#featured-slider-wrap .prev-4'),
            featuredSlider4Next: $('#featured-slider-wrap .next-4'),
            owlGallery: $('.featured-image .owl-gallery .slider'),
            owlGalleryPrev: $('.featured-image .owl-gallery .prev'),
            owlGalleryNext: $('.featured-image .owl-gallery .next'),
            searchTrigger2: $('#search-trigger-2'),
            searchClose: $('#search-close'),
            masonryLayout: $('.masonry-layout'),
            mobileMenuTrigger: $('#mobile-menu-trigger'),
            mobileMenuOverlay: $('#mobile-menu-overlay'),
            mobileMenuWrap: $('#mobile-menu-wrap'),
            mobileMenu: $('#mobile-menu'),
            mobileSubmenuToggle: $('#mobile-menu li .submenu-toggle'),
            shareButtons: $('.post-share a'),
            magnificPopup: $('.pb-gallery-popup'),
            postContentAlignedImageLeft: $('.single-post-content img.alignleft'),
            postContentAlignedImageRight: $('.single-post-content img.alignright'),
        };

        return{
            // Return all elements
            getElements: function(){
                return elements;
            }
        }
    }();

    var PB = function(pbModel, pbView){

        var setup = function(){

            var $featuredSlider, $owlGallery;

            // Get elements from View Object
            var elements = pbView.getElements();

            // Open Mobile Menu
            elements.mobileMenuTrigger.on('click', openMobileMenu);

            // Close Mobile Menu
            elements.mobileMenuOverlay.on('click', closeMobileMenu);

            // Add fa-angle-right to items that have childrens in mobile menu
            elements.mobileMenu.find('.menu-item-has-children').prepend('<span class="submenu-toggle"><span class="fa fa-caret-right"></span></span>');

            // Open mobile sub menus
            $(document).on('click', '#mobile-menu li .submenu-toggle', function(){
                $(this).parent().siblings().find('ul').removeClass('opened animated fadeInLeft');
                $(this).siblings('ul').css('display','block').addClass('opened animated fadeInLeft');
            });

            // ********** Add close submenu link to sub menus **********
            elements.mobileMenu.find('.menu-item-has-children > ul')
                .prepend('<li class="close-submenu"><a href="#"><i class="fa fa-caret-left"></i> Go Back</a></li>');

            // ********** Close sub menus & mega menus **********
            $(document).on('click', '.close-submenu a', function(e){
                e.preventDefault();
                var el = $(this);
                $(this).parent().parent().css('display','block').removeClass('opened').addClass('fadeOutLeft');
                setTimeout(function(){
                    el.parent().parent().css('display','none').removeClass('opened animated fadeOutLeft fadeInLeft');
                },300);
            });

            // ********** Close mobile menu if window width is more then 1200px **********
            $(window).resize(function(){
                if($(window).width() > 1181){
                    $('#mobile-menu-wrap').removeClass('opened');
                    $('#mobile-menu-overlay').fadeOut();
                }
            });

            // Open ligtbox when element with data-pb-lightbox is clicked
            elements.pbLightboxTrigger.on('click', openLightbox);

            // Close ligtbox when X button is clicked
            elements.pbLightboxClose.on('click', closeLightbox);

            // Show Search on Header V2 on click
            elements.searchTrigger2.on('click', showSearch);

            // Hide Search on Header V2 on click
            elements.searchClose.on('click', closeSearch);

            // Init Owl on Featured Slider
            $featuredSlider = elements.featuredSlider;
            $featuredSlider.owlCarousel({
                loop: true,
                margin:0,
                responsiveRefreshRate: 10,
                items: 1,
                //autoHeight: true
            });

            // Show prev slider item on featured slider
            elements.featuredSliderPrev.on('click', function(){
                $featuredSlider.trigger('prev.owl.carousel');
            });

            // Show prev slider item on featured slider
            elements.featuredSliderNext.on('click', function(){
                $featuredSlider.trigger('next.owl.carousel');
            });

            // Init Owl on Featured Slider 2
            $featuredSlider2 = elements.featuredSlider2;
            $featuredSlider2.owlCarousel({
                stagePadding: 360,
                loop: true,
                margin: 30,
                nav: false,
                responsiveRefreshRate: 10,
                responsive:{
                    0:{
                        items:1,
                        stagePadding: 0,
                        margin: 0
                    },
                    479:{
                        items:1,
                        stagePadding: 20,
                        margin: 10
                    },
                    599:{
                        items:1,
                        stagePadding: 50,
                        margin: 20
                    },
                    767:{
                        items:1,
                        stagePadding: 100,
                        margin: 30
                    },
                    1299:{
                        items: 1,
                        stagePadding: 280
                    },
                    1599:{
                        items: 1,
                        stagePadding: 360
                    }
                }
            });

            // Show prev slider item on featured slider 2
            elements.featuredSlider2Prev.on('click', function(){
                $featuredSlider2.trigger('prev.owl.carousel');
            });

            // Show prev slider item on featured slider 2
            elements.featuredSlider2Next.on('click', function(){
                $featuredSlider2.trigger('next.owl.carousel');
            });

            // Init Owl on Featured Slider 3
            $featuredSlider3 = elements.featuredSlider3;
            $featuredSlider3.owlCarousel({
                loop: true,
                nav: false,
                items: 1,
                responsiveRefreshRate: 10,
            });

            // Show prev slider item on featured slider 3
            elements.featuredSlider3Prev.on('click', function(){
                $featuredSlider3.trigger('prev.owl.carousel');
            });

            // Show prev slider item on featured slider 3
            elements.featuredSlider3Next.on('click', function(){
                $featuredSlider3.trigger('next.owl.carousel');
            });

            // Init Owl on Featured Slider 4
            $featuredSlider4 = elements.featuredSlider4;
            $featuredSlider4.owlCarousel({
                loop: true,
                nav: false,
                items: 4,
                margin: 20,
                responsiveRefreshRate: 10,
                responsive: {
                    0:{
                        items: 1
                    },
                    479: {
                        items: 2
                    },
                    767: {
                        items: 3
                    },
                    991: {
                        items: 4
                    }
                }
            });

            // Show prev slider item on featured slider 4
            elements.featuredSlider4Prev.on('click', function(){
                $featuredSlider4.trigger('prev.owl.carousel');
            });

            // Show prev slider item on featured slider 4
            elements.featuredSlider4Next.on('click', function(){
                $featuredSlider4.trigger('next.owl.carousel');
            });

            // Init Owl on gallery post
            $owlGallery = elements.owlGallery;
            $owlGallery.owlCarousel({
                loop: true,
                margin:0,
                responsiveRefreshRate: 10,
                items: 1,
                //autoHeight: true
            });

            // Show prev slider item on gallery format
            elements.owlGalleryPrev.on('click', function(){
                $owlGallery.trigger('prev.owl.carousel');
            });

            // Show prev slider item on gallery format
            elements.owlGalleryNext.on('click', function(){
                $owlGallery.trigger('next.owl.carousel');
            });

            // init Masonry on masonry posts layout
            var $masonryLayout = elements.masonryLayout;
            $masonryLayout.imagesLoaded(function(){
                $masonryLayout.masonry({
                    // options
                    itemSelector: '.post, .my-photo, .page',
                    columnWidth: '.post, .my-photo, .page',
                    gutter: '.gutter'
                });
            });

            // Open new window when post share icons are clicked
            elements.shareButtons.on( 'click', function(e){
                e.preventDefault();
                window.open( $(this).attr('href'), 'Share', 'height=600,width=600' );
                return false;
            });

            // Fitvids
            $('body').fitVids();

            // Gallery Page - Magnific Popup
            elements.magnificPopup.magnificPopup({
                type:'image',
                gallery:{
                    enabled:true
                },
                image: {
                    titleSrc: 'data-caption'
                }
            });

            // elements.postContentAlignedImageLeft.each(function(){
            //     if( $(this).parent().is('p') ){
            //         $(this).parent().next().addClass('clearfix');
            //     }
            // });

        };

        var openMobileMenu = function(e){
            e.preventDefault();

            // Get elements from View Object
            var elements = pbView.getElements();

            elements.mobileMenuWrap.addClass('opened');
            elements.mobileMenuOverlay.fadeIn();
        };

        var closeMobileMenu = function(){
            // Get elements from View Object
            var elements = pbView.getElements();

            elements.mobileMenuWrap.removeClass('opened');
            elements.mobileMenuOverlay.fadeOut();
        };

        var openLightbox = function(e){
            e.preventDefault();
            var id = $(this).attr('data-pb-lightbox');
            $(id).fadeIn();
        };

        var closeLightbox = function(){
            $(this).parents('.pb-lightbox').fadeOut();
        };

        var showSearch = function(e){
            e.preventDefault();
            $(this).parent().addClass('active');
            $(this).parent().find('.search').fadeIn();
        };

        var closeSearch = function(e){
            e.preventDefault();
            $(this).parent().removeClass('active');
            $(this).parent().find('.search').fadeOut();
        };

        return{
            init: function(){
                setup();
            }
        }

    }(PBModel, PBView);

    PB.init();

}(jQuery));
