<?php

class PRT_PB_Instagram extends PRT_PinkButterflies{

    private static $errors = [];

    public static function get_username(){

        $pb_theme_options = parent::get_theme_options();
        $instagram_username = false;

        if( array_key_exists( 'instagram_username', $pb_theme_options ) ){

            $instagram_username = $pb_theme_options['instagram_username'];

        }

        return $instagram_username;

    }

    public static function is_valid( $response ){

        if( is_array( $response ) ){
            if( array_key_exists( 'entry_data', $response ) ){
                if( array_key_exists( 'ProfilePage', $response['entry_data'] ) ){
                    if( count( $response['entry_data']['ProfilePage'] ) > 0 ){
                        if( array_key_exists( 'graphql', $response['entry_data']['ProfilePage'][0] ) ){
                            if( array_key_exists( 'user', $response['entry_data']['ProfilePage'][0]['graphql'] ) ){

                                if( array_key_exists( 'is_private', $response['entry_data']['ProfilePage'][0]['graphql']['user'] ) ){
                                    if( $response['entry_data']['ProfilePage'][0]['graphql']['user']['is_private'] ){
                                        self::$errors['private'] = __( 'Account is private. Please make it public to see your images.', 'pinkbutterflies' );
                                    }
                                }

                                if( array_key_exists( 'edge_owner_to_timeline_media', $response['entry_data']['ProfilePage'][0]['graphql']['user'] ) ){
                                    if( array_key_exists( 'edges', $response['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media'] ) ){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }else{
                                    return false;
                                }

                            }else{
                                return false;
                            }
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            self::$errors[] = __( 'Inavlid type returned!', 'pinkbutterflies' );
            return false;
        }

    } // end is_valid()

    public static function scrape_instagram( $username ){

        $insta_transient = get_transient('pb_instagram');

        if( $insta_transient && isset( $insta_transient['entry_data']['ProfilePage'] ) ){
            $insta_username = $insta_transient['entry_data']['ProfilePage'][0]['graphql']['user']['username'];
        }else{
            $insta_username = '';
        }

        if( $insta_transient && !empty( self::get_username() ) && $insta_username == self::get_username() ){

            return $insta_transient;

        }else{

            if( !empty( self::get_username() ) ){

                $response = wp_remote_get('http://instagram.com/'.$username);
                $response_code = wp_remote_retrieve_response_code( $response );

                if( $response_code == 200 ){

                    $insta_source = wp_remote_retrieve_body( $response );
                    $shards = explode('window._sharedData = ', $insta_source);
                    $insta_json = explode(';</script>', $shards[1]);
                    $insta_array = json_decode($insta_json[0], TRUE);
                    set_transient( 'pb_instagram', $insta_array, HOUR_IN_SECONDS * 4 );
                    return $insta_array;

                }

            }

        }

    }

    public static function get_instagram(){

      $pb_theme_options = parent::get_theme_options();

      if( array_key_exists( 'instagram_version', $pb_theme_options ) ){
          $instagram_version = $pb_theme_options['instagram_version'];
      }else{
          $instagram_version = 'v1';
      }

      $results_arr = PRT_PB_Instagram::scrape_instagram( self::get_username() );
      // echo '<pre>';
      // var_dump($results_arr);
      // echo '</pre>';

      if( self::is_valid( $results_arr ) && !empty( $results_arr ) && self::get_username() && !empty( self::get_username() ) ){

          $media = $results_arr['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];

          if ( count($media) >= 11 && $instagram_version === 'v2' ){

          $img_1 = $media[0]['node']['thumbnail_resources'][4]['src'];
          $code_1 = $media[0]['node']['shortcode'];
          $img_2 = $media[1]['node']['thumbnail_resources'][4]['src'];
          $code_2 = $media[1]['node']['shortcode'];
          $img_3 = $media[2]['node']['thumbnail_resources'][4]['src'];
          $code_3 = $media[2]['node']['shortcode'];
          $img_4 = $media[3]['node']['thumbnail_resources'][4]['src'];
          $code_4 = $media[3]['node']['shortcode'];
          $img_5 = $media[4]['node']['thumbnail_resources'][4]['src'];
          $code_5 = $media[4]['node']['shortcode'];
          $img_6 = $media[5]['node']['thumbnail_resources'][4]['src'];
          $code_6 = $media[5]['node']['shortcode'];
          $img_7 = $media[6]['node']['thumbnail_resources'][4]['src'];
          $code_7 = $media[6]['node']['shortcode'];
          $img_8 = $media[7]['node']['thumbnail_resources'][4]['src'];
          $code_8 = $media[7]['node']['shortcode'];
          $img_9 = $media[8]['node']['thumbnail_resources'][4]['src'];
          $code_9 = $media[8]['node']['shortcode'];
          $img_10 = $media[9]['node']['thumbnail_resources'][4]['src'];
          $code_10 = $media[9]['node']['shortcode'];
          $img_11 = $media[10]['node']['thumbnail_resources'][4]['src'];
          $code_11 = $media[10]['node']['shortcode'];

      ?>

      <!-- ** Instagram Wrap ** -->
      <div id="instagram-wrap" class="clearfix">
          <div class="pb-instagram-two-boxes pb-instagram-boxes">
              <div class="pb-instagram-box follow-box">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/instagram-full.gif" alt="">
                  <div class="overlay">
                      <a href="https://www.instagram.com/<?php echo self::get_username(); ?>/" class="va-cols-wrap" target="_blank">
                          <span class="va-col"><?php _e( 'follow', 'pinkbutterflies' ); ?><br><?php _e( 'me', 'pinkbutterflies' ); ?></span>
                      </a>
                  </div>
              </div>
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_1; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_1); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-one-box-full pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_2; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_2); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-two-boxes pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_3; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_3); ?>" alt="">
                  </a>
              </div>
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_4; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_4); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-one-box-full pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_5; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_5); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-two-boxes pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_6; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_6); ?>" alt="">
                  </a>
              </div>
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_7; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_7); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-two-boxes pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_8; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_8); ?>" alt="">
                  </a>
              </div>
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_9; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_9); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-one-box-full pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_10; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_10); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
          <div class="pb-instagram-one-box-full pb-instagram-boxes">
              <div class="pb-instagram-box">
                  <a href="http://instagram.com/p/<?php echo $code_11; ?>" target="_blank">
                      <img src="<?php echo esc_url($img_11); ?>" alt="">
                  </a>
              </div>
          </div><!-- end .pb-instagram-boxes -->
      </div><!-- end #instagram-wrap -->

      <?php
          }else{

              if( count( $media ) >= 6 ){

                  $img_1 = $media[0]['node']['thumbnail_resources'][4]['src'];
                  $code_1 = $media[0]['node']['shortcode'];
                  $img_2 = $media[1]['node']['thumbnail_resources'][4]['src'];
                  $code_2 = $media[1]['node']['shortcode'];
                  $img_3 = $media[2]['node']['thumbnail_resources'][4]['src'];
                  $code_3 = $media[2]['node']['shortcode'];
                  $img_4 = $media[3]['node']['thumbnail_resources'][4]['src'];
                  $code_4 = $media[3]['node']['shortcode'];
                  $img_5 = $media[4]['node']['thumbnail_resources'][4]['src'];
                  $code_5 = $media[4]['node']['shortcode'];
                  $img_6 = $media[5]['node']['thumbnail_resources'][4]['src'];
                  $code_6 = $media[5]['node']['shortcode'];

                  ?>

                  <!-- ** Instagram Wrap ** -->
                  <div id="instagram-wrap" class="clearfix">
                      <div class="pb-instagram-one-box-full pb-instagram-boxes">
                          <div class="pb-instagram-box">
                              <a href="http://instagram.com/p/<?php echo $code_1; ?>" target="_blank">
                                  <img src="<?php echo esc_url($img_1); ?>" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="pb-instagram-one-box-full pb-instagram-boxes">
                          <div class="pb-instagram-box">
                              <a href="http://instagram.com/p/<?php echo $code_2; ?>" target="_blank">
                                  <img src="<?php echo esc_url($img_2); ?>" alt="">
                              </a>
                          </div>
                      </div><!-- end .pb-instagram-boxes -->
                      <div class="pb-instagram-one-box-full pb-instagram-boxes">
                          <div class="pb-instagram-box">
                              <a href="http://instagram.com/p/<?php echo $code_3; ?>" target="_blank">
                                  <img src="<?php echo esc_url($img_3); ?>" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="pb-instagram-one-box-full pb-instagram-boxes">
                          <div class="pb-instagram-box">
                              <a href="http://instagram.com/p/<?php echo $code_4; ?>" target="_blank">
                                  <img src="<?php echo esc_url($img_4); ?>" alt="">
                              </a>
                          </div>
                      </div><!-- end .pb-instagram-boxes -->
                      <div class="pb-instagram-one-box-full pb-instagram-boxes">
                          <div class="pb-instagram-box">
                              <a href="http://instagram.com/p/<?php echo $code_5; ?>" target="_blank">
                                  <img src="<?php echo esc_url($img_5); ?>" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="pb-instagram-one-box-full pb-instagram-boxes">
                          <div class="pb-instagram-box">
                              <a href="http://instagram.com/p/<?php echo $code_6; ?>" target="_blank">
                                  <img src="<?php echo esc_url($img_6); ?>" alt="">
                              </a>
                          </div>
                      </div><!-- end .pb-instagram-boxes -->
                      <a href="https://www.instagram.com/<?php echo self::get_username(); ?>/" class="instagram-follow-btn" target="_blank">
                          <?php _e( 'follow me', 'pinkbutterflies' ); ?> @<?php echo self::get_username(); ?>
                      </a>
                  </div><!-- end #instagram-wrap -->

                  <?php

              }

          }

          if( array_key_exists( 'private', self::$errors ) ){

              ?>

              <section class="pb-error-section">
                  <div class="container">
                      <div class="column-12">
                          <div class="inner">
                              <?php foreach( self::$errors as $error ): ?>
                              <p><?php echo $error; ?></p>
                              <?php endforeach; ?>
                          </div>
                      </div>
                  </div>
              </section>

              <?php

          }

      }else{

          if( self::get_username() && !empty( self::get_username() ) ){

              if( is_customize_preview() ){

          ?>

          <section class="pb-error-section">
              <div class="container">
                  <div class="column-12">
                      <div class="inner">
                          <?php foreach( self::$errors as $error ): ?>
                          <p><?php echo $error; ?></p>
                          <?php endforeach; ?>
                          <p><?php _e( 'Please make sure you have entered correct username.', 'pinkbutterflies' ); ?></p>
                      </div>
                  </div>
              </div>
          </section>

          <?php

              }

          }

      }

    }

}
