<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package Ucef Woo
 */

if ( ! function_exists( 'ucef_woo_svg_inline' ) ) {

    /**
     * Easily point to the assets svg folder
     */
    function ucef_woo_svg_inline( $path ) {

        if (! $path) {
			return;
		}

		echo get_template_part('assets/svg/inline', $path . '.svg');
    }
}