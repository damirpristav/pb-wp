<form role="search" method="get" action="<?php echo esc_url( home_url('/') ) ?>">
    <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label', 'pinkbutterflies' ); ?></label>
    <input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>"
           placeholder="<?php _e( 'Search and hit enter', 'pinkbutterflies' ); ?>">
    <button type="submit"><i class="fas fa-search"></i></button>
</form>
