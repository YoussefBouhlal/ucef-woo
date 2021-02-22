<?php
/**
 * Quick View button
 * 
 * @package Ucef Woo
 */


//  Global
global $product;

$product_ID = $product->get_id();

?>
    <div class="archive-product-button">
        <a href="#" id="product_id_<?php echo $product_ID; ?>" class="ucef-woo-quick-view" data-product_id="<?php echo $product_ID; ?>"><?php ucef_woo_svg_inline( 'view' ); ?></a>
    </div>
<?php