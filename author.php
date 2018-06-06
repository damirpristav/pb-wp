<?php

// get the header
get_header();

?>

    <!-- ** Title Box ** -->
    <div id="title-box" class="v1">
        <div class="container">
            <div class="row">
                <div class="column-12">
                    <p class="sub-title"><?php _e( 'All posts by', 'pinkbutterflies' ); ?></p>
                    <h2><?php echo get_the_author_meta('display_name'); ?></h2>
                    <?php if( get_the_author_meta( 'description' ) ){ ?>
                    <div class="text"><?php echo get_the_author_meta( 'description' ); ?></div>
                    <?php } ?>
                    <?php

                    $user_social_profiles = get_user_meta( get_the_author_meta( 'ID' ), 'prt_pb_author_social', true );

                    if( is_array( $user_social_profiles ) && !empty( $user_social_profiles ) ){

                    ?>

                    <div class="social">
                        <?php
                        foreach( $user_social_profiles as $profile ){

                            $profile_info = explode( ',', $profile );
                            $icon = $profile_info[0];
                            $url = $profile_info[1];
                            ?>
                            <a href="<?php echo esc_url($url); ?>"><i class="fab fa-<?php echo esc_attr($icon); ?>"></i></a>
                            <?php
                        }
                        ?>
                    </div>

                    <?php } ?>

                </div><!-- end .column-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- end #title-box -->

    <!-- ** Content Wrap ** -->
    <div id="content-wrap">
        <div class="container">
            <div class="row">
                <div id="main-content" class="column-8">
                    <div class="posts-container posts-container-list clearfix">
                        <?php

                        if( have_posts() ){

                            while( have_posts() ){

                                the_post();
                                get_template_part( 'partials/list/content', get_post_format() );

                            }

                        }

                        ?>
                    </div><!-- end .posts-container -->
                    <?php PRT_PinkButterflies::get_posts_navigation(); ?>
                </div><!-- end posts column -->
                <?php get_sidebar(); ?>
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- end #content-wrap -->

<?php

// subscription form
PRT_PinkButterflies::get_subscription_section();

// get the footer
get_footer();
