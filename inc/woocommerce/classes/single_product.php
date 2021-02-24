<?php
/**
 * Single product class
 *
 * @package Ucef Woo
 */

class Single_Product
{
    /**
     * register hooks
     */
    public function __construct() {

        // check if single product page
        add_action( 'wp', array( $this, 'is_product_page' ) );
        
    }

    /**
     * apply hooks is product page
     */
    function is_product_page() {

        if ( is_product() ) {

            // open the container befor the content
            add_action( 'woocommerce_before_main_content', array( $this, 'open_container'), 5 );

            // close the container and row after the content
            add_action( 'woocommerce_after_main_content', array( $this, 'close_container'), 5 );

            // add flash sale percentage
            add_action( 'woocommerce_before_single_product_summary', array( $this, 'loop_product_sale_flash'), 9 );

            // remove default onSale
            remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

            // filter the flexslider options
            add_filter( 'woocommerce_single_product_carousel_options', array( $this, 'ucef_woo_flexslider_options' ) );

        }
    }

    /**
     * open container
     */
    function open_container() {
        ?>
            <div class="container">
        <?php
    }

    /**
     * close container
     */
    function close_container() {
        ?>
            </div>
        <?php
    }

    /**
	 * Returns the Sale Flash
	 */
	public function loop_product_sale_flash() {

		get_template_part( 'template-parts/woocommerce/flash/sale', 'percentage' );
	}

    /**
     * Filter flexslider options
     */
    public function ucef_woo_flexslider_options( $options ) {
        $options['directionNav'] = true;

        return $options;
    }

}

new Single_Product();