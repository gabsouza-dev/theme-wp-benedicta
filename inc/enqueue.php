<?php

/**
 * Load frontend css files
 */

function benedicta_load_css() {
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('benedicta-evatheme-icon-fonts', get_template_directory_uri() . '/assets/css/Evatheme-Icon-Fonts.css');
	wp_enqueue_style('swipebox', get_template_directory_uri() . '/assets/css/plugins/swipebox.min.css', array(), '1.4.4');
	wp_enqueue_style('benedicta-owlcarousel', get_template_directory_uri() . '/assets/css/custom-owlcarousel.css');
	
	//	WooCommerce custom styles
	if( class_exists('Woocommerce') ) {
		wp_enqueue_style('benedicta-woo', get_template_directory_uri() . '/assets/css/custom-woo.css');
	}
	wp_enqueue_style('benedicta-theme', get_template_directory_uri() . '/assets/css/theme-style.css');
	wp_add_inline_style('benedicta-theme', benedicta_generate_dynamic_css() );
	wp_enqueue_style('benedicta-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	wp_enqueue_style('benedicta-default', get_stylesheet_uri());
	
	if( !class_exists( 'ReduxFrameworkPlugin' ) ) {
		wp_enqueue_style('benedicta-google-fonts', benedicta_google_fonts_url(), array(), '1.0.0' );
	}

}
add_action( 'wp_enqueue_scripts', 'benedicta_load_css' );


/**
 * Register Google Fonts url
 */

function benedicta_google_fonts_url(){
	
	$google_font_url = add_query_arg( 'family', urlencode( 'Arvo:400,700|Oswald:300,400,500,600,700&subset=latin' ), "//fonts.googleapis.com/css" );
	add_editor_style( $google_font_url );
	
    return $google_font_url;
}


/**
 * Load frontend js files
 */

function benedicta_load_js() {

	global $post;
	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('swipebox', get_template_directory_uri() . '/assets/js/plugins/jquery.swipebox.min.js', 'jquery', '1.4.4', true);
	wp_enqueue_script('mousewheel', get_template_directory_uri() . '/assets/js/jquery.mousewheel.js', array( 'jquery' ), '3.1.9', true);
	wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), false, true);
	wp_enqueue_script('benedicta-isotope', get_template_directory_uri() . '/assets/js/custom-isotope.js', array('jquery'), false, true);
	
	$benedicta_func_fixed_sidebar = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('func_fixed_sidebar') : '0';
	if( $benedicta_func_fixed_sidebar != '0' ) {
		wp_enqueue_script('benedicta-stickysidebar', get_template_directory_uri() . '/assets/js/custom-stickysidebar.js', array(), false, true);
	}
	
	//	Headroom function
	$benedicta_header_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header-layout') : 'full_width';
	$benedicta_header_sticky = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_sticky') : 'fixed';
	if( get_page_template_slug() != "page-comingsoon.php" && $benedicta_header_sticky == 'headroom' && $benedicta_header_layout != 'left_fixed' ) {
		wp_enqueue_script('headroom', get_template_directory_uri() . '/assets/js/headroom.min.js', array(), '0.9.3', true);
	}
	
	if( $benedicta_header_layout == 'left_fixed' ) {
		wp_enqueue_script('benedicta-niceScroll', get_template_directory_uri() . '/assets/js/jquery.jscrollpane.min.js', 'jquery', '', true);
	}

	//	WooCommerce custom jQuery
	if( class_exists('Woocommerce') ) {
		if( is_singular('product') ){
			wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/plugins/slick.min.js', array( 'jquery' ), '1.6.0', true);
		}
		wp_enqueue_script('benedicta-woo', get_template_directory_uri() . '/assets/js/custom-woo.js', array( 'jquery' ), '', true);
	}
	wp_enqueue_script('benedicta-script', get_template_directory_uri() . '/assets/js/theme-script.js', array( 'jquery' ), '', true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Google Maps
	$google_api_key = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('google_maps_api') : '';
	if( $google_api_key != '' ) {
		wp_register_script( 'google-maps', '//maps.googleapis.com/maps/api/js?key=' . $google_api_key, null, null, true );
	}

	//	Coming Soon Page
	if( get_page_template_slug() == "page-comingsoon.php" ) {
		
		wp_enqueue_script('benedicta-downCount', get_template_directory_uri() . '/assets/js/jquery.downCount.js', array('jquery'), false, true);
		
		$benedicta_comings_soon_years 	= get_post_meta( $post->ID, 'benedicta_comings_soon_years', true );
		$benedicta_comings_soon_months 	= get_post_meta( $post->ID, 'benedicta_comings_soon_months', true );
		$benedicta_comings_soon_days 	= get_post_meta( $post->ID, 'benedicta_comings_soon_days', true );
		
		wp_add_inline_script( 'benedicta-downCount', '
			
			jQuery(document).ready(function() {
				jQuery(".countdown").downCount({
					date: "'. esc_html( $benedicta_comings_soon_months ) .'/'. esc_html( $benedicta_comings_soon_days ) .'/'. esc_html( $benedicta_comings_soon_years ) .' 12:00:00"
				});
			});
		
		' );
		
	}
}
add_action( 'wp_enqueue_scripts', 'benedicta_load_js' );


/**
 * Load Custom js
 */
function benedicta_custom_js() {
	
	$benedicta_custom_js = benedicta_options('custom-js');
	
	if( class_exists( 'ReduxFrameworkPlugin' ) && !empty( $benedicta_custom_js ) ) {
		echo benedicta_options('custom-js');
	}
}
add_action('wp_footer', 'benedicta_custom_js', 100);


/**
 * Load backend css files
 */

function benedicta_load_admin_css() {

	wp_enqueue_style('benedicta-admin', get_template_directory_uri() . '/inc/assets/css/cstheme-admin.css');
	wp_enqueue_style('benedicta-redux', get_template_directory_uri() . '/inc/assets/css/evatheme-redux-options.css');

}
add_action( 'admin_enqueue_scripts', 'benedicta_load_admin_css' );


/**
 * Load backend js files
 */

function benedicta_load_admin_js() {

	wp_enqueue_script('benedicta-admin', get_template_directory_uri() . '/inc/assets/js/cstheme-admin.js', array( 'jquery' ), '', true);
}
add_action( 'admin_enqueue_scripts', 'benedicta_load_admin_js' );