<?php
/**
 * quick view class
 *
 * @package Ucef Woo
 */

class Quick_View
{
    /**
     * register hooks
     */
    public function __construct() {
        
        add_action( 'wp_ajax_ucef-woo_product_quick_view', array( $this, 'product_quick_view_ajax' ) );
        add_action( 'wp_ajax_nopriv_ucef-woo_product_quick_view', array( $this, 'product_quick_view_ajax' ) );
        add_action( 'wp_footer', array( $this, 'add_quick_view_template_to_footer' ) );


        add_filter( 'ucef_woo_localize_array', array( $this, 'localize_array' ) );

    }

    /**
     * Quick view ajax
     */
    public function product_quick_view_ajax() {

        if ( ! isset( $_REQUEST['product_id'] ) ) {
            die();
        }

        $product_ID = intval( $_REQUEST['product_id'] );

        // wp_query for the product
        wp( 'p=' . $product_ID . '&post_type=product' );

        ob_start();
        get_template_part( 'template-parts/woocommerce/quick-view/quick-view', 'content' );
        echo ob_get_clean();

        die();
    }

    /**
     * add quick view template to footer if woocommerce is activated
     */
    public function add_quick_view_template_to_footer() {

        get_template_part( 'template-parts/woocommerce/quick-view/quick-view', 'template' );

    }

    /**
     * add to localize array
     */
    public function localize_array( $array ) {
        $array['ajax_url']  = admin_url( 'admin-ajax.php' );

        return $array;
    }

}

new Quick_View();