<?php

/******************************************
  Ajax is not loading styles correctly
  that's why there's get posts methods
  inside this class
******************************************/

class PRT_PB_Ajax_Load_Posts extends PRT_PinkButterflies{

    public function __construct(){

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
        add_action( 'wp_ajax_pb_get_posts', array( $this, 'get_posts' ) );
        add_action( 'wp_ajax_nopriv_pb_get_posts', array( $this, 'get_posts' ) );

    }

    public function enqueue(){

        $cat_id = false;
        $cat_version = false;
        $tag_id = false;
        $year = false;
        $month = false;
        $day = false;
        $yearly_archives = false;
        $monthly_archives = false;
        $daily_archives = false;
        $author_id = false;
        $search_query = false;
        $search_empty = false;
        $queried_obj = get_queried_object();

        if( is_category() ){
            $cat_id = $queried_obj->term_id;
            $category = get_category( get_query_var( 'cat' ) );
            $cat_version = get_term_meta( $cat_id, 'prt_pb_category_version', true );
        }elseif( is_tag() ){
            $tag_id = $queried_obj->term_id;
        }elseif( is_year() ){
            $yearly_archives = true;
            $year = get_the_date('Y');
        }elseif( is_month() ){
            $monthly_archives = true;
            $year = get_the_date('Y');
            $month = get_the_date('m');
        }elseif( is_day() ){
            $daily_archives = true;
            $year = get_the_date('Y');
            $month = get_the_date('m');
            $day = get_the_date('d');
        }elseif( is_author() ){
            $author_id = $queried_obj->data->ID;
        }elseif( is_search() ){
            $search_query = get_search_query();
            $search_empty = 'empty';
        }

        // ** Ajax Load Posts **
        wp_enqueue_script( $this->theme_short_name . '_ajax_load_posts',  get_template_directory_uri() . '/includes/ajax-load-posts/js/ajax-load-posts.js', array( 'jquery', 'masonry' ), '', true );
        wp_localize_script( $this->theme_short_name . '_ajax_load_posts', 'pb_ajax_load_posts', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'ajax_nonce' => wp_create_nonce('pb-ajax-load-posts-nonce'),
            'category' => $cat_id,
            'cat_version' => $cat_version,
            'tag' => $tag_id,
            'author' => $author_id,
            'yearly_archives' => $yearly_archives,
            'monthly_archives' => $monthly_archives,
            'daily_archives' => $daily_archives,
            'ar_year' => $year,
            'ar_month' => $month,
            'ar_day' => $day,
            'search' => $search_query,
            'search_empty' => $search_empty
        ));

    }

    public static function get_posts(){

        if ( isset( $_REQUEST ) ) {

            $pb_theme_options = parent::get_theme_options();

            if( array_key_exists( 'blog_layout', $pb_theme_options ) ){
                $layout = $pb_theme_options['blog_layout'];
            }
            if( array_key_exists( 'posts_to_load', $pb_theme_options ) ){
                $posts_to_load = $pb_theme_options['posts_to_load'];
            }else{
                $posts_to_load = 3;
            }
            if( array_key_exists( 'posts_to_load_archive', $pb_theme_options ) ){
                $posts_to_load_archive = $pb_theme_options['posts_to_load_archive'];
            }else{
                $posts_to_load_archive = 3;
            }

            global $post;

            // exlude previous posts to append only new posts
            $offset = intval($_REQUEST['offset']);

            if( $_REQUEST['category'] ){

                $args = array(
                    'post_type' => 'post',
                    'cat' => $_REQUEST['category'],
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }elseif( $_REQUEST['tag'] ){

                $args = array(
                    'post_type' => 'post',
                    'tag_id' => $_REQUEST['tag'],
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }elseif( $_REQUEST['author'] ){

                $args = array(
                    'post_type' => 'post',
                    'author' => $_REQUEST['author'],
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }elseif( $_REQUEST['yearly_archives'] ){

                $args = array(
                    'post_type' => 'post',
                    'year' => $_REQUEST['ar_year'],
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }elseif( $_REQUEST['monthly_archives'] ){

                $args = array(
                    'post_type' => 'post',
                    'date_query' => array(
                        'year' => $_REQUEST['ar_year'],
                        'month' => $_REQUEST['ar_month'],
                    ),
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }elseif( $_REQUEST['daily_archives'] ){

                $args = array(
                    'post_type' => 'post',
                    'date_query' => array(
                        'year' => $_REQUEST['ar_year'],
                        'month' => $_REQUEST['ar_month'],
                        'day' => $_REQUEST['ar_day'],
                    ),
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }elseif( $_REQUEST['search'] || $_REQUEST['search_empty'] ){

                $args = array(
                    'post_type' => array( 'page', 'post' ),
                    's' => $_REQUEST['search'],
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load_archive, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }else{

                if( parent::is_layout_standard_grid() ){
                    $offset = $offset + 1;
                }

                $args = array(
                    'post_type' => 'post',
                    'offset' => $offset,
                    'posts_per_page' => $posts_to_load, // number of posts to append
                    'post__not_in' => get_option( 'sticky_posts' )
                );

            }

            $posts_query = new WP_Query( $args );

            while( $posts_query->have_posts() ):

                $posts_query->the_post();

                $post_class_arr = get_post_class();
                $post_class = implode( ' ', $post_class_arr );

                if( $_REQUEST['category'] ){

                    $cat_version = $_REQUEST['cat_version'];

                    if( isset( $cat_version ) && !empty( $cat_version ) ){
                        if( $cat_version === 'v1' ){
                            $this->get_grid_posts( $post_class, get_post_format(), 'ajax-grid' );
                        }else{
                            $this->get_masonry_v2_posts( $post_class, get_post_format(), 'ajax-masonry' );
                        }
                    }else{
                        $this->get_masonry_v2_posts( $post_class, get_post_format(), 'ajax-masonry' );
                    }

                }elseif( $_REQUEST['tag'] || $_REQUEST['yearly_archives'] || $_REQUEST['monthly_archives'] || $_REQUEST['daily_archives'] || $_REQUEST['author'] ){

                    $this->get_list_posts( $post_class, get_post_format(), 'ajax-list' );

                }elseif( $_REQUEST['search'] || $_REQUEST['search_empty'] ){

                    $this->get_grid_posts( $post_class, get_post_format(), 'ajax-grid' );

                }else{

                    if( isset( $layout ) ){

                        if( parent::is_layout_standard() ){

                            self::get_standard_posts( $post_class, get_post_format(), 'ajax-standard' );

                        }elseif( parent::is_layout_grid() ){

                            self::get_grid_posts( $post_class, get_post_format(), 'ajax-grid' );

                        }elseif( parent::is_layout_masonry_v2() ){

                            self::get_masonry_v2_posts( $post_class, get_post_format(), 'ajax-masonry' );

                        }elseif( parent::is_layout_list() ){

                            self::get_list_posts( $post_class, get_post_format(), 'ajax-list' );

                        }elseif( parent::is_layout_standard_grid() ){

                            self::get_grid_posts( $post_class, get_post_format(), 'ajax-grid' );

                        }

                    }else{

                        self::get_standard_posts( $post_class, get_post_format(), 'ajax-standard' );

                    }

                }

            endwhile;
            wp_reset_postdata();

        }
        
        wp_die();

    } // end function get_posts()

    // get standard posts
    public static function get_standard_posts( $post_class, $post_format, $ajax = '' ){

        if( $post_format === 'audio' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_meta(); ?>
              <?php PRT_PinkButterflies::get_featured_audio(); ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(49); ?>
              </div>
              <?php if( !PRT_PinkButterflies::is_hidden_comments_read_more_and_share() ): ?>
              <footer class="clearfix">
                  <div class="col post-comments-number">
                      <?php PRT_PinkButterflies::get_number_of_comments(); ?>
                  </div>
                  <div class="col read-more-wrap">
                      <?php PRT_PinkButterflies::get_read_more_button(); ?>
                  </div>
                  <div class="col post-share">
                      <?php PRT_PinkButterflies::get_post_share_buttons(); ?>
                  </div>
              </footer>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'gallery' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_meta(); ?>
              <?php PRT_PinkButterflies::get_featured_gallery(); ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(49); ?>
              </div>
              <?php if( !PRT_PinkButterflies::is_hidden_comments_read_more_and_share() ): ?>
              <footer class="clearfix">
                  <div class="col post-comments-number">
                      <?php PRT_PinkButterflies::get_number_of_comments(); ?>
                  </div>
                  <div class="col read-more-wrap">
                      <?php PRT_PinkButterflies::get_read_more_button(); ?>
                  </div>
                  <div class="col post-share">
                      <?php PRT_PinkButterflies::get_post_share_buttons(); ?>
                  </div>
              </footer>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'video' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_meta(); ?>
              <?php PRT_PinkButterflies::get_featured_video(); ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(49); ?>
              </div>
              <?php if( !PRT_PinkButterflies::is_hidden_comments_read_more_and_share() ): ?>
              <footer class="clearfix">
                  <div class="col post-comments-number">
                      <?php PRT_PinkButterflies::get_number_of_comments(); ?>
                  </div>
                  <div class="col read-more-wrap">
                      <?php PRT_PinkButterflies::get_read_more_button(); ?>
                  </div>
                  <div class="col post-share">
                      <?php PRT_PinkButterflies::get_post_share_buttons(); ?>
                  </div>
              </footer>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php else: ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_meta(); ?>
              <?php PRT_PinkButterflies::get_featured_image( '', $ajax ); ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(49); ?>
              </div>
              <?php if( !PRT_PinkButterflies::is_hidden_comments_read_more_and_share() ): ?>
              <footer class="clearfix">
                  <div class="col post-comments-number">
                      <?php PRT_PinkButterflies::get_number_of_comments(); ?>
                  </div>
                  <div class="col read-more-wrap">
                      <?php PRT_PinkButterflies::get_read_more_button(); ?>
                  </div>
                  <div class="col post-share">
                      <?php PRT_PinkButterflies::get_post_share_buttons(); ?>
                  </div>
              </footer>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php endif;

    } // end function get_standard_posts()

    // get grid posts
    public static function get_grid_posts( $post_class, $post_format, $ajax = '' ){

        if( $post_format === 'audio' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_audio(); ?>
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php
              if( PRT_PinkButterflies::is_layout_standard_grid() ){
                  PRT_PinkButterflies::get_post_title_sg_grid();
              }else{
                  PRT_PinkButterflies::get_post_title( $ajax );
              }
              ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(22); ?>
              </div>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              <div class="read-more-wrap">
              <?php endif; ?>
              <?php PRT_PinkButterflies::get_read_more_button( $ajax ); ?>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              </div>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'gallery' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_gallery( 'grid' ); ?>
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php
              if( PRT_PinkButterflies::is_layout_standard_grid() ){
                  PRT_PinkButterflies::get_post_title_sg_grid();
              }else{
                  PRT_PinkButterflies::get_post_title( $ajax );
              }
              ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(22); ?>
              </div>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              <div class="read-more-wrap">
              <?php endif; ?>
              <?php PRT_PinkButterflies::get_read_more_button( $ajax ); ?>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              </div>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'video' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_video(); ?>
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php
              if( PRT_PinkButterflies::is_layout_standard_grid() ){
                  PRT_PinkButterflies::get_post_title_sg_grid();
              }else{
                  PRT_PinkButterflies::get_post_title( $ajax );
              }
              ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(22); ?>
              </div>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              <div class="read-more-wrap">
              <?php endif; ?>
              <?php PRT_PinkButterflies::get_read_more_button( $ajax ); ?>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              </div>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php else: ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_image( 'grid', $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
              <?php
              if( PRT_PinkButterflies::is_layout_standard_grid() ){
                  PRT_PinkButterflies::get_post_title_sg_grid();
              }else{
                  PRT_PinkButterflies::get_post_title( $ajax );
              }
              ?>
              <div class="excerpt">
                  <?php PRT_PinkButterflies::get_the_excerpt(22); ?>
              </div>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              <div class="read-more-wrap">
              <?php endif; ?>
              <?php PRT_PinkButterflies::get_read_more_button( $ajax ); ?>
              <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
              </div>
              <?php endif; ?>
          </article><!-- end .post -->

        <?php endif;

    } // end function get_grid_posts()

    // get masonry v2 posts
    public static function get_masonry_v2_posts( $post_class, $post_format, $ajax = '' ){

        if( $post_format === 'audio' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_audio(); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'gallery' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_gallery( 'grid' ); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'video' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_video(); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
          </article><!-- end .post -->

        <?php else: ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_image( 'grid', $ajax ); ?>
              <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
          </article><!-- end .post -->

        <?php endif;


    } // end function get_masonry_v2_posts()

    // get list posts
    public static function get_list_posts( $post_class, $post_format, $ajax = '' ){

        if( $post_format === 'audio' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_audio( $ajax ); ?>
              <div class="post-info-box">
                  <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_meta(); ?>
              </div>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'gallery' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_gallery( 'list', $ajax ); ?>
              <div class="post-info-box">
                  <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_meta(); ?>
              </div>
          </article><!-- end .post -->

        <?php elseif( $post_format === 'video' ): ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_video( $ajax ); ?>
              <div class="post-info-box">
                  <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_meta(); ?>
              </div>
          </article><!-- end .post -->

        <?php else: ?>

          <article id="post-<?php the_ID(); ?>" class="post <?php echo esc_attr($post_class); ?>">
              <?php PRT_PinkButterflies::get_featured_image( 'list', $ajax ); ?>
              <div class="post-info-box">
                  <?php PRT_PinkButterflies::get_post_categories( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_title( $ajax ); ?>
                  <?php PRT_PinkButterflies::get_post_meta(); ?>
              </div>
          </article><!-- end .post -->

        <?php endif;

    } // end function get_list_posts()

} // end class

$prtPBAjaxLoadPosts = new PRT_PB_Ajax_Load_Posts;
