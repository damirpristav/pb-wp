<?php
/*
  Here are parts of post templates
*/

class PRT_PB_Post_Partials extends PRT_PinkButterflies{

    // get logo
    public static function get_logo( $logo, $wrap ){

        if( isset( $logo ) && $logo ){
            if( !empty( $logo ) ){
              if( $wrap == 'wrap' ){ echo '<div class="logo-wrap">'; }
            ?>
            <a href="<?php echo esc_url( home_url() ); ?>" id="logo">
                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
            <?php
              if( $wrap == 'wrap' ){ echo '</div>'; }
            }
        }else{
            if( $wrap == 'wrap' ){ echo '<div class="logo-wrap">'; }
            ?>
            <a href="<?php echo esc_url( home_url() ); ?>" id="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
            </a>
            <?php
            if( $wrap == 'wrap' ){ echo '</div>'; }
        }

    } // end get_logo()

    // social icons
    public static function social_icons( $icons, $css_class ){

        ?>
        <div class="<?php echo esc_attr($css_class); ?>">
            <?php foreach( $icons as $icon ): ?>
            <a href="<?php echo esc_url($icon['url']); ?>"><i class="fab fa-<?php echo esc_attr($icon['name']); ?>"></i></a>
            <?php endforeach; ?>
        </div>
        <?php

    } // end social_icons()

    // post title
    public static function post_title( $ajax ){

        if( empty( $ajax ) ){

            if( is_category() ){

                $category = get_category( get_query_var( 'cat' ) );
                $cat_id = $category->cat_ID;
                $version = get_term_meta( $cat_id, 'prt_pb_category_version', true );

                if( $version ){
                    if( $version === 'v2' ){
                        ?>
                        <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php
                    }else{
                        ?>
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php
                    }
                }else{
                    ?>
                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php
                }

            }elseif( is_archive() || is_search() ){
                ?>
                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php
            }else{
                if( parent::is_layout_standard() ){
                    ?>
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                }elseif( parent::is_layout_grid() || parent::is_layout_list() ){
                    ?>
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                }elseif( parent::is_layout_masonry_v2() ){
                    ?>
                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php
                }else{
                    ?>
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                }
            }

        }elseif( $ajax === 'ajax-list' || $ajax === 'ajax-grid' ){
            ?>
            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php
        }elseif( $ajax === 'ajax-masonry' ){
            ?>
            <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php
        }elseif( $ajax === 'ajax-standard' ){
            ?>
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
        }

    } // end post_title()

    // post title standard grid - grid
    public static function post_title_sg_grid(){
        ?>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php
    } // end post_title_sg_grid()

    // featured image
    public static function featured_image( $size, $ajax ){

        if( has_post_thumbnail() ){

        ?>
        <div class="featured-image">
            <?php the_post_thumbnail( $size ); ?>
        </div>
        <?php

        }else{

            if( parent::is_layout_list() ){

                if( !is_archive && !is_search ){

                    self::no_featured_media();

                }elseif( $ajax === 'ajax-list' ){

                    self::no_featured_media();

                }

            }

        }

    } // end featured_image()

    // featured audio
    public static function featured_audio( $ajax ){

        $content = apply_filters( 'the_content', get_the_content() );
        $audio = false;

        if( !strpos( $content, 'wp-playlist-script' ) ){
            $audio = get_media_embedded_in_content( $content, array( 'audio', 'iframe' ) );
        }

        if( $audio ){

        ?>
        <div class="featured-image">
            <?php echo $audio[0]; ?>
        </div>
        <?php

        }else{

            if( parent::is_layout_list() || $ajax === 'ajax-list' ){
                self::no_featured_media();
            }

        } // end if $audio

    } // end featured_audio()

    // featured video
    public static function featured_video( $ajax ){

        $content = apply_filters( 'the_content', get_the_content() );
        $video = false;

        if( !strpos( $content, 'wp-playlist-script' ) ){
            $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
        }

        if( $video ){
        ?>
        <div class="featured-image">
            <?php echo $video[0]; ?>
        </div>
        <?php
        }else{

            if( parent::is_layout_list() || $ajax === 'ajax-list' ){
                self::no_featured_media();
            }

        }

    } // end featured_video()

    // featured gallery
    public static function featured_gallery( $size, $ajax ){

        if( get_post_gallery() ){

          $gallery = get_post_gallery( get_the_ID(), false );
          $ids = ( !empty( $gallery['ids'] ) ) ? explode( ',', $gallery['ids'] ) : null;

        ?>
        <div class="featured-image">
            <?php if( parent::is_layout_list() || $ajax === 'ajax-list' ): ?>
            <div class="gallery-wrap">
            <?php endif; ?>
            <div class="owl-gallery">
                <div class="slider">
                    <?php

                    if( is_array( $ids ) || is_object( $ids ) ){
                        foreach( $ids as $id ){

                            $image = wp_get_attachment_image( $id, $size );
                            echo $image;

                        }
                    }

                    ?>
                </div>
                <span class="prev"><i class="fa fa-angle-left"></i></span>
                <span class="next"><i class="fa fa-angle-right"></i></span>
            </div>
            <?php if( parent::is_layout_list() || $ajax === 'ajax-list' ): ?>
            </div>
            <?php endif; ?>
        </div>
        <?php

        }else{

            if( parent::is_layout_list() || $ajax === 'ajax-list' ){
                self::no_featured_media();
            }

        } // end if get_post_gallery()

    } // end featured_gallery()

    // no featured media
    public static function no_featured_media(){

        $pb_theme_options = parent::get_theme_options();
        $icon = 'ban';

        if( array_key_exists( 'no_featured_image_icon', $pb_theme_options ) ){
            $icon = $pb_theme_options['no_featured_image_icon'];
        }

        ?>
        <div class="featured-image">
            <div class="no-thumbnail">
                <img src="<?php echo get_template_directory_uri(); ?>/images/no-thumbnail.png" alt="">
                <div class="overlay"></div>
                <div class="icon"><i class="fa fa-<?php echo $icon; ?>"></i></div>
            </div>
        </div>
        <?php

    } // end no_featured_media()

    // post meta
    public static function post_meta(){
        ?>
        <div class="post-meta">
            <span class="post-author">
                <?php _e( 'by', 'pinkbutterflies' ); ?> <?php the_author_posts_link(); ?>
            </span>
            <?php
            $archive_year  = get_the_time('Y');
            $archive_month = get_the_time('m');
            $archive_day   = get_the_time('d');
            ?>
            <span class="post-date">
                <?php _e( 'on', 'pinkbutterflies' ); ?>
                <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></a>
            </span>
        </div>
        <?php
    } // end post_meta()

    // post categories
    public static function post_categories( $grid_layout, $ajax ){

        if( empty( $ajax ) ){

            if( is_category() || is_search() ){
                ?>
                <div class="categories">
                    <div>
                        <?php the_category(' '); ?>
                    </div>
                </div>
                <?php
            }elseif( is_archive() ){
                ?>
                <div class="categories">
                    <div>
                        <span class="line-left"></span>
                        <span class="line-right"></span>
                        <?php the_category(' '); ?>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <div class="categories">
                    <div>
                        <?php if( !$grid_layout ): ?>
                        <span class="line-left"></span>
                        <span class="line-right"></span>
                        <?php endif; ?>
                        <?php the_category(' '); ?>
                    </div>
                </div>
                <?php
            }

        }elseif( $ajax === 'ajax-grid' ) {
            ?>
            <div class="categories">
                <div>
                    <?php the_category(' '); ?>
                </div>
            </div>
            <?php
        }elseif( $ajax === 'ajax-list' || $ajax === 'ajax-standard' ){
            ?>
            <div class="categories">
                <div>
                    <span class="line-left"></span>
                    <span class="line-right"></span>
                    <?php the_category(' '); ?>
                </div>
            </div>
            <?php
        }

    } // end single_post_categories()

    // number of comments
    public static function number_of_comments(){
        ?>
        <a href="<?php comments_link(); ?>">
            <?php
            comments_number(
                __( 'No comments', 'pinkbutterflies' ),
                '1 ' . __( 'comment', 'pinkbutterflies' ),
                '% ' . __( 'comments', 'pinkbutterflies' )
            );
            ?>
        </a>
        <?php
    } // end number_of_comments()

    // post share buttons
    public static function post_share_buttons(){

        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src( $thumb_id, 'thumbnail-size' , true);

        if( is_single() ){

            echo '<div class="post-share">';

        }

        ?>

        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php rawurlencode( get_the_permalink() ); ?>&picture=<?php echo esc_url($thumb_url[0]); ?>&title=<?php the_title(); ?>"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
        <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url($thumb_url[0]);  ?>"><i class="fab fa-pinterest-p"></i></a>
        <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus-g"></i></a>

        <?php

        if( is_single() ){

            echo '</div>';

        }

    } // end post_share_buttons()

    // post tags
    public static function post_tags(){
        ?>

        <div class="post-tags">
            <?php the_tags( '', ' ', '' ); ?>
        </div><!-- end .post-tags -->

        <?php
    } // end post_tags()

    // single post content
    public static function single_post_content(){

        if( has_post_format( 'gallery' ) ){

            $content = get_the_content();
            $content = preg_replace('/\[gallery[^\]]+\]/', "", $content);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            ?>
            <div class="single-post-content clearfix">
            <?php
            echo $content;

            wp_link_pages( array(
                'before'      => '<div class="page-links-wrap"><div class="page-links">',
                'after'       => '</div></div>',
                'link_before' => '<span class="page-links-link">',
                'link_after'  => '</span>',
                'nextpagelink'     => __( 'Next Page <i class="fa fa-long-arrow-right"></i>', 'pinkbutterflies' ),
                'previouspagelink' => __( '<i class="fa fa-long-arrow-left"></i> Prev Page', 'pinkbutterflies' ),
                'next_or_number' => 'number'
            ) );
            ?>
            </div><!-- end .single-post-content -->
            <?php
        }else{
            ?>
            <div class="single-post-content clearfix">
                <?php

                the_content();

                wp_link_pages( array(
                    'before'      => '<div class="page-links-wrap"><div class="page-links">',
                    'after'       => '</div></div>',
                    'link_before' => '<span class="page-links-link">',
                    'link_after'  => '</span>',
                    'nextpagelink'     => __( 'Next Page <i class="fa fa-long-arrow-right"></i>', 'pinkbutterflies' ),
                    'previouspagelink' => __( '<i class="fa fa-long-arrow-left"></i> Prev Page', 'pinkbutterflies' ),
                    'next_or_number' => 'number'
                ) );

                ?>
            </div><!-- end .single-post-content -->
            <?php
        } // end if

    } // end single_post_content()

    // read more button
    public static function read_more_button( $ajax ){

        if( parent::is_layout_grid() || is_category() || is_search() || $ajax === 'ajax-grid' ){
            echo '<div class="read-more-wrap">';
        }

        ?>
        <a href="<?php the_permalink(); ?>"><?php _e( 'read more', 'pinkbutterflies' ); ?></a>
        <?php

        if( parent::is_layout_grid() || is_category() || is_search() || $ajax === 'ajax-grid' ){
            echo '</div>';
        }

    } // end read_more_button()

    // footer text
    public static function footer_text( $text ){

        ?>
        <div class="footer-text">
        <?php
        if( $text && !empty( $text ) ){
            ?>
            <p><?php echo $text; ?></p>
            <?php
        }else{
            ?>
            <p>Copyright &copy;  2018 The PinkButterflies - WordPress theme for bloggers - by PRThemes(Damir Pristav)</p>
            <?php
        }
        ?>
        </div>
        <?php

    } // end footer_text()

    /*************************************************************************
    *  Featured Sliders
    *************************************************************************/
    // featured slider
    public static function featured_slider(){

        $args = array(
            'meta_key' => 'prt_pb_featured_post_field',
            'meta_value' => 1,
            'ignore_sticky_posts' => 1,
            'posts_per_page' => 10
        );

        $featured_query = new WP_Query($args);

        if( $featured_query->have_posts() ){

        ?>
        <!-- ** Featured Slider  ** -->
        <div id="featured-slider-wrap">
            <div id="featured-slider">
                <?php
                while( $featured_query->have_posts() ){
                  $featured_query->the_post();
                ?>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="column-4">
                                <div class="categories">
                                    <?php the_category(' '); ?>
                                </div>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="excerpt">
                                    <?php PRT_PinkButterflies::get_the_excerpt(20); ?>
                                </div>
                            </div><!-- end .column-4 -->
                            <div class="column-8">
                                <div class="featured-image">
                                    <?php the_post_thumbnail('standard'); ?>
                                </div>
                            </div><!-- end .column-4 -->
                        </div><!-- end .row -->
                    </div><!-- end .container -->
                </div><!-- end .item -->
                <?php } // end while ?>
            </div><!-- end #featured-slider -->
            <div class="container">
                <span class="prev"><i class="fa fa-angle-left"></i></span>
                <span class="next"><i class="fa fa-angle-right"></i></span>
            </div>
        </div><!-- end #featured-slider-wrap -->
        <?php

        } // end if $featured_query->have_posts()

        wp_reset_postdata();

    } // end featured_slider()

    // featured slider 2
    public static function featured_slider2(){

        $args = array(
            'meta_key' => 'prt_pb_featured_post_field',
            'meta_value' => 1,
            'ignore_sticky_posts' => 1,
            'posts_per_page' => 10
        );

        $featured_query = new WP_Query($args);

        if( $featured_query->have_posts() ){
          if( $featured_query->post_count > 2 ){

        ?>
        <!-- ** Featured Slider  ** -->
        <div id="featured-slider-wrap">
            <div id="featured-slider-2">
                <?php
                while( $featured_query->have_posts() ){
                  $featured_query->the_post();
                ?>
                <div class="item" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

                    <div class="va-cols-wrap">
                        <div class="va-col">
                            <div class="text-wrap">
                                <div class="overlay"></div>
                                <div class="categories">
                                    <?php the_category(' '); ?>
                                </div>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                        </div>
                    </div>

                </div><!-- end .item -->
                <?php } // end while ?>
            </div><!-- end #featured-slider-2 -->
            <span class="prev-2"><i class="fa fa-angle-left"></i></span>
            <span class="next-2"><i class="fa fa-angle-right"></i></span>
        </div><!-- end #featured-slider-wrap -->
        <?php
          } // end if $featured_query->post_count > 2
        } // end if $featured_query->have_posts()

        wp_reset_postdata();

    } // end featured_slider2()

    // featured slider 3
    public static function featured_slider3(){

        $args = array(
            'meta_key' => 'prt_pb_featured_post_field',
            'meta_value' => 1,
            'ignore_sticky_posts' => 1,
            'posts_per_page' => 10
        );

        $featured_query = new WP_Query($args);

        if( $featured_query->have_posts() ){

        ?>
        <!-- ** Featured Slider  ** -->
        <div id="featured-slider-wrap" class="v3">
            <div class="container">
                <div class="row">
                    <div class="column-12">
                        <div id="featured-slider-3">
                            <?php
                            while( $featured_query->have_posts() ){
                              $featured_query->the_post();
                            ?>
                            <div class="item" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

                                <div class="va-cols-wrap">
                                    <div class="va-col">
                                        <div class="text-wrap">
                                            <div class="overlay"></div>
                                            <div class="categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end .item -->
                            <?php } // end while ?>
                        </div><!-- end #featured-slider-3 -->
                    </div><!-- end .column-12 -->
                </div><!-- end .row -->
                <span class="prev-3"><i class="fa fa-angle-left"></i></span>
                <span class="next-3"><i class="fa fa-angle-right"></i></span>
            </div><!-- end .container -->
        </div><!-- end #featured-slider-wrap -->
        <?php

        } // end if $featured_query->have_posts()

        wp_reset_postdata();

    } // end featured_slider3()

    // featured slider 4
    public static function featured_slider4(){

        $args = array(
            'meta_key' => 'prt_pb_featured_post_field',
            'meta_value' => 1,
            'ignore_sticky_posts' => 1,
            'posts_per_page' => 10
        );

        $featured_query = new WP_Query($args);

        if( $featured_query->have_posts() ){
          if( $featured_query->post_count > 3 ){

        ?>
        <!-- ** Featured Slider  ** -->
        <div id="featured-slider-wrap" class="v4">
            <div class="container">
                <div class="row">
                    <div class="column-12">
                        <div id="featured-slider-4">
                            <?php
                            while( $featured_query->have_posts() ){
                              $featured_query->the_post();
                            ?>
                            <div class="item" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

                                <div class="text-wrap">
                                    <div class="overlay"></div>
                                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </div>

                            </div><!-- end .item -->
                            <?php } // end while ?>
                        </div><!-- end #featured-slider-4 -->
                        <span class="prev-4"><i class="fa fa-angle-left"></i></span>
                        <span class="next-4"><i class="fa fa-angle-right"></i></span>
                    </div><!-- end .column-12 -->
                </div><!-- end .row -->
            </div><!-- end .container -->
        </div><!-- end #featured-slider-wrap -->
        <?php
          } // end if $featured_query->post_count > 3
        } // end if $featured_query->have_posts()

        wp_reset_postdata();

    } // end featured_slider4()
    /****************************************
    *  END Featured Sliders
    ****************************************/

    // related posts
    public static function related_posts( $post_id ){

        $categories = get_the_category( $post_id );

        if( $categories ){

            $cat_ids = [];
            foreach( $categories as $cat ){
                $cat_ids[] = $cat->term_id;
            }

            $args = array(
                'category__in' => $cat_ids,
                'post__not_in' => array( $post_id ),
                'posts_per_page' => 3
            );

            $rp_query = new WP_Query( $args );

            if( $rp_query->have_posts() ){

        ?>
        <div class="related-posts clearfix">
            <div class="inner-wrap">
                <h6><span><?php _e( 'Related Posts', 'pinkbutterflies' ); ?></span></h6>
                <div class="inner clearfix">
                    <?php

                    while( $rp_query->have_posts() ){
                      $rp_query->the_post();

                    ?>
                    <div class="pb-related" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                        <div class="overlay"></div>
                        <div class="text va-cols-wrap">
                            <div class="va-col">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <?php } // end while ?>
                </div>
            </div>
        </div><!-- end .related-posts -->
        <?php
            } // end if $rp_query->have_posts()
        } // end if $categories

        wp_reset_postdata();

    } // end function related_posts()

    // about author
    public static function about_author(){

        $user_social_profiles = get_user_meta( get_the_author_meta( 'ID' ), 'prt_pb_author_social', true );

        ?>
        <div class="about-post-author clearfix">
            <div class="author-image">
              <?php if( get_the_author_meta('prt_pb_author_image') ): ?>
                  <img src="<?php echo get_the_author_meta('prt_pb_author_image'); ?>" alt="" />
              <?php else: ?>
                  <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
              <?php endif; ?>
            </div>
            <div class="author-info">
                <h5><?php echo get_the_author_meta('display_name'); ?></h5>
                <?php if( get_the_author_meta( 'description' ) ){ ?>
                <p><?php echo get_the_author_meta( 'description' ); ?></p>
                <?php } ?>
                <?php if( !empty( $user_social_profiles ) ): ?>
                <div class="author-social">
                    <?php
                    foreach( $user_social_profiles as $profile ){

                        $profile_info = explode( ',', $profile );
                        $icon = $profile_info[0];
                        $url = $profile_info[1];
                        ?>
                        <a href="<?php echo $url; ?>"><i class="fab fa-<?php echo $icon; ?>"></i></a>
                        <?php
                    }
                    ?>
                </div>
              <?php endif; ?>
            </div>
        </div><!-- end .about-post-author -->
        <?php

    } // end function about_author()

    // subscribe to newsletter
    public static function subscribe_to_newsletter(){

        $pb_theme_options = parent::get_theme_options();
        $text1 = false;
        $text2 = false;
        $text3 = false;
        $shortcode = false;
        $defaults = array(
            'text_1' => __( 'Thanks for visiting! We are so happy to have you.', 'pinkbutterflies' ),
            'text_2' => __( 'Let\'s stay in touch', 'pinkbutterflies' ),
            'text_3' => __( 'Subscribe for the latest news and updates delivered straight to your inbox.', 'pinkbutterflies' ),
        );

        if( $pb_theme_options && array_key_exists( 'subscription_text_1', $pb_theme_options ) && !empty( $pb_theme_options['subscription_text_1'] ) ){
            $text1 = $pb_theme_options['subscription_text_1'];
        }else{
            $text1 = $defaults['text_1'];
        }

        if( $pb_theme_options && array_key_exists( 'subscription_text_2', $pb_theme_options ) && !empty( $pb_theme_options['subscription_text_2'] ) ){
            $text2 = $pb_theme_options['subscription_text_2'];
        }else{
            $text2 = $defaults['text_2'];
        }

        if( $pb_theme_options && array_key_exists( 'subscription_text_3', $pb_theme_options ) && !empty( $pb_theme_options['subscription_text_3'] ) ){
            $text3 = $pb_theme_options['subscription_text_3'];
        }else{
            $text3 = $defaults['text_3'];
        }

        if( $pb_theme_options && array_key_exists( 'subscription_shortcode', $pb_theme_options ) && !empty( $pb_theme_options['subscription_shortcode'] ) ){
            $shortcode = $pb_theme_options['subscription_shortcode'];
        }

        if( $shortcode ){
        ?>
        <!-- ** Subscribe to Newsletter ** -->
        <div id="subscribe-to-newsletter" <?php parent::get_subscription_html_class(); ?>>
            <div class="container">
                <div class="row">
                    <div class="column-4">
                        <h3><?php echo esc_html( $text1 ); ?></h3>
                    </div><!-- end .column-4 -->
                    <div class="column-4">
                        <h6><?php echo esc_html( $text2 ); ?></h6>
                        <p class="pb-subscription-text"><?php echo esc_html( $text3 ); ?></p>
                    </div><!-- end .column-4 -->
                    <div class="column-4">
                        <?php echo do_shortcode( $shortcode ); ?>
                    </div><!-- end .column-4 -->
                </div><!-- end.row -->
            </div><!-- end .container -->
        </div><!-- end #subscribe-to-newsletter -->
        <?php
        } // end if $shortcode

    } // end function subscribe_to_newsletter()

}
