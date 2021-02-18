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

        // show cart contents / total AJAX
        add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragment' ) );

        // remove the subtotal from mini-cart body
        remove_action( 'woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal' );
        // Close mini-cart body and Open footer and Open p tag for subtotal
        add_action( 'woocommerce_widget_shopping_cart_before_buttons', array( $this, 'open_footer') );
        // add subtotal to mini-cart footer
        add_action( 'woocommerce_widget_shopping_cart_before_buttons', 'woocommerce_widget_shopping_cart_subtotal' );
        // Close p tag for Subtotal
        add_action( 'woocommerce_widget_shopping_cart_before_buttons', array( $this, 'close_subtotal') );
        // Close mini-cart footer
        add_action( 'woocommerce_widget_shopping_cart_after_buttons', array( $this, 'close_footer') );

    }

    function add_to_cart_fragment( $fragments ) {

        // products count in cart icon
        ob_start();
        ?>
        <span class="items badge badge-pill badge-dark position-absolute"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        <?php
        $fragments['span.items'] = ob_get_clean();

        // mini cart in header
        ob_start();
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e( 'Cart', 'ucef-woo' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </div>
        <!-- <script>jQuery('#mini-cart').modal('show')</script> -->
        <?php
        $fragments['div.modal-content'] = ob_get_clean();
        
        return $fragments;
    }

    function open_footer () {
        ?>
            </div>
            <div class="modal-footer">
            <p class="woocommerce-mini-cart__total total">
        <?php
    }

    function close_subtotal () {
        ?>
            </p>
        <?php
    }
    
    function close_footer () {
        ?>
            </div>
        <?php
    }

}

new Cart_Page();