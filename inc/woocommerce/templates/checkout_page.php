<?php
/**
 * custom woocommerce checkout page actions.
 *
 * @package Ucef Woo
 */


class Checkout_Page
{
    /**
     * register default hooks
     */
    public function __construct() {

        add_filter( 'woocommerce_checkout_fields', array( $this, 'checkout_fields' ) );
    }

    function checkout_fields( $fields ) {

        unset($fields['billing']['billing_company']);

        return $fields; 
    }

}

new Checkout_Page();