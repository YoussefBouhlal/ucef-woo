<?php
/**
 * custom woocommerce cart page actions.
 *
 * @package Ucef Woo
 */


if ( ! class_exists( 'Cart_Page' ) ) {

	class Cart_Page
    {
        /**
         * register default hooks
         */
        public function __construct() {

            // show cart contents / total AJAX
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragment' ) );

        }

        function add_to_cart_fragment( $fragments ) {
            global $woocommerce;
        
            ob_start();
        
            ?>
            <span class="items badge badge-pill badge-dark position-absolute"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            <?php
    
            $fragments['span.items'] = ob_get_clean();
            return $fragments;
        }

    }
}

new Cart_Page();