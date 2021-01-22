<?php
/**
 * Ucef Woo Customizer class for Home Products and Blog
 * 
 * @package Ucef Woo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait home_products_blog {

    public function home_products_blog( $wp_customize ) {

        /**
         * Panel
         */
        $wp_customize->add_panel( 'ucef_woo_home_products_panel', array(
            'priority'       => 99,
            'capability'     => 'edit_theme_options',
            'title'          => __( 'Home Products & Blog', 'ucef-woo' ),
        ) );

        /**
         * Sections
         */
        $wp_customize->add_section( 'ucef_woo_popular_products_section', array(
            'title'         => __( 'Popular Products', 'ucef-woo' ),
            'panel'         => 'ucef_woo_home_products_panel'
        ) );
        $wp_customize->add_section( 'ucef_woo_new_arrivals_section', array(
            'title'         => __( 'New Arrivals', 'ucef-woo' ),
            'panel'         => 'ucef_woo_home_products_panel'
        ) );
        $wp_customize->add_section( 'ucef_woo_blog_section', array(
            'title'         => __( 'Blog', 'ucef-woo' ),
            'panel'         => 'ucef_woo_home_products_panel'
        ) );

        /**
         * Popular Products
         */
        $wp_customize->add_setting( 'ucef_woo_popular_max_num', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control( 'ucef_woo_popular_max_num', array(
            'label'         => __( 'Max Products', 'ucef-woo' ),
            'section'       => 'ucef_woo_popular_products_section',
            'type'          => 'number'
        ) );
        $wp_customize->add_setting( 'ucef_woo_popular_max_col', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control( 'ucef_woo_popular_max_col', array(
            'label'         => __( 'Max Columns', 'ucef-woo' ),
            'section'       => 'ucef_woo_popular_products_section',
            'type'          => 'number'
        ) );

        /**
         * New Arrivals
         */
        $wp_customize->add_setting( 'ucef_woo_newarrivals_max_num', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control( 'ucef_woo_newarrivals_max_num', array(
            'label'         => __( 'Max Products', 'ucef-woo' ),
            'section'       => 'ucef_woo_new_arrivals_section',
            'type'          => 'number'
        ) );
        $wp_customize->add_setting( 'ucef_woo_newarrivals_max_col', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control( 'ucef_woo_newarrivals_max_col', array(
            'label'         => __( 'Max Columns', 'ucef-woo' ),
            'section'       => 'ucef_woo_new_arrivals_section',
            'type'          => 'number'
        ) );

        /**
         * Blog
         */
        $wp_customize->add_setting( 'ucef_woo_show_blog' , array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => array( $this, 'sanitize_checkbox')
        ) );

        $wp_customize->add_control( 'ucef_woo_show_blog' , array(
            'label'         => __( 'Show Blog', 'ucef-woo' ),
            'section'       => 'ucef_woo_blog_section',
            'type'          => 'checkbox'
        ) );
    }
}