<?php
/**
 * Ucef Woo Customizer class
 * 
 * @package Ucef Woo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ucef_Woo_Customizer' ) ) :

    /**
     * The Ucef Woo Customizer class
     */
    class Ucef_Woo_Customizer {

        /**
         * Setup class
         */
        public function __construct() {

            add_action( 'customize_register', array( $this, 'setup' ) );
        }

        public function setup( $wp_customize ) {

            /**
             * customizer for the home page
             */
            $this->carousell_home( $wp_customize );
        }

        public function carousell_home( $wp_customize ) {

            /**
             * Carousell Panel
             */
            $wp_customize->add_panel( 'ucef_woo_carousell_panel', array(
                'priority'       => 99,
                'capability'     => 'edit_theme_options',
                'title'          => 'Carousell',
            ) );

            /**
             * Loop to generate 3 sections each one for a slider
             */
            for ( $i = 1; $i <= 3; $i++ ) {

                // section
                $wp_customize->add_section( 'ucef_woo_carousell_section' . $i, array(
                    'title'         => sprintf( __( 'Slider %s ', 'ucef-woo' ), $i ),
                    'panel'         => 'ucef_woo_carousell_panel'
                ) );

                /**
                 * Slider page number
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
                 * Slider button text
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
                 * Slider button URL
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

endif;

new Ucef_Woo_Customizer();