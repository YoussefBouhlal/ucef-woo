<?php
/**
 * The template for displaying 404 pages.
 *
 * @package Ucef Woo
 */

use Ucef\Api\Customizer\Homepage;

get_header();
?>

<div id="primary" class="content-area">
    <main>
        <div class="container">
            <div class="error-404">
                <header>
                    <h1><?php esc_html_e( 'Page not found', 'ucef-woo' ); ?></h1>
                    <p><?php esc_html_e( 'unfortunately, the page you tried to reach does not exist on this site!', 'ucef-woo' ); ?></p>
                </header>
                <?php
                    if ( class_exists( 'WooCommerce' ) ) {
                        // if woocommerce active show shop button
                        $shop_page_url = get_permalink( WC_get_page_id( 'shop' ) );
                        ?>
                        <div class="text-center my-4">
                            <a href="<?php esc_url( $shop_page_url ); ?>" class="btn btn-success"><?php esc_html_e( 'Go To Shop', 'ucef-woo' ); ?></a>
                        </div>
                        <?php
                    } else {
                        // show recent posts
                        the_widget( 'WP_Widget_Recent_Posts', array(
                            'title'     => esc_html__('Take a Look at Our Latest Posts', 'ucef'),
                            'number'    => 3
                        ) );
                    }
                ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>