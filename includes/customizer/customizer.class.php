<?php

require_once( 'customizer-custom-controls.class.php' );
require_once( 'customizer-panels.class.php' );
require_once( 'customizer-sections.class.php' );
require_once( 'customizer-settings.class.php' );
require_once( 'customizer-css.class.php' );
require_once( 'sanitize.php' );

class PRT_PB_Customizer extends PRT_PinkButterflies{

    protected $prefix = 'prt_pb_';
    private $fonts = false;
    public $social_array = array(
        'angellist' => array( 'label' => 'Angellist' ),
        'behance' => array( 'label' => 'Behance' ),
        'codepen' => array( 'label' => 'CodePen' ),
        'delicious' => array( 'label' => 'Delicious' ),
        'deviantart' => array( 'label' => 'DeviantArt' ),
        'digg' => array( 'label' => 'Digg' ),
        'dribbble' => array( 'label' => 'Dribbble' ),
        'facebook-f' => array( 'label' => 'Facebook' ),
        'flickr' => array( 'label' => 'Flickr' ),
        'github' => array( 'label' => 'Github' ),
        'google-plus-g' => array( 'label' => 'Google +' ),
        'instagram' => array( 'label' => 'Instagram' ),
        'jsfiddle' => array( 'label' => 'JSFiddle' ),
        'linkedin' => array( 'label' => 'Linkedin' ),
        'pinterest-p' => array( 'label' => 'Pinterest' ),
        'qq' => array( 'label' => 'QQ' ),
        'reddit' => array( 'label' => 'Reddit' ),
        'scribd' => array( 'label' => 'Scribd' ),
        'skype' => array( 'label' => 'Skype' ),
        'snapchat' => array( 'label' => 'Snapchat' ),
        'soundcloud' => array( 'label' => 'SoundCloud' ),
        'spotify' => array( 'label' => 'Spotify' ),
        'stack-overflow' => array( 'label' => 'Stack Overflow' ),
        'steam' => array( 'label' => 'Steam' ),
        'stumbleupon' => array( 'label' => 'StumbleUpon' ),
        'tumblr' => array( 'label' => 'Tumblr' ),
        'twitch' => array( 'label' => 'Twitch' ),
        'twitter' => array( 'label' => 'Twitter' ),
        'vimeo' => array( 'label' => 'Vimeo' ),
        'vine' => array( 'label' => 'Vine' ),
        'xing' => array( 'label' => 'Xing' ),
        'youtube' => array( 'label' => 'Youtube' )
    );

    public function __construct(){

        add_action( 'customize_register', array( $this, 'register' ), 999 );
        add_action( 'customize_preview_init', array( $this, 'customizer_live_preview' ) );

    }

    // get fonts from json file
    public static function get_fonts(){

        $fileDir = get_template_directory() . '/assets/';
        $file = $fileDir . 'google_fonts.json';
        $cache_time = 86400 * 7;

        if( file_exists( $file ) && $cache_time < filemtime( $file ) ){

            $content = json_decode( wp_remote_fopen( get_template_directory_uri() . '/assets/google_fonts.json' ) );

            return $content->items;

        }else{

            return false;

        }

    } // end get_fonts()

    // remove properties that aren't needed
    public static function create_fonts_array(){

        $fonts = self::get_fonts();
        $new_fonts = array();

        foreach ( $fonts as $font_obj_key => $font_obj_val ) {

            unset( $font_obj_val->kind );
            unset( $font_obj_val->subsets );
            unset( $font_obj_val->version );
            unset( $font_obj_val->lastModified );
            unset( $font_obj_val->files );

            $new_fonts[$font_obj_key] = $font_obj_val;

        }

        return $new_fonts;

    } // end create_fonts_array()

    // get new fonts without removed properties
    public static function get_google_fonts(){

        return self::create_fonts_array();

    } // end get_google_fonts()

    // live preview
    public function customizer_live_preview(){

        wp_enqueue_script( 'pb-customize-live', get_template_directory_uri() . '/includes/customizer/js/theme-customize-live.js', array( 'jquery', 'customize-preview' ), '', true );

    } // end customizer_live_preview()

    // add panels, sections and settings
    public function register( $wp_customize ){

        $panels_obj   = new PRT_PB_Customizer_Panels;
        $sections_obj = new PRT_PB_Customizer_Sections;
        $settings_obj = new PRT_PB_Customizer_Settings;

        $panels   = $panels_obj->get_panels();
        $sections = $sections_obj->get_sections();
        $settings = $settings_obj->get_settings();

        foreach( $panels as $panel ){

            $wp_customize->add_panel( $panel['id'], array(
                'priority' => $panel['priority'],
                'capability' => $panel['capability'],
                'title' => $panel['title']
            ) );

        }

        foreach( $sections as $section ){

            $wp_customize->add_section(
                $section['id'],
                array(
                    'title' => $section['title'],
                    'priority' => $section['priority'],
                    'panel' => $section['panel'],
                )
            );

        }

        foreach( $settings as $setting ){

            $wp_customize->add_setting(
                $setting['id'],
                array(
                    'capability' => $setting['cap'],
                    'default' => $setting['default'],
                    'sanitize_callback' => $setting['sanitize'],
                    'transport' => $setting['transport']
                )
            );

            if( $setting['type'] === 'social_icons' ){

              $wp_customize->add_control( new PRT_PB_Social_Icons_Custom_Control(
                  $wp_customize,
                  $setting['id'],
                  array(
                      'label' => $setting['label'],
                      'description' => $setting['desc'],
                      'section' => $setting['section'],
                      'settings' => $setting['id'],
                      'type' => $setting['type'],
                      'social_profiles' => $this->social_array
                  )
              ));

            }elseif( $setting['type'] == 'image' || $setting['type'] == 'bg_image' ){

                $wp_customize->add_control( new WP_Customize_Image_Control(
                    $wp_customize,
                    $setting['id'],
                    array(
                        'label' => $setting['label'],
                        'description' => $setting['desc'],
                        'section' => $setting['section'],
                        'settings' => $setting['id']
                    )
                ));

            }elseif( $setting['type'] == 'radio' ){

              $wp_customize->add_control(
                  $setting['id'],
                  array(
                      'label' => $setting['label'],
                      'description' => $setting['desc'],
                      'section' => $setting['section'],
                      'settings' => $setting['id'],
                      'type' => $setting['type'],
                      'choices' => $setting['choices']
                  )
              );

            }elseif( $setting['type'] == 'toggle_checkbox' ){

              $wp_customize->add_control( new PRT_PB_Toggle_Checkbox_Custom_Control(
                  $wp_customize,
                  $setting['id'],
                  array(
                      'label' => $setting['label'],
                      'description' => $setting['desc'],
                      'section' => $setting['section'],
                      'settings' => $setting['id'],
                      'type' => 'checkbox'
                  )
              ));

            }elseif( $setting['type'] == 'google_fonts' ){

              $wp_customize->add_control( new PRT_PB_Google_Fonts_Custom_Control(
                  $wp_customize,
                  $setting['id'],
                  array(
                      'label' => $setting['label'],
                      'description' => $setting['desc'],
                      'section' => $setting['section'],
                      'settings' => $setting['id'],
                      'type' => 'google_fonts'
                  )
              ));

          }elseif( $setting['type'] == 'color' || $setting['type'] == 'color_input_placeholder' ){

              $wp_customize->add_control( new WP_Customize_Color_Control(
                  $wp_customize,
                   $setting['id'],
                  array(
                      'description' => $setting['desc'],
                      'label' => $setting['label'],
                      'section' => $setting['section'],
                      'settings' => $setting['id']
                  )
              ) );

          }else{

              $wp_customize->add_control(
                  $setting['id'],
                  array(
                      'label' => $setting['label'],
                      'description' => $setting['desc'],
                      'section' => $setting['section'],
                      'settings' => $setting['id'],
                      'type' => $setting['type']
                  )
              );

            }

        }

    } // end register()

}

$prtPBCustomizer = new PRT_PB_Customizer;
