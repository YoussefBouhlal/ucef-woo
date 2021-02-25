<?php
/**
 * The template for displaying the footer.
 * 
 * @package Ucef Woo
 */

?>

    <footer class="main-footer mt-4">
        <section class="footer-top">
            <div class="container">

                <div class="section-title"></div>
                <div class="row py-4">

                    <?php 
                        $facebook = get_theme_mod( 'ucef_woo_footer_facebook', 1 );
                        $facebookUrl = get_theme_mod( 'ucef_woo_footer_facebook_url', 'https://www.facebook.com/' );
                        $instagram = get_theme_mod( 'ucef_woo_footer_instagram', 1 );
                        $instagramUrl = get_theme_mod( 'ucef_woo_footer_instagram_url', 'https://www.instagram.com/' );
                        $twitter = get_theme_mod( 'ucef_woo_footer_twitter', 1 );
                        $twitterUrl = get_theme_mod( 'ucef_woo_footer_twitter_url', 'https://twitter.com/' );
                    ?>

                    <?php if ( $facebook == 1 || $instagram == 1 || $twitter == 1 ): ?>
                    <div class="col-12 col-md-6 text-center text-md-left mb-4">
                        <h4><?php _e( 'Follow Us', 'ucef-woo' ); ?></h4>
                        <div>
                            <?php if ( $facebook == 1 ): ?>
                            <a class="text-white mr-1 ml-1" href="<?php echo esc_url( $facebookUrl ); ?>"><?php ucef_woo_svg_inline( 'facebook' ); ?></a>
                            <?php endif; ?>
                            <?php if ( $instagram == 1 ): ?>
                            <a class="text-white mr-1 ml-1" href="<?php echo esc_url( $instagramUrl ); ?>"><?php ucef_woo_svg_inline( 'instagram' ); ?></a>
                            <?php endif; ?>
                            <?php if ( $twitter == 1 ): ?>
                            <a class="text-white mr-1 ml-1" href="<?php echo esc_url( $twitterUrl ); ?>"><?php ucef_woo_svg_inline( 'twitter' ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-12 col-md-6">
                        <nav class="footer-menu">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'secondary',
                                ) );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="copyright pt-2">
            <div class="container">
                <div class="text-center text-muted">
                    <p><?php echo esc_html( get_theme_mod( 'ucef_footer_set_copyright', __( 'Copyright - All Rights Reserved', 'ucef-woo' ) ) ); ?></p>
                </div>
            </div>
        </section>
    </footer>

</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>