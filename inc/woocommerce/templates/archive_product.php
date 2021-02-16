<?php
/**
 * custom woocommerce archive product actions.
 *
 * @package Ucef Woo
 */

 class Archive_Product
 {
    /**
     * register default hooks
     */
    public function __construct() {

        // Remove Actions
        remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10 );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
        remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

        //Add Actions
        add_action( 'woocommerce_before_shop_loop_item', array( $this, 'open_shop_loop_item_inner_div') );
        add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'loop_product_thumbnail' ), 10 );
        add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'loop_product_sale_flash' ), 10 );
        add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'loop_product_panel_buttons' ), 10 );

        add_action( 'woocommerce_after_shop_loop_item', array( $this, 'close_shop_loop_item_inner_div' ) );


        // Add Filters
        add_filter( 'woocommerce_loop_add_to_cart_link', array( $this, 'add_to_cart_link' ), 10, 2 );

        
    }

    /**
     * Add an opening div "product-inner" around product entries.
     */
    public function open_shop_loop_item_inner_div() {
        ?>
            <div class="product-inner">
        <?php
    }

    /**
     * Returns product thumbnail from template parts
     */
    public function loop_product_thumbnail() {

        get_template_part( 'template-parts/woocommerce/thumbnail/image', 'swap' );
    }

    public function loop_product_sale_flash() {

        get_template_part( 'template-parts/woocommerce/flash/sale', 'percentage' );
    }
    
    public function loop_product_panel_buttons() {
        ?>
            <div class="woo-entry-panel-buttons">
                <?php
                    get_template_part( 'template-parts/woocommerce/buttons/wishlist', 'button' );
                    get_template_part( 'template-parts/woocommerce/buttons/addtocart', 'button' );
                    get_template_part( 'template-parts/woocommerce/buttons/quickview', 'button' );
                ?>
            </div><!-- .woo-entry-panel-buttons -->
        <?php
    }

    /**
     * Close the "product-inner" div around product entries.
     */
    public function close_shop_loop_item_inner_div() {
        ?>
            </div><!-- .product-inner -->
        <?php
    }

    public function add_to_cart_link( $html, $product ) {

        if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {

            ob_start();
            ucef_woo_svg_inline( 'cart' );
            $icon   = ob_get_clean();
            $url    = esc_url( $product->add_to_cart_url() );

            $html   = "<a href=\"$url\" data-quantity=\"1\" class=\"button\" >$icon</a>";

            return $html;
        }
    }

 }

 new Archive_Product();