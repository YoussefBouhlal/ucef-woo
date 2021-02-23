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

        add_action( 'wp_enqueue_scripts', array( $this, 'add_custom_scripts') );
        add_action( 'wp_ajax_ucef_woo_product_quick_view', array( $this, 'product_quick_view_ajax' ) );
        add_action( 'wp_ajax_nopriv_ucef_woo_product_quick_view', array( $this, 'product_quick_view_ajax' ) );
        add_action( 'wp_footer', array( $this, 'add_quick_view_template_to_footer' ) );
        add_action( 'ucef_woo_befor_quick_view_image', array( $this, 'on_sale_flash') );

        add_filter( 'ucef_woo_localize_array', array( $this, 'localize_array' ) );

    }

    /**
     * Add Custom Woocommerce scripts
     */
    public static function add_custom_scripts() {
        wp_enqueue_script( 'wc-add-to-cart-variation');
        wp_enqueue_script( 'flexslider' );
    }

    /**
     * Quick view ajax
     */
    public static function product_quick_view_ajax() {

        if ( ! isset( $_REQUEST['product_id'] ) ) {
            echo 'no id';
            die();
        }

        $product_id = intval( $_REQUEST['product_id'] );

        // wp_query for the product
        wp( 'p=' . $product_id . '&post_type=product' );

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
     * show onsale falsh
     */
    function on_sale_flash() {

        get_template_part( 'template-parts/woocommerce/flash/sale', 'percentage' );

    }

    /**
     * add to localize array
     */
    public function localize_array( $array ) {
        $array['ajax_url']      = admin_url( 'admin-ajax.php' );
        $array['grouped_text']  = esc_attr__( 'View products', 'ucef-woo' );

        return $array;
    }

}

new Quick_View();