<?php
/**
 * The header of our theme
 * 
 * @package Ucef Woo
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class('woocommerce'); ?> >
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header class="site-header pt-3 pb-3" role="banner">

            <section class="account">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-end">
                        <?php if ( class_exists( 'WooCommerce' ) ): ?>
                            <?php if ( is_user_logged_in() ): ?>
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="nav-link btn btn-success btn-sm pt-0 pb-0 mr-1"><?php esc_html_e( 'My Account', 'ucef-woo' ); ?></a>
                                <a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ); ?>" class="nav-link btn btn-outline-danger btn-sm pt-0 pb-0"><?php esc_html_e( 'Logout', 'ucef-woo' ); ?></a>
                            <?php else: ?>
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="nav-link btn btn-outline-success btn-sm pt-0 pb-0"><?php esc_html_e( 'Login / Register', 'ucef-woo' ); ?></a>
                            <?php endif; ?>
                            <div class="cart position-relative pl-2 pr-1">
                                <button type="button" id="ucef-woo-mini-cart" class="btn btn-link btn-outline-light p-0">
                                    <i class="fa fa-shopping-cart text-dark"></i>
                                    <span class="cart-count items badge badge-pill badge-dark position-absolute"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                                </button>
                            </div>
                            <?php if ( class_exists( 'YITH_WCWL' ) ): ?>
                                <div class="wishlist position-relative pl-2 pr-1">
                                    <button type="button" id="ucef-woo-wishlist" class="btn btn-link btn-outline-light p-0">
                                        <i class="fa fa-heart text-dark"></i>
                                        <span class="wishlist-count items badge badge-pill badge-dark position-absolute"><?php echo esc_html( yith_wcwl_count_all_products() ); ?></span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <a class="ml-2" data-toggle="collapse" href="#searchForm" role="button" aria-expanded="false" aria-controls="searchForm">
                            <i class="fa fa-search text-dark"></i>
                        </a>
                    </div>
                </div>
            </section><!-- .account 'show if woocommerce activated' -->
            
            <section class="collapse" id="searchForm">
                <div class="container">
                    <?php get_search_form(); ?>
                </div>
            </section>

            <section class="top-bar mt-3">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light p-0">

                        <?php if ( has_custom_logo() ): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <p class="h4 text-dark"><?php bloginfo( 'title' ); ?></p>
                            </a>
                        <?php endif; ?>
                        <!-- brand -->

                        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                            <span>
                                <?php ucef_woo_svg_inline( 'menu' ); ?>
                            </span>
                        </button><!-- mobile-menu -->

                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 5,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse justify-content-end',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WalkerNav::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>

                    </nav>
                </div>
            </section><!-- .top-bar -->
            
        </header><!-- .site-header -->