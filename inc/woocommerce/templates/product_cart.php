<?php
/**
 * custom woocommerce product_cart actions.
 *
 * @package Ucef Woo
 */

 class Product_Cart
 {
     /**
     * register default hooks
     */
    public function __construct() {

        // remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    }

 }

 new Product_Cart();