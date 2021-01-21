<?php
/**
 * template to show the big article
 * 
 * @package Ucef Woo
 */
?>
<article class="article-first pb-3">
    <a href="<?php the_permalink(); ?>">
        <?php
            if ( has_post_thumbnail() ):
                the_post_thumbnail( 'ucef-woo-first-article', array( 'class' => 'img-fluid' ) );
            else:
                ?>
                <div class="article-first__image"><?php esc_html_e( 'No Image Here' ); ?></div>
                <?php
            endif;
        ?>
    </a>
    <p class="mt-2 mb-1">
        <?php 
            if ( has_category() ):
                the_category( ' ' );
            endif; 
        ?>
    </p>
    <h3>
        <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
    </h3>
    <div><?php the_excerpt(); ?></div>
    <p class="text-muted"><?php the_date(); ?></p>
    <div class="article-first__line"></div>
</article>