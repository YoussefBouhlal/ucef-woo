<?php
/**
 * hooks for yith wishlist plugin
 *
 * @package Ucef Woo
 */

class Yith_Wishlist
{
    /**
     * register default hooks
     */
    public function __construct() {
        
        add_filter( 'yith-wcwl-browse-wishlist-label', array( $this, 'filter_yith_wcwl_browse_wishlist_label' ), 10 );

    }

    /**
     * define the yith-wcwl-browse-wishlist-label callback
    */
    function filter_yith_wcwl_browse_wishlist_label( $var ) { 

        return '<span class="yith-tooltip-label">'.$var.'</span>';

    }

}

new Yith_Wishlist();