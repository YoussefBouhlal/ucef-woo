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
             * customizer for the home carousel page
             */
            $this->carousell_home( $wp_customize );
            
            /**
             * customizer for the home page popular products
             */
            $this->home_products_blog( $wp_customize );
        }

        public function carousell_home( $wp_customize ) {

            /**
             * Carousell Panel
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

        public function home_products_blog( $wp_customize ) {

            /**
             * Home products & blog Panel
             */
            $wp_customize->add_panel( 'ucef_woo_home_products_panel', array(
                'priority'       => 99,
                'capability'     => 'edit_theme_options',
                'title'          => __( 'Home Products & Blog', 'ucef-woo' ),
            ) );

            // Popular Products section
            $wp_customize->add_section( 'ucef_woo_popular_products_section', array(
                'title'         => __( 'Popular Products', 'ucef-woo' ),
                'panel'         => 'ucef_woo_home_products_panel'
            ) );

            /**
             * Popular Products Max Number
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
            
            /**
             * Popular Products Max Columns
             */
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

            // New arrivals section
            $wp_customize->add_section( 'ucef_woo_new_arrivals_section', array(
                'title'         => __( 'New Arrivals', 'ucef-woo' ),
                'panel'         => 'ucef_woo_home_products_panel'
            ) );
            
            /**
             * New Arrivals Max Number
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
            
            /**
             * Popular Products Max Columns
             */
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

            // Popular Products section
            $wp_customize->add_section( 'ucef_woo_blog_section', array(
                'title'         => __( 'Blog', 'ucef-woo' ),
                'panel'         => 'ucef_woo_home_products_panel'
            ) );

            $wp_customize->add_setting( 'ucef_woo_show_blog' , array(
                'type'              => 'theme_mod',
                'default'           => '',
                'sanitize_callback' => array( $this, 'sanitize_checkbox')
            ) );
    
            $wp_customize->add_control( 'ucef_woo_show_blog' , array(
                'label'         => __( 'Show Blog', 'ucef' ),
                'section'       => 'ucef_woo_blog_section',
                'type'          => 'checkbox'
            ) );
        }

        function sanitize_checkbox( $checked ) {
            return ( ( isset ( $checked ) && true == $checked ) ? true : false );
        }
        
    }

endif;

new Ucef_Woo_Customizer();