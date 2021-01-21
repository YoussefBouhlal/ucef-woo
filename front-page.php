<?php
/**
 * The front-page template to display the Home
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package Ucef Woo
 */

get_header();
?>

<div class="content-area">
    <main>

        <!-- Slider Section -->
        <section class="slider pt-2 pt-lg-4 pb-5">
            <div id="carousel-ucef-woo-home" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="container">
                    <div class="carousel-inner">

                        <?php
                        for ( $i = 1; $i <= 3; $i++ ):
                            $slider_page[$i]        = get_theme_mod( 'set_slider_page'.$i );
                            $slider_button_text[$i] = get_theme_mod( 'set_slider_button_text'.$i );
                            $slider_button_url[$i]  = get_theme_mod( 'set_slider_button_url'.$i );
                        endfor;

                        $args = array(
                            'post_type'         => 'page',
                            'posts_per_page'    => '3',
                            'post__in'          => $slider_page,
                            'order_by'          => 'post__in',
                        );

                        $slider_loop = new WP_Query( $args );

                        $j = 1;
                        if ( $slider_loop->have_posts() ):
                            while( $slider_loop->have_posts() ):
                                $slider_loop->the_post();
                                
                                ?>
                                    <div class="carousel-item <?php echo ( $j==1 ) ? 'active': '' ?>">
                                        <div class="content">
                                            <div class="image">
                                                <div class="image__content">
                                                    <?php the_post_thumbnail( 'ucef-woo-home-slider' ); ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-ucef-woo-home" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-ucef-woo-home" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="carousel-caption">
                                                <div class="text-left text-body">
                                                    <h2 class="f-cursive"><?php the_title(); ?></h2>
                                                    <div class="para fw-500"><?php the_content(); ?></div>
                                                    <a href="<?php echo esc_url( $slider_button_url[$j] ); ?>" class="btn btn-success fw-500"><?php echo esc_html( $slider_button_text[$j] ); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                                $j++;
                            endwhile;
                            wp_reset_postdata();
                        endif;

                        ?>

                    </div>
                </div>
            </div>
        </section>

        <!-- if Woocommerce plugin activated -->
        <?php if ( class_exists( 'WooCommerce' ) ): ?>
        <!-- Popular Products -->
        <section class="popular-products">
            <?php
                $popular_limit      = get_theme_mod( 'ucef_woo_popular_max_num', 4 );
                $popular_columns    = get_theme_mod( 'ucef_woo_popular_max_col', 4 );
            ?>
            <div class="container">
                <div class="section-title">
                    <h2 class="f-cursive"><?php esc_html_e( 'Popular Products', 'ucef-woo' ); ?></h2>
                </div>
                <?php echo do_shortcode( '[products limit="'. esc_attr( $popular_limit ) .'" columns="'. esc_attr( $popular_columns ) .'" orderby="popularity"]' ); ?>
                
            </div>
        </section>
        
        <section class="new-arrivals">
            <?php
                $newarrivals_limit      = get_theme_mod( 'ucef_woo_newarrivals_max_num', 4 );
                $newarrivals_columns    = get_theme_mod( 'ucef_woo_newarrivals_max_col', 4 );
            ?>
            <div class="container">
                <div class="section-title">
                    <h2 class="f-cursive"><?php esc_html_e( 'New Arrivals', 'ucef-woo' ); ?></h2>
                </div>
                <?php echo do_shortcode( '[products limit="'. esc_attr( $newarrivals_limit ) .'" columns="'. esc_attr( $newarrivals_columns ) .'" orderby="date"]' ); ?>
                
            </div>
        </section>
        <?php endif; ?>

        <?php $showblog = get_theme_mod( 'ucef_woo_show_blog', 1 ); ?>
        <?php if ( $showblog == 1 ): ?>
        <section class="blog-section">
            <div class="container">
                <div class="section-title">
                    <h2 class="f-cursive"><?php esc_html_e( 'News From Our Blog', 'ucef-woo' ); ?></h2>
                </div>
                <div class="row">
                    <?php
                        $args = array(
                            'post_type'         => 'post',
                            'posts_per_page'    => 5,
                            'ignore_sticky_posts'   => true,
                        );
                        $blog_posts = new WP_Query( $args );
                        $index      = 1;

                        if ( $blog_posts->have_posts() ):
                            while ( $blog_posts->have_posts() ): $blog_posts->the_post();

                                if ( $index == 1 ): ?>

                                    <div class="col-12 col-md-6">
                                        <?php get_template_part( 'template-parts/articles/article', 'first' );?>
                                    </div>

                                <?php
                                else:

                                    if ( $index == 2 ): ?>
                                        <div class="col-12 col-md-6">
                                    <?php
                                    endif;

                                    get_template_part( 'template-parts/articles/article', 'second' );

                                    if ( $index == 5 ): ?>
                                        </div>
                                    <?php
                                    endif;

                                endif;

                                $index++;

                            endwhile;
                            wp_reset_postdata();
                        else:
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                    ?>

                </div>
            </div>
        </section>
        <?php endif; ?>

    </main>
</div>

<?php
get_footer();