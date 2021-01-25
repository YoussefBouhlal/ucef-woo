<?php
/**
 * The template to display pages
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
                <?php
                    // Lood posts loop
                    while ( have_posts() ): the_post();
                    ?>
                        <article class="col">
                            <h1><?php the_title(); ?></h1>
                            <div><?php the_content(); ?></div>
                            <?php
                                if( comments_open() || get_comments_number() ):
                                    comments_template();
                                endif;
                            ?>
                        </article>
                    <?php
                    endwhile;
                ?>
            </div>
        </div>
    </main>
</div><!-- .content-area -->

<?php
get_footer();