<?php
/**
 * The template to display Search page
 * 
 * @package Ucef Woo
 */

get_header();
?>

<div class="content-area">
    <main>
        <div class="container">
            <h1><?php esc_html_e( 'Search result for', 'ucef' ); ?>: <?php echo get_search_query(); ?></h1>
            <?php get_search_form(); ?>

            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
            
                <?php

                    // If there are any posts
                    if ( have_posts() ):

                        // Load posts loop
                        while ( have_posts() ): the_post();
                            get_template_part( 'template-parts/articles/article', 'second' );
                        endwhile;

                        // We're using numeric page navigation here
                        the_posts_pagination( array(
                            'prev_text'     => esc_html__( 'Previous', 'ucef-woo' ),
                            'next_text'     => esc_html__( 'Next', 'ucef-woo' ),
                        ));
                    else:
                        ?>
                            <p><?php esc_html_e( 'There are no results for your query', 'ucef' ); ?></p>
                        <?php
                    endif;
                ?>
                    
                </div>
                <div class="col-md-4 col-lg-3 d-none d-md-block">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
</div><!-- .content-area -->

<?php
get_footer();