<?php
/**
 * madhat functions and definitions
 *
 * @package madhat
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'madhat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function madhat_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on madhat, use a find and replace
	 * to change 'madhat' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'madhat', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'madhat' ),
		'bottom' => __( 'Bottom Menu', 'madhat' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'madhat_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_image_size('pop-thumb',542, 343, true );
	add_image_size('pop-thumb-half',542, 170, true );
	add_image_size('pop-thumb-half-full',1084, 340, true );
	add_image_size('madhat-skew-thumb',542, 380, true );
	
	/*
	 * Enable support for RT Slider Plugin.
	 */
	 add_theme_support('rt-slider');
	
}
endif; // madhat_setup
add_action( 'after_setup_theme', 'madhat_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function madhat_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'madhat' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'madhat' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'madhat' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'madhat' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'madhat' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'madhat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function madhat_scripts() {
	wp_enqueue_style( 'madhat-style', get_stylesheet_uri() );
	
	wp_enqueue_style('madhat-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('madhat_title_font', 'Playfair Display') ) ).':100,300,400,700' );
	
	wp_enqueue_style('madhat-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('madhat_body_font', 'Playfair Display') ) ).':100,300,400,700' );
	
	wp_enqueue_style( 'madhat-fontawesome-style', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'madhat-nivo-style', get_template_directory_uri() . '/assets/css/nivo-slider.css' );
	
	wp_enqueue_style( 'madhat-nivo-skin-style', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );
	
	wp_enqueue_style( 'madhat-bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'madhat-hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );
		
	wp_enqueue_style( 'madhat-main-theme-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_script( 'madhat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'madhat-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

	// Localize the ext-script for mobile menu text
	wp_localize_script( 'madhat-externaljs', 'menu_object', array( 'nav_text' =>  __( 'Navigation', 'madhat' )) );
	
	wp_enqueue_script( 'madhat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'madhat-custom-js', get_template_directory_uri() . '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'madhat_scripts' );


/**
 * Enqueue Scripts for Admin
 */
function madhat_custom_wp_admin_style() {
        wp_enqueue_style( 'madhat-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'madhat_custom_wp_admin_style' );



//Function to Trim Excerpt Length & more..
function madhat_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'madhat_excerpt_length', 999 );

function madhat_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'madhat_excerpt_more' );

//Backwards Compatibility FUnction
function madhat_logo() {	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}




/**
 * Enqueue Scripts for Admin - For FUTURE UPDATE
 */
/*
function madhat_custom_wp_admin_style() {
        wp_enqueue_style( 'madhat-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'madhat_custom_wp_admin_style' );
*/

/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/framework/theme-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom CSS Mods.
 */
require get_template_directory() . '/inc/css-mods.php';


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
 * Load Jetpack compatibility file. - For FUTURE UPGRADE
 */
//require get_template_directory() . '/inc/jetpack.php';
