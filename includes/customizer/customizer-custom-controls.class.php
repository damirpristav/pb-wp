<?php

if ( class_exists( 'WP_Customize_Control' ) ){

    class PRT_PB_Social_Icons_Custom_Control extends WP_Customize_Control{

        public $type = 'social_icons';
        public $social_profiles;

        public function __construct( $manager, $id, $args = array() ){

            $this->social_profiles = $args['social_profiles'];
            parent::__construct( $manager, $id, $args );

        }

        public function enqueue(){

            wp_enqueue_style( 'prt_pb_fontawesome', get_template_directory_uri() . '/css/fontawesome-all.min.css' );
            wp_enqueue_style( 'prt_pb_custom_controls_css', get_template_directory_uri() . '/css/customize.css', array( 'customize-controls' ), '', 'all' );

            wp_enqueue_script( 'jquery-ui-sortable' );
            wp_enqueue_script( 'prt_pb_customize_custom_controls', get_template_directory_uri() . '/js/customize-custom-controls.js', array( 'customize-controls', 'jquery' ), '', true );

        }

        public function to_json(){

            parent::to_json();
            $this->json['social_profiles'] = $this->social_profiles;

        }

        public function render_content(){

            if( empty( $this->social_profiles ) ){
                return;
            }

            ?>

            <div class="social-profiles-control">
                <?php if( !empty( $this->label ) ){ ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php } ?>
                <?php if( !empty( $this->description ) ){ ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
                <div class="customize-control-content">

                    <?php $this->social_icons_template(); ?>

                    <div class="prt-social-buttons"></div>
                    <div class="prt-new-social-buttons"></div>
                    <div class="prt-action-btn-wrap">
                        <a href="javascript:void(0)" class="button button-primary add-new-btn"><?php esc_html_e( 'Add New Icon', 'pinkbutterflies' ); ?></a>
                    </div>
                </div>
            </div>

            <?php

        }

        public function social_icons_template(){
            ?>
            <script type="text/html" id="tmpl-prt-social-btn">
                <div class="prt-social-custom">
                    <div class="prt-social-btn">
                        <div class="preview-btn">
                            <div class="inner">
                                <i class="<# if( data.name ){ #>fab fa-{{ data.name }}<# } #>"></i>
                                <span class="name">{{ data.name }}</span>
                                <span class="label">{{ data.label }}</span>
                            </div>
                            <div class="sort">
                                <i class="fas fa-sort"></i>
                            </div>
                            <div class="remove">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="edit-btn-wrap"<# if ( !data.editing ) { #> style="display: none"<# } #>>
                            <input type="hidden" class="social-name" value="{{ data.name }}" />
                            <input type="text" placeholder="<?php echo esc_attr( __( 'URL', 'pinkbutterflies' ) ); ?>" class="url"<# if ( data.url ) { #> value="{{ data.url }}"<# } #> />
                        </div>
                    </div>
                </div>
            </script>
            <script type="text/html" id="tmpl-prt-new-social-btn">
                <div class="prt-new-social-btn">
                    <div class="prt-new-btn-fields-wrap">
                        <#

                        var addedArr = [];
                        for( var a=0; a < data.addedProfiles.length; a++ ){
                            addedArr.push(data.addedProfiles[a]['name']);
                        }

                         #>
                        <select class="social-dropdown">
                            <option value="default"><?php _e( '-- Select --', 'pinkbutterflies' ); ?></option>
                            <# _.each(data.profiles, function(val, key, profile){ #>
                                <# if( addedArr.indexOf(key) < 0 ){ #>
                                <option value="{{ key }}">{{ val['label'] }}</option>
                                <# } #>
                            <# }); #>
                        </select>

                        <input type="text" class="url" placeholder="<?php echo esc_attr( __( 'Copy your Profile URL here', 'pinkbutterflies' ) ); ?>" />
                        <a href="javascript:void(0)" class="button button-secondary save-new-btn"><?php _e( 'Save', 'pinkbutterflies' ); ?></a>
                        <a href="javascript:void(0)" class="button button-secondary cancel-new-btn"><?php _e( 'Cancel', 'pinkbutterflies' ); ?></a>
                    </div>
                </div>
            </script>
            <?php
        }

    } // end class PRT_PB_Social_Icons_Custom_Control

    class PRT_PB_Toggle_Checkbox_Custom_Control extends WP_Customize_Control{

        public $type = 'toggle_checkbox';

        public function enqueue(){

            wp_enqueue_style( 'prt_pb_custom_controls_css', get_template_directory_uri() . '/css/customize.css', array( 'customize-controls' ), '', 'all' );

        }

        public function render_content(){

          ?>
          <div class="checkbox_switch">
              <div class="onoffswitch">
                  <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>"
                         class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                  <label class="onoffswitch-label" for="<?php echo esc_attr($this->id); ?>"></label>
              </div>
              <span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
              <span class="customize-control-description"><?php echo wp_kses_post($this->description); ?></span>
          </div>
          <?php

        }

    } // end class PRT_PB_Toggle_Checkbox_Custom_Control

    class PRT_PB_Google_Fonts_Custom_Control extends WP_Customize_Control{

        public $type = 'google_fonts';
        private $fonts = false;

        public function __construct( $manager, $id, $args = array() ){

            $this->fonts = PRT_PB_Customizer::get_google_fonts();
            parent::__construct( $manager, $id, $args );

        }

        public function enqueue(){

            wp_enqueue_script( 'prt_pb_customize_custom_controls', get_template_directory_uri() . '/js/customize-custom-controls.js', array( 'customize-controls', 'jquery' ), '', true );

        }

        public function to_json(){

            parent::to_json();
            $this->json['google_fonts'] = $this->fonts;

        }

        public function render_content(){

            if( !empty( $this->fonts ) ){

            ?>

            <?php if( !empty( $this->label ) ){ ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php } ?>
            <?php if( !empty( $this->description ) ){ ?>
            <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php } ?>
            <div class="customize-control-content prt-fonts-container">

                <?php

                $value = $this->value();
                $splitted_value = explode( ':', $value );

                ?>

                <input type="hidden" value="<?php echo $value; ?>" class="selected-g-font" />

                <select class="google-fonts-dropdown"></select>

                <span class="customize-control-description" style="margin: 5px 0;"><?php _e( 'Change Font Weight & Style', 'pinkbutterflies' ); ?></span>

                <select class="google-fonts-variants-dropdown"></select>

                <input type="hidden" class="google-fonts-input" />

            </div>

            <?php

            } // end if !empty($this->fonts)

        }

    }

}
