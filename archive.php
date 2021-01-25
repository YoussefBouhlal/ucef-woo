<?php
/**
 * The archive template file
 * 
 * @package Ucef Woo
 */

get_header();
?>

<div class="content-area">
    <main>
        <div class="container">
            <?php
                // Display the archive title
                the_archive_title( '<h1>', '</h1>');
            ?>
            <div class="first-row row mb-md-4">
                <?php
                    // If there are any posts
                    if ( have_posts() ):

                        global $wp_query;
                        $count = count( $wp_query->posts );
                        $index = 1;

                        // Lood posts loop
                        while ( have_posts() ): the_post();

                            // the first article in col-1->row-1
                            if ( $index == 1 ): ?>
                                <div class="col-12 col-md-6">
                                    <?php get_template_part( 'template-parts/articles/article', 'first' ); ?>
                                </div>
                            <?php
                            else:
                                // befor the second article open col-2->row-1
                                if ( $index == 2 ): ?>
                                    <div class="col-12 col-md-6">
                                <?php
                                endif;

                                get_template_part( 'template-parts/articles/article', 'second' );

                                // after the fift article close col-2->row-1 & close row-1 & open row-2 & open col-1-> row-2
                                if ( $index == 5 ): ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-8 col-lg-9">
                                <?php
                                endif;

                                // after the last article close col-1->row-2 & open col-2->row-2
                                if ( $index == $count && $count >= 5 ): ?>
                                    </div>
                                    <aside class="col-md-4 col-lg-3 d-none d-md-block">
                                <?php
                                endif;

                            endif;

                            $index++;

                        endwhile;

                        if ( $count < 2 ): ?>
                            <div class="col-12 col-md-6">
                        <?php
                        endif;

                        if ( $count < 5 ): ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-9">
                                </div>
                                <aside class="col-md-4 col-lg-3 d-none d-md-block">
                        <?php
                        endif;

                        get_sidebar();

                        // after sidebar close col-2->row-2 & close row-2
                        ?>
                                </aside>
                            </div>
                        <?php

                        // We're using numeric page navigation here
                        the_posts_pagination( array(
                            'prev_text'     => esc_html__( 'Previous', 'ucef-woo' ),
                            'next_text'     => esc_html__( 'Next', 'ucef-woo' ),
                        ));

                    else:

                        get_template_part( 'template-parts/content', 'none' );

                        // if there are no posts close the first row
                        ?>
                            </div>
                        <?php
                    endif;
                ?>
                
        </div>
    </main>
</div>

<?php
get_footer();