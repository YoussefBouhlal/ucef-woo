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
                    'max_depth'         => 2,
                    'style'             => 'ol',
                    'callback'          => null,
                    'end-callback'      => null,
                    'type'              => 'all',
                    'reply_text'        => 'Reply',
                    'page'              => '',
                    'per_page'          => '5',
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


    <?php
        $fields = array(
            'author' => sprintf(
                '<div class="form-group">%s %s %s</div>',
                sprintf(
                    '<label for="author">%s%s</label>',
                    __( 'Name', 'ucef-woo' ),
                    ( ' <span class="required">*</span>' )
                ),
                sprintf(
                    '<input id="author" name="author" type="text" class="form-control" value="%s" required="required" />',
                    esc_attr( $commenter['comment_author'] )
                ),
                sprintf(
                    '<small class="text-danger d-none">%s</small>',
                    __( 'Please Enter Your Name', 'ucef-woo')
                )
            ),
            'email'  => sprintf(
                '<div class="form-group">%s %s %s</div>',
                sprintf(
                    '<label for="email">%s%s</label>',
                    __( 'Email', 'ucef-woo' ),
                    ( ' <span class="required">*</span>' )
                ),
                sprintf(
                    '<input id="email" name="email" type="email" class="form-control" value="%s" aria-describedby="email-notes" required="required" />',
                    esc_attr( $commenter['comment_author_email'] ),
                ),
                sprintf(
                    '<small class="text-danger d-none">%s</small>',
                    __( 'Please Enter Your Email', 'ucef-woo')
                )
            ),
        );
        $args = array(
            'class_submit'  => 'btn btn-block btn-success',
            'label_submit'  => __( 'Submit Comment', 'ucef-woo' ),
            'comment_notes_before' => sprintf(
                '<p class="comment-notes">%s</p>',
                sprintf(
                    '<span id="email-notes">%s</span>',
                    __( 'Your email address will not be published.', 'ucef-woo' )
                )
            ),
            'comment_field' => sprintf(
                '<div class="form-group">%s %s %s</div>',
                sprintf(
                    '<label for="comment">%s</label>',
                    _x( 'Comment', 'noun', 'ucef-woo' )
                ),
                '<textarea id="comment" name="comment" class="form-control" rows="4" required="required"></textarea>',
                sprintf(
                    '<small class="text-danger d-none">%s</small>',
                    __( 'Please Write Something', 'ucef-woo')
                )
            ),
            'fields'        => apply_filters( 'comment_form_default_fields', $fields )

        ); 
        comment_form( $args );
    ?>

</div><!--.comments-area -->