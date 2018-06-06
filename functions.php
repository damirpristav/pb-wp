<?php

require_once( __DIR__ . '/includes/customizer/customizer.class.php' );
require_once( __DIR__ . '/includes/custom-meta/custom-meta.class.php' );
require_once( __DIR__ . '/includes/navigation/navigation.class.php' );
require_once( __DIR__ . '/includes/user-fields/user-fields.class.php' );
require_once( __DIR__ . '/includes/category-meta/category-meta.class.php' );
require_once( __DIR__ . '/includes/instagram/instagram.class.php' );
require_once( __DIR__ . '/includes/widgets/widgets.class.php' );
require_once( __DIR__ . '/includes/post-partials/post-partials.class.php' );
require_once( __DIR__ . '/includes/ajax-load-posts/ajax-load-posts.class.php' );
require_once( __DIR__ . '/includes/class-tgm-plugin-activation.php' );
require_once( __DIR__ . '/includes/helpers.php' );

class PRT_PinkButterflies{

    private $theme_name;
    protected $theme_short_name = 'prt_pb';
    private $theme_version;
    private static $theme_mod_arr = 'prt_pb_options';

    public function __construct(){

        $this->enqueue_styles_and_scripts();
        $this->theme_actions();
        $this->theme_filters();

        if ( ! isset( $content_width ) ) $content_width = 750;

    } // end __construct

    // enqueue styles and scripts
    public function enqueue_styles_and_scripts(){

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );

    } // end function enqueue_styles_and_scripts()

    // enqueue theme styles
    public function enqueue_styles(){

        wp_register_style( $this->theme_short_name . '_google_fonts', 'https://fonts.googleapis.com/css?family=Kaushan+Script|Merriweather:300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Shadows+Into+Light+Two' );
        wp_register_style( $this->theme_short_name . '_reset', get_template_directory_uri() . '/css/reset.css' );
        wp_register_style( $this->theme_short_name . '_font_awesome', get_template_directory_uri() . '/css/fontawesome-all.min.css' );
        wp_register_style( $this->theme_short_name . '_owl_carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
        wp_register_style( $this->theme_short_name . '_magnific_popup', get_template_directory_uri() . '/css/magnific-popup.css' );
        wp_register_style( $this->theme_short_name . '_animate', get_template_directory_uri() . '/css/animate.css' );
        wp_register_style( $this->theme_short_name . '_fonts', get_template_directory_uri() . '/css/theme-fonts.css' );
        wp_register_style( $this->theme_short_name . '_transitions', get_template_directory_uri() . '/css/theme-transitions.css' );
        wp_register_style( $this->theme_short_name . '_colors', get_template_directory_uri() . '/css/theme-colors.css' );
        wp_register_style( $this->theme_short_name . '_main', get_stylesheet_uri() );

        wp_enqueue_style( $this->theme_short_name . '_google_fonts' );
        wp_enqueue_style( $this->theme_short_name . '_reset' );
        wp_enqueue_style( $this->theme_short_name . '_font_awesome' );
        wp_enqueue_style( $this->theme_short_name . '_owl_carousel' );
        wp_enqueue_style( $this->theme_short_name . '_magnific_popup' );
        wp_enqueue_style( $this->theme_short_name . '_animate' );
        wp_enqueue_style( $this->theme_short_name . '_fonts' );
        wp_enqueue_style( $this->theme_short_name . '_transitions' );
        wp_enqueue_style( $this->theme_short_name . '_colors' );
        wp_enqueue_style( $this->theme_short_name . '_main' );

    } // end function enqueue_styles()

    // enqueue theme js files
    public function enqueue_scripts(){

        wp_register_script( $this->theme_short_name . '_owl_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true );
        wp_register_script( $this->theme_short_name . '_fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '', true );
        wp_register_script( $this->theme_short_name . '_magnific_popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
        wp_register_script( $this->theme_short_name . '_main', get_template_directory_uri() . '/js/main.js', array('jquery', 'masonry'), '', true );

        wp_enqueue_script( $this->theme_short_name . '_owl_carousel' );
        wp_enqueue_script( $this->theme_short_name . '_fitvids' );
        wp_enqueue_script( $this->theme_short_name . '_magnific_popup' );
        wp_enqueue_script( $this->theme_short_name . '_main' );

        // ** Ajax Load Gallery Images **
        wp_enqueue_script( $this->theme_short_name . '_gallery_load_images',  get_template_directory_uri() . '/js/load-gallery-images.js', array( 'jquery', 'masonry' ), '', true );
        wp_localize_script( $this->theme_short_name . '_gallery_load_images', 'pb_load_gallery_images', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'ajax_nonce' => wp_create_nonce('pb-load-gallery-images-nonce')
        ));

        // add script if lt IE 9
        wp_enqueue_script( 'html5shiv', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js' );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    } // end function enqueue_scripts()

    // admin enqueue
    public function admin_enqueue(){

        global $pagenow;

        if( $pagenow === 'profile.php' ){
            wp_enqueue_media();
            wp_register_style( $this->theme_short_name . '_font_awesome_admin', get_template_directory_uri() . '/css/fontawesome-all.min.css' );
            wp_enqueue_style( $this->theme_short_name . '_font_awesome_admin' );
            wp_register_style( $this->theme_short_name . '_user_profile_admin', get_template_directory_uri() . '/css/admin/user-profile.css' );
            wp_enqueue_style( $this->theme_short_name . '_user_profile_admin' );
        }

        if( $pagenow === 'term.php' ){
            wp_enqueue_media();
        }

    } // end function admin_enqueue()

    // theme actions
    public function theme_actions(){

        add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
        add_action( 'widgets_init', array( $this, 'register_sidebar' ) );
        add_action( 'wp_ajax_load_gallery_images', array( $this, 'load_gallery_images' ) );
        add_action( 'wp_ajax_nopriv_load_gallery_images', array( $this, 'load_gallery_images' ) );
        add_action( 'wp_dashboard_setup', array( $this, 'support_dashboard_widget' ) );
        add_action( 'admin_init', array( $this, 'add_editor_styles' ) );
        add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
        add_action( 'pt-ocdi/after_import',  array( $this, 'ocdi_after_import_setup' ) );

    } // end function theme_actions()

    // theme filters
    public function theme_filters(){

        add_filter( 'next_posts_link_attributes', array( 'PRT_PB_Navigation', 'next_posts_link_atts' ) );
        add_filter( 'previous_posts_link_attributes', array( 'PRT_PB_Navigation', 'prev_posts_link_atts' ) );
        add_filter( 'pt-ocdi/import_files', array( $this, 'ocdi_import_files' ) );

    } // end function theme_filters()

    // theme setup
    public function theme_setup(){

        add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
        add_theme_support( 'title-tag' );
        add_theme_support( 'menus' );

        add_image_size( 'standard', 750, 504, true );
        add_image_size( 'grid', 720, 480, true );
        add_image_size( 'list', 750, 480, true );
        add_image_size( 'recent-thumb', 96, 96, true );

        register_nav_menus( array(
            'main_menu' => __( 'Primary Menu', 'pinkbutterflies' ),
            'top_menu' => __( 'Top Menu - only in header version 3', 'pinkbutterflies' )
        ));

        load_theme_textdomain( 'pinkbutterflies', get_template_directory() . '/lang' );

    } // end function theme_setup()

    // register sidebar
    public function register_sidebar(){

        $before_widget = '<div id="%1$s" class="widget %2$s">';
        $after_widget = '</div>';
        $before_title = '<h6 class="widget-title">';
        $after_title = '</h6>';

        register_sidebar(
            array(
                'name' => __( 'Sidebar', 'pinkbutterflies' ),
                'id' => 'sidebar',
                'description' => __( 'Main widgets area.', 'pinkbutterflies' ),
                'before_widget' => $before_widget,
                'after_widget' => $after_widget,
                'before_title' => $before_title,
                'after_title' => $after_title
            )
        );

    } // end function register_sidebar()

    // get header
    public static function get_theme_header(){

        $pb_theme_options = self::get_theme_options();

        if( $pb_theme_options && array_key_exists( 'header_version', $pb_theme_options ) ){

           $pb_header_version = $pb_theme_options['header_version'];

           if( $pb_header_version == 'v4' ){
               get_header('v4');
           }elseif( $pb_header_version == 'v3' ){
               get_header('v3');
           }elseif( $pb_header_version == 'v2' ){
               get_header('v2');
           }else{
               get_header();
           }

        }else{

            get_header();

        }

    } // end function get_theme_header()

    // get theme options
    public static function get_theme_options(){

        $theme_mods = get_theme_mod( self::$theme_mod_arr );
        $prt_pb_mod = array();

        if( is_array( $theme_mods ) && !empty( $theme_mods ) ){
            // $prt_pb_mods = $theme_mods[ self::$theme_mod_arr ];
            $prt_pb_mod = $theme_mods;
        }

        return $prt_pb_mod;

    } // end function get_theme_options()

    // get theme menu
    public static function get_theme_menu( $location, $class, $id, $depth, $container = false, $fallback = false ){

        $menu_args = array(
           'theme_location' => $location,
           'menu_class' => $class,
           'menu_id' => $id,
           'container' => $container,
           'depth' => $depth,
           'fallback_cb' => $fallback
        );

        wp_nav_menu( $menu_args );

    } // end function get_theme_menu()

    // get theme logo
    public static function get_theme_logo( $wrap = 'unwrap' ){

        $pb_theme_options = self::get_theme_options();
        $pb_logo = false;

        if( array_key_exists( 'logo', $pb_theme_options ) ){
           $pb_logo = $pb_theme_options['logo'];
        }

        PRT_PB_Post_Partials::get_logo( $pb_logo, $wrap );

    } // end function get_theme_logo()

    // get social icons
    public static function get_social_icons( $css_class = 'social' ){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'social_profiles', $pb_theme_options ) && !empty( $pb_theme_options['social_profiles'] ) ){

            $pb_social_icons = $pb_theme_options['social_profiles'];

            PRT_PB_Post_Partials::social_icons( $pb_social_icons, $css_class );

        }

    } // end function get_social_icons()

    // get featured slider
    public static function get_featured_slider(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'hide_slider', $pb_theme_options ) ){
            $hide_slider = $pb_theme_options['hide_slider'];
        }

        if( isset( $hide_slider ) && !$hide_slider ){
            if( array_key_exists( 'slider_version', $pb_theme_options ) ){

               $pb_slider_version = $pb_theme_options['slider_version'];

               if( $pb_slider_version == 'v4' ){
                   PRT_PB_Post_Partials::featured_slider4();
               }elseif( $pb_slider_version == 'v3' ){
                   PRT_PB_Post_Partials::featured_slider3();
               }elseif( $pb_slider_version == 'v2' ){
                   PRT_PB_Post_Partials::featured_slider2();
               }else{
                   PRT_PB_Post_Partials::featured_slider();
               }

            }else{

                PRT_PB_Post_Partials::featured_slider();

            }
        }


    } // end function get_featured_slider()

    // get post title
    public static function get_post_title( $ajax = '' ){

        PRT_PB_Post_Partials::post_title( $ajax );

    } // end get_post_title()

    // get post title
    public static function get_post_title_sg_grid(){

        PRT_PB_Post_Partials::post_title_sg_grid();

    } // end get_post_title_sg_grid()

    // get featured image
    public static function get_featured_image( $size = 'standard', $ajax = '' ){

        PRT_PB_Post_Partials::featured_image( $size, $ajax );

    } // end get_featured_image()

    // get featured audio
    public static function get_featured_audio( $ajax = '' ){

        PRT_PB_Post_Partials::featured_audio( $ajax );

    } // end get_featured_video()

    // get featured video
    public static function get_featured_video( $ajax = '' ){

        PRT_PB_Post_Partials::featured_video( $ajax );

    } // end get_featured_video()

    // get featured gallery
    public static function get_featured_gallery( $size = 'standard', $ajax = '' ){

        PRT_PB_Post_Partials::featured_gallery( $size, $ajax );

    } // end get_featured_gallery()

    // get single post featured area
    public static function get_single_post_featured_area( $post_id ){

        $single_post_version = get_post_meta( $post_id, 'prt_pb_single_post_version_field', true );
        $show_featured_area = false;

        if( isset( $single_post_version ) && !empty( $single_post_version ) ){
            if( $single_post_version === 'v3' || $single_post_version === 'v2' ){
                $show_featured_area = true;
            }
        }


        if( has_post_format('gallery') ){
            self::get_featured_gallery();
        }else{
            if( $show_featured_area ){
                self::get_featured_image();
            }
        }

    } // end get_single_post_featured_area()

    // get featured bg image
    public static function get_featured_bg_image(){

        $pb_theme_options = self::get_theme_options();
        $default_image = get_template_directory_uri() . '/images/404-image.jpg';

        if( array_key_exists( 'default_bg_image_single', $pb_theme_options ) ){
            $default_image = $pb_theme_options['default_bg_image_single'];
        }

        if( has_post_thumbnail() ){
            echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"';
        }else{
            echo 'style="background-image: url(' . $default_image . ');"';
        }

    } // end get_featured_bg_image()

    // get default category bg image
    public static function get_default_category_bg_image(){

        $pb_theme_options = self::get_theme_options();
        $default_image = get_template_directory_uri() . '/images/404-image.jpg';

        if( array_key_exists( 'default_bg_image_category_v1', $pb_theme_options ) ){
            $default_image = $pb_theme_options['default_bg_image_category_v1'];
        }

        return $default_image;

    } // end get_default_category_bg_image()

    // get single post content
    public static function get_single_post_content(){

        PRT_PB_Post_Partials::single_post_content();

    } // end get_single_post_content()

    // get post categories
    public static function get_post_categories( $ajax = '' ){

      $pb_theme_options = self::get_theme_options();
      $hide_categories = false;
      $grid_layout = self::is_layout_grid();

      if( is_single() ){
          if( array_key_exists( 'hide_categories_single', $pb_theme_options ) ){
              $hide_categories = $pb_theme_options['hide_categories_single'];
          }
      }else{
          if( array_key_exists( 'hide_categories', $pb_theme_options ) ){
              $hide_categories = $pb_theme_options['hide_categories'];
          }
      }

      if( !$hide_categories ){
          PRT_PB_Post_Partials::post_categories( $grid_layout, $ajax );
      }

    } // end get_single_post_categories()

    // get post meta( date & author )
    public static function get_post_meta(){

        $pb_theme_options = self::get_theme_options();
        $hide_post_meta = false;

        if( is_single() ){
            if( array_key_exists( 'hide_post_meta_single', $pb_theme_options ) ){
                $hide_post_meta = $pb_theme_options['hide_post_meta_single'];
            }
        }else{
            if( array_key_exists( 'hide_post_meta', $pb_theme_options ) ){
                $hide_post_meta = $pb_theme_options['hide_post_meta'];
            }
        }

        if( !$hide_post_meta ){
            PRT_PB_Post_Partials::post_meta();
        }

    } // end function get_post_meta()

    // get number of comments
    public static function get_number_of_comments(){

        $pb_theme_options = self::get_theme_options();
        $hide_post_comments = false;

        if( is_single() ){
            if( array_key_exists( 'hide_post_comments_single', $pb_theme_options ) ){
                $hide_post_comments = $pb_theme_options['hide_post_comments_single'];
            }
        }else{
            if( array_key_exists( 'hide_post_comments', $pb_theme_options ) ){
                $hide_post_comments = $pb_theme_options['hide_post_comments'];
            }
        }

        if( !$hide_post_comments ){
            PRT_PB_Post_Partials::number_of_comments();
        }

    } // end function get_post_share_buttons()

    // get post share buttons
    public static function get_post_share_buttons(){

        $pb_theme_options = self::get_theme_options();
        $hide_share_buttons = false;

        if( is_single() ){
            if( array_key_exists( 'hide_post_share_single', $pb_theme_options ) ){
                $hide_share_buttons = $pb_theme_options['hide_post_share_single'];
            }
        }else{
            if( array_key_exists( 'hide_post_share', $pb_theme_options ) ){
                $hide_share_buttons = $pb_theme_options['hide_post_share'];
            }
        }

        if( !$hide_share_buttons ){
            PRT_PB_Post_Partials::post_share_buttons();
        }

    } // end function get_post_share_buttons()

    // get read more button
    public static function get_read_more_button( $ajax = '' ){

        $pb_theme_options = self::get_theme_options();
        $hide_read_more = false;

        if( array_key_exists( 'hide_read_more', $pb_theme_options ) ){
            $hide_read_more = $pb_theme_options['hide_read_more'];
        }

        if( !$hide_read_more ){
            PRT_PB_Post_Partials::read_more_button( $ajax );
        }

    }

    // if hidden number of comments & share buttons on single post
    public static function is_hidden_comments_and_share(){

        $pb_theme_options = self::get_theme_options();
        $hide_post_comments = false;
        $hide_share_buttons = false;

        if( array_key_exists( 'hide_post_comments_single', $pb_theme_options ) ){
            $hide_post_comments = $pb_theme_options['hide_post_comments_single'];
        }
        if( array_key_exists( 'hide_post_share_single', $pb_theme_options ) ){
            $hide_share_buttons = $pb_theme_options['hide_post_share_single'];
        }

        if( $hide_post_comments && $hide_share_buttons ){
            return true;
        }else{
            return false;
        }

    } // end is_hidden_comments_and_share()

    // if hidden number of comments & share buttons on single post
    public static function is_hidden_comments_read_more_and_share(){

        $pb_theme_options = self::get_theme_options();
        $hide_post_comments = false;
        $hide_share_buttons = false;
        $hide_read_more = false;

        if( array_key_exists( 'hide_post_comments', $pb_theme_options ) ){
            $hide_post_comments = $pb_theme_options['hide_post_comments'];
        }
        if( array_key_exists( 'hide_post_share', $pb_theme_options ) ){
            $hide_share_buttons = $pb_theme_options['hide_post_share'];
        }
        if( array_key_exists( 'hide_read_more', $pb_theme_options ) ){
            $hide_read_more = $pb_theme_options['hide_read_more'];
        }

        if( $hide_post_comments && $hide_share_buttons && $hide_read_more ){
            return true;
        }else{
            return false;
        }

    } // end is_hidden_comments_and_share()

    // get the excerpt
    public static function get_the_excerpt( $new_length = 20, $new_more = "..." ){

        add_filter('excerpt_length', function () use ($new_length) {
            return $new_length;
        }, 999);

        add_filter('excerpt_more', function () use ($new_more) {
            return $new_more;
        });

        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
        $output = '<p>' . $output . '</p>';
        echo $output;

    } // end function get_the_excerpt()

    // get tags
    public static function get_tags(){

        $pb_theme_options = self::get_theme_options();
        $hide_post_tags = false;

        if( array_key_exists( 'hide_post_tags', $pb_theme_options ) ){
            $hide_post_tags = $pb_theme_options['hide_post_tags'];
        }

        if( !$hide_post_tags ){
            PRT_PB_Post_Partials::post_tags();
        }

    } // end function get_tags()

    // get post
    public static function get_posts(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) ){

            if( self::is_layout_standard() ){

                get_template_part( 'partials/content', get_post_format() );
                //PRT_PB_Templates::related_posts( get_the_ID() );

            }elseif( self::is_layout_grid() ){

                get_template_part( 'partials/grid/content', get_post_format() );

            }elseif( self::is_layout_masonry_v2() ){

                get_template_part( 'partials/masonry-v2/content', get_post_format() );

            }elseif( self::is_layout_list() ){

                get_template_part( 'partials/list/content', get_post_format() );

            }

        }else{

            get_template_part( 'partials/content', get_post_format() );
            //PRT_PB_Templates::related_posts( get_the_ID() );

        }

    } // end function get_posts()

		// get standard grid posts
		public static function get_standard_grid_posts(){

				$page_num = get_query_var('paged');
				$posts_per_page = get_option( 'posts_per_page' );

				?>
				<div class="posts-container posts-container-standard">
						<?php

						$args = array(
								'posts_per_page' => 1,
								'offset' => ( $page_num === 0 || $page_num === 1 ) ? 0 : ( $posts_per_page * $page_num ) - $posts_per_page + $page_num - 1,
						);

						$query = new WP_Query( $args );
						if( $query->have_posts() ){
								while( $query->have_posts() ){

										$query->the_post();
										get_template_part( 'partials/content', get_post_format() );

								}
						}else{

                get_template_part( 'partials/content', 'none' );

            }

						wp_reset_postdata();

						?>
				</div>

				<div class="posts-container posts-container-grid clearfix">
						<?php

						$args = array(
								'offset' => ( $page_num === 0 || $page_num === 1 ) ? 1 : ( $posts_per_page * $page_num ) - $posts_per_page + $page_num,
						);

						$query = new WP_Query( $args );
						if( $query->have_posts() ){
								while( $query->have_posts() ){

										$query->the_post();
										get_template_part( 'partials/grid/content', get_post_format() );

								}
						}

						wp_reset_postdata();

						?>
				</div>
				<?php

		}

    // get content wrap class
    public static function get_content_wrap_class(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) ){

            if( $layout === 'standard-s-left' || $layout === 'standard-grid-s-left' || $layout === 'grid-s-left' ||
                $layout === 'list-s-left' || $layout === 'masonry-s-left' ){

                echo 'class="sidebar-left"';

            }elseif( $layout === 'standard-no-s' || $layout === 'standard-grid-no-s' || $layout === 'list-no-s' ){

                echo 'class="no-sidebar"';

            }

        }

    } // end function get_content_wrap_class()

    // get main content class
    public static function get_main_content_class(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) ){

            if( $layout === 'masonry-full' || $layout === 'masonry-v2' || $layout === 'grid-full' ){
                echo 'class="column-12"';
            }else{
                echo 'class="column-8"';
            }

        }else{

            echo 'class="column-8"';

        }

    } // end function get_main_content_class()

    // get post container class
    public static function get_posts_container_class(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) ){

            if( $layout === 'list' || $layout === 'list-s-left' || $layout === 'list-no-s' ){
                echo 'class="posts-container posts-container-list clearfix"';
            }elseif( $layout === 'masonry-full' ){
                echo 'class="posts-container posts-container-masonry-full-v1 masonry-layout clearfix"';
            }elseif( $layout === 'masonry-v2' ){
                echo 'class="posts-container posts-container-masonry-full-v2 masonry-layout clearfix"';
            }elseif( $layout === 'masonry' || $layout === 'masonry-s-left' ){
                echo 'class="posts-container posts-container-masonry masonry-layout clearfix"';
            }elseif( $layout === 'grid' || $layout === 'grid-s-left' || $layout === 'grid-full' ){
                echo 'class="posts-container posts-container-grid clearfix"';
            }else{
                echo 'class="posts-container posts-container-standard"';
            }

        }else{

            echo 'class="posts-container posts-container-standard"';

        }

    } // end function get_posts_container_class()

    // if layout is standard
    public static function is_layout_standard(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) && !is_single() ){

            if( $layout === 'standard' || $layout === 'standard-s-left' || $layout === 'standard-no-s' ){
                return true;
            }else{
              return false;
            }

        }else{
            return false;
        }

    } // end is_layout_standard()

    // if standard - grid layouts
    public static function is_layout_standard_grid(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) && !is_single() && !is_archive() && !is_search() ){

            if( $layout === 'standard-grid' || $layout === 'standard-grid-s-left' || $layout === 'standard-grid-no-s' ){
                return true;
            }else{
              return false;
            }

        }else{
            return false;
        }

    } // end function is_layout_standard_grid()

    // if layout is grid or masonry
    public static function is_layout_grid(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) && !is_single() ){

            if( $layout === 'grid' || $layout === 'grid-s-left' || $layout === 'grid-full' || $layout === 'masonry' ||
                   $layout === 'masonry-s-left' || $layout === 'masonry-full' ){
                return true;
            }else{
              return false;
            }

        }else{
            return false;
        }

    } // end is_layout_grid()

    // if layout is list
    public static function is_layout_list(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) && !is_single() ){

            if( $layout === 'list' || $layout === 'list-s-left' || $layout === 'list-no-s' ){
                return true;
            }else{
              return false;
            }

        }else{
            return false;
        }

    } // end is_layout_list()

    // if layout is masonry v2
    public static function is_layout_masonry_v2(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) && !is_single() ){

            if( $layout === 'masonry-v2' ){
                return true;
            }else{
              return false;
            }

        }else{
            return false;
        }

    } // end is_layout_masonry_v2()

    // check for gutter
    public static function check_for_gutter(){

        $pb_theme_options = self::get_theme_options();

        if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
            $layout = $pb_theme_options['blog_layout'];
        }

        if( isset( $layout ) ){

            if( $layout === 'masonry' || $layout === 'masonry-s-left' || $layout === 'masonry-full' || $layout === 'masonry-v2' ){

                echo '<div class="gutter"></div>';

            }

        }

    } // end function check_for_gutter()

    // get sidebar
    public static function get_theme_sidebar(){

      $pb_theme_options = self::get_theme_options();

      if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
          $layout = $pb_theme_options['blog_layout'];
      }

      if( isset( $layout ) ){

          if( $layout != 'standard-no-s' && $layout != 'standard-grid-no-s' && $layout != 'grid-full' &&
              $layout != 'list-no-s' && $layout != 'masonry-full' && $layout != 'masonry-v2' ){

              get_sidebar();

          }

      }else{

          get_sidebar();

      }

    } // end function get_sidebar()

    // get single post
    public static function get_single_post( $post_id ){

        $single_post_version = get_post_meta( $post_id, 'prt_pb_single_post_version_field', true );

        if( isset( $single_post_version ) && !empty( $single_post_version ) ){
            if( $single_post_version === 'v3' ){
                get_template_part( 'partials/single/single', 'v3' );
            }elseif( $single_post_version === 'v2' ){
                get_template_part( 'partials/single/single', 'v2' );
            }else{
                get_template_part( 'partials/single/single', 'v1' );
            }
        }else{
            get_template_part( 'partials/single/single', 'v1' );
        }

    } // end function get_single_post()

    // get single post header
    public static function get_single_post_header( $post_id ){

        $post_header = get_post_meta( $post_id, 'prt_pb_single_post_header_version_field', true );

        if( isset( $post_header ) && !empty( $post_header ) ){
            if( $post_header === 'v4' ){
                get_header('v4');
            }elseif( $post_header === 'v3' ){
                get_header('v3');
            }elseif( $post_header === 'v2' ){
                get_header('v2');
            }else{
                get_header();
            }
        }else{
            get_header();
        }

    } // end function get_single_post_header()

    // get related posts
    public static function get_related_posts( $post_id ){

        $pb_theme_options = self::get_theme_options();
        $hide_related_posts = false;

        if( is_single() ){
            if( array_key_exists( 'hide_related_posts', $pb_theme_options ) ){
                $hide_related_posts = $pb_theme_options['hide_related_posts'];
            }
        }

        if( !$hide_related_posts ){
            PRT_PB_Post_Partials::related_posts( $post_id );
        }

    } // end get_related_posts()

    // get about author section
    public static function get_about_author_section(){

      $pb_theme_options = self::get_theme_options();
      $hide_about_author = false;

      if( is_single() ){
          if( array_key_exists( 'hide_about_author', $pb_theme_options ) ){
              $hide_about_author = $pb_theme_options['hide_about_author'];
          }
      }

      if( !$hide_about_author ){
          PRT_PB_Post_Partials::about_author();
      }

    } // end get_about_author_section()

    // get subscription section class
    public static function get_subscription_html_class(){

        $pb_theme_options = self::get_theme_options();
        $position = false;

        if( array_key_exists( 'subscription_position', $pb_theme_options ) ){
            $position = $pb_theme_options['subscription_position'];
        }

        if( is_singular() || is_archive() || is_search() ){

            echo 'class="bottom"';

        }else{

            if( $position ){

                if( $position === 'bottom' ){
                    echo 'class="bottom"';
                }

            }else{

                echo 'class="bottom"';

            }

        }

    } // end function get_subscription_html_class()

    // check subscription position
    public static function check_subscription_position(){

        $pb_theme_options = self::get_theme_options();
        $position = false;

        if( array_key_exists( 'subscription_position', $pb_theme_options ) ){
            $position = $pb_theme_options['subscription_position'];
        }

        if( $position ){
            if( $position === 'top' ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    } // end function check_subscription_position()

    // get subscription section
    public static function get_subscription_section(){

        $pb_theme_options = self::get_theme_options();
        $hide_subscription = false;

        if( is_singular() ){

            if( array_key_exists( 'hide_subscription_single', $pb_theme_options ) ){
                $hide_subscription = $pb_theme_options['hide_subscription_single'];
            }

            if( isset( $hide_subscription ) && !$hide_subscription ){
                PRT_PB_Post_Partials::subscribe_to_newsletter();
            }

        }elseif( is_archive() || is_search() ){

            if( array_key_exists( 'hide_subscription_archive', $pb_theme_options ) ){
                $hide_subscription = $pb_theme_options['hide_subscription_archive'];
            }

            if( isset( $hide_subscription ) && !$hide_subscription ){
                PRT_PB_Post_Partials::subscribe_to_newsletter();
            }

        }else{

            if( array_key_exists( 'hide_subscription', $pb_theme_options ) ){
                $hide_subscription = $pb_theme_options['hide_subscription'];
            }

            if( isset( $hide_subscription ) && !$hide_subscription ){
                PRT_PB_Post_Partials::subscribe_to_newsletter();
            }

        }

    }

    // get posts navigation
    public static function get_posts_navigation(){

        $pb_theme_options = self::get_theme_options();

        if( is_archive() || is_search() ){

            if( array_key_exists( 'nav_version_archive', $pb_theme_options ) ){

                $nav_version = $pb_theme_options['nav_version_archive'];

                if( $nav_version === 'v3' ){
                    PRT_PB_Navigation::posts_navigation_3();
                }elseif( $nav_version === 'v2' ){
                    PRT_PB_Navigation::posts_navigation_2();
                }else{
                    PRT_PB_Navigation::posts_navigation();
                }

            }else{

                PRT_PB_Navigation::posts_navigation();

            }

        }else{

            if( array_key_exists( 'nav_version', $pb_theme_options ) ){

                $nav_version = $pb_theme_options['nav_version'];

                if( $nav_version === 'v3' ){
                    PRT_PB_Navigation::posts_navigation_3();
                }elseif( $nav_version === 'v2' ){
                    PRT_PB_Navigation::posts_navigation_2();
                }else{
                    PRT_PB_Navigation::posts_navigation();
                }

            }else{

                PRT_PB_Navigation::posts_navigation();

            }

        }

    } // end function get_posts_navigation()

    // get footer text
    public static function get_footer_text(){

        $pb_theme_options = self::get_theme_options();
        $text = false;

        if( array_key_exists( 'footer_text', $pb_theme_options ) ){
            $text = $pb_theme_options['footer_text'];
        }

        PRT_PB_Post_Partials::footer_text( $text );

    }

    // get attachment info
    public static function wp_get_attachment_info( $attachment_id ) {

        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );

    }

    // load gallery images
    public function load_gallery_images(){

        $post_id = $_REQUEST['post_id'];
        $offset = $_REQUEST['offset'];
        $gallery = get_post_gallery( $post_id, false );
        $images = count( $gallery['src'] );
        $ids = explode( ',', $gallery['ids'] );

        $limit = $offset + 3;
        if( ( $offset + 3 ) > $images ){
            $limit = $images;
        }

        for( $i=$offset; $i<$limit; $i++ ):

          $img_info = self::wp_get_attachment_info( $ids[$i] );
          ?>

            <article class="my-photo">
                <img src="<?php echo esc_url( $gallery['src'][$i] ); ?>" alt="<?php echo esc_attr( $img_info['alt'] ); ?>">
                <div class="photo-overlay">
                    <div class="bg"></div>
                    <a href="<?php echo esc_url( $gallery['src'][$i] ); ?>" class="pb-gallery-popup" data-caption="<?php echo esc_attr( $img_info['alt'] ); ?>"><span></span></a>
                </div>
            </article><!-- end .my-photo -->

        <?php endfor;

        wp_die();

    } // end load gallery images

    // Support dashboard widget
    public function support_dashboard_widget(){

        wp_add_dashboard_widget( 'support_widget', __( 'PinkButterflies', 'pinkbutterflies' ), array( $this, 'support_widget_display' ) );

        // Globalize the metaboxes array, this holds all the widgets for wp-admin
        global $wp_meta_boxes;

        // Get the regular dashboard widgets array
        // (which has our new widget already but at the end)
        $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

        // Backup and delete our new dashboard widget from the end of the array
        $support_widget_backup = array( 'support_widget' => $normal_dashboard['support_widget'] );
        unset( $normal_dashboard['support_widget'] );

        // Merge the two arrays together so our widget is at the beginning
        $sorted_dashboard = array_merge( $support_widget_backup, $normal_dashboard );

        // Save the sorted array back into the original metaboxes
        $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;

    } // end support dashboard widget

    // Support widget display
    public function support_widget_display(){

        ?>

        <p style="text-align: center; padding: 10px;"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" style="max-width: 100%;" /></p>
        <p style="text-align: center;">
            <?php _e( 'Welcome to PinkButterflies!', 'pinkbutterflies' ); ?>
        </p>

        <?php

    } // end support widget display

    // add editor styles
    public function add_editor_styles(){

        add_editor_style('editor-style.css');

    } // end add editor styles

    // regsiter required plugins
    public function register_required_plugins(){

        $plugins = array(

            array(
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'source' => 'https://downloads.wordpress.org/plugin/contact-form-7.zip',
                'required' => false
            ),array(
                'name' => 'MailChimp for WordPress',
                'slug' => 'mailchimp-for-wp',
                'source' => 'https://downloads.wordpress.org/plugin/mailchimp-for-wp.zip',
                'required' => false
            ),array(
                'name' => 'One Click Demo Import',
                'slug' => 'one-click-demo-import',
                'source' => 'https://downloads.wordpress.org/plugin/one-click-demo-import.zip',
                'required' => true
            ),array(
                'name' => 'PRThemes Recipes',
                'slug' => 'prthemes-recipes',
                'source' => get_stylesheet_directory() . '/lib/plugins/prthemes-recipes.zip',
                'required' => false
            )

        );

        $config = array(
            'id' => 'tgmpa',
            'default_path' => '',
            'menu' => 'pinkbutterflies-install-plugins',
            'has_notices' => true,
            'is_automatic' => true,
            'message' => 'Please install this plugins.',
            'parent_slug'  => 'themes.php',
            'capability'   => 'edit_theme_options',
        );

        tgmpa( $plugins, $config );

    } // end register required plugins

    // Predefined import files
    public function ocdi_import_files() {
        return array(
            array(
                'import_file_name'             => 'Demo Import',
                'categories'                   => array( 'Main' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/pb-demo-content.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/pb-widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/pb-customizer.dat',
                //'import_preview_image_url'     => get_template_directory_uri() . '/ocdi/demo_preview.png',
                'import_notice'                => __( 'NOTICE: After you click Import Demo Data button, new posts, pages, widgets and options from our demo site will be added to your page but your old posts, pages and options won\'t be deleted. If you want your site to look exactly like our demo site first delete all posts and pages and remove all widgets from widgets areas.', 'pinkbutterflies' ),
            )
        );
    }

    // Set menus after import
    public function ocdi_after_import_setup() {
        // Assign menus to their locations.
        $primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
        $top_menu = get_term_by( 'name', 'Top Menu - only in header version 3', 'nav_menu' );
    
        set_theme_mod( 'nav_menu_locations', array(
                'main_menu' => $primary_menu->term_id,
                'top_menu' => $top_menu->term_id
            )
        );
    
    }

}

$prtPB = new PRT_PinkButterflies;

// remove shortcode from content if shortcode plugin is deleted
if( !shortcode_exists( 'prthemes_recipe' ) ){
    //add_shortcode( 'prthemes_recipe', '__return_false' );
}
