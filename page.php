<?php

// get the header
PRT_PinkButterflies::get_single_post_header( get_the_ID() );

?>

<!-- ** Content Wrap ** -->
<div id="content-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="column-8">
                <?php

                if( have_posts() ):

                  while( have_posts() ):

                    the_post();

                ?>
                <article class="page">
                    <h2 class="page-title"><?php the_title(); ?></h2>
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
            <?php get_sidebar(); ?>
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #content-wrap -->

<?php

// subscription form
PRT_PinkButterflies::get_subscription_section();

get_footer();

?>
