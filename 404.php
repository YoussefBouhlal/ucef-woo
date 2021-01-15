<?php
/**
 * The template for displaying 404 pages.
 *
 * @package Ucef Woo
 */

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

                    } else {
                        // show recent posts
                        the_widget( 'WP_Widget_Recent_posts', array(
                            'title'     => esc_html__( 'Take a Look at Our Latest Posts', 'ucef-woo' ),
                            'number'    => 2
                        ) );
                    }
                ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>