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
        <section class="slider pt-2 pt-lg-4">
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
                                                    <?php the_post_thumbnail(); ?>
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
                                                <div class="text-left">
                                                    <div class="para"><?php the_content(); ?></div>
                                                    <a href="<?php echo esc_url( $slider_button_url[$j] ); ?>" class="btn btn-danger"><?php echo esc_html( $slider_button_text[$j] ); ?></a>
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

    </main>
</div>

<?php
get_footer();