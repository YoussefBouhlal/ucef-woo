<?php
/**
 * quick view content
 *
 * @package Ucef Woo
 */


while ( have_posts() ) : the_post(); ?>

    <div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?> >
		<div class="product-image">
			<?php get_template_part( 'template-parts/woocommerce/quick-view/quick-view', 'image' ); ?>
		</div>

		<div class="summary entry-summary">
			<div class="summary-content">
				<?php get_template_part( 'template-parts/woocommerce/single/single', 'product' ); ?>
			</div>
		</div>
	</div>

<?php
endwhile;