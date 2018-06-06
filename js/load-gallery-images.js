/* *********************************
 * PinkButterflies Load Gallery
 * Images with AJAX
 * ********************************/

jQuery(function($){

    // ********** Magnific Popup **********
    function initMagnificPopup(){

      $('.pb-gallery-popup').magnificPopup({
          type:'image',
          gallery:{
              enabled:true
          },
          image: {
              titleSrc: 'data-caption'
          }
      });

    }

    // *********** Masonry blog layout ***********
    var $masonryLayout = $('.masonry-layout');

    function initMasonryLayout(){

        var $masonryLayout = $('.masonry-layout');

        $masonryLayout.imagesLoaded(function(){
            $masonryLayout.masonry({
                // options
                itemSelector: '.my-photo',
                columnWidth: '.my-photo',
                gutter: '.gutter'
            });
        });

    }

    var images = $('a.pb-load-more-images').attr('data-gallery-count');
    var offset = 9;
    var toLoad = 3;
    var afterAjaxLink = $('a.pb-load-more-images').clone();
    var post_id = $('.my-gallery-container').data('id');
    images = parseInt( images );

    $(document).on( 'click', 'a.pb-load-more-images', function(e) {
        e.preventDefault();

        // Show loading icon
        $(this).parent().html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            type: "POST",
            url: pb_load_gallery_images.ajax_url,
            data: {
                action: 'load_gallery_images',
                offset: offset,
                post_id: post_id
            },
            success:function(data) {
                $('.my-gallery-container').append(data);

                $masonryLayout.masonry('reloadItems');
                initMasonryLayout();
                initMagnificPopup();

                offset += toLoad;

                $('.gallery-page-navigation').html( afterAjaxLink );

                if( offset  >= images ){
                    $('.gallery-page-navigation a').hide();
                }

            },
            error: function(e){
                console.log(e.statusText);
            }
        });

        return false;

    });

});
