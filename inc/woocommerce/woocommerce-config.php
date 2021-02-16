<?php
/**
 * woocommerce customization.
 *
 * @package Ucef Woo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

 // Start and run class
class Ucef_Woo_WooCommerce_Config {

    public function __construct() {
        
        $dir = UCEF_WOO_INC_DIR . '/woocommerce/templates';

        if ( UCEF_WOO_YITH_WISHLIST_ACTIVE ) {
            // Require if Yith Wishlist Plugin Activated
            require_once $dir . '/yith_wishlist.php';
        }

        require_once $dir . '/archive_page.php';
        require_once $dir . '/archive_product.php';
        require_once $dir . '/checkout_page.php';
        require_once $dir . '/cart_page.php';
        require_once $dir . '/product_cart.php';
    }

}

new Ucef_Woo_WooCommerce_Config();