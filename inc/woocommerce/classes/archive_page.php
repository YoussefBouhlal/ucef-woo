<?php
/**
 * custom woocommerce archive page actions.
 *
 * @package Ucef Woo
 */


class Archive_Page
{
    /**
     * register default hooks
     */
    public function __construct() {

        // check if not single product page
        add_action( 'wp', array( $this, 'is_not_product_page' ) );

        // remove sidebar hook from bottom
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
        
    }
    
    /**
     * apply hooks if not product page
     */
    function is_not_product_page() {

        if ( ! is_product() ) {

            // open the container and row befor the content
            add_action( 'woocommerce_before_main_content', array( $this, 'open_container_row'), 5 );
            
            // open container for the sidebar
            add_action( 'woocommerce_before_main_content', array( $this, 'open_sidebar_tags'), 6 );

            // add side bar to the top
            add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 );
                        
            // close container for the sidebar
            add_action( 'woocommerce_before_main_content', array( $this, 'close_sidebar_tags'), 8 );

            // open col for the main content
            add_action( 'woocommerce_before_main_content', array( $this, 'open_shop_tags'), 9 );

            // close the container for the main content
            add_action( 'woocommerce_after_main_content', array( $this, 'close_shop_tags'), 4 );

            // close the container and row after the content
            add_action( 'woocommerce_after_main_content', array( $this, 'close_container_row'), 5 );

        }
    }

    /**
     * open the container and row befor the content
     */
    function open_container_row() {
        ?>
            <div class="container shop-content"><div class="row">
        <?php
    }

    /**
     * open container for the sidebar
     */
    function open_sidebar_tags() {
        ?>
            <div class="sidebar-shop col-lg-3 d-none d-lg-block">
        <?php
    }
    
    /**
     * close container for the sidebar
     */
    function close_sidebar_tags(){
        ?>
            </div>
        <?php
    }
    
    /**
     * open col for the main content
     */
    function open_shop_tags() {
        ?>
            <div class="col-12 col-lg-9">
        <?php
    }
    
    /**
     * close the container for the main content
     */
    function close_shop_tags() {
        ?>
            </div>
        <?php
    }
    
    /**
     * close the container and row after the content
     */
    function close_container_row() {
        ?>
            </div></div>
        <?php
    }

}
new Archive_Page();