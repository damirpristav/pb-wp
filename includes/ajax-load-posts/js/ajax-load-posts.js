/* *********************************
 * PB load posts with AJAX
 * ********************************/

jQuery(function($){

    function initSinglePostSlider(){

        // ********** Owl gallery slider **********
        var $owlGallery = $('.featured-image .owl-gallery .slider');
        $owlGallery.owlCarousel({
            loop: true,
            margin:0,
            responsiveRefreshRate: 10,
            items: 1,
            //autoHeight: true
        });

        $('.featured-image .owl-gallery .prev').click(function(){
            $owlGallery.trigger('prev.owl.carousel');
        });
        $('.featured-image .owl-gallery .next').click(function(){
            $owlGallery.trigger('next.owl.carousel');
        });

        $owlGallery.trigger('refresh.owl.carousel');

    }

    // *********** Masonry blog layout ***********
    var $masonryLayout = $('.masonry-layout');

    function initMasonryLayout(){

        var $masonryLayout = $('.masonry-layout');

        $masonryLayout.imagesLoaded(function(){
            $masonryLayout.masonry({
                // options
                itemSelector: '.post',
                columnWidth: '.post',
                gutter: '.gutter'
            });
        });

    }

    var $btn = $('.pb-navigation .ajax-btn');
    var posts = $btn.attr('data-cp');
    var offset = $btn.attr('data-ppp');
    var sticky = $btn.attr('data-sticky');
    var toLoad = $btn.attr('data-load');
    var afterAjaxLink = $btn.clone();
    var standardGridLayout = parseInt( $btn.attr('data-sg-layout') );
    offset = parseInt( offset );
    posts = parseInt( posts );
    sticky = parseInt( sticky );
    toLoad = parseInt( toLoad );

    if( offset >= posts ){
        $btn.hide();
    }

    $(document).on( 'click', '.pb-navigation .ajax-btn', function(e) {
        e.preventDefault();

        // Show loading icon
        $(this).parent().html('<span class="fa-wrap"><i class="fa fa-spinner fa-spin"></i></span>');

        $.ajax({
            type: "POST",
            url: pb_ajax_load_posts.ajax_url,
            data: {
                action: 'pb_get_posts',
                offset: offset,
                category: pb_ajax_load_posts.category,
                cat_version: pb_ajax_load_posts.cat_version,
                tag: pb_ajax_load_posts.tag,
                author: pb_ajax_load_posts.author,
                yearly_archives: pb_ajax_load_posts.yearly_archives,
                monthly_archives: pb_ajax_load_posts.monthly_archives,
                daily_archives: pb_ajax_load_posts.daily_archives,
                ar_year: pb_ajax_load_posts.ar_year,
                ar_month: pb_ajax_load_posts.ar_month,
                ar_day: pb_ajax_load_posts.ar_day,
                search: pb_ajax_load_posts.search,
                search_empty: pb_ajax_load_posts.search_empty
            },
            success:function(data) {

                if( standardGridLayout === 1 ){
                    $('.posts-container.posts-container-grid').append(data);
                }else{
                    $('.posts-container').append(data);
                }

                $masonryLayout.masonry('reloadItems');
                initMasonryLayout();
                initSinglePostSlider();
                $('body').fitVids();

                offset += toLoad;

                $('.pb-navigation').html( afterAjaxLink );

                if( ( offset + sticky ) >= posts ){
                    $('.pb-navigation a.ajax-btn').hide();
                }

            },
            error: function(e){
                console.log(e);
            }
        });

        return false;

    });

});
