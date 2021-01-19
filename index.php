<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package Ucef Woo
 */

get_header();
?>

<div class="content-area">
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-12">
                    <?php
                        // If there are any posts
                        if ( have_posts() ):
                            // Lood posts loop
                            while ( have_posts() ): the_post();
                                get_template_part( 'template-parts/content' );
                            endwhile;

                            // We're using numeric page navigation here
                            the_posts_pagination( array(
                                'prev_text'     => esc_html__( 'Previous', 'ucef-woo' ),
                                'next_text'     => esc_html__( 'Next', 'ucef-woo' ),
                            ));
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();