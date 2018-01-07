<?php
/**
 * Chrimbo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chrimbo
 */

/**
 * Get the path for the file ( to support child theme )
 *
 * @since Chrimbo 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('chrimbo_file_directory') ){
	function chrimbo_file_directory( $file_path ){

		if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ){
			return trailingslashit( get_stylesheet_directory() ) . $file_path;
		}
		else{
			return trailingslashit( get_template_directory() ) . $file_path;
		}
	}
}

/**
 * require chrimbo int.
 */
require get_template_directory() . '/inc/init.php';


if ( ! function_exists( 'chrimbo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chrimbo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on chrimbo, use a find and replace
	 * to change 'chrimbo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'chrimbo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */

	add_image_size( 'chrimbo-home-main-slider', 1366, 558, true );
	//add_image_size( 'chrimbo-home-activities-image', 340, 231, true );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'chrimbo' ),
		'footer' => esc_html__( 'Footer Menu', 'chrimbo' ),
		'social' => esc_html__( 'Social Menu', 'chrimbo' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'chrimbo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*implimenting new feature from 4.5*/
	add_theme_support( 'custom-logo', array(
	   'flex-width' => true,
	   'header-text' => array( 'site-title', 'site-description' ),
	) );

}
endif;
add_action( 'after_setup_theme', 'chrimbo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chrimbo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chrimbo_content_width', 640 );
}
add_action( 'after_setup_theme', 'chrimbo_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */

/*Google Fonts*/
function chrimbo_google_fonts() {
    global $chrimbo_customizer_all_values;
	$fonts_url = '';
	$fonts     = array();

	$chrimbo_font_family_h1_h6 = $chrimbo_customizer_all_values['chrimbo-font-family-title'];
	$chrimbo_font_family_site_identity = $chrimbo_customizer_all_values['chrimbo-font-family-site-identity'];
	$chrimbo_fonts = array();
	$chrimbo_fonts[]=$chrimbo_font_family_h1_h6;
	$chrimbo_fonts[]=$chrimbo_font_family_site_identity;

	$chrimbo_fonts_stylesheet = '//fonts.googleapis.com/css?family=';
	$i  = 0;
	for ($i=0; $i < count( $chrimbo_fonts ); $i++) { 
	    if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'chrimbo' ), $chrimbo_fonts[$i] ) ) {
			$fonts[] = $chrimbo_fonts[$i];
		}
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}

function chrimbo_scripts() {

	 	/*animation*/
	    wp_enqueue_style( 'wow-animate-css', get_template_directory_uri() . '/assets/frameworks/wow/css/animate.min.css', array(), '3.4.0' );/*added*/
		
	    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/frameworks/slick/slick.css', array(), '3.4.0' );/*added*/
		
	   
		wp_enqueue_style( 'chrimbo-style', get_stylesheet_uri() );

		wp_enqueue_style( 'chrimbo-google-fonts', chrimbo_google_fonts() );
	    
		// Script
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'), '2.8.3', true );
		
		wp_enqueue_script( 'navigation-js', get_template_directory_uri() . '/assets/js/menu2016.js', array(), '20120206', true );
		
		wp_enqueue_script('easing-js', get_template_directory_uri() . '/assets/frameworks/jquery.easing/jquery.easing.js', array('jquery'), '0.3.6', 1);

	    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/frameworks/wow/js/wow.min.js', array('jquery'), '1.1.2', 1);

	    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/frameworks/slick/slick.min.js', array('jquery'), '1.6.0', 1);

	    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/frameworks/waypoints/jquery.waypoints.min.js', array('jquery'), '4.0.0', 1);

		/*custom slider*/
		wp_enqueue_script('evision-custom', get_template_directory_uri() . '/assets/js/evision-custom.js', array('jquery'), '1.0.1', 1);

		wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chrimbo_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*update to pro link*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/chrimbo/class-customize.php' );

/*breadcrum function*/

if ( ! function_exists( 'chrimbo_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function chrimbo_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once get_template_directory() . '/assets/frameworks/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;

