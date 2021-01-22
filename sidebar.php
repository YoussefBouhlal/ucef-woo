<?php
/**
 * The template for the sidebar containing the main widget area
 * 
 * @package Ucef Woo
 */

?>

<?php if( is_active_sidebar( 'ucef-woo-sidebar-main' ) ): ?>
    <?php dynamic_sidebar( 'ucef-woo-sidebar-main' ); ?>
<?php endif;