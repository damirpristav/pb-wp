( function( wp, $ ) {
    'use strict';

    wp.customize.SocialButtonsControl = wp.customize.Control.extend({
        ready: function() {
            var control = this,
                socialButtonsContainer = $( '.prt-social-buttons', this.container ),
                newSocialButtonsContainer = $( '.prt-new-social-buttons', this.container ),
                addButton = $( '.add-new-btn', this.container ),
                socialButtons = this.setting.get(),
                socialProfiles = this.params.social_profiles,
                template = wp.template( 'prt-social-btn' ),
                newTemplate = wp.template( 'prt-new-social-btn' );

            $.each( socialButtons, function( i, socialButton ) {
                var social,
                    label,
                    socialValue = socialButton.name,
                    url = socialButton.url;

                if ( socialProfiles[ socialValue ] ) {
                    social = socialValue;
                    label = socialProfiles[ social ]['label'];
                }

                socialButtonsContainer.append( template( {
                    name: social,
                    url: url,
                    editing: false,
                    label: label
                } ) );
            } );

            addButton.on( 'click', function(e) {
                e.preventDefault();

                var socialButtons = control.setting.get();
                var newSocialButtonsContainer = $( '.prt-new-social-buttons', $( this ).closest( '.customize-control-content' ) );
                var newSocialBtn = $( newTemplate({ profiles: socialProfiles, addedProfiles: socialButtons }) );

                newSocialBtn.appendTo( newSocialButtonsContainer );
                $('.prt-action-btn-wrap').hide();

            } );

            newSocialButtonsContainer.on( 'click', '.save-new-btn', function(e){
                e.preventDefault();
                var social = $(this).siblings('select').val();

                if( social === 'default' ){
                    return false;
                }

                var url = $(this).siblings('.url').val(),
                    label = socialProfiles[social]['label'],
                    socialButtonsContainer = $( '.prt-social-buttons' ),
                    socialBtn = $( template({ name: social, url: url, editing: false, label: label }) );

                socialBtn.appendTo( socialButtonsContainer );
                socialButtonsUpdateSetting( $('.prt-social-buttons') );
                $(this).parents('.prt-new-social-btn').remove();
                $('.prt-action-btn-wrap').show();

            });

            newSocialButtonsContainer.on( 'click', '.cancel-new-btn', function(e){

                $(this).parents('.prt-new-social-btn').remove();
                $('.prt-action-btn-wrap').show();

            });

            function socialButtonsUpdateSetting( container ) {
                var newSetting = [];
                $( '.prt-social-btn', container ).each( function() {
                    var url, social, label;

                    social = $( '.preview-btn .name', this ).text();
                    url = $( 'input.url', this ).val();
                    label = socialProfiles[ social ]['label'];

                    newSetting.push( { name: social, url: url, editing: false, label: label } );
                } );

                control.setting.set( newSetting );

            }

            socialButtonsContainer.on( 'change', 'input', function() {
                var socialButton = $( this ).closest( '.prt-social-btn' ),
                    socialButtonsContainer = socialButton.closest( '.prt-social-buttons' ),
                    social = $( '.edit-btn-wrap input.social-name', socialButton ).val(),
                    url = $( '.edit-btn-wrap input.url', socialButton ).val(),
                    label = socialProfiles[social]['label'];

                socialButton.replaceWith( template( {
                    name: social,
                    url: url,
                    editing: true,
                    label: label
                } ) );

                socialButtonsUpdateSetting( socialButtonsContainer );
            } );

            socialButtonsContainer.on( 'click', '.prt-social-btn .preview-btn .inner', function( event ) {
                event.preventDefault();

                var socialButton = $( this ).closest( '.prt-social-btn' ),
                    editBtnWrap = $( '.edit-btn-wrap', socialButton );

                editBtnWrap.slideToggle();
            } );

            socialButtonsContainer.on( 'click', '.prt-social-btn .preview-btn .remove', function( event ) {
                event.preventDefault();

                var socialButton = $( this ).closest( '.prt-social-btn' ),
                    socialButtonsContainer = socialButton.closest( '.prt-social-buttons' );

                $('.cancel-new-btn').click();
                socialButton.remove();

                socialButtonsUpdateSetting( socialButtonsContainer );
            } );

            $('.prt-social-buttons').sortable({
                handle: '.prt-social-btn .preview-btn .sort',
                update: function( event, ui ) {
                    socialButtonsUpdateSetting( socialButtonsContainer );
                }
            });
            $('.prt-social-buttons').disableSelection();

        }
    });

    // Google Fonts Control
    wp.customize.GoogleFontsControl = wp.customize.Control.extend({
        ready: function() {

            var control = this, // get google_fonts control
                googleFonts = this.params.google_fonts, // get google fonts array
                html,
                htmlVariants;

            // loop through googleFonts array
            for( var i=0; i<googleFonts.length; i++ ){

                var value, text, selected, split_selected;
                // get font family
                text = googleFonts[i]['family'];
                // replace space with plus sign in font family
                value = text.replace(/ /g,"+");
                // get selected font
                selected = this.container.find('.selected-g-font').val();
                // split selected font value to get font family and variant
                split_selected = selected.split(':');
                // check if selected font value is identical to value
                if( split_selected[0] === value ){
                    // create option elements with selected attribute
                    html += '<option value="' + value + '" selected>' + text + '</option>';
                    // loop through each font variants
                    for( var j=0; j<googleFonts[i].variants.length; j++ ){
                        // check if selected font variant is identical to font variant
                        if( split_selected[1] === googleFonts[i].variants[j] ){
                            // create option elements for variants with selected attribute
                            htmlVariants += '<option value="' + googleFonts[i].variants[j] + '" selected>' + googleFonts[i].variants[j] + '</option>';
                        }else{
                            // create option elements for variants
                            htmlVariants += '<option value="' + googleFonts[i].variants[j] + '">' + googleFonts[i].variants[j] + '</option>';
                        }
                    }
                }else{
                    // create option elements
                    html += '<option value="' + value + '">' + text + '</option>';
                }

            }

            // add option elements to dropdown
            this.container.find('.google-fonts-dropdown').html(html);
            // add option elements to variants dropdown
            this.container.find('.google-fonts-variants-dropdown').html(htmlVariants);

            // change the value and variant on dropdown change and set it to hidden input
            this.container.find('.google-fonts-dropdown').on('change', function(){
                var value = $(this).val();

                updateDropdown( $(this) );

                var variant = $(this).siblings('.google-fonts-variants-dropdown').val();

                control.container.find('.google-fonts-input').val( value + ':' + variant );
                updateControl();
            });

            // change the value and variant on variants dropdown change and set it to hidden input
            this.container.on('change', '.google-fonts-variants-dropdown', function(){
                var variant = $(this).val().toString();
                var value = control.container.find('.google-fonts-dropdown').val();

                control.container.find('.google-fonts-input').val( value + ':' + variant );
                updateControl();
            });

            // update hidden input
            function updateControl(){

                var value = control.container.find('.google-fonts-input').val();
                control.setting.set( value );

            }

            // update variants dropdown
            function updateDropdown( param ){

                var val = param.val();
                var originalVal = val.replace(/\+/g," ");
                var theIndex;

                for (var i = 0; i < googleFonts.length; i++) {
                  	if (googleFonts[i].family == originalVal ) {
                    		theIndex = i;
                    		break;
                	  }
                }

                param.siblings('.google-fonts-variants-dropdown').remove();
                var newDropdown = '<select class="google-fonts-variants-dropdown">';
                for( var i=0; i<googleFonts.length; i++ ){
                    if( i == theIndex ){
                        for( var j=0; j<googleFonts[i].variants.length; j++ ){
                            newDropdown += '<option value="' + googleFonts[i].variants[j] + '">' + googleFonts[i].variants[j] + '</option>';
                        }
                    }
                }
                newDropdown += '</select>';
                control.container.find('.prt-fonts-container').append(newDropdown);

            }

        }
    });

    $.extend( wp.customize.controlConstructor, {
        'social_icons': wp.customize.SocialButtonsControl,
        'google_fonts': wp.customize.GoogleFontsControl,
    } );

} )( wp, jQuery );
