<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class('page-404'); ?>>
      <div class="page-404-overlay"></div>

	    <!-- ** Page 404 Content ** -->
      <div class="va-cols-wrap">
          <div class="va-col">
              <div class="page-404-content">
                  <div class="container">
                      <div class="column-12">
                          <h1>404</h1>
                          <h2><?php _e( 'Page not found', 'pinkbutterflies' ); ?></h2>
                          <p><?php _e( 'Sorry but the page you are lookink for doesn\'t exist!', 'pinkbutterflies' ); ?></p>
                          <a href="<?php echo esc_url( home_url() ); ?>" class="btn"><?php _e( 'Go back home', 'pinkbutterflies' ); ?></a>
                      </div><!-- end .column-12 -->
                  </div><!-- end .container -->
              </div><!-- end .page-404-content -->
          </div><!-- end .va-col -->
      </div><!-- end .va-cols-wrap -->

      <?php wp_footer(); ?>

	</body>
</html>
