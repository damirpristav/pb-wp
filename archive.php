<?php

// get the header
get_header();

?>

    <!-- ** Title Box ** -->
    <div id="title-box" class="v1">
        <div class="container">
            <div class="row">
                <div class="column-12">
                    <p class="sub-title">
                        <?php

                        if( is_day() ){
                            _e( 'Daily Archives', 'pinkbutterflies' );
                        }elseif( is_month() ){
                            _e( 'Monthly Archives', 'pinkbutterflies' );
                        }elseif( is_year() ) {
                            _e( 'Yearly Archives', 'pinkbutterflies' );
                        }else{
                            _e( 'archives', 'pinkbutterflies' );
                        }

                        ?>
                    </p>
                    <h2>
                        <?php

                        if ( is_day() ) :
                            printf( __( '%s', 'pinkbutterflies' ), get_the_date('l, F j, Y') );

                        elseif ( is_month() ) :
                            printf( __( '%s', 'pinkbutterflies' ), get_the_date('F - Y') );

                        elseif ( is_year() ) :
                           printf( __( '%s', 'pinkbutterflies' ), get_the_date('Y') );

                        endif;

                        ?>
                    </h2>
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
