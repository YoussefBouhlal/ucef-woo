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

            // Load theme CSS & JS.
            add_action( 'wp_enqueue_scripts', array( 'UCEFWOO_Theme_Class', 'enqueue_scripts' ) );

        }

        // custom excerpt length
        add_filter( 'excerpt_length', array( 'UCEFWOO_Theme_Class', 'custom_excerpt_length' ), 999 );

        // move comment field to bottom
        add_filter( 'comment_form_fields', array( 'UCEFWOO_Theme_Class', 'move_comment_field_to_bottom' ) );

    }

    /**
     * Define Constants
     */
    public static function ucef_woo_constants() {

        $version = self::theme_version();
        
        // Theme version.
		define( 'UCEF_WOO_THEME_VERSION', $version );

		// Javascript and CSS Paths.
		define( 'UCEF_WOO_JS_DIR_URI', UCEF_WOO_THEME_URI . '/assets/dist/js/' );
		define( 'UCEF_WOO_CSS_DIR_URI', UCEF_WOO_THEME_URI . '/assets/dist/css/' );

		// Include Paths.
		define( 'UCEF_WOO_INC_DIR', UCEF_WOO_THEME_DIR . '/inc/' );
        define( 'UCEF_WOO_INC_DIR_URI', UCEF_WOO_THEME_URI . '/inc/' );
        
        // Check if plugins are active
        define( 'UCEF_WOO_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
        define( 'UCEF_WOO_YITH_WISHLIST_ACTIVE', class_exists( 'YITH_WCWL' ) );
    }
    
    /**
     * Load all core theme function files
     */
    public static function ucef_woo_setup() {

        $dir = UCEF_WOO_INC_DIR;

        require_once $dir . 'helpers.php';
        require_once $dir . 'walker/class-wp-bootstrap-navwalker.php';
        require_once $dir . 'walker/class-wp-comment-walker.php';

        // WooCommerce
        if ( UCEF_WOO_WOOCOMMERCE_ACTIVE ) {
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
				'primary' => esc_html__( 'Primary Menu', 'ucef-woo' ),
                'secondary' => esc_html__( 'Footer Menu', 'ucef-woo' ),
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
            'height'        => 30,
            'width'         => 100,
            'flex_height'   => true,
            'flex_width'    => true
        ) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'widgets',
		));
        
		// Declare WooCommerce support.
		add_theme_support( 'woocommerce', array(
            'product_grid'          => array(
                'default_rows'    => 2,
                'default_columns' => 4,
            ),
        ));
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
        
        /*
         * Add featured image sizes
         */
        add_image_size('ucef-woo-home-slider', 800, 800, array( 'center', 'center' ) );
        add_image_size('ucef-woo-first-article', 900, 600, array( 'center', 'center' ) );
        add_image_size('ucef-woo-second-article', 200, 200, array( 'center', 'center' ) );

    }

    /**
     * Registers sidebars
     */
    public static function register_sidebars() {

        register_sidebar( array(
            'name'          => esc_html__( 'Main Sidebar', 'ucef-woo' ),
            'id'            => 'ucef-woo-sidebar-main',
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

    /**
	 * Load scripts in the WP admin
	 */
	public static function admin_scripts() {
		global $pagenow;
		// if ( 'nav-menus.php' === $pagenow ) {
		// 	wp_enqueue_style( 'oceanwp-menus', OCEANWP_INC_DIR_URI . 'walker/assets/menus.css', false, OCEANWP_THEME_VERSION );
		// }
    }
    
    /**
     * Load front-end scripts
     */
    public static function enqueue_scripts() {

        // Get localized array.
		$localize_array = self::localize_array();

        if( strstr( $_SERVER['SERVER_NAME'], 'test' ) ) {

            // Enqueue styles & scripts in development mode
            wp_enqueue_script( 'ucef-woo-main', 'http://localhost:3000/bundled.js', ['jquery'], '1.0', true );

        }else {

            // Define dir
            $dirCSS         = UCEF_WOO_CSS_DIR_URI;
            $dirJS          = UCEF_WOO_JS_DIR_URI;
            $theme_version = UCEF_WOO_THEME_VERSION;

            // Main Style.css file
            wp_enqueue_style( 'ucef-woo-style', $dirCSS . 'main.min.css', false, $theme_version );

            // Load minified js.
            wp_enqueue_script( 'ucef-woo-main', $dirJS . 'main.min.js', array( 'jquery' ), $theme_version, true );
            
        }
        
        // Comment reply.
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        // Localize array
        wp_localize_script( 'ucef-woo-main', 'ucefwooLocalize', $localize_array );

    }

    public static function custom_excerpt_length() {
        return 10;
    }

    public static function move_comment_field_to_bottom( $fields ) {

        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;

        return $fields;
    }

    public static function localize_array() {

        $array  = array(
            'isRTL'     => is_rtl(),
        );

        return apply_filters( 'ucef_woo_localize_array', $array );
    }

}

new UCEFWOO_theme_class();