<?php
/**
 * custom woocommerce cart page actions.
 *
 * @package Ucef Woo
 */


class Cart_Page
{
    /**
     * register default hooks
     */
    public function __construct() {

        // remove the subtotal from mini-cart body
        remove_action( 'woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal' );

        // Close mini-cart body and Open footer and Open p tag for subtotal
        add_action( 'woocommerce_widget_shopping_cart_before_buttons', array( $this, 'open_footer') );
        // add subtotal to mini-cart footer
        add_action( 'woocommerce_widget_shopping_cart_before_buttons', 'woocommerce_widget_shopping_cart_subtotal' );
        // Close p tag for Subtotal
        add_action( 'woocommerce_widget_shopping_cart_before_buttons', array( $this, 'close_subtotal') );
        // Add mini-cart template to footer
        add_action( 'wp_footer', array( $this, 'add_mini_cart_template_to_footer' ) );
        
        // show cart contents / total AJAX
        add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragment' ) );

    }

    /**
     * Close mini-cart body and Open footer and Open p tag for subtotal
     */
    function open_footer () {
        ?>
            </div>
            <div class="uw-mc-footer">
            <p class="woocommerce-mini-cart__total total">
        <?php
    }

    /**
     * Close p tag for Subtotal
     */
    function close_subtotal () {
        ?>
            </p>
        <?php
    }

    /**
     * Add mini-cart template to footer
     */
    function add_mini_cart_template_to_footer() {
        get_template_part( 'template-parts/woocommerce/mini-cart/mini-cart', 'template' );
    }

    /**
     * show cart contents / total AJAX
     */
    function add_to_cart_fragment( $fragments ) {

        // products count in cart icon
        ob_start();
        ?>
        <span class="cart-count items badge badge-pill badge-dark position-absolute"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        <?php
        $fragments['span.cart-count'] = ob_get_clean();

        // mini cart in header
        ob_start();
        ?>
        <div class="uw-mc-content-inner">
            <div class="uw-mc-header">
                <a href="#" class="uw-mc-close" aria-label="close quick view"></a>
            </div>
            <div id="uw-mc-body">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </div>
        <?php
        $fragments['.uw-mc-content-inner'] = ob_get_clean();
        
        return $fragments;
    }

}

new Cart_Page();