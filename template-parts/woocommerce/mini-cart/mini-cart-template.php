<?php
/**
 * mini cart template
 * 
 * @package Ucef Woo
 */

?>

<div id="uw-mc-wrap">
	<div class="uw-mc-container">
		<div class="uw-mc-content-wrap">
			<div class="uw-mc-content-inner">
				<a href="#" class="uw-mc-close" aria-label="close quick view">×</a>
				<div id="uw-mc-content" class="woocommerce single-product">
                    <?php woocommerce_mini_cart(); ?>
                </div>
			</div>
		</div>
	</div>
	<div class="uw-mc-overlay"></div>
</div>