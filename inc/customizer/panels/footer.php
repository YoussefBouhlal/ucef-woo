<?php
/**
 * Ucef Woo Customizer class for Footer
 * 
 * @package Ucef Woo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait footer {

    public function footer( $wp_customize ) {

        /**
         * Panel
         */
        $wp_customize->add_panel( 'ucef_woo_footer', array(
            'priority'       => 99,
            'capability'     => 'edit_theme_options',
            'title'          => __( 'Footer', 'ucef-woo' ),
        ) );

        /**
         * Sections
         */
        $wp_customize->add_section( 'ucef_woo_footer_social_media', array(
            'title'         => __( 'Social Media', 'ucef-woo' ),
            'panel'         => 'ucef_woo_footer'
        ) );
        $wp_customize->add_section( 'ucef_woo_footer_copyright', array(
            'title'         => __( 'Copyright', 'ucef-woo' ),
            'panel'         => 'ucef_woo_footer'
        ) );


        /**
         * Social Media
         */
        $socialArray = array(
            'facebook',
            'instagram',
            'twitter',
        );
        foreach ($socialArray as $social ) {

            $wp_customize->add_setting( 'ucef_woo_footer_' . $social , array(
                'type'              => 'theme_mod',
                'default'           => true,
                'sanitize_callback' => array( $this, 'sanitize_checkbox')
            ) );
            $wp_customize->add_control( 'ucef_woo_footer_' . $social , array(
                'label'         => sprintf( __( 'Show %s Icon', 'ucef-woo' ), $social ),
                'section'       => 'ucef_woo_footer_social_media',
                'type'          => 'checkbox'
            ) );

            $wp_customize->add_setting( 'ucef_woo_footer_'. $social .'_url', array(
                'type'              => 'theme_mod',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw'
            ) );
            $wp_customize->add_control( 'ucef_woo_footer_'. $social .'_url', array(
                'label'         => sprintf( __( '%s URL', 'ucef-woo' ), $social),
                'section'       => 'ucef_woo_footer_social_media',
                'type'          => 'url'
            ) );
        }

        /**
         * Copyright
         */
        $wp_customize->add_setting( 'ucef_footer_set_copyright', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'ucef_footer_set_copyright', array(
            'label'         => __( 'Write your copyright', 'ucef-woo' ),
            'section'       => 'ucef_woo_footer_copyright',
            'type'          => 'text'
        ) );

    }
}