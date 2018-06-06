<?php

// get the header
get_header();

?>

    <!-- ** Title Box ** -->
    <div id="title-box" class="v1">
        <div class="container">
            <div class="row">
                <div class="column-12">
                    <p class="sub-title"><?php _e( 'SEARCH RESULTS FOR:', 'pinkbutterflies' ); ?></p>
                    <h2><?php echo get_search_query(); ?></h2>
                </div><!-- end .column-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- end #title-box -->

    <!-- ** Content Wrap ** -->
    <div id="content-wrap">
        <div class="container">
            <div class="row">
                <div id="main-content" class="column-8">
                    <div class="posts-container posts-container-masonry masonry-layout clearfix">
                        <div class="gutter"></div>
                        <?php

                        if( have_posts() ){

                            while( have_posts() ){

                                the_post();
                                get_template_part( 'partials/grid/content', get_post_format() );

                            }

                        }else{
                            ?>
                            <div class="nothing-found-section">
                                <h4><?php _e( 'Nothing found', 'pinkbutterflies' ); ?></h4>
                                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pinkbutterflies' ); ?></p>
                                <?php get_search_form(); ?>
                            </div>
                            <?php
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
