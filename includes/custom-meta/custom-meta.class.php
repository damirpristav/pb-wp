<?php

interface PRT_PB_Custom_Meta_Interface{

    public function add();
    public function display( $post );
    public function save( $post_id );

}

// Featured Post Custom Meta
class PRT_PB_Custom_Meta_Featured_Post implements PRT_PB_Custom_Meta_Interface{

    private $prefix = 'prt_pb_';

    public function __construct(){

        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        add_action( 'save_post', array( $this, 'save' ) );

    }

    public function add(){

        add_meta_box(
            $this->prefix . 'featured_post_meta_box',
            __( 'Featured Post', 'pinkbutterflies' ),
            array( $this, 'display' ),
            'post',
            'side',
            'default',
            null
        );

    }

    public function display( $post ){

      wp_nonce_field( basename( __FILE__ ), $this->prefix . 'featured_post_nonce' );

      $key = $this->prefix . 'featured_post_field';
      $value = get_post_meta($post->ID, $this->prefix . 'featured_post_field', true);
      ?>
      <h4><?php _e( 'Add post to featured slider ?', 'pinkbutterflies' ); ?></h4>
      <p>
          <input type="radio" name="<?php echo $key; ?>" value="0" checked <?php checked( $value, '0' ); ?> />
          <span><?php _e( 'No', 'pinkbutterflies' ); ?></span><br />
          <input type="radio" name="<?php echo $key; ?>" value="1" <?php checked( $value, '1' ); ?> />
          <span><?php _e( 'Yes', 'pinkbutterflies' ); ?></span>
      </p>
      <?php

    }

    public function save( $post_id ){

        if( !isset( $_POST[$this->prefix . 'featured_post_nonce'] ) || !wp_verify_nonce( $_POST[$this->prefix . 'featured_post_nonce'], basename( __FILE__ ) ) ){
            return;
        }

        if( !current_user_can( 'edit_post', $post_id ) ){
            return;
        }

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
            return;
        }

        if( isset( $_POST[$this->prefix . 'featured_post_field'] ) ){
            update_post_meta( $post_id, $this->prefix . 'featured_post_field', sanitize_text_field( $_POST[$this->prefix . 'featured_post_field'] ) );
        }

    }


}
$prtPB_FeaturedPostMeta = new PRT_PB_Custom_Meta_Featured_Post;

// Single Post Version Custom Meta
class PRT_PB_Custom_Meta_Single_Post_Version implements PRT_PB_Custom_Meta_Interface{

    private $prefix = 'prt_pb_';

    public function __construct(){

        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        add_action( 'save_post', array( $this, 'save' ) );

    }

    public function add(){

        add_meta_box(
            $this->prefix . 'single_post_version_meta_box',
            __( 'Single Post Version', 'pinkbutterflies' ),
            array( $this, 'display' ),
            'post',
            'side',
            'default',
            null
        );

    }

    public function display( $post ){

        wp_nonce_field( basename( __FILE__ ), $this->prefix . 'single_post_version_nonce' );

        $key = $this->prefix . 'single_post_version_field';
        $value = get_post_meta($post->ID, $this->prefix . 'single_post_version_field', true);
        ?>
        <h4><?php _e( 'Choose single post version:', 'pinkbutterflies' ); ?></h4>
        <p>
            <label><input type="radio" name="<?php echo $key; ?>" value="v1" checked <?php checked( $value, 'v1' ); ?> />
            <span><?php _e( 'Version 1', 'pinkbutterflies' ); ?></span></label><br />
            <label><input type="radio" name="<?php echo $key; ?>" value="v2" <?php checked( $value, 'v2' ); ?> />
            <span><?php _e( 'Version 2', 'pinkbutterflies' ); ?></span></label><br />
            <label><input type="radio" name="<?php echo $key; ?>" value="v3" <?php checked( $value, 'v3' ); ?> />
            <span><?php _e( 'Version 3', 'pinkbutterflies' ); ?></span></label>
        </p>
        <?php

    }

    public function save( $post_id ){

        if( !isset( $_POST[$this->prefix . 'single_post_version_nonce'] ) || !wp_verify_nonce( $_POST[$this->prefix . 'single_post_version_nonce'], basename( __FILE__ ) ) ){
            return;
        }

        if( !current_user_can( 'edit_post', $post_id ) ){
            return;
        }

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
            return;
        }

        if( isset( $_POST[$this->prefix . 'single_post_version_field'] ) ){
            update_post_meta( $post_id, $this->prefix . 'single_post_version_field', sanitize_text_field( $_POST[$this->prefix . 'single_post_version_field'] ) );
        }

    }

}
$prtPB_SinglePostVersionMeta = new PRT_PB_Custom_Meta_Single_Post_Version;

// header version on single post or page
class PRT_PB_Custom_Meta_Single_Post_Header_Version implements PRT_PB_Custom_Meta_Interface{

    private $prefix = 'prt_pb_';

    public function __construct(){

        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        add_action( 'save_post', array( $this, 'save' ) );

    }

    public function add(){

        add_meta_box(
            $this->prefix . 'single_post_header_version_meta_box',
            __( 'Post/Page Header Version', 'pinkbutterflies' ),
            array( $this, 'display' ),
            array( 'post', 'page' ),
            'side',
            'default',
            null
        );

    }

    public function display( $post ){

        wp_nonce_field( basename( __FILE__ ), $this->prefix . 'single_post_header_version_nonce' );

        $key = $this->prefix . 'single_post_header_version_field';
        $value = get_post_meta($post->ID, $this->prefix . 'single_post_header_version_field', true);
        ?>
        <h4><?php _e( 'Choose this post/page header version:', 'pinkbutterflies' ); ?></h4>
        <p>
            <label><input type="radio" name="<?php echo esc_attr( $key ); ?>" value="v1" checked <?php checked( $value, 'v1' ); ?> />
            <span><?php _e( 'Version 1', 'pinkbutterflies' ); ?></span></label><br />
            <label><input type="radio" name="<?php echo esc_attr( $key ); ?>" value="v2" <?php checked( $value, 'v2' ); ?> />
            <span><?php _e( 'Version 2', 'pinkbutterflies' ); ?></span></label><br />
            <label><input type="radio" name="<?php echo esc_attr( $key ); ?>" value="v3" <?php checked( $value, 'v3' ); ?> />
            <span><?php _e( 'Version 3', 'pinkbutterflies' ); ?></span></label><br />
            <label><input type="radio" name="<?php echo esc_attr( $key ); ?>" value="v4" <?php checked( $value, 'v4' ); ?> />
            <span><?php _e( 'Version 4', 'pinkbutterflies' ); ?></span></label>
        </p>
        <?php

    }

    public function save( $post_id ){

        if( !isset( $_POST[$this->prefix . 'single_post_header_version_nonce'] ) || !wp_verify_nonce( $_POST[$this->prefix . 'single_post_header_version_nonce'], basename( __FILE__ ) ) ){
            return;
        }

        if( !current_user_can( 'edit_post', $post_id ) ){
            return;
        }

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
            return;
        }

        if( isset( $_POST[$this->prefix . 'single_post_header_version_field'] ) ){
            update_post_meta( $post_id, $this->prefix . 'single_post_header_version_field', sanitize_text_field( $_POST[$this->prefix . 'single_post_header_version_field'] ) );
        }

    }

}
$prtPB_SinglePostHeaderVersionMeta = new PRT_PB_Custom_Meta_Single_Post_Header_Version;
