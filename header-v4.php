<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <?php if( is_singular() ){ wp_enqueue_script( 'comment-reply' ); } ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		    <!-- ** Header ** -->
        <header id="header" class="version-4">
           <nav id="main-nav">
               <div class="container">
                   <div class="row">
                       <div class="column-12">
                           <?php PRT_PinkButterflies::get_theme_menu( 'main_menu', 'clearfix', 'main-menu', 3 ); ?>
                           <a href="#" id="mobile-menu-trigger">
                               <i class="fas fa-bars"></i>
                               <span><?php _e( 'Menu', 'pinkbutterflies' ); ?></span>
                           </a>
                           <div class="search-wrap">
                               <a href="#" id="search-trigger-2">
                                   <i class="fas fa-search"></i>
                               </a>
                               <a href="#" id="search-close">
                                   <i class="fas fa-times"></i>
                               </a>
                               <div class="search">
                                   <?php get_search_form(); ?>
                               </div>
                               <div class="search-mobile">
                                   <a href="#" id="search-trigger" data-pb-lightbox="#search-lightbox"><i class="fas fa-search"></i></a>
                               </div>
                           </div>
                       </div><!-- end .column-12 -->
                   </div><!-- end .row -->
               </div><!-- end .container -->
           </nav><!-- end #main-nav -->
           <div class="header-logo-wrap">
               <div class="container">
                   <div class="row">
                       <div class="column-12">
                           <?php PRT_PinkButterflies::get_theme_logo('wrap'); ?>
                       </div><!-- end .column-12 -->
                   </div><!-- end .row -->
               </div><!-- end .container -->
           </div><!-- end .header-logo-wrap -->
        </header><!-- end #header -->

        <!-- ** Mobile Menu ** -->
        <div id="mobile-menu-overlay"></div>
        <div id="mobile-menu-wrap">
            <?php PRT_PinkButterflies::get_theme_menu( 'main_menu', 'clearfix', 'mobile-menu', 3 ); ?>
        </div><!-- end #mobile-menu-wrap -->

        <!-- ** Lightbox ** -->
        <div class="pb-lightbox" id="search-lightbox">
            <div class="overlay"></div>
            <div class="pb-lightbox-inner">
                <div class="pb-lightbox-content">
                    <div class="close"></div>
                    <div class="container">
                        <div class="row">
                            <div class="column-12">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- end .pb-lightbox-content -->
            </div><!-- end .pb-lightbox-inner -->
        </div><!-- end .pb-lightbox -->
