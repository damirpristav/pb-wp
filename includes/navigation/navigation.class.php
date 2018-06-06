<?php

class PRT_PB_Navigation extends PRT_PinkButterflies{

    public static function next_posts_link_atts(){

        return 'class="next"';

    }

    public static function prev_posts_link_atts(){

        return 'class="prev"';

    }

    public static function posts_navigation(){
        ?>
        <nav class="pb-navigation clearfix" role="navigation">
            <?php posts_nav_link( ' ', __( 'Newer posts', 'pinkbutterflies' ), __( 'Older posts', 'pinkbutterflies' ) ); ?>
        </nav>
        <?php
    }

    public static function posts_navigation_2(){

        global $wp_query;

        // Set up paginated links.
        $links = paginate_links( array(
            'total'    => $wp_query->max_num_pages,
            'mid_size' => 1,
            'end_size' => 2,
            'add_args' => array(),
            'prev_text' => __( 'Prev', 'pinkbutterflies' ),
            'next_text' => __( 'Next', 'pinkbutterflies' ),
        ));

        if( $links ){
        ?>
        <nav class="pb-navigation pb-navigation-3 clearfix" role="navigation">
            <?php echo $links; ?>
        </nav>
        <?php
        }

    }

    // posts navigation 3 - ajax load more button
    public static function posts_navigation_3(){

        $pb_theme_options = self::get_theme_options();
        if( is_archive() || is_search() ){

            $count_posts = $GLOBALS['wp_query']->found_posts;

            if( array_key_exists( 'posts_to_load_archive', $pb_theme_options ) ){
                $posts_to_load = $pb_theme_options['posts_to_load_archive'];
            }else{
                $posts_to_load = 3;
            }

        }else{

            $count_posts = wp_count_posts()->publish;

            if( array_key_exists( 'posts_to_load', $pb_theme_options ) ){
                $posts_to_load = $pb_theme_options['posts_to_load'];
            }else{
                $posts_to_load = 3;
            }

        }

        ?>

        <nav class="pb-navigation pb-navigation-2 clearfix" role="navigation">
            <a href="#" class="ajax-btn"
                        data-ppp="<?php echo get_option('posts_per_page'); ?>"
                        data-cp="<?php echo $count_posts; ?>"
                        data-load="<?php echo esc_attr($posts_to_load); ?>"
                        data-sticky="<?php echo count( get_option('sticky_posts') ); ?>"
                        data-sg-layout="<?php if( is_archive() || is_search() ){ echo false; }else{ echo parent::is_layout_standard_grid(); } ?>">
                        Load more posts
            </a>
        </nav>

        <?php

    }

    // get single post navigation
    public static function get_single_post_navigation(){

        ?>

        <nav id="pb-post-navigation" class="clearfix">
            <div class="left">
                <?php previous_post_link( '%link', '<span>Previous Post </span> %title' ); ?>
            </div>
            <div class="right">
                <?php next_post_link( '%link', '<span>Next Post</span> %title' ); ?>
            </div>
        </nav><!-- end #post-navigation -->

        <?php

    } // end function get_single_post_navigation()

}
