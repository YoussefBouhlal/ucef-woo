<?php
/**
 * template to show the small article
 * 
 * @package Ucef Woo
 */
?>
<article class="article-second pb-4">
    <div class="article-second__section-text mr-3">
        <p class="mb-1">
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
    </div>
    <div class="article-second__section-image">
        <a href="<?php the_permalink(); ?>">
            <?php
                if ( has_post_thumbnail() ):
                    the_post_thumbnail( 'ucef-woo-second-article', array( 'class' => 'img-fluid' ) );
                else:
                    ?>
                    <div class="article-second__image"><?php esc_html_e( 'No Image Here' ); ?></div>
                    <?php
                endif;
            ?>
        </a>
    </div>
</article>