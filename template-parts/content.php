<?php
/**
 * The template part for displaying posts
 * 
 * @package Ucef Woo
 */
?>

<article <?php post_class(); ?>>
    <h2>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
</article>