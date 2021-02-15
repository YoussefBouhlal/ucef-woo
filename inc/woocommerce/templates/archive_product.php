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

        // Remove elements.
        remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10 );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
        remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
        remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

        //Add new elements.
        add_action( 'woocommerce_before_shop_loop_item', array( $this, 'open_shop_loop_item_inner_div') );
        add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'loop_product_thumbnail' ), 10 );

        add_action( 'woocommerce_after_shop_loop_item', array( $this, 'close_shop_loop_item_inner_div' ) );
        
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

    /**
     * Close the "product-inner" div around product entries.
     */
    public function close_shop_loop_item_inner_div() {
        ?>
            </div><!-- .product-inner -->
        <?php
    }

 }

 new Archive_Product();