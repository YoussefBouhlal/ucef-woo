<?php
/**
 * quick view image template
 *
 * @package Ucef Woo
 */


global $product; 

do_action( 'ucef_woo_befor_quick_view_image' );

// Return dummy image if no featured image is defined.
if ( ! has_post_thumbnail() ) {
	?>
	<div class="uw-qv-image flexslider images">
		<div class="uw-qv-slides slides">
			<div class="woocommerce-product-gallery__image">
				<img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php _e( 'Placeholder', 'ucef-woo'); ?>">
			</div>
		</div>
	</div>
	<?php
	return;
}
?>

<div class="uw-qv-image flexslider images">
	<ul class="uw-qv-slides slides">
		<?php

			// First Image
			$attachment		= $product->get_image_id();
			$props          = wc_get_product_attachment_props( $attachment, $product );
			$first_img		= array(
				'title'	=> $props['title'],
				'alt'	=> $props['alt']
			);

			?>
				<li class="woocommerce-product-gallery__image">
					<?php echo wp_get_attachment_image( $attachment, 'woocommerce_single', '', $first_img ); ?>
				</li>
			<?php

			// Gallery Images
			$attachment_ids = $product->get_gallery_image_ids();

			if ( $attachment_ids ) {

				foreach ( $attachment_ids as $attachment_id ) {

					$props				= wc_get_product_attachment_props( $attachment_id, $product );
					$attachment_props	= array(
						'title'	=> $props['title'],
						'alt'	=> $props['alt']
					);

					if ( ! $props['url'] ) {
						continue;
					}

					?>
						<li class="woocommerce-product-gallery__image">
							<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_single', '', $attachment_props ); ?>
						</li>
					<?php

				}
			}
		?>
	</ul>
	
</div>