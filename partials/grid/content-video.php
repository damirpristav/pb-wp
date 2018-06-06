<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php PRT_PinkButterflies::get_featured_video(); ?>
    <?php PRT_PinkButterflies::get_post_categories(); ?>
    <?php
    if( PRT_PinkButterflies::is_layout_standard_grid() ){
        PRT_PinkButterflies::get_post_title_sg_grid();
    }else{
        PRT_PinkButterflies::get_post_title();
    }
    ?>
    <div class="excerpt">
        <?php PRT_PinkButterflies::get_the_excerpt(22); ?>
    </div>
    <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
    <div class="read-more-wrap">
    <?php endif; ?>
    <?php PRT_PinkButterflies::get_read_more_button(); ?>
    <?php if( PRT_PinkButterflies::is_layout_standard_grid() ): ?>
    </div>
    <?php endif; ?>
</article><!-- end .post -->
