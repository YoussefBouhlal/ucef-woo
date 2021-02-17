<?php
/**
 * Sale flash percentage style
 * 
 * @package Ucef Woo
 */


// Globals.
global $product;

// If product not in sale return
if ( ! $product->is_on_sale() ) return;


if ( $product->is_type( 'simple' ) ) {
    // Simple products

    $regular_price  = $product->get_regular_price();
    $sale_price     = wc_get_price_to_display($product);

    $max_percentage = ( ( $regular_price - $sale_price ) / $regular_price ) * 100;

} elseif ( $product->is_type( 'variable' ) ) {
    // Variable products

    $max_percentage = 0;

    foreach ( $product->get_children() as $child_id ) {

        $variation      = wc_get_product( $child_id );

        $regular_price  = $variation->get_regular_price();
        $sale_price     = wc_get_price_to_display($variation);

        $percentage     = ( ( $regular_price - $sale_price ) / $regular_price ) * 100;

        if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
        }

    }

}

if ( isset( $max_percentage ) ) {
    ?>
        <div class="archive-product-sale-flash">
            <span><?php echo '-' . round($max_percentage) . '%' ?></span>
        </div><!-- .archive-product__sale-flash -->
    <?php
}