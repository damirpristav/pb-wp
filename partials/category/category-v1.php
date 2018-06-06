<?php

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;

$category_bg_image = get_term_meta( $cat_id, 'prt_pb_category_image', true );
$category_description = category_description( $cat_id );

if( empty( $category_bg_image ) ){
    $category_bg_image = PRT_PinkButterflies::get_default_category_bg_image();
}

?>

<!-- ** Title Box ** -->
<div id="title-box" class="v2" <?php if( $category_bg_image !== '' ){ ?> style="background-image: url(<?php echo esc_url($category_bg_image); ?>);" <?php } ?>>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="column-12">
                <p class="sub-title"><?php _e( 'Browsing category', 'pinkbutterflies' ); ?></p>
                <h2><?php printf( __( '%s', 'pinkbutterflies' ), single_cat_title( '', false ) ); ?></h2>
                <?php if( $category_description ): ?>
                <p><?php echo $category_description; ?></p>
              <?php endif; ?>
            </div><!-- end .column-12 -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #title-box -->

<!-- ** Content Wrap ** -->
<div id="content-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="column-12">
                <div class="posts-container posts-container-masonry-full-v1 masonry-layout clearfix">
                    <div class="gutter"></div>
                    <?php

                    if( have_posts() ){

                        while( have_posts() ){

                            the_post();

                            get_template_part( 'partials/grid/content', get_post_format() );

                        }

                    }

                    ?>
                </div><!-- end .posts-container -->
                <?php PRT_PinkButterflies::get_posts_navigation(); ?>
            </div><!-- end posts column -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #content-wrap -->
