<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Ucef Woo
 */
?>

<form role="search" method="get" class="search-form my-2" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ucef'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    <?php if ( class_exists( 'WooCommerce' )): ?>
        <input type="hidden" value="product" name="post_type" id="post_type">
    <?php endif; ?>
</form>