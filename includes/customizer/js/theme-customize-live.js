/* ************************************
 * Theme Customizer Live
 * Preview - transport - postMessage
 * ************************************/
( function( $ ) {

    var api = wp.customize;

    var baseImportUrl = 'https://fonts.googleapis.com/css?family=';

    /* **********************************************
     * Subscription
     * *********************************************/
    // Subscripion Heading 3 Text
    wp.customize( 'prt_pb_options[subscription_text_1]', function( value ) {
       var defaultVal = 'Thanks for visiting! We are so happy to have you.';

       value.bind( function( newval ) {
           if( newval === '' ){
               $('#subscribe-to-newsletter h3').html( defaultVal );
           }else{
               $('#subscribe-to-newsletter h3').html( newval );
           }
       });
    } );

    // Subscripion Heading 6 Text
    wp.customize( 'prt_pb_options[subscription_text_2]', function( value ) {
       var defaultVal = 'Let\'s stay in touch';

       value.bind( function( newval ) {
           if( newval === '' ){
               $('#subscribe-to-newsletter h6').html( defaultVal );
           }else{
               $('#subscribe-to-newsletter h6').html( newval );
           }
       });
    } );

    // Subscripion Paragraph Text
    wp.customize( 'prt_pb_options[subscription_text_3]', function( value ) {
       var defaultVal = 'Subscribe for the latest news and updates delivered straight to your inbox.';

       value.bind( function( newval ) {
           if( newval === '' ){
               $('#subscribe-to-newsletter p.pb-subscription-text').html( defaultVal );
           }else{
               $('#subscribe-to-newsletter p.pb-subscription-text').html( newval );
           }
       });
    } );

    /* **********************************************
     * Footer
     * *********************************************/
    // Footer Text
    wp.customize( 'prt_pb_options[footer_text]', function( value ) {
        var defaultVal = 'Copyright ©  2017 The PinkButterflies - WordPress theme for bloggers - by PRThemes';

        value.bind( function( newval ) {
            if( newval === '' ){
                $('.footer-text p').html( defaultVal );
            }else{
                $('.footer-text p').html( newval );
            }
        });
    } );

    /* **********************************************
     * Other
     * *********************************************/
     // 404 Page Background Image
     wp.customize( 'prt_pb_options[error404_bg_image]', function( value ) {
         value.bind( function( newval ) {
            $('head').append( '<style type="text/css">body.page-404{ background-image: url(' + newval +'); }</style>' );
         });
     } );

    /* **********************************************
     * Fonts live preview
     * *********************************************/
    function getCSSFontProperties( value, selectors, option ){
        var variants = [], fontFamily, fontWeight, fontStyle, importVariant, styleID, linkID, link;
        var variant = value[1];

        fontFamily = value[0].replace(/\+/g," ");

        if( variant.length == 9 ){
            fontWeight = variant.slice(0, 3);
            fontStyle = variant.slice(3);
        }else if( variant.length == 3 ){
            fontWeight = variant;
            fontStyle = 'normal';
        }else if( variant.length == 7 && variant === 'regular' ){
            fontWeight = '400';
            fontStyle = 'normal';
        }else if( variant.length == 6 && variant === 'italic' ){
            fontWeight = '400';
            fontStyle = 'italic';
        }

        if( fontStyle === 'italic' ){
            importVariant = ':' + fontWeight + ',' + fontWeight + 'i';
        }else{
            if( fontWeight !== '400' ){
                importVariant = ':' + fontWeight;
            }else{
                importVariant = '';
            }
        }

        var importUrl = baseImportUrl + value[0] + importVariant;

        var optionsArr = [
            'body_font', 'headings_font', 'heading6_font', 'menu_font', 'menu_font_header_v3',
            'categories_font', 'buttons_font', 'title_box_subtitle_font', 'recipe_wrap_headings_font',
            'recipe_wrap_instructions_steps_num_font', 'error_404_page_heading_font',
            'calendar_widget_font', 'footer_text_font', 'quote_font'
        ];

        for( var i=0; i<optionsArr.length; i++ ){
            if( option === optionsArr[i] ){
                styleID = optionsArr[i] + '_style';
                linkID = optionsArr[i] + '_link';
            }
        }

        if( !$( '#' + linkID ).length ){
            link = '<link href="' + importUrl + '" rel="stylesheet" id="' + linkID + '">';
            $('head').append(link);
        }else{
            $( '#' + linkID ).remove();
            link = '<link href="' + importUrl + '" rel="stylesheet" id="' + linkID + '">';
            $('head').append(link);
        }

        if( !$( '#' + styleID ).length ){
            $('head').append('<style type="text/css" id="' + styleID + '">' + selectors + '{font-family:"' + fontFamily  + '" !important; font-weight: ' + fontWeight + ' !important; font-style: ' + fontStyle + ' !important;}' + '</style>');
        }else{
            $( '#' + styleID ).remove();
            $('head').append('<style type="text/css" id="' + styleID + '">' + selectors + '{font-family:"' + fontFamily  + '" !important; font-weight: ' + fontWeight + ' !important; font-style: ' + fontStyle + ' !important;}' + '</style>');
        }
    }

     // Body font
     wp.customize( 'prt_pb_options[body_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = 'body, input, select, textarea';

            getCSSFontProperties( splitValue, selectors, 'body_font' );
        } );
     } );

     // Headings font
     wp.customize( 'prt_pb_options[headings_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = 'h1, h2, h3, h4, h5';

            getCSSFontProperties( splitValue, selectors, 'headings_font' );
        } );
     } );

     // Heading 6 font
     wp.customize( 'prt_pb_options[heading6_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = 'h6';

            getCSSFontProperties( splitValue, selectors, 'heading6_font' );
        } );
     } );

     // Menu font
     wp.customize( 'prt_pb_options[menu_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '#main-menu a, #mobile-menu-trigger, #top-menu a, .version-3 #main-menu ul a, #mobile-menu li';

            getCSSFontProperties( splitValue, selectors, 'menu_font' );
        } );
     } );

     // Menu font on header v3
     wp.customize( 'prt_pb_options[menu_font_header_v3]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.version-3 #main-menu a, .version-3 #mobile-menu-trigger';

            getCSSFontProperties( splitValue, selectors, 'menu_font_header_v3' );
        } );
     } );

     // Categories Font
     wp.customize( 'prt_pb_options[categories_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '#featured-slider .item .categories a, #featured-slider-2 .item .text-wrap .categories a, #featured-slider-3 .item .text-wrap .categories a,';
                selectors += '.post .categories a, #title-box.v3 .categories div a, #title-box.v1 .categories div a';

            getCSSFontProperties( splitValue, selectors, 'categories_font' );
        } );
     } );

     // Buttons font
     wp.customize( 'prt_pb_options[buttons_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.post footer .read-more-wrap a, .post .read-more-wrap a, .read-more-wrap a, .pb-navigation a, .pb-navigation span, .post-password-form input[type="submit"],';
                selectors += '.jetpack_subscription_widget #subscribe-submit input, .null-instagram-feed p.clear a, #instagram-wrap .pb-instagram-boxes .pb-instagram-box.follow-box .overlay a,';
                selectors += '#subscribe-to-newsletter form button, .page-404-content a.btn, .comment .comment-body .reply a, .comment-respond .form-submit input, .recipe-wrap .buttons a, .wpcf7 form p input[type="submit"],';
                selectors += '#subscribe-to-newsletter form input[type="submit"]';
            getCSSFontProperties( splitValue, selectors, 'buttons_font' );
        } );
     } );

     // Quotes Font
     wp.customize( 'prt_pb_options[quote_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.single-post-content blockquote';

            getCSSFontProperties( splitValue, selectors, 'quote_font' );
        } );
     } );

     // Title Box Subtitle Font
     wp.customize( 'prt_pb_options[title_box_subtitle_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '#title-box p.sub-title';

            getCSSFontProperties( splitValue, selectors, 'title_box_subtitle_font' );
        } );
     } );

     // Recipe Wrap Headings Font
     wp.customize( 'prt_pb_options[recipe_wrap_headings_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.recipe-wrap .ingredients h3, .recipe-wrap .instructions h3, .recipe-wrap .notes h3';

            getCSSFontProperties( splitValue, selectors, 'recipe_wrap_headings_font' );
        } );
     } );

     // Recipe Wrap Instructions Steps Number Font
     wp.customize( 'prt_pb_options[recipe_wrap_instructions_steps_num_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.recipe-wrap .instructions p span';

            getCSSFontProperties( splitValue, selectors, 'recipe_wrap_instructions_steps_num_font' );
        } );
     } );

     // Error Page 404 Heading 1 Font
     wp.customize( 'prt_pb_options[error_404_page_heading_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.page-404-content h1';

            getCSSFontProperties( splitValue, selectors, 'error_404_page_heading_font' );
        } );
     } );

     // Calendar Widget Font
     wp.customize( 'prt_pb_options[calendar_widget_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.widget_calendar #wp-calendar';

            getCSSFontProperties( splitValue, selectors, 'calendar_widget_font' );
        } );
     } );

     // Footer Text Font
     wp.customize( 'prt_pb_options[footer_text_font]', function( value ) {
        value.bind( function( newval ) {
            var splitValue = newval.split(':');
            var selectors = '.footer-text p';

            getCSSFontProperties( splitValue, selectors, 'footer_text_font' );
        } );
     } );

} )( jQuery );
