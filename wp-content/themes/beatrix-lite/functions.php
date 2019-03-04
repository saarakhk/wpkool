<?php
/**
 *  Beatrix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Beatrix Lite
 * @since 1.0
 */

// Defining Some Variable
if( !defined( 'BEATRIX_LITE_VERSION' ) ) {
	define('BEATRIX_LITE_VERSION', '1.0.6'); // Theme Version
}
if( !defined( 'BEATRIX_LITE_DIR' ) ) {
	define( 'BEATRIX_LITE_DIR', get_template_directory() ); // Theme dir
}
if( !defined( 'BEATRIX_LITE_URL' ) ) {
	define( 'BEATRIX_LITE_URL', get_template_directory_uri() ); // Theme url
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beatrix_lite_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Beatrix, use a find and replace
	 * to change 'beatrix-lite' to the name of your theme in all the template files.
	 */
	if ( ! isset( $content_width ) ) $content_width = 1024;
	 
	load_theme_textdomain( 'beatrix-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
        
        // This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
        
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'beatrix-lite-soft-featured', 870, 500, true );
	set_post_thumbnail_size( 870, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header', 'beatrix-lite' ),
		'footer' => esc_html__( 'Footer', 'beatrix-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beatrix_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo.
	add_theme_support( 'custom-logo' );

	// Post format.
	add_theme_support( 'post-formats', array('video', 'audio', 'quote', 'gallery'));
	
}
add_action( 'after_setup_theme', 'beatrix_lite_setup' );

/**
 * Admin Welcome Notice
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_admin_welcom_notice() {
	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
		echo '<div class="updated notice notice-success is-dismissible"><p>'.sprintf( __( 'Thank you for choosing Beatrix Blog theme. To get started, visit our <a href="%s">welcome page</a>.', 'beatrix-lite' ), esc_url( admin_url( 'themes.php?page=beatrix-lite' ) ) ).'</p></div>';
	}
}
add_action( 'admin_notices', 'beatrix_lite_admin_welcom_notice' );




/**
	* Register Sidebars
	* 
	* @package Beatrix Lite
	* @since 1.0
	*/
	function beatrix_lite_register_sidebar() {

		// Main Sidebar Area
		register_sidebar( array(
			'name'          => __( 'Main Sidebar', 'beatrix-lite' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears on posts and pages.', 'beatrix-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		
		

		// Footer Sidebar Area
		register_sidebar( array(
			'name'          => __( 'Footer', 'beatrix-lite' ),
			'id'            => 'footer',
			'description'   => __( 'Footer Widhet Area : Add widgets here.', 'beatrix-lite' ),
			'before_widget' => '<section id="%1$s" class="widget beatrix-lite-columns '. beatrix_lite_footer_widgets_cls( 'footer' ) .' %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		
	}
	// Action to register sidebar
		
	add_action( 'widgets_init', 'beatrix_lite_register_sidebar' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'beatrix_lite_pingback_header', 5 );

// Common Functions File
require_once BEATRIX_LITE_DIR . '/includes/beatrix-functions.php';

// Custom template tags for this theme
require_once BEATRIX_LITE_DIR . '/includes/template-tags.php';

// Theme Customizer Settings
require_once BEATRIX_LITE_DIR . '/includes/customizer.php';

// Script Class
require_once( BEATRIX_LITE_DIR . '/includes/class-beatrix-script.php' );

// Theme Dynemic CSS
require_once( BEATRIX_LITE_DIR . '/includes/beatrix-theme-css.php' );

/**
 * Load tab dashboard
 */
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require get_template_directory() . '/includes/dashboard/beatrix-how-it-work.php';
    
}
