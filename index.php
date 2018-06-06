<?php

// get the header
PRT_PinkButterflies::get_theme_header();

// get the slider
PRT_PinkButterflies::get_featured_slider();

if( PRT_PinkButterflies::check_subscription_position() ){
    // subscription form
    PRT_PinkButterflies::get_subscription_section();
}

?>

    <!-- ** Content Wrap ** -->
    <div id="content-wrap" <?php PRT_PinkButterflies::get_content_wrap_class(); ?>>
        <div class="container">
            <div class="row clearfix">
                <div id="main-content" <?php PRT_PinkButterflies::get_main_content_class(); ?>>
                    <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>

                        <?php PRT_PinkButterflies::get_standard_grid_posts(); ?>

                    <?php else: ?>

                    <div <?php PRT_PinkButterflies::get_posts_container_class(); ?>>
                        <?php PRT_PinkButterflies::check_for_gutter(); ?>

                    <?php

                    if( have_posts() ){

                        while( have_posts() ){

                            the_post();

                            PRT_PinkButterflies::get_posts();

                        }

                    }else {

                        get_template_part( 'partials/content', 'none' );

                    }

                    ?>
                    </div><!-- end .posts-container -->

                    <?php endif; // end if is_layout_standard_grid() ?>

                    <?php PRT_PinkButterflies::get_posts_navigation(); ?>
                </div><!-- end posts column -->
                <?php PRT_PinkButterflies::get_theme_sidebar(); ?>
            </div><!-- end .row -->
        </div><!-- end .container -->
    </div><!-- end #content-wrap -->

<?php

if( !PRT_PinkButterflies::check_subscription_position() ){
    // subscription form
    PRT_PinkButterflies::get_subscription_section();
}

// get the footer
get_footer();
