<?php
/**
 * WP Comment Walker
 * 
 * @package Ucef Woo
 */

class WP_Comment_Walker extends Walker_Comment {

    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    // constructor – wrapper for the comments list
    function __construct() {
        ?>
            <section class="comments-list">
        <?php
    }

    // start_lvl – wrapper for child comments list
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2;
        
        ?>
            <section class="comments-list child-comments ml-4 ml-md-5">
        <?php
    }

    // end_lvl – closing wrapper for child comments list
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2;
        
        ?>
            </section><!-- .child-comments -->
        <?php
    }

    // start_el – HTML for comment template
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

        if ( 'article' == $args['style'] ) {
            $tag = 'article';
            $add_below = 'comment';
        } else {
            $tag = 'article';
            $add_below = 'comment';
        } ?>

        <?php $ifParent = empty( $args['has_children'] ) ? '' :'parent'; ?>
        <article <?php comment_class("border-bottom py-2 $ifParent") ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
            <div class="d-flex align-items-center mb-2" role="complementary">
                <figure class="m-0 pr-2"><?php echo get_avatar( $comment, 35, $default = '', $alt = '', $avatarargs = array( 'class' => 'rounded-circle') ); ?></figure>
                <div>
                    <p class="m-0"><?php comment_author(); ?></p>
                    <time class="text-muted"><?php comment_date('jS F Y') ?>, <?php comment_time() ?></time>
                </div>
            </div>
            
            <?php if ($comment->comment_approved == '0') : ?>
            <p class="m-0 text-info"><?php _e( 'Your comment is awaiting moderation', 'ucef-woo' ); ?></p>
            <?php endif; ?>

            <div class="comment-content post-content" itemprop="text">
                <?php comment_text() ?>
                <?php 
                    $myclass = 'text-muted';
                    echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $myclass, 
                        get_comment_reply_link(array_merge( $args, array(
                            'add_below' => $add_below, 
                            'depth' => $depth, 
                            'max_depth' => $args['max_depth']))), 1 ); 
                ?>
            </div>
        </article>

    <?php }

    // destructor – closing wrapper for the comments list
    function __destruct() { ?>

        </section>
    
    <?php }

}