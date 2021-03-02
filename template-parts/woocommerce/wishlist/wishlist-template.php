<?php
/**
 * wishlist template
 * 
 * @package Ucef Woo
 */

?>

<div id="uw-wl-wrap">
	<div class="uw-wl-container">
		<div class="uw-wl-content-wrap">
			<div class="uw-wl-content-inner">
				<div class="uw-wl-header">
					<a href="#" class="uw-wl-close" aria-label="close quick view"></a>
				</div>
				<div id="uw-wl-body">
                    <?php echo do_shortcode('[yith_wcwl_wishlist]'); ?>
                </div>
			</div>
		</div>
	</div>
	<div class="uw-wl-overlay"></div>
</div>