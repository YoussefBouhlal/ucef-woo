<?php
/**
 * Ucef Woo Customizer class for Carousel Home
 * 
 * @package Ucef Woo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

trait carousel_home {
    
    public function carousell_home( $wp_customize ) {

        /**
         * Panel
         */
        $wp_customize->add_panel( 'ucef_woo_carousell_panel', array(
            'priority'       => 99,
            'capability'     => 'edit_theme_options',
            'title'          => __( 'Carousell', 'ucef-woo' ),
        ) );

        /**
         * Loop to generate 3 sections each one for a slider
         */
        for ( $i = 1; $i <= 3; $i++ ) {

            /**
             * Sections
             */
            $wp_customize->add_section( 'ucef_woo_carousell_section' . $i, array(
                'title'         => sprintf( __( 'Slider %s ', 'ucef-woo' ), $i ),
                'panel'         => 'ucef_woo_carousell_panel'
            ) );

            /**
             * Page Number
             */
            $wp_customize->add_setting( 'set_slider_page' . $i , array(
                'type'              => 'theme_mod',
                'default'           => '',
                'sanitize_callback' => 'absint'
            ) );
            $wp_customize->add_control( 'set_slider_page' . $i , array(
                'label'         => sprintf( __( 'Set slider page %s ', 'ucef-woo' ), $i ),
                'section'       => 'ucef_woo_carousell_section' . $i,
                'type'          => 'dropdown-pages'
            ) );

            /**
             * Button Text
             */
            $wp_customize->add_setting( 'set_slider_button_text' . $i , array(
                'type'              => 'theme_mod',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field'
            ) );

            $wp_customize->add_control( 'set_slider_button_text' . $i , array(
                'label'         => sprintf( __( 'Button Text for Page %s ', 'ucef-woo' ), $i ),
                'section'       => 'ucef_woo_carousell_section' . $i,
                'type'          => 'text'
            ) );

            /**
             * Button URL
             */
            $wp_customize->add_setting( 'set_slider_button_url' . $i , array(
                'type'              => 'theme_mod',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw'
            ) );

            $wp_customize->add_control( 'set_slider_button_url' . $i , array(
                'label'         => sprintf( __( 'URL for Page %s ', 'ucef-woo' ), $i ),
                'section'       => 'ucef_woo_carousell_section' . $i,
                'type'          => 'url'
            ) );

        }
    }
}