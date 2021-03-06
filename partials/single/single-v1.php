<?php

while( have_posts() ): the_post();

if( is_attachment() ):
?>
<!-- ** Title Box ** -->
<div id="title-box" class="v1">
   <div class="container">
       <div class="row">
           <div class="column-12">
               <h2><?php the_title(); ?></h2>
           </div><!-- end .column-12 -->
       </div><!-- end .row -->
   </div><!-- end .container -->
</div><!-- end #title-box -->
<?php
else:
?>
<!-- ** Title Box ** -->
<div id="title-box" class="v3" <?php PRT_PinkButterflies::get_featured_bg_image(); ?>>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="column-12">
                <?php PRT_PinkButterflies::get_post_categories(); ?>
                <h2><?php the_title(); ?></h2>
                <?php PRT_PinkButterflies::get_post_meta(); ?>
            </div><!-- end .column-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #title-box -->
<?php
endif;

endwhile; // end while have_posts()

?>

<!-- ** Content Wrap ** -->
<div id="content-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="column-8 column-center">
                <?php

                while( have_posts() ): the_post();

                ?>
                <article class="post">
                    <?php PRT_PinkButterflies::get_single_post_featured_area( get_the_ID() ); ?>
                    <?php PRT_PinkButterflies::get_single_post_content(); ?>
                </article>
                <?php if( !is_attachment() ): ?>
                <?php PRT_PinkButterflies::get_tags(); ?>
                <?php if( !PRT_PinkButterflies::is_hidden_comments_and_share() ): ?>
                <div class="single-share-wrap full-width-column clearfix">
                    <div class="half-width-column comments-num">
                        <?php PRT_PinkButterflies::get_number_of_comments(); ?>
                    </div>
                    <div class="half-width-column clearfix">
                        <?php PRT_PinkButterflies::get_post_share_buttons(); ?>
                    </div>
                </div><!-- end .full-width-column -->
                <?php endif; ?>
                <?php

                    PRT_PB_Navigation::get_single_post_navigation();

                    PRT_PinkButterflies::get_related_posts( get_the_ID() );

                    PRT_PinkButterflies::get_about_author_section();

                    // get comments
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                endif; // if not attachment

                endwhile; // end while have_posts()

                ?>
            </div><!-- end posts column -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #content-wrap -->
