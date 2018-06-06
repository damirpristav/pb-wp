<?php
/**
 * Comments Template
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
    <div class="comments-wrap">

        <h4 class="comments-title">
            <?php
                printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'pinkbutterflies' ),
                    number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h4>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-above" class="navigation comment-navigation clearfix" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'pinkbutterflies' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pinkbutterflies' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pinkbutterflies' ) ); ?></div>
        </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 72,
                    'max_depth'  => 4
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation comment-navigation clearfix" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'pinkbutterflies' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pinkbutterflies' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pinkbutterflies' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>

        <?php if ( ! comments_open() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'pinkbutterflies' ); ?></p>
        <?php endif; ?>

    </div><!-- end .comments-wrap -->
    <?php endif; // have_comments() ?>

	<?php

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required_text = sprintf( ' ' . __('Required fields are marked %s', 'pinkbutterflies'), '<span class="required">*</span>' );

    $fields =  array(

        'author' =>
            '<div class="name-email-url-box clearfix"><p class="comment-form-author"><label for="author">' . __( 'Name', 'pinkbutterflies' ) . '*</label> ' .
            ( $req ? '<span class="required"></span>' : '' ) .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' placeholder="' . __( 'Name', 'pinkbutterflies' ) . ' *" /></p>',

        'email' =>
            '<p class="comment-form-email"><label for="email">' . __( 'Email', 'pinkbutterflies' ) . '*</label> ' .
            ( $req ? '<span class="required"></span>' : '' ) .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' placeholder="' . __( 'Email', 'pinkbutterflies' ) . ' *" /></p>',

        'url' =>
            '<p class="comment-form-url"><label for="url">' . __( 'Website', 'pinkbutterflies' ) . '</label>' .
            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" placeholder="' . __( 'Website', 'pinkbutterflies' ) . '" /></p></div>',
    );

    $comment_form_args = array(
        'title_reply' => __( 'Leave a reply', 'pinkbutterflies' ),
        'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h4>',
        'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.', 'pinkbutterflies' ) . ( $req ? $required_text : '' ) .
            '</p>',
        'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(
            __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'pinkbutterflies' ),
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'pinkbutterflies' ) .
            '*</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . __( 'Your message', 'pinkbutterflies' ) . ' *" >' .
            '</textarea></p>',
    );

    comment_form( $comment_form_args );

    ?>

</div><!-- #comments -->
