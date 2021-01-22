<?php
/**
 * Ucef Woo Customizer class
 * 
 * @package Ucef Woo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ucef_Woo_Customizer' ) ) :

    /**
     * set the directory to panels
     */
    $dirPanels = UCEF_WOO_INC_DIR . 'customizer/panels/';

    /**
     * require the files
     */
    require_once $dirPanels . 'carousel-home.php';
    require_once $dirPanels . 'home-products-blog.php';
    require_once $dirPanels . 'footer.php';


    /**
     * The Ucef Woo Customizer class
     */
    class Ucef_Woo_Customizer {

        /**
         * use traits
         */
        use carousel_home;
        use home_products_blog;
        use footer;

        /**
         * WP actions
         */
        public function __construct() {

            add_action( 'customize_register', array( $this, 'setup' ) );
        }

        /**
         * Setup class
         */
        public function setup( $wp_customize ) {

            /**
             * customizer for the home carousel
             */
            $this->carousell_home( $wp_customize );
            
            /**
             * customizer for the home page products and blog
             */
            $this->home_products_blog( $wp_customize );
            
            /**
             * customizer for the home page products and blog
             */
            $this->footer( $wp_customize );
        }

        /**
         * sanitize the checkbox
         */
        function sanitize_checkbox( $checked ) {
            return ( ( isset ( $checked ) && true == $checked ) ? true : false );
        }
        
    }

endif;

new Ucef_Woo_Customizer();