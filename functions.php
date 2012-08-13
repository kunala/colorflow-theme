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
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

// update_option('siteurl','http://colorflow.wp');
// update_option('home','http://colorflow.wp');

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
	require( get_template_directory() . '/inc/template-tags.php' );
	/*** Custom functions that act independently of the theme templates */
	//require( get_template_directory() . '/inc/tweaks.php' );
	/*** Custom Theme Options */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );
	/*** Custom User Fields */
	require( get_template_directory() . '/inc/theme-options/user-options.php' );
	/*** WordPress.com-specific functions and definitions	**/
	// require( get_template_directory() . '/inc/wpcom.php' );
	/** Make theme available for translation Translations can be filed in the /languages/ directory If you're building a theme based on turing, 
	use a find and replace to change 'turing' to the name of your theme in all the template files	 */
	// Custom Post Types
	require( get_template_directory() . '/inc/services-post-type.php' );
	require( get_template_directory() . '/inc/amenity-post-type.php' );
	require( get_template_directory() . '/inc/project-post-type.php' );
	require( get_template_directory() . '/inc/talent-post-type.php' );
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
  //require( get_template_directory() . '/inc/custom-header.php' );
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
  // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
  //  wp_enqueue_script( 'comment-reply' );
  // }
  // if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
  //  wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
  // }
}
add_action( 'wp_enqueue_scripts', 'turing_scripts' );

function gallery_first_image(){		
	global $post;
	$args = array( 'post_type'=>'attachment','numberposts'=>1,'post_parent'=>$post->ID,'order'=>'ASC','orderby'=>'menu_order','post_mime_type'=>'image');
	$attachments = get_posts( $args );
	if ( $attachments )	{	foreach ( $attachments as $attachment )	{	return wp_get_attachment_url( $attachment->ID ); } }
	return false;
}
// RESERVED NAMES : thumb, thumbnail, medium, large, post-thumbnail
// add_image_size( $name, $width, $height, $crop );
// set_post_thumbnail_size( $width, $height, $crop );
add_image_size( 'billboard', 1360, 9999, false );
add_image_size( 'grid-thumb', 316, 178, true );
add_image_size( 'gallery', 956, 396, true );
set_post_thumbnail_size( 150, 150 );
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
function admin_css() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/stylesheets/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

if( class_exists( 'kdMultipleFeaturedImages' ) ) {
  $args = array(
    'id' => 'homepage-image',
    'post_type' => 'project',      // Set this to post or page
    'labels' => array(
    'name'      => 'Homepage Image',
    'set'       => 'Set homepage image',
    'remove'    => 'Remove homepage image',
    'use'       => 'Use as homepage image',
  )
);
new kdMultipleFeaturedImages( $args );
}
