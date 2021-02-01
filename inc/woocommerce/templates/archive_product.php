<?php
/**
 * custom woocommerce archive product actions.
 *
 * @package Ucef Woo
 */


if ( ! class_exists( 'Archive_Product' ) ) {

	class Archive_Product
    {
        /**
         * register default hooks
         */
        public function __construct() {

            // check if this is the shop page
            add_action( 'wp', array( $this, 'is_shop_page' ) );
            
            // open the container and row befor the content
            add_action( 'woocommerce_before_main_content', array( $this, 'open_container_row'), 5 );
            
            // open col for the main content
            add_action( 'woocommerce_before_main_content', array( $this, 'open_shop_tags'), 9 );

            // close the container for the main content
            add_action( 'woocommerce_after_main_content', array( $this, 'close_shop_tags'), 4 );

            // close the container and row after the content
            add_action( 'woocommerce_after_main_content', array( $this, 'close_container_row'), 5 );

            // remove sidebar hook from bottom
            remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

        }

        /**
         * apply hooks for shop page only
         */
        function is_shop_page() {

            if ( is_shop() ) {

                // open container for the sidebar
                add_action( 'woocommerce_before_main_content', array( $this, 'open_sidebar_tags'), 6 );
                
                // add side bar to the top
                add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 );
                
                // close container for the sidebar
                add_action( 'woocommerce_before_main_content', array( $this, 'close_sidebar_tags'), 8 );
            }
        }

        /**
         * open container and row
         */
        function open_container_row() {
            echo '<div class="container shop-content"><div class="row">';
        }

        function open_sidebar_tags() {
            echo '<div class="sidebar-shop col-lg-3 d-none d-lg-block">';
        }
        
        function close_sidebar_tags(){
            echo '</div>';
        }
        
        /**
         * open col for the main content
         */
        function open_shop_tags() {
            echo '<div class="col-12 col-lg-9">';
        }
        
        function close_shop_tags() {
            echo '</div>';
        }
        
        function close_container_row() {
            echo '</div></div>';
        }

    }
}

new Archive_Product();


