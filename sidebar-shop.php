<?php
/**
 * The template for the shop sidebar containing the main widget area
 * 
 * @package Ucef Woo
 */

?>

<?php if( is_active_sidebar( 'ucef-sidebar-shop' ) ): ?>
    <?php dynamic_sidebar( 'ucef-sidebar-shop' ); ?>
<?php endif;