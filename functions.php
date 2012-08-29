<?php
/**
 * turing functions and definitions
 *
 * @package turing
 * @since turing 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since turing 1.0
 */
if ( ! isset( $content_width ) ) $content_width = 640; /* pixels */
// update_option('siteurl','http://colorflow.wp');
// update_option('home','http://colorflow.wp');

require( get_template_directory().'/lib/talent-post-type.php' );
require( get_template_directory().'/lib/services-post-type.php' );
require( get_template_directory().'/lib/amenity-post-type.php' );
require( get_template_directory().'/lib/project-post-type.php' );
require( get_template_directory().'/lib/metabox/init.php');
// require( get_template_directory() . '/lib/metaboxes.php' );

if ( ! function_exists( 'turing_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 * @since turing 1.0
 */
function turing_setup() {
	/*** Custom template tags for this theme. */
	require( get_template_directory() . '/lib/template-tags.php' );
	/*** Custom functions that act independently of the theme templates */
	require( get_template_directory() . '/lib/tweaks.php' );
	/*** Custom Theme Options */
	require( get_template_directory() . '/lib/theme-options/theme-options.php' );
	/*** Custom User Fields */
	require( get_template_directory() . '/lib/theme-options/user-options.php' );
	/*** WordPress.com-specific functions and definitions	**/
	// require( get_template_directory() . '/lib/wpcom.php' );
	/** Make theme available for translation Translations can be filed in the /languages/ directory If you're building a theme based on turing, 
	use a find and replace to change 'turing' to the name of your theme in all the template files	 */
	// Custom Post Types
	load_theme_textdomain( 'turing', get_template_directory() . '/languages' );
	/*** Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );
	/*** Enable support for Post Thumbnails */
	add_theme_support( 'post-thumbnails' );
	/** This theme uses wp_nav_menu() in one location. */
	register_nav_menus( array('primary' => __( 'Primary Menu', 'turing' ), ) );
	/** Add support for the Aside Post Formats */
	add_theme_support( 'post-formats', array('aside','gallery','link','image','quote','status','video') );
	/*** Implement the Custom Header feature */
  //require( get_template_directory() . '/lib/custom-header.php' );
}
endif; // turing_setup
add_action( 'after_setup_theme', 'turing_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since turing 1.0
 */
function turing_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'turing' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'turing_widgets_init' );

/** Enqueue scripts and styles */
function turing_scripts() {
	global $post;
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libraries/modernizr.js', array( 'jquery' ), '20120206', false );
  wp_enqueue_script( 'colorflow', get_template_directory_uri() . '/js/colorflow.js', array( 'jquery' ), '20120206', true );
  wp_enqueue_script( 'quicksand', get_template_directory_uri() . '/js/libraries/quicksand.js', array( 'jquery' ), '20120206', true );
  // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  //  wp_enqueue_script( 'comment-reply' );
  // }
  // if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
  //  wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
  // }
}
add_action( 'wp_enqueue_scripts', 'turing_scripts' );

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/*** Initialize the metabox class. */
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )	require_once 'init.php';
}

// RESERVED NAMES : thumb, thumbnail, medium, large, post-thumbnail
// add_image_size( $name, $width, $height, $crop );
// set_post_thumbnail_size( $width, $height, $crop );
add_image_size( 'billboard', 1360, 9999, false );
add_image_size( 'grid-thumb', 316, 178, true );
add_image_size( 'gallery', 956, 396, false );

// update_option('thumbnail_size_w', 160);
// update_option('thumbnail_size_h', 160);
// update_option('thumbnail_crop', 1);
// update_option('medium_size_w', 500);
// update_option('medium_size_h', 500);
// update_option('medium_size_crop', 1);
// update_option('large_size_w', 500);
// update_option('large_size_h', 500);
// update_option('large_size_crop', 1);
// Custom WordPress Admin Color Scheme
// function admin_css() {
//  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/stylesheets/admin.css' );
// }
// add_action('admin_print_styles', 'admin_css' );

// CUSTOM CONTACT FORM 7 LOADER
/* Custom ajax loader */
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
  function my_wpcf7_ajax_loader () {
  return get_bloginfo('stylesheet_directory') . '/images/ajax-loader.gif';
}