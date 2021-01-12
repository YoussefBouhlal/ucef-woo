<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Ucef Woo
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Core Constants.
define( 'UCEF_WOO_THEME_DIR', get_template_directory() );
define( 'UCEF_WOO_THEME_URI', get_template_directory_uri() );

/**
 * Ucef-Woo theme class
 */
final class UCEFWOO_theme_class {

    /**
     * Main Theme Class Constructor
     */
    public function __construct() {
        
        // Define theme constants.
        $this->ucef_woo_constants();
        
        // Load required files.
        $this->ucef_woo_setup();
        
        // Load framework classes.
        add_action( 'after_setup_theme', array( 'UCEFWOO_theme_class', 'classes' ), 4 );
        
        // Setup theme => add_theme_support, register_nav_menus, load_theme_textdomain, etc.
        add_action( 'after_setup_theme', array( 'UCEFWOO_theme_class', 'theme_setup' ), 10 );
        
        // register sidebar widget areas.
        add_action( 'widgets_init', array( 'UCEFWOO_theme_class', 'register_sidebars' ) );
        
        /** Admin only actions */
        if ( is_admin() ) {

            // Load scripts in the WP admin.
			add_action( 'admin_enqueue_scripts', array( 'UCEFWOO_Theme_Class', 'admin_scripts' ) );

            /** Non Admin actions */
        } else {

            // Load theme CSS.
			add_action( 'wp_enqueue_scripts', array( 'UCEFWOO_Theme_Class', 'theme_css' ) );

        }

    }

    /**
     * Define Constants
     */
    public static function ucef_woo_constants() {

        $version = self::theme_version();
        
        // Theme version.
		define( 'UCEF_WOO_THEME_VERSION', $version );

		// Javascript and CSS Paths.
		define( 'UCEF_WOO_JS_DIR_URI', UCEF_WOO_THEME_URI . '/assets/js/' );
		define( 'UCEF_WOO_CSS_DIR_URI', UCEF_WOO_THEME_URI . '/assets/css/' );

		// Include Paths.
		define( 'UCEF_WOO_INC_DIR', UCEF_WOO_THEME_DIR . '/inc/' );
        define( 'UCEF_WOO_INC_DIR_URI', UCEF_WOO_THEME_URI . '/inc/' );
        
        // Check if plugins are active
        define( 'OCEANWP_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
    }
    
    /**
     * Load all core theme function files
     */
    public static function ucef_woo_setup() {

        $dir = UCEF_WOO_INC_DIR;

        require_once $dir . 'helpers.php';

        // WooCommerce
        if ( OCEANWP_WOOCOMMERCE_ACTIVE ) {
            require_once $dir . 'woocommerce/woocommerce-config.php';
        }
    }

    /**
	 * Returns current theme version
	 */
	public static function theme_version() {

		// Get theme data.
		$theme = wp_get_theme();

		// Return theme version.
		return $theme->get( 'Version' );

    }

    /**
     * Load theme classes
     */
    public static function classes() {

        // Admin only classes
        if ( is_admin() ) {

            // Recommend plugins
            require_once UCEF_WOO_INC_DIR . 'plugins/class-tgm-plugin-activation.php';
            require_once UCEF_WOO_INC_DIR . 'plugins/tgm-plugin-activation.php';
            
            // Front-end classes
        } else {


        }

        // Customizer class.
		require_once UCEF_WOO_INC_DIR . 'customizer/customizer.php';

    }

    /**
     * Theme Setup
     */
    public static function theme_setup() {

        // Load text domain.
        load_theme_textdomain( 'ucef-woo', UCEF_WOO_THEME_DIR . '/languages' );
        
        // Get globals.
		global $content_width;

		// Set content width based on theme's default design.
		if ( ! isset( $content_width ) ) {
			$content_width = 1140;
        }
        
        // Register navigation menus.
		register_nav_menus(
			array(
				'topbar_menu' => esc_html__( 'Top Bar', 'ucef-woo' ),
				'main_menu'   => esc_html__( 'Main', 'ucef-woo' ),
				'footer_menu' => esc_html__( 'Footer', 'ucef-woo' ),
				'mobile_menu' => esc_html__( 'Mobile (optional)', 'ucef-woo' ),
			)
		);

		// Enable support for Post Formats.
        add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );
        
		// Enable support for <title> tag.
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        
        /*
         * Add theme support for site logo
         */
        add_theme_support( 'custom-logo', array(
            'height'        => 85,
            'width'         => 160,
            'flex_height'   => true,
            'flex_width'    => true
        ) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			)
        );
        
		// Declare WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        
        /*
         * Add theme support for gutenberg block
         */
        add_theme_support('align-wide');
        add_theme_support( 'responsive-embeds' );

        // Declare support for selective refreshing of widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

    }

    /**
     * Registers sidebars
     */
    public static function register_sidebars() {

        register_sidebar( array(
            'name'          => esc_html__( 'Main Sidebar', 'ucef-woo' ),
            'id'            => 'ucef-sidebar-main',
            'description'   => esc_html__( 'Widgets in this area will be displayed in the blog page', 'ucef-woo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
        
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', 'ucef-woo' ),
            'id'            => 'ucef-sidebar-shop',
            'description'   => esc_html__( 'Widgets in this area will be displayed in the shop page if WooCommerce plugin is activated', 'ucef-woo' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

    }

}

new UCEFWOO_theme_class();