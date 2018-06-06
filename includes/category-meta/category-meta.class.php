<?php

class PRT_PB_Category_Custom_Meta{

    public function __construct(){

        add_action( 'category_add_form_fields', array( $this, 'add' ), 10, 2 );
        add_action( 'category_edit_form_fields', array( $this, 'edit' ), 10, 2 );
        add_action( 'create_category', array( $this, 'save' ), 10, 2 );
        add_action( 'edited_category', array( $this, 'update' ), 10, 2 );
        add_action( 'admin_footer', array( $this, 'upload' ) );

    }

    // add new field to add category screen
    public function add(){

        ?>
        <div class="form-field" id="prt-pb-category-image">
            <h4><?php _e( 'Image', 'pinkbutterflies' ); ?></h4>
            <input type="hidden" name="prt_pb_category_image" id="prt_pb_category_image" value="" />
            <div id="category-image-preview"></div>
            <div>
                <a href="#" id="prt-pb-category-add-image-btn" class="button button-secondary add-category-image-button"><?php _e( 'Add Image', 'pinkbutterflies' ); ?></a>
                <a href="#" id="prt-pb-category-remove-image-btn" class="button button-secondary remove-category-image-button"><?php _e( 'Remove Image', 'pinkbutterflies' ); ?></a>
            </div>
            <p class="description"><?php _e( 'Choose an image for this category.', 'pinkbutterflies' ); ?></p>
        </div>
        <div class="form-field">
            <h4><?php _e( 'Version', 'pinkbutterflies' ); ?></h4>
            <label><input type="radio" name="prt_pb_category_version" value="v1" checked />
            <span><?php _e( 'Version 1', 'pinkbutterflies' ); ?></span></label>
            <label><input type="radio" name="prt_pb_category_version" value="v2" />
            <span><?php _e( 'Version 2', 'pinkbutterflies' ); ?></span></label>
        </div>
        <?php

    }

    // add new field to edit category screen
    public function edit( $term ){

        $image_value = get_term_meta( $term->term_id, 'prt_pb_category_image', true );
        $version = get_term_meta( $term->term_id, 'prt_pb_category_version', true );

        ?>
        <tr class="form-field" id="prt-pb-category-image">
            <th>
                <label for="prt_pb_category_image"><?php _e( 'Image', 'pinkbutterflies' ); ?></label>
            </th>
            <td>
                <input type="hidden" name="prt_pb_category_image" id="prt_pb_category_image" value="<?php echo $image_value; ?>" />
                <div id="category-image-preview">
                    <?php if ( $image_value ) { ?>
                        <img src="<?php echo $image_value; ?>" alt="" style="max-width: 200px;" />
                    <?php } ?>
                </div>
                <div>
                    <a href="#" class="button button-secondary add-category-image-button"><?php _e( 'Add Image', 'pinkbutterflies' ); ?></a>
                    <a href="#" class="button button-secondary remove-category-image-button"><?php _e( 'Remove Image', 'pinkbutterflies' ); ?></a>
                </div>
                <p class="description"><?php _e( 'Choose an image for this category.', 'pinkbutterflies' ); ?></p>
                <p class="description"><?php _e( 'Only available in Version 1.', 'pinkbutterflies' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th>
                <h4><?php _e( 'Version', 'pinkbutterflies' ); ?></h4>
            </th>
            <td>
                <label><input type="radio" name="prt_pb_category_version" value="v1" <?php checked( $version, 'v1' ); ?> />
                <span><?php _e( 'Version 1', 'pinkbutterflies' ); ?></span></label><br />
                <label><input type="radio" name="prt_pb_category_version" value="v2" <?php checked( $version, 'v2' ); ?> />
                <span><?php _e( 'Version 2', 'pinkbutterflies' ); ?></span></label>
            </td>
        </tr>
        <?php

    }

    // save new field
    public function save( $id ){

        if( isset( $_POST['prt_pb_category_image'] ) && '' !== $_POST['prt_pb_category_image'] ){
            $image = $_POST['prt_pb_category_image'];
            add_term_meta( $id, 'prt_pb_category_image', $image, true );
        }

        if( isset( $_POST['prt_pb_category_version'] ) && '' !== $_POST['prt_pb_category_version'] ){
            $version = $_POST['prt_pb_category_version'];
            add_term_meta( $id, 'prt_pb_category_version', $version, true );
        }

    }

    // update new field
    public function update( $term_id ){

        if( isset( $_POST['prt_pb_category_image'] ) && '' !== $_POST['prt_pb_category_image'] ){
            $image = $_POST['prt_pb_category_image'];
            update_term_meta ( $term_id, 'prt_pb_category_image', $image );
        }else{
            update_term_meta ( $term_id, 'prt_pb_category_image', '' );
        }

        if( isset( $_POST['prt_pb_category_version'] ) && '' !== $_POST['prt_pb_category_version'] ){
            $version = $_POST['prt_pb_category_version'];
            update_term_meta ( $term_id, 'prt_pb_category_version', $version );
        }else{
            update_term_meta ( $term_id, 'prt_pb_category_version', '' );
        }

    }

    // upload image script
    public function upload(){
        ?>
        <script>
            jQuery(document).ready( function($) {

                // Set all variables to be used in scope
                var frame,
                    metaBox = $('#prt-pb-category-image'), // Your meta box id here
                    addImgLink = $('.add-category-image-button'),
                    delImgLink = $( '.remove-category-image-button'),
                    imgContainer = $( '#category-image-preview'),
                    imgIdInput = $( '#prt_pb_category_image' );

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
                        title: 'Select or Upload Media Of Your Chosen Persuasion',
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
                        imgContainer.html( '<img src="'+attachment.url+'" alt="" style="max-width:200px;"/>' );

                        // Send the attachment id to our hidden input
                        imgIdInput.val( attachment.url );

                        // Hide the add image link
                        addImgLink.addClass( 'hidden' );

                        // Unhide the remove image link
                        delImgLink.removeClass( 'hidden' );
                    });

                    // Finally, open the modal on click
                    frame.open();
                });

                // DELETE IMAGE LINK
                delImgLink.on( 'click',  function( event ){

                    event.preventDefault();

                    // Clear out the preview image
                    imgContainer.html( '' );

                    // Un-hide the add image link
                    addImgLink.removeClass( 'hidden' );

                    // Hide the delete image link
                    delImgLink.addClass( 'hidden' );

                    // Delete the image id from the hidden input
                    imgIdInput.val( '' );

                });

            });
        </script>
        <?php
    }

}

$prtPB_CategoryCustomMeta = new PRT_PB_Category_Custom_Meta;
