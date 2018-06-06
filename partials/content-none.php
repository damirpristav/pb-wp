<div class="content-none-section">
    <h3><?php _e( 'Nothing Found', 'pinkbutterflies' ); ?></h3>
    <?php if( is_home() && current_user_can('publish_posts') ): ?>
    <p>
        <?php _e( 'To publish your first post click', 'pinkbutterflies' ); ?>
        <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php _e( 'here', 'pinkbutterflies' ); ?></a>
    </p>
    <?php else: ?>
        <p><?php _e( 'Nothing is here. Perhaps searching can help.', 'pinkbutterflies' ); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>
