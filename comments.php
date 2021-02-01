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


<div id="comments" class="comments-area border-top pt-2 mt-2">

    <!-- Section header -->
    <div class="col">
        <h4 class="comments-title">
            <?php
                printf(
                    esc_html( __( 'Comments (%s)', 'ucef-woo' ) ),
                    number_format_i18n( get_comments_number() ),
                );
            ?>
        </h4>
    </div>

    <!-- Add comment button -->
    <div class="col mb-5">
        <a class="btn btn-success btn-block" href="#respond" >
            <?php _e( 'Add Your Comment', 'ucef-woo' ); ?>
        </a>
    </div>

    <!-- Section comments -->
    <?php if ( have_comments() ) : ?>

        <div class="col mb-5">
            <?php
                $args = array(
                    'walker'            => new WP_Comment_Walker,
                    'max_depth'         => '4',
                    'style'             => '',
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
        </div>

        <div class="comment-pagination col mb-5">
            <?php
            paginate_comments_links( array(
                'screen_reader_text'=> __('Pagination','ucef-woo'),
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;'
            ) )
            ?>
        </div>

        <?php if ( !comments_open() && get_comments_number() ): ?>
            <div class="col">
                <div class="no-comments"><?php esc_html_e( 'Comments are closed', 'ucef-woo' ); ?></div>     
            </div>
        <?php endif;?>

    <?php endif;?>

    <!-- New comment -->
    <div class="col">
    
        <?php
            $fields = array(
                'author' => sprintf(
                    '<div class="form-group">%s %s</div>',
                    sprintf(
                        '<input id="author" name="author" type="text" class="form-control" value="%s" placeholder="%s" required="required" />',
                        esc_attr( $commenter['comment_author'] ),
                        __( 'Name', 'ucef-woo' )
                    ),
                    sprintf(
                        '<small class="text-danger d-none">%s</small>',
                        __( 'Please Enter Your Name', 'ucef-woo')
                    )
                ),
                'email'  => sprintf(
                    '<div class="form-group">%s %s</div>',
                    sprintf(
                        '<input id="email" name="email" type="email" class="form-control" value="%s" placeholder="%s" aria-describedby="email-notes" required="required" />',
                        esc_attr( $commenter['comment_author_email'] ),
                        __( 'Email', 'ucef-woo' )
                    ),
                    sprintf(
                        '<small class="text-danger d-none">%s</small>',
                        __( 'Please Enter Your Email', 'ucef-woo')
                    )
                ),
            );
            $args = array(
                'must_log_in'           => sprintf(
                    '<p class="must-log-in">%s</p>',
                    __( 'You must be logged in to post a comment')
                ),
                'logged_in_as'          => sprintf(
                    '<p class="logged-in-as m-0">%s %s</p>',
                    __( 'Hello', 'ucef-woo' ),
                    esc_html( wp_get_current_user()->user_login )
                ),
                'class_submit'          => 'btn btn-block btn-success',
                'label_submit'          => __( 'Submit Comment', 'ucef-woo' ),
                'comment_notes_before'  => sprintf(
                    '<p class="comment-notes">%s</p>',
                    sprintf(
                        '<span id="email-notes">%s</span>',
                        __( 'Your email address will not be published.', 'ucef-woo' )
                    )
                ),
                'comment_field'         => sprintf(
                    '<div class="form-group">%s %s</div>',
                    '<textarea id="comment" name="comment" class="form-control" rows="4" required="required"></textarea>',
                    sprintf(
                        '<small class="text-danger d-none">%s</small>',
                        __( 'Please Write Something', 'ucef-woo')
                    )
                ),
                'fields'                => apply_filters( 'comment_form_default_fields', $fields )

            ); 
            comment_form( $args );
        ?>

    </div>

</div><!--.comments-area -->