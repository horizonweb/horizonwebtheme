<?php
/**
 * horizonweb functions and definitions
 *
 * @package horizonweb
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'horizonweb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function horizonweb_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on horizonweb, use a find and replace
	 * to change 'horizonweb' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'horizonweb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'horizonweb' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'horizonweb_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // horizonweb_setup
add_action( 'after_setup_theme', 'horizonweb_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function horizonweb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'horizonweb' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'horizonweb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function horizonweb_scripts() {
	wp_enqueue_style( 'horizonweb-style', get_stylesheet_uri() );
	wp_enqueue_style( 'horizonweb-common-style', get_stylesheet_uri() . '/css/common.css', array(), '20140921', true );


	wp_enqueue_script( 'horizonweb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20140921', true );

	wp_enqueue_script( 'horizonweb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20140921', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'horizonweb_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



// CUSTOM CODE STSRT FROM HERE


// Custom favicon

add_action( 'wp_head', 'horizonweb_favicon');
function horizonweb_favicon(){
  echo "<link rel='shortcut icon' href='" . get_stylesheet_directory_uri() . "/images/favicon.ico' />";
}




//  Call stylesheet specific for iPhone and iPad

add_action('wp_print_styles', 'horizonweb_enqueue_styles');
function horizonweb_enqueue_styles(){
  global $is_iphone;
  if( $is_iphone ){
    wp_enqueue_style('iphone-css', get_stylesheet_directory_uri() . 'css/iphone-ipad.css' );
  }
  else{
    wp_enqueue_style('common-css', get_stylesheet_directory_uri() . '/style.css' );
  }
}

//  Remove generator meta tag code from site

add_filter('the_generator', create_function('', 'return "";'));




// Redirect WordPress Feeds To FeedBurner

// add_action('template_redirect', 'horizonweb_rss_redirect');
// function horizonweb_rss_redirect() {
//   if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT'])){
//     header('Location: http://feeds.feedburner.com/horizonweb');
//     header('HTTP/1.1 302 Temporary Redirect');
//   }
// }
