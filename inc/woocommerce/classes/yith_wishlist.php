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

        // remove wishlist title
        remove_action( 'yith_wcwl_wishlist_before_wishlist_content', array( YITH_WCWL_Frontend::get_instance(), 'wishlist_header' ), 10 );
        remove_action( 'yith_wcwl_wishlist_after_wishlist_content', array( YITH_WCWL_Frontend::get_instance(), 'wishlist_footer' ), 10 );
        
        // check if single product page
        add_action( 'wp', array( $this, 'is_product_page' ) );

        // Update the wishlist with ajax
        add_action( 'wp_ajax_ucef_woo_update_wishlist_count', array( $this, 'update_wishlist' ) );
        add_action( 'wp_ajax_nopriv_ucef_woo_update_wishlist_count', array( $this, 'update_wishlist' ) );
        // Add wishlist template to footer
        add_action( 'wp_footer', array( $this, 'add_wishlist_template_to_footer' ) );

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

    /**
     * Update the wishlist with ajax
     */
    public function update_wishlist() {

        wp_send_json(
            array (
                'count' => yith_wcwl_count_all_products(),
                'wishlist'  => do_shortcode('[yith_wcwl_wishlist]')
            )
        );
    }

    /**
     * Add wishlist template to footer
     */
    public function add_wishlist_template_to_footer() {
        get_template_part( 'template-parts/woocommerce/wishlist/wishlist', 'template' );
    }

}

new Yith_Wishlist();