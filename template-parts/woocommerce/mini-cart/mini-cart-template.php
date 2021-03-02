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
				<div class="uw-mc-header">
					<a href="#" class="uw-mc-close" aria-label="close quick view"></a>
				</div>
				<div id="uw-mc-body">
                    <?php woocommerce_mini_cart(); ?>
                </div>
			</div>
		</div>
	</div>
	<div class="uw-mc-overlay"></div>
</div>