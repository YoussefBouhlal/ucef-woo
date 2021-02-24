<?php
/**
 * hooks for yith wishlist plugin
 *
 * @package Ucef Woo
 */

class Yith_Wishlist
{
    /**
     * register default hooks
     */
    public function __construct() {
        
        // check if single product page
        add_action( 'wp', array( $this, 'is_product_page' ) );

        add_filter( 'yith-wcwl-browse-wishlist-label', array( $this, 'filter_yith_wcwl_browse_wishlist_label' ), 10 );

    }

    /**
     * apply hooks is product page
     */
    function is_product_page() {

        if ( is_product() ) {
            
            // add wishlist button
            add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'add_wishlist' ) );

            // prevent Yith wishlist button
            add_filter( 'yith_wcwl_show_add_to_wishlist', array( $this, 'return_nothing') );
            
        }
    }

    /**
     * define the yith-wcwl-browse-wishlist-label callback
    */
    function filter_yith_wcwl_browse_wishlist_label( $var ) { 

        return '<span class="fa fa-heart"></span>';

    }

    /**
     * Add wishlist button after add to cart button
     */
    public function add_wishlist() {
        
        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }

    /**
     * prevent Yith wishlist button from showing
     */
    public function return_nothing( $show ) {

        return;
    }

}

new Yith_Wishlist();