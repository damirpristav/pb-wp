<?php

class PRT_PB_User_Fields extends PRT_PinkButterflies{

    public function __construct(){

        global $pagenow;

        add_action( 'show_user_profile', array( $this, 'extra_fields' ) );
        add_action( 'edit_user_profile', array( $this, 'extra_fields' ) );

        add_action( 'personal_options_update', array( $this, 'save_extra_fields' ) );
        add_action( 'edit_user_profile_update', array( $this, 'save_extra_fields' ) );

        if( $pagenow === 'profile.php' ){

            add_action( 'admin_footer', array( $this, 'author_image_upload' ) );
            add_action( 'admin_footer', array( $this, 'author_social_profiles' ) );

        }

    }

    // html markup for extra author fields
    public function extra_fields( $user ){
        ?>

        <h3><?php _e( 'PinkButterflies Extra Author Fields', 'pinkbutterflies' ); ?></h3>
        <table class="form-table">

            <tr>
                <th><label for="prt_pb_author_image"><?php _e( 'Author Image', 'pinkbutterflies' ); ?></label></th>
                <td>
                    <input type="hidden" name="prt_pb_author_image" id="prt_pb_author_image" value="<?php echo esc_attr( get_the_author_meta( 'prt_pb_author_image', $user->ID ) ); ?>" class="regular-text" />
                    <div id="prt-pb-author-image-preview">
                        <?php

                        $author_image = get_the_author_meta( 'prt_pb_author_image', $user->ID );
                        if( $author_image !== '' ){
                            echo '<img src="' . $author_image . '" alt="" style="max-width:200px;" />';
                            echo '<br />';
                        }

                        ?>
                    </div>
                    <div class="buttons">
                        <a href="#" id="prt-pb-add-author-image-btn" class="button button-secondary">
                            <?php
                            if( $author_image !== '' ){
                                _e( 'Change image', 'pinkbutterflies' );
                            }else{
                                _e( 'Add image', 'pinkbutterflies' );
                            }
                            ?>
                        </a>
                        <a href="#" id="prt-pb-remove-author-image-btn" class="button button-secondary"><?php _e( 'Remove image', 'pinkbutterflies' ); ?></a>
                    </div>
                    <p class="description"><?php _e( 'If this image is not set Gravatar Profile Picture will be used. Recommended image size is 120x120 pixels or any other same height and width size greater than 120px.' , 'pinkbutterflies' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><?php _e( 'Add social profiles', 'pinkbutterflies' ); ?></th>
                <td>
                    <div id="social-profiles-wrap">
                        <?php
                        global $user_id;

                        $user_social_profiles = get_user_meta( $user_id, 'prt_pb_author_social', true );

                        if( !empty( $user_social_profiles ) ){
                          foreach( $user_social_profiles as $profile ){

                              $profile_info = explode( ',', $profile );
                              $profile_val = $profile_info[0];
                              $profile_url = $profile_info[1];
                              ?>
                              <div class="prt-author-social-btn-div">
                                  <span data-icon="<?php echo $profile_val; ?>"><i class="fab fa-<?php echo $profile_val; ?>"></i></span>
                                  <input type="text" class="prt_author_social_edit" value="<?php echo $profile_url; ?>" />
                                  <a href="#" class="button button-secondary delete-btn"><?php _e( 'Delete', 'pinkbutterflies' ); ?></a>
                                  <input type="hidden" name="prt_author_social[]" value="<?php echo $profile_val; ?>,<?php echo $profile_url; ?>" />
                              </div>
                              <?php

                          }
                        }

                        ?>
                    </div>
                    <div id="social-profiles-btn-wrap"></div>
                    <div class="buttons">
                        <a href="#" id="add-new-author-social-btn" class="button button-secondary"><?php _e( 'Add new social button', 'pinkbutterflies' ); ?></a>
                    </div>
                    <script type="text/html" id="tmpl-prt-author-social-new">
                        <div>
                            <select class="social-dropdown">
                                <# var addedArr = data.addedProfiles; #>
                                <option value="default"><?php _e( '-- Select --', 'pinkbutterflies' ); ?></option>
                                <# _.each(data.profiles, function(val, key, profile){ #>
                                    <# if( !_.contains( addedArr, val.icon ) ){ #>
                                    <option value="{{ val.icon }}">{{ val.name }}</option>
                                    <# } #>
                                <# }); #>
                            </select>
                            <input type="text" placeholder="Copy your profile URL here" class="url" />
                            <a href="#" class="button button-secondary save-new-btn"><?php _e( 'Save', 'pinkbutterflies' ); ?></a>
                            <a href="#" class="button button-secondary cancel-new-btn"><?php _e( 'Cancel', 'pinkbutterflies' ); ?></a>
                        </div>
                    </script>
                    <script type="text/html" id="tmpl-prt-author-social">
                        <div class="prt-author-social-btn-div" style="margin-bottom:10px;">
                            <span data-icon="{{data.icon}}"><i class="fab fa-{{ data.icon }}"></i></span>
                            <input type="text" class="prt_author_social_edit" value="{{ data.val }}" />
                            <a href="#" class="button button-secondary delete-btn"><?php _e( 'Delete', 'pinkbutterflies' ); ?></a>
                            <input type="hidden" name="prt_author_social[]" value="{{ data.icon }},{{ data.val }}" />
                        </div>
                    </script>
                </td>
            </tr>

        </table>

        <?php
    } // end function extra_fields()

    // save extra fields
    public function save_extra_fields( $user_id ){

      if ( !current_user_can( 'edit_user', $user_id ) ){
          return false;
      }

      update_user_meta( $user_id, 'prt_pb_author_image', filter_input(INPUT_POST, 'prt_pb_author_image') );
      update_user_meta( $user_id, 'prt_pb_author_social', $_POST['prt_author_social'] );
      //update_user_meta( $user_id, 'prt_pb_author_social_val', filter_input(INPUT_POST, 'prt_author_social_val') );

    } // end function save_extra_fields()

    // author image upload script
    public function author_image_upload(){
        ?>
        <script>
            jQuery(document).ready( function($) {

                // Set all variables to be used in scope
                var frame,
                    addImgLink = $('#prt-pb-add-author-image-btn'),
                    delImgLink = $( '#prt-pb-remove-author-image-btn'),
                    imgContainer = $( '#prt-pb-author-image-preview'),
                    imgIdInput = $( '#prt_pb_author_image' );

                // ADD IMAGE LINK
                addImgLink.on( 'click',  function( event ){

                    event.preventDefault();

                    // If the media frame already exists, reopen it.
                    if ( frame ) {
                        frame.open();
                        return;
                    }

                    // Create a new media frame
                    frame = wp.media({
                        title: 'Select or Upload Media',
                        button: {
                          text: 'Use this media'
                        },
                        multiple: false  // Set to true to allow multiple files to be selected
                    });


                    // When an image is selected in the media frame...
                    frame.on( 'select', function() {

                        // Get media attachment details from the frame state
                        var attachment = frame.state().get('selection').first().toJSON();

                        // Send the attachment URL to our custom image input field.
                        imgContainer.html( '<img src="'+attachment.url+'" alt="" style="max-width:200px;"/><br />' );

                        // Send the attachment id to our hidden input
                        imgIdInput.val( attachment.url );

                    });

                    // Finally, open the modal on click
                    frame.open();
                });

                // DELETE IMAGE LINK
                delImgLink.on( 'click',  function( event ){

                    event.preventDefault();

                    // Clear out the preview image
                    imgContainer.html( '' );

                    // Delete the image id from the hidden input
                    imgIdInput.val( '' );

                });

            });
        </script>
        <?php
    } // end function author_image_upload()

    // author social profiles
    public function author_social_profiles(){
        ?>
        <script>
            jQuery(document).ready( function($){

                var templateNew = wp.template('prt-author-social-new'),
                    template = wp.template('prt-author-social'),
                    addNewBtn = $('#add-new-author-social-btn'),
                    wrapper = $('#social-profiles-wrap'),
                    btnWrapper = $('#social-profiles-btn-wrap');

                var socialArr = [
                    { "name": "Angellist", "icon": "angellist" },
                    { "name": "Behance", "icon": "behance" },
                    { "name": "CodePen", "icon": "codepen" },
                    { "name": "Delicious", "icon": "delicious" },
                    { "name": "DeviantArt", "icon": "deviantart" },
                    { "name": "Digg", "icon": "digg" },
                    { "name": "Dribbble", "icon": "dribbble" },
                    { "name": "Facebook", "icon": "facebook-f" },
                    { "name": "Flickr", "icon": "flickr" },
                    { "name": "Github", "icon": "github" },
                    { "name": "Google +", "icon": "google-plus-g" },
                    { "name": "Instagram", "icon": "instagram" },
                    { "name": "JSFiddle", "icon": "jsfiddle" },
                    { "name": "Linkedin", "icon": "linkedin" },
                    { "name": "Pinterest", "icon": "pinterest-p" },
                    { "name": "QQ", "icon": "qq" },
                    { "name": "Reddit", "icon": "reddit" },
                    { "name": "Scribd", "icon": "scribd" },
                    { "name": "Skype", "icon": "skype" },
                    { "name": "Snapchat", "icon": "snapchat" },
                    { "name": "SoundCloud", "icon": "soundcloud" },
                    { "name": "Spotify", "icon": "spotify" },
                    { "name": "Stack Overflow", "icon": "stack-overflow" },
                    { "name": "Steam", "icon": "steam" },
                    { "name": "StumbleUpon", "icon": "stumbleupon" },
                    { "name": "Tumblr", "icon": "tumblr" },
                    { "name": "Twitch", "icon": "twitch" },
                    { "name": "Twitter", "icon": "twitter" },
                    { "name": "Vimeo", "icon": "vimeo" },
                    { "name": "Vine", "icon": "vine" },
                    { "name": "Xing", "icon": "xing" },
                    { "name": "Youtube", "icon": "youtube" }
                ];
                var addedArr = getAddedProfiles();

                function getAddedProfiles(){
                    if( wrapper.find('.prt-author-social-btn-div') ){
                        var arr = [];
                        wrapper.find('.prt-author-social-btn-div').each(function(){
                            var icon = $(this).find('span[data-icon]').attr('data-icon');
                            if(icon !== ''){
                                arr.push(icon);
                            }
                        });
                        return arr;
                    }else{
                        return [];
                    }
                }

                addNewBtn.on('click', function(e){
                    e.preventDefault();

                    btnWrapper.html( templateNew({ profiles: socialArr, addedProfiles: addedArr }) );
                    $(this).hide();
                });

                btnWrapper.on('click', '.save-new-btn', function(e){

                    e.preventDefault();

                    var social = $(this).siblings('.social-dropdown').val(),
                        url = $(this).siblings('.url').val()
                        newSocial = $( template({ icon: social, val: url }) );

                    if( social !== 'default' && social !== '' ){
                        wrapper.append( newSocial );
                        btnWrapper.html( '' );

                        addNewBtn.show();
                        addedArr.push(social);
                    }

                });

                btnWrapper.on('click', '.cancel-new-btn', function(e){

                    e.preventDefault();

                    $(this).parent().remove();
                    addNewBtn.show();

                });

                wrapper.on('click', '.delete-btn', function(e){

                    e.preventDefault();

                    $(this).parent().remove();
                    var social = $(this).siblings('span').attr('data-icon');
                    var index = addedArr.indexOf(social);
                    if (index > -1) {
                        addedArr.splice(index, 1);
                    }
                    btnWrapper.html( '' );

                    addNewBtn.show();

                });

                wrapper.on('change', '.prt_author_social_edit', function(){
                    var url = $(this).val();
                    var value = $(this).siblings('span').attr('data-icon');
                    $(this).siblings('input[type="hidden"]').val( value + ',' + url );
                });

            });
        </script>
        <?php
    }

} // end class

$prt_PB_user_fields = new PRT_PB_User_Fields;
