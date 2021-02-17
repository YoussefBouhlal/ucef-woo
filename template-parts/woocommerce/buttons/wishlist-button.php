<?php
/**
 * Wishlist button
 * 
 * @package Ucef Woo
 */


if ( UCEF_WOO_YITH_WISHLIST_ACTIVE ) {

    ?>
        <div class="archive-product-button">
            <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
        </div>
    <?php

}