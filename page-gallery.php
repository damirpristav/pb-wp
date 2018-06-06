<?php

/*
  * Template Name: Gallery
*/

PRT_PinkButterflies::get_single_post_header( get_the_ID() );

?>

<!-- ** Content Wrap ** -->
<div id="content-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="column-12">
                <header class="my-gallery-header">
                    <h2><?php the_title(); ?></h2>
                </header>
                <?php

                $gallery = get_post_gallery( get_the_ID(), false );
                $ids = explode( ',', $gallery['ids'] );

                ?>
                <div class="my-gallery-container masonry-layout clearfix" data-id="<?php echo get_the_ID(); ?>">
                    <div class="gutter"></div>

                    <?php for( $i=0; $i<9; $i++ ): ?>

                      <?php $img_info = PRT_PinkButterflies::wp_get_attachment_info( $ids[$i] ); ?>

                        <article class="my-photo">
                            <img src="<?php echo esc_url( $gallery['src'][$i] ); ?>" alt="<?php echo esc_attr( $img_info['alt'] ); ?>">
                            <div class="photo-overlay">
                                <div class="bg"></div>
                                <a href="<?php echo esc_url( $gallery['src'][$i] ); ?>" class="pb-gallery-popup" data-caption="<?php echo esc_attr( $img_info['alt'] ); ?>"><span></span></a>
                            </div>
                        </article><!-- end .my-photo -->

                    <?php endfor; ?>

                </div><!-- end .my-gallery-container -->
                <nav class="pb-navigation pb-navigation-2 gallery-page-navigation clearfix" role="navigation">
                    <a href="#" class="pb-load-more-images" data-gallery-count="<?php echo esc_html( count( $gallery['src'] ) ); ?>"><?php _e( 'Load More', 'pinkbutterflies' ); ?></a>
                </nav>
            </div><!-- end posts column -->
        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end #content-wrap -->

<?php

get_footer();
