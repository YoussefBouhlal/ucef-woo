<?php
/**
 * The header of our theme
 * 
 * @package Ucef Woo
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div id="page" class="site">

    <header class="site-header" role="banner">
        the header
    </header><!-- .site-header -->