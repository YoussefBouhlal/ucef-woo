<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package Ucef Woo
 */



/**
 * Easily point to the assets svg folder
 */
function ucef_woo_svg_inline( $path ) {

    if (! $path) {
        return;
    }
    echo get_template_part('assets/svg/inline', $path . '.svg');
}


/**
 * ------------------------------------------
 * WooCommerce Functions
 * ------------------------------------------
 */

/**
 * Output the WC placeholder image
 */
function ucef_woo_placeholder_img() {

    if ( function_exists( 'wc_placeholder_img_src' ) && wc_placeholder_img_src() ) {
        $placeholder = '<div class="woo-entry-image"><img src="'. wc_placeholder_img_src() .'" alt="'. __( 'Placeholder Image', 'oceanwp' ) .'" class="woo-entry-image-main" /></div>';
        $placeholder = apply_filters( 'ucef_woo_placeholder_img_html', $placeholder );
        if ( $placeholder ) {
            echo wp_kses_post( $placeholder );
        }
    }
}

/**
 * echo opening link to the single product
 */
function ucef_woo_img_link_open() {

    global $product;

    $woo_img_link = get_the_permalink( $product->get_id() );

    echo '<a href="' . esc_url( $woo_img_link ) . '" class="woocommerce-LoopProduct-link">';
    
}

/**
 * echo closing link to the single product
 */
function ucef_woo_img_link_close() {
    echo '</a>';
}