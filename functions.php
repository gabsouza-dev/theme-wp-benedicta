<?php
/**
 * Theme functions and definitions
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

/**
 * 	Benedicta Theme Setup
 */

if ( ! function_exists( 'benedicta_setup' ) ) :
function benedicta_setup() {

	//	Make theme available for translation.
	load_theme_textdomain( 'benedicta', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//	Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	//	Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
	
	// Thumbnails Size
	add_image_size( 'benedicta_685x430', 685, 430, true );
	add_image_size( 'benedicta_800x850', 800, 850, true );
	add_image_size( 'benedicta_570x590', 570, 590, true );
	add_image_size( 'benedicta_570x510', 570, 510, true );
	add_image_size( 'benedicta_570x400', 570, 400, true );
	add_image_size( 'benedicta_550x570', 550, 570, true );
	add_image_size( 'benedicta_500x795', 500, 795, true );
	add_image_size( 'benedicta_490x510', 490, 510, true );
	add_image_size( 'benedicta_370x390', 370, 390, true );
	add_image_size( 'benedicta_370x310', 370, 310, true );
	add_image_size( 'benedicta_370x270', 370, 270, true );
	add_image_size( 'benedicta_290x310', 290, 310, true );
	add_image_size( 'benedicta_281x156', 281, 156, true );
	add_image_size( 'benedicta_270x220', 270, 220, true );
	add_image_size( 'benedicta_210x200', 210, 200, true );
	add_image_size( 'benedicta_190x210', 190, 210, true );
	add_image_size( 'benedicta_120x140', 120, 140, true );
	
	add_image_size( 'benedicta_685x9999', 685, 9999, false );
	add_image_size( 'benedicta_570x9999', 570, 9999, false );
	add_image_size( 'benedicta_490x9999', 490, 9999, false );
	add_image_size( 'benedicta_370x9999', 370, 9999, false );
	add_image_size( 'benedicta_270x9999', 270, 9999, false );
	add_image_size( 'benedicta_210x9999', 210, 9999, false );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' 		=> esc_html__( 'Primary Menu', 'benedicta' ),
		'tagline_menu' 	=> esc_html__( 'Tagline Menu', 'benedicta' )
	) );

	//	Switch default core markup for search form, comment form, and comments
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	//	Enable support for Post Formats.
	function benedicta_post_type( $current_screen ) {
		if ( 'post' == $current_screen->post_type && 'post' == $current_screen->base ) {
			add_theme_support( 'post-formats', array('image', 'gallery', 'link', 'quote', 'audio', 'video'));
		}
	}
	add_action( 'current_screen', 'benedicta_post_type' );

	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'video') );
	add_post_type_support( 'portfolio', 'post-formats' );
	
	//This theme support custom header
    add_theme_support( 'custom-header' );

    //This theme support custom backgrounds
    add_theme_support( 'custom-backgrounds' );

}
endif; // benedicta_setup
add_action( 'after_setup_theme', 'benedicta_setup' );


/**
 * Include files
 */

//	Theme Functions
require_once( get_template_directory() . '/inc/theme_functions.php' );

//	Theme style, jQuery
require_once( get_template_directory() . '/inc/enqueue.php' );

// Template Includes
require_once get_template_directory() . '/templates/template_includes.php';

//	Plugin Recommendations
require_once( get_template_directory() . '/inc/plugins/install-plugin.php' );

//	Load theme meta boxes
if( is_admin() ) {
    require_once( get_template_directory() . '/inc/metabox_config.php' );
}

//	Widgets
require_once( get_template_directory() . '/inc/widgets/widgets.php' );

//	Initialize the mega menu framework
require_once( get_template_directory() . '/inc/megamenu/wp_bootstrap_navwalker.php' );
require_once( get_template_directory() . '/inc/megamenu/wp_bootstrap_mobile_navwalker.php' );
require_once( get_template_directory() . '/inc/megamenu/megamenu_functions.php' );

//	Redux Theme Options
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	require_once( get_template_directory() . '/inc/theme-options/options.php' );
}

//	Breadcrumbs
require_once( get_template_directory() . '/inc/breadcrumbs.php' );

//	WooCommerce
if(class_exists('Woocommerce')) {
	require_once( get_template_directory() .'/inc/woo_functions.php' );
}