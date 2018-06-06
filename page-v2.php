<?php

/*

  Template Name: Title on top, no sidebar

*/

// get the header
PRT_PinkButterflies::get_single_post_header( get_the_ID() );

?>

<!-- ** Title Box ** -->
<div id="title-box" class="v1 page-title-box">
    <div class="container">
        <div class="row">
            <div class="column-12">
                <h2><?php the_title(); ?></h2>
            </div><!-- end .column-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #title-box -->

<!-- ** Content Wrap ** -->
<div id="content-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="column-12">
                <?php

                if( have_posts() ):

                    while( have_posts() ):

                      the_post();

                    if( !has_post_thumbnail() ){
                        $no_thumb_class = 'no-page-thumbnail';
                    }else{
                        $no_thumb_class = '';
                    }

                ?>
                <article class="page no-sidebar <?php echo esc_attr( $no_thumb_class ); ?> clearfix">
                    <?php if( has_post_thumbnail() ): ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="single-post-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php

                    endwhile;

                endif;

                ?>
            </div><!-- end posts column -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #content-wrap -->

<?php

// subscription form
PRT_PinkButterflies::get_subscription_section();

get_footer();

?>
