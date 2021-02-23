<?php
/**
 * single product image template
 *
 * @package Ucef Woo
 */


global $product;

// Return dummy image if no featured image is defined.
if ( ! has_post_thumbnail() ) {
	?>
	<div class="swiper-container single-product-swiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php _e( 'Placeholder', 'ucef-woo'); ?>">
			</div>
		</div>
	</div>
	<?php
	return;
}
?>

<div class="swiper-container single-product-swiper">
	<div class="swiper-wrapper">
		<?php

			// First Image
			$attachment		= $product->get_image_id();
			$props          = wc_get_product_attachment_props( $attachment, $product );
			$first_img		= array(
				'title'	=> $props['title'],
				'alt'	=> $props['alt']
			);

			?>
				<div class="swiper-slide">
					<?php echo wp_get_attachment_image( $attachment, 'woocommerce_single', '', $first_img ); ?>
				</div>
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
						<div class="swiper-slide">
							<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_single', '', $attachment_props ); ?>
						</div>
					<?php

				}
			}
		?>
	</div>

	<?php if ( $attachment_ids ):?>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	<?php endif; ?>
	
</div>