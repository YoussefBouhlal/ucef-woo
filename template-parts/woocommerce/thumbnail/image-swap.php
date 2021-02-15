<?php
/**
 * Image Swap style thumbnail
 * 
 * @package Ucef Woo
 */

 // Return dummy image if no featured image is defined.
if ( ! has_post_thumbnail() ) {
	ucef_woo_placeholder_img();
	return;
}

// Globals.
global $product;

// Get first image.
$attachment = $product->get_image_id();

// Get Second Image in Gallery.
if ( version_compare( WC_VERSION, '2.7', '>=' ) ) {
	$attachment_ids = $product->get_gallery_image_ids();
} else {
	$attachment_ids = $product->get_gallery_attachment_ids();
}
$attachment_ids[] = $attachment; // Add featured image to the array.
$secondary_img_id = '';

if ( ! empty( $attachment_ids ) ) {
	$attachment_ids = array_unique( $attachment_ids ); // remove duplicate images.
	if ( count( $attachment_ids ) > '1' ) {
		if ( $attachment_ids['0'] != $attachment ) {
			$secondary_img_id = $attachment_ids['0'];
		} elseif ( $attachment_ids['1'] != $attachment ) {
			$secondary_img_id = $attachment_ids['1'];
		}
	}
}

// Image args.
$first_img = array(
	'class' => 'woo-entry-image-main',
	'alt'   => get_the_title(),
);
// Second image args.
$second_img = array(
	'class' => 'woo-entry-image-secondary',
	'alt'   => get_the_title(),
);

// Return thumbnail
if ( $secondary_img_id ) : ?>

    <div class="woo-entry-image woo-entry-image-swap">
        <?php
            ucef_woo_img_link_open();

            // Main image
            echo wp_get_attachment_image( $attachment, 'woocommerce_thumbnail', '', $first_img );
            // Secondary image
            echo wp_get_attachment_image( $secondary_img_id, 'woocommerce_thumbnail', '', $second_img );

            ucef_woo_img_link_close();
        ?>
    </div><!-- .woo-entry-image -->

<?php else : ?>

	<div class="woo-entry-image">
		<?php
			ucef_woo_img_link_open();

            // Main image
            echo wp_get_attachment_image( $attachment, 'woocommerce_thumbnail', '', $first_img );

            ucef_woo_img_link_close();
		?>
	</div><!-- .woo-entry-image -->

<?php endif; ?>