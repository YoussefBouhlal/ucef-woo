<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Ucef Woo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mt-4 pt-2">

    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
                printf(
                    esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'ucef-woo' ) ),
                    number_format_i18n( get_comments_number() ),
                    '<span>' . get_the_title() . '</span>'
                );
            ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):?>
            <nav id="comment-nav-top" class="comment-navigation" role="navigation">
                <h3><?php esc_html_e( 'Comment navigation', 'ucef-woo' ) ?></h3>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="post-link-nav">
                            <span class="chevron-left">left</span>
                            <?php previous_comments_link( esc_html__( 'Previous', 'ucef-woo') ); ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="post-link-nav">
                            <?php next_comments_link( esc_html__( 'Next', 'ucef-woo') ); ?>
                            <span class="chevron-right">right</span>
                        </div>
                    </div>
                </div>
            </nav>
        <?php endif; ?>

        <ol class="comment-list">
            <?php
                $args = array(
                    'walker'            => null,
                    'max_depth'         => 10,
                    'style'             => 'ol',
                    'callback'          => null,
                    'end-callback'      => null,
                    'type'              => 'all',
                    'reply_text'        => 'Reply',
                    'page'              => '',
                    'per_page'          => '',
                    'avatar_size'       => 25,
                    'reverse_top_level' => null,
                    'reverse_children'  => '',
                    'format'            => 'html5',
                    'short_ping'        => true,
                    'echo'              => true
                );
                wp_list_comments( $args );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if ( !comments_open() && get_comments_number() ): ?>
            <div class="no-comments"><?php esc_html_e( 'Comments are closed', 'ucef-woo' ); ?></div>            
        <?php endif;?>

    <?php endif; // Check for have_comments(). ?>


    <?php comment_form(); ?>

</div><!--.comments-area -->