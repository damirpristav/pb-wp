<?php

class PRT_PB_Customizer_CSS extends PRT_PB_Customizer{

    private $fonts = false;

    public function __construct(){

        $this->fonts = PRT_PB_Customizer::get_fonts();
        add_action( 'wp_head', array( $this, 'customizer_styles' ) );

    }

    public function customizer_styles(){

        $pb_theme_options = PRT_PinkButterflies::get_theme_options();

        if( is_array( $pb_theme_options ) && !empty( $pb_theme_options ) ){

            $cssSettings = array();
            $fontSettings = array();
            $fontsToImport = array();
            $fontsVariants = array();
            $importURLs = array();
            $settingsClass = new PRT_PB_Customizer_Settings;
            $settings = $settingsClass->get_settings();
            $baseImportText = 'https://fonts.googleapis.com/css?family=';

            // loop through each google font
            foreach( $this->fonts as $font ){

                // get font family
                $font_family = $font->family;
                // replace space with + sign
                $replaced_font_family = str_replace( ' ', '+', $font_family );
                // get font variants( style and weights )
                $font_variants = $font->variants;
                // join all variants separated by comma to string
                $imploded_font_variants = implode(',', $font_variants);
                // replace word regular with 400
                $replaced_font_variants = str_replace( 'regular', '400', $imploded_font_variants );
                // replace word italic with i
                $replaced_font_variants2 = str_replace( 'italic', 'i', $replaced_font_variants );
                // convert variants back to array
                $split_variants_by_comma = explode( ',', $replaced_font_variants2 );
                // get position of array item that has just letter i and change it to 400i
                $position = array_search( 'i', $split_variants_by_comma, true );
                if( $position && !empty($position) ){
                    $split_variants_by_comma[$position] = '400i';
                }
                // join variants back to string separated by comma
                $replaced_font_variants3 = implode( ',', $split_variants_by_comma );
                // add font family and font variants to array as key value
                $fontsVariants[$replaced_font_family] = $replaced_font_variants3;

            }

            // loop through each theme setting
            foreach( $settings as $setting ){
                // check if setting has in_css key set to true and if so push setting to $cssSettings array
                if( $setting['in_css'] ){
                    array_push( $cssSettings, $setting );
                }
                // check if setting type is google_fonts and if so push setting to $fontSettings array
                if( $setting['type'] === 'google_fonts' ){
                    array_push( $fontSettings, $setting );
                }
            }

            // loop through $fontSettings array
            foreach( $fontSettings as $fontSetting ) {

                // get setting short key
                $s_key = $fontSetting['s_key'];
                // check if theme options exists in theme options array and if it is not empty
                if( array_key_exists( $s_key, $pb_theme_options ) && !empty( $pb_theme_options[$s_key] ) ){
                    // get the value of theme option
                    $value = $pb_theme_options[$s_key];
                    // split value to get font name
                    $value_splitted = explode( ':', $value );
                    // capitalize each word and replace underscore with space
                    $new_value = ucwords( str_replace( '_', ' ', $value_splitted[0] ) );
                    // replace space with + sign
                    $new_value = str_replace( ' ', '+', $new_value );
                    // add option to array
                    array_push( $fontsToImport, $new_value );
                }

            }

            // loop through fonts variants array and font to import array
            foreach( $fontsVariants as $key => $val ){
                for( $i = 0; $i < count($fontsToImport); $i++ ){
                    // check if font to import and variant has same name and if so create import url and add it to $importURLs array
                    if( $fontsToImport[$i] === $key ){
                        $importURLs[$key] = $baseImportText . $fontsToImport[$i] . ':' . $val . '';
                    }
                }
            }

            if( !empty( $cssSettings ) ){

                echo '<style type="text/css">';

                // loop through import urls array and print imported url to css
                foreach( $importURLs as $key => $val ){
                    // check if font is not already imported in theme( this 4 fonts are theme default fonts )
                    if( $key !== 'Merriweather' && $key !== 'Kaushan+Script' && $key !== 'Shadows+Into+Light+Two' && $key !== 'Montserrat' ){
                        echo '@import url("' . $val . '");';
                    }
                }

              foreach( $cssSettings as $cssSetting ){

                    if( array_key_exists( $cssSetting['s_key'], $pb_theme_options ) ){

                        if( $cssSetting['type'] == 'bg_image' ){

                            echo $cssSetting['css']['selector'] . '{';
                            echo $cssSetting['css']['property'] . ':' . 'url(' . $pb_theme_options[$cssSetting['s_key']] . ');';
                            echo '}';

                        }elseif( $cssSetting['type'] == 'google_fonts' ){

                            $pb_font = $pb_theme_options[$cssSetting['s_key']];
                            $splitted_font = explode( ':', $pb_font );
                            $selected_font = false;

                            $font_to_check = str_replace( '+', ' ', $splitted_font[0] );

                            foreach( $this->fonts as $font ){
                                if( $font_to_check === $font->family ){
                                    $selected_font = $font;
                                }
                            }

                            preg_match_all('!\d+!', $splitted_font[1], $weights);
                            $font_weight = implode('', $weights[0]);

                            $font_style = str_replace( $font_weight, '', $splitted_font[1] );

                            echo $cssSetting['css']['selector'] . '{';
                            echo $cssSetting['css']['property'][0] . ': "' . $selected_font->family . '", ' . $selected_font->category . ';';
                            if( !empty( $font_weight ) ){
                            echo $cssSetting['css']['property'][1] . ': ' . $font_weight . ';';
                            }
                            if( !empty( $font_style ) ){
                                if( $font_style === 'regular' ){ $font_style = 'normal'; }
                            echo $cssSetting['css']['property'][2] . ': ' . $font_style . ';';
                            }
                            echo '}';
                        }elseif( $cssSetting['type'] == 'color_input_placeholder' ){

                            if( $pb_theme_options[$cssSetting['s_key']] !== $cssSetting['default'] ){                             
                                echo '::-webkit-input-placeholder{';
                                echo 'color: ' . $pb_theme_options[$cssSetting['s_key']] . ';';
                                echo '}';
                                echo '::-moz-placeholder{';
                                echo 'color: ' . $pb_theme_options[$cssSetting['s_key']] . ';';
                                echo '}';
                                echo ':-ms-input-placeholder{';
                                echo 'color: ' . $pb_theme_options[$cssSetting['s_key']] . ';';
                                echo '}';
                                echo ':-moz-placeholder{';
                                echo 'color: ' . $pb_theme_options[$cssSetting['s_key']] . ';';
                                echo '}';
                            }

                        }else{
                            if( $cssSetting['css']['property'] === 'font-size' ){
                                if( !empty($pb_theme_options[$cssSetting['s_key']]) ){
                                    echo $cssSetting['css']['selector'] . '{';
                                    echo $cssSetting['css']['property'] . ':' . $pb_theme_options[$cssSetting['s_key']] . 'em;';
                                    echo '}';
                                }
                            }else{
                                if( $cssSetting['css']['property'] === 'color' 
                                    || $cssSetting['css']['property'] === 'background-color'
                                    || $cssSetting['css']['property'] === 'border-color'
                                    || $cssSetting['css']['property'] === 'border-top-color' ){
                                    if( $pb_theme_options[$cssSetting['s_key']] !== $cssSetting['default'] ){
                                        echo $cssSetting['css']['selector'] . '{';
                                        echo $cssSetting['css']['property'] . ':' . $pb_theme_options[$cssSetting['s_key']] . ';';
                                        echo '}';
                                    }
                                }else{
                                    echo $cssSetting['css']['selector'] . '{';
                                    echo $cssSetting['css']['property'] . ':' . $pb_theme_options[$cssSetting['s_key']] . ';';
                                    echo '}';
                                }
                                
                            }
                        }
                    }

              }

              echo'</style>';

            }

        }

    }

}

$prtPBCustomizerCSS = new PRT_PB_Customizer_CSS;
