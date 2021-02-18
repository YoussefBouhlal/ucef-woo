<?php
/**
 * quick view content
 *
 * @package Ucef Woo
 */


while ( have_posts() ) : the_post(); ?>

    <div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
		<?php
            // do_action( 'ocean_woo_quick_view_product_image' );
            get_template_part( 'template-parts/woocommerce/flash/sale', 'percentage' );
            get_template_part( 'template-parts/woocommerce/quick-view/quick-view', 'image' );
        ?>
		<div class="summary entry-summary">
			<div class="summary-content">
				<?php
                    get_template_part( 'template-parts/woocommerce/single/single', 'content' );
                ?>
			</div>
		</div>
	</div>

<?php
endwhile;