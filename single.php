<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package Ucef Woo
 */

get_header();
?>

<div class="content-area">
    <main>
        <div class="container">

            <?php
                // Lood posts loop
                while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header>
                            <h1><?php the_title(); ?></h1>
                            <div class="meta">
                                <p><?php esc_html_e( 'Published by', 'ucef-woo' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'ucef-woo' ); ?> <?php echo esc_html( get_the_date() ); ?><br />
                                    <?php if( has_category() ): ?>
                                        <?php esc_html_e( 'Categories', 'ucef-woo' ); ?>: <span><?php the_category( ' ' ); ?></span><br />
                                    <?php endif; ?>
                                </p>
                            </div>
                        </header>

                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="post-thumbnail">
                                    <?php
                                        if( has_post_thumbnail() ):
                                            the_post_thumbnail( 'ucef-lab-blog', array( 'class' => 'img-fluid') );
                                        endif;
                                    ?>
                                </div>
                        
                                <div class="content">
                                    <?php
                                        wp_link_pages( array(
                                            'befor'     => '<p class="inner-pagination">' . esc_html__( 'Pages', 'ucef' ),
                                            'after'     => '</p>',
                                        ));
                                    ?>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3 d-none d-md-block">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </article>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if( comments_open() || get_comments_number() ):
                        comments_template();
                    endif;
                endwhile;
            ?>

        </div>
    </main>
</div>

<?php
get_footer();