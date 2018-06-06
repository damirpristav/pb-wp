<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php PRT_PinkButterflies::get_featured_gallery( 'list' ); ?>
    <div class="post-info-box">
        <?php PRT_PinkButterflies::get_post_categories(); ?>
        <?php PRT_PinkButterflies::get_post_title(); ?>
        <?php PRT_PinkButterflies::get_post_meta(); ?>
    </div>
</article><!-- end .post -->
