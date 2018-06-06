<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php PRT_PinkButterflies::get_post_categories(); ?>
    <?php PRT_PinkButterflies::get_post_title(); ?>
    <?php PRT_PinkButterflies::get_post_meta(); ?>
    <?php PRT_PinkButterflies::get_featured_gallery(); ?>
    <div class="excerpt">
        <?php PRT_PinkButterflies::get_the_excerpt(49); ?>
    </div>
    <?php if( !PRT_PinkButterflies::is_hidden_comments_read_more_and_share() ): ?>
    <footer class="clearfix">
        <div class="col post-comments-number">
            <?php PRT_PinkButterflies::get_number_of_comments(); ?>
        </div>
        <div class="col read-more-wrap">
            <?php PRT_PinkButterflies::get_read_more_button(); ?>
        </div>
        <div class="col post-share">
            <?php PRT_PinkButterflies::get_post_share_buttons(); ?>
        </div>
    </footer>
    <?php endif; ?>
</article><!-- end .post -->
