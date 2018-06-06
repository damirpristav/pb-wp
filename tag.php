<?php

// get the header
get_header();

?>

    <!-- ** Title Box ** -->
    <div id="title-box" class="v1">
        <div class="container">
            <div class="row">
                <div class="column-12">
                    <p class="sub-title"><?php _e( 'Tag', 'pinkbutterflies' ); ?></p>
                    <h2><?php echo single_tag_title( '', false ); ?></h2>
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
