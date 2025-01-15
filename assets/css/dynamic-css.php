<?php

global $post;

$benedicta_postId = ( isset( $post->ID ) ? get_the_ID() : NULL );
	
$benedicta_theme_color 					= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('theme_color') : '#d3ab55';

/* Header */
$benedicta_header_bg_style 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_bg_style') : 'bgcolor';
$benedicta_header_page_bg_style 		= get_post_meta( $benedicta_postId, 'benedicta_header_page_bg_style', true );
$benedicta_header_bgcolor 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_bgcolor') : '#000000';
$benedicta_header_fixed_bgcolor 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_fixed_bgcolor') : '#353300';
$benedicta_header_color 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_color') : '#ffffff';

$benedicta_header_left_bgcolor 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_left_bgcolor') : '#222222';

/* Body */
$benedicta_body_font_family 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','font-family') : 'Arvo';
$benedicta_body_font_transform 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','text-transform') : 'none';
$benedicta_body_font_weight 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','font-weight') : '400';
$benedicta_body_font_height 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','line-height') : '32px';
$benedicta_body_font_size 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','font-size') : '18px';
$benedicta_body_font_color 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','color') : '#333333';
$benedicta_body_font_spacing 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('body-font','letter-spacing') : '0px';

/* Typography */
$benedicta_heading_font_family 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('h1-font','font-family') : 'Oswald';

/* Primary Menu */
$benedicta_headermenu_font_family 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','font-family') : 'Oswald';
$benedicta_headermenu_font_transform 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','text-transform') : 'uppercase';
$benedicta_headermenu_font_weight 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','font-weight') : '300';
$benedicta_headermenu_font_height 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','line-height') : '29px';
$benedicta_headermenu_font_size 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','font-size') : '12px';
$benedicta_headermenu_font_color 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','color') : '#ffffff';
$benedicta_headermenu_font_spacing 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_font','letter-spacing') : '1px';
$benedicta_headermenu_hover_color 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headermenu_hover_color') : '#d3ab55';
$benedicta_headersubmenu_font_family 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','font-family') : 'Arvo';
$benedicta_headersubmenu_font_transform = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','text-transform') : 'uppercase';
$benedicta_headersubmenu_font_weight 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','font-weight') : '400';
$benedicta_headersubmenu_font_height 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','line-height') : '22px';
$benedicta_headersubmenu_font_size 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','font-size') : '11px';
$benedicta_headersubmenu_font_color 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','color') : '#ffffff';
$benedicta_headersubmenu_font_spacing 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_font','letter-spacing') : '1px';
$benedicta_headersubmenu_bgcolor 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_bgcolor') : '#333333';
$benedicta_headersubmenu_hover_bgcolor 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('headersubmenu_hover_bgcolor') : '#555555';

// Breadcrumbs
$benedicta_breadcrumbs_color 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('breadcrumbs_color') : '#ffffff';

/* Portfolio */
$benedicta_portfolio_overlay 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_overlay') : '#000000';
$benedicta_portfolio_overlay_opacity 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_overlay_opacity') : '30';
$benedicta_portfolio_filter_color 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_filter_color') : '#000000';

/* Footer */
$benedicta_prefooter_headings_family 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','font-family') : 'Oswald';
$benedicta_prefooter_headings_transform = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','text-transform') : 'uppercase';
$benedicta_prefooter_headings_weight 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','font-weight') : '500';
$benedicta_prefooter_headings_height 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','line-height') : '30px';
$benedicta_prefooter_headings_size 		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','font-size') : '18px';
$benedicta_prefooter_headings_color 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','color') : '#ffffff';
$benedicta_prefooter_headings_spacing 	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_headings','letter-spacing') : '0px';
$benedicta_prefooter_bgcolor 			= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_bgcolor') : '#111111';
$benedicta_prefooter_color 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_color') : '#ffffff';
$benedicta_footer_bgcolor 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer_bgcolor') : '#000000';
$benedicta_footer_color 				= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer_color') : '#cecece';


// Theme / Page Background Stylings
$benedicta_page_bg_styles = $benedicta_page_bg_image = $benedicta_page_bg_image_repeat = $benedicta_page_bg_color = $benedicta_page_bg_attachment = $benedicta_page_bg_position = $benedicta_page_bg_cover = $benedicta_page_text_color = $benedicta_theme_boxed_margin = '';
$benedicta_page_bg_image = get_post_meta( $benedicta_postId, 'benedicta_page_bg_image', true );

if ( $benedicta_page_bg_image ) {
	if ( is_numeric( $benedicta_page_bg_image ) ) {
		$benedicta_page_bg_image = wp_get_attachment_image_src( $benedicta_page_bg_image, 'full' );
		$benedicta_page_bg_image = $benedicta_page_bg_image[0];
	}
}

$benedicta_page_bg_image_repeat = get_post_meta( $benedicta_postId, 'benedicta_page_bg_repeat', true );
$benedicta_page_bg_color 		= get_post_meta( $benedicta_postId, 'benedicta_page_bg_color', true );
$benedicta_page_bg_attachment 	= get_post_meta( $benedicta_postId, 'benedicta_page_bg_attachment', true );
$benedicta_page_bg_position 	= get_post_meta( $benedicta_postId, 'benedicta_page_bg_position', true );
$benedicta_page_bg_cover 		= get_post_meta( $benedicta_postId, 'benedicta_page_bg_full', true );
$benedicta_page_text_color 		= get_post_meta( $benedicta_postId, 'benedicta_page_text_color', true );

$benedicta_theme_bg_image = $benedicta_theme_bg_image_repeat = $benedicta_theme_bg_color = $benedicta_theme_bg_attachment = $benedicta_theme_bg_position = $benedicta_theme_bg_cover = '';
if( class_exists( 'ReduxFrameworkPlugin' ) ) {
	if( benedicta_options('theme_bg_image','background-image') != '' ) {
		$benedicta_theme_bg_image = benedicta_options('theme_bg_image','background-image');
	}
	if( benedicta_options('theme_bg_image','background-repeat') != '' ) {
		$benedicta_theme_bg_image_repeat = benedicta_options('theme_bg_image','background-repeat');
	}
	if( benedicta_options('theme_bg_image','background-attachment') != '' ) {
		$benedicta_theme_bg_attachment = benedicta_options('theme_bg_image','background-attachment');
	}
	if( benedicta_options('theme_bg_image','background-position') != '' ) {
		$benedicta_theme_bg_position = benedicta_options('theme_bg_image','background-position');
	}
	if( benedicta_options('theme_bg_image','background-size') != '' ) {
		$benedicta_theme_bg_cover = benedicta_options('theme_bg_image','background-size');
	}
}
if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('theme_bg_image','background-color') != '' ) {
	$benedicta_theme_bg_color = benedicta_options('theme_bg_image','background-color');
}

$benedicta_page_bg_image 		= !empty( $benedicta_page_bg_image ) ? $benedicta_page_bg_image : $benedicta_theme_bg_image;
$benedicta_page_bg_color 		= !empty( $benedicta_page_bg_color ) ? $benedicta_page_bg_color : $benedicta_theme_bg_color;
$benedicta_page_bg_image_repeat = !empty( $benedicta_page_bg_image_repeat ) ? $benedicta_page_bg_image_repeat : $benedicta_theme_bg_image_repeat;
$benedicta_page_bg_attachment 	= !empty( $benedicta_page_bg_attachment ) ? $benedicta_page_bg_attachment : $benedicta_theme_bg_attachment;
$benedicta_page_bg_position 	= !empty( $benedicta_page_bg_position ) ? $benedicta_page_bg_position : $benedicta_theme_bg_position;
$benedicta_page_bg_cover 		= !empty( $benedicta_page_bg_cover ) ? $benedicta_page_bg_cover : $benedicta_theme_bg_cover;

if( isset( $benedicta_page_bg_image ) && $benedicta_page_bg_image != '' ) {
	$benedicta_page_bg_styles .= 'background-image: url('. $benedicta_page_bg_image .');';
	if( isset( $benedicta_page_bg_image_repeat ) && $benedicta_page_bg_image_repeat != '' ) {
		$benedicta_page_bg_styles .= 'background-repeat: '. $benedicta_page_bg_image_repeat .';';
	}
	if( isset( $benedicta_page_bg_attachment ) && $benedicta_page_bg_attachment != '' ) {
		$benedicta_page_bg_styles .= 'background-attachment: '. $benedicta_page_bg_attachment .';';
	}
	if( isset( $benedicta_page_bg_position ) && $benedicta_page_bg_position != '' ) {
		$benedicta_page_bg_styles .= 'background-position: '. $benedicta_page_bg_position .';';
	}
	if( isset( $benedicta_page_bg_cover ) && $benedicta_page_bg_cover != '' ) {
		$benedicta_page_bg_styles .= 'background-size: '. $benedicta_page_bg_cover .';';
		$benedicta_page_bg_styles .= '-moz-background-size: '. $benedicta_page_bg_cover .';';
		$benedicta_page_bg_styles .= '-webkit-background-size: '. $benedicta_page_bg_cover .';';
		$benedicta_page_bg_styles .= '-o-background-size: '. $benedicta_page_bg_cover .';';
		$benedicta_page_bg_styles .= '-ms-background-size: '. $benedicta_page_bg_cover .';';
	}
}

if( isset( $benedicta_page_bg_color ) && $benedicta_page_bg_color != '' ) {
	$benedicta_page_bg_styles .= 'background-color: '. $benedicta_page_bg_color .';';
}


$benedicta_theme_boxed_margin = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('theme_boxed_margin') : '0';

$benedicta_header_bg_style = !empty( $benedicta_header_page_bg_style ) ? $benedicta_header_page_bg_style : $benedicta_header_bg_style;

if ( isset( $benedicta_header_bg_style ) ) {
	$benedicta_header_bgcolor_opacity = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_bgcolor_opacity') : 0;
} else {
	$benedicta_header_bgcolor_opacity = '99';
}

$benedicta_header_gradient_from = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_gradient','from') : '#111';
$benedicta_header_gradient_to = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_gradient','to') : 'transparent';

if ( ( is_home() || is_page() ) ) {
	
	if ( $benedicta_header_bg_style == 'gradient' ) {
		$benedicta_headertop_bg = '
			body.header-top.header_gradient header.header-top .header_bg{
				height:200%;
				opacity:0.6;
				background: -moz-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%, ' . $benedicta_header_gradient_to . ' 100%);
				background: -webkit-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
				background: linear-gradient(to bottom, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $benedicta_header_gradient_from . '", endColorstr="' . $benedicta_header_gradient_to . '",GradientType=0 );
			}
			body.single-product.header-top.pagetitle_hide .header_bg{
				height:auto;
				background-color: ' . $benedicta_header_bgcolor . ';
			}
			header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li:hover > a,
			header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current_page_item > a,
			header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current-menu-item > a{
				color: ' . $benedicta_headermenu_hover_color . ' !important;
			}
		';
	} else if ( $benedicta_header_bg_style == 'bgline' ) {
		$benedicta_headertop_bg = '
			body.header-top.header_bgline header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	} else {
		$benedicta_headertop_bg = '
			body.header-top header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	}

} else if ( is_category() || is_tag() || is_search() || is_day() || is_month() || is_year() || is_singular('post') || is_author() ) {
	
	$benedicta_post_single_style = get_post_meta( $benedicta_postId, 'benedicta_post_single_style', true );
	
	if ( $benedicta_post_single_style == 'fullscreen' && $benedicta_header_bg_style == 'gradient' ) {
		$benedicta_headertop_bg = '
		body.header-top.header_gradient header.header-top .header_bg{
			height:200%;
			opacity:0.6;
			background: -moz-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%, ' . $benedicta_header_gradient_to . ' 100%);
			background: -webkit-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
			background: linear-gradient(to bottom, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $benedicta_header_gradient_from . '", endColorstr="' . $benedicta_header_gradient_to . '",GradientType=0 );
		}
		body.single-product.header-top.pagetitle_hide .header_bg {
			height:auto;
			background-color: ' . $benedicta_header_bgcolor . ';
		}
		header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li:hover > a,
		header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current_page_item > a,
		header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current-menu-item > a{
			color: ' . $benedicta_headermenu_hover_color . ' !important;
		}
	';
	} else if ( $benedicta_header_bg_style == 'bgline' ) {
		$benedicta_headertop_bg = '
			body.header-top.header_bgline header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	} else {
		$benedicta_headertop_bg = '
			body.header-top header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	}
} else if ( is_singular('portfolio') ) {
	if ( $benedicta_header_bg_style == 'bgcolor' ) {
		$benedicta_headertop_bg = '
			body.header-top.header_bgcolor header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	} else if ( $benedicta_header_bg_style == 'bgline' ) {
		$benedicta_headertop_bg = '
			body.header-top.header_bgline header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	} else if ( $benedicta_header_bg_style == 'gradient' && benedicta_options('portfolio_single_pagetitle') == 'hide' ) {
		$benedicta_headertop_bg = '
			body.header-top header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	} else {
		$benedicta_headertop_bg = '
			body.header-top header.header-top .header_bg{
				height:200%;
				opacity:0.6;
				background: -moz-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%, ' . $benedicta_header_gradient_to . ' 100%);
				background: -webkit-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
				background: linear-gradient(to bottom, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $benedicta_header_gradient_from . '", endColorstr="' . $benedicta_header_gradient_to . '",GradientType=0 );
			}
			header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li:hover > a,
			header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current_page_item > a,
			header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current-menu-item > a{
				color: ' . $benedicta_headermenu_hover_color . ' !important;
			}
		';
	}
} else if ( class_exists('WooCommerce') ) {
	if( is_shop() || is_product_category() || is_product_tag() || is_cart() || is_checkout() || is_account_page() ){
		if ( $benedicta_header_bg_style == 'bgcolor' || ( $benedicta_header_bg_style == 'gradient' && benedicta_options('shop_pagetitle') == 'hide' ) ) {
			$benedicta_headertop_bg = '
				body.header-top header.header-top .header_bg{
					opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
					background-color:' . $benedicta_header_bgcolor . ';
				}
			';
		} else if ( $benedicta_header_bg_style == 'bgline' ) {
			$benedicta_headertop_bg = '
			body.header-top.header_bgline header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
		} else {
			$benedicta_headertop_bg = '
				body.header-top header.header-top .header_bg{
					height:200%;
					opacity:0.6;
					background: -moz-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%, ' . $benedicta_header_gradient_to . ' 100%);
					background: -webkit-linear-gradient(top, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
					background: linear-gradient(to bottom, ' . $benedicta_header_gradient_from . ' 0%,' . $benedicta_header_gradient_to . ' 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $benedicta_header_gradient_from . '", endColorstr="' . $benedicta_header_gradient_to . '",GradientType=0 );
				}
				header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li:hover > a,
				header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current_page_item > a,
				header.header-top .menu-primary-menu-container-wrap ul.nav-menu > li.current-menu-item > a{
					color: ' . $benedicta_headermenu_hover_color . ' !important;
				}
			';
		}
	} else {
		$benedicta_headertop_bg = '
			body.header-top header.header-top .header_bg{
				opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
				background-color:' . $benedicta_header_bgcolor . ';
			}
		';
	}
} else {
	$benedicta_headertop_bg = '
		body.header-top header.header-top .header_bg{
			opacity: 0.' . $benedicta_header_bgcolor_opacity . ' ;
			background-color: ' . $benedicta_header_bgcolor . ';
		}
	';
}


// Page Title of each page Styles
$benedicta_pagetitle_bg_styles = $benedicta_pagetitle_bg_image = $benedicta_pagetitle_bg_image_repeat = $benedicta_pagetitle_bg_color = $benedicta_pagetitle_bg_attachment = $benedicta_pagetitle_bg_position = $benedicta_pagetitle_bg_cover = '';
$benedicta_pagetitle_bg_image = get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_image', true );

if ( $benedicta_pagetitle_bg_image ) {
	if ( is_numeric( $benedicta_pagetitle_bg_image ) ) {
		$benedicta_pagetitle_bg_image = wp_get_attachment_image_src( $benedicta_pagetitle_bg_image, 'full' );
		$benedicta_pagetitle_bg_image = $benedicta_pagetitle_bg_image[0];
	}
}

$benedicta_pagetitle_bg_image_repeat 	= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_repeat', true );
$benedicta_pagetitle_bg_color 			= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_color', true );
$benedicta_pagetitle_bg_attachment 		= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_attachment', true );
$benedicta_pagetitle_bg_position 		= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_position', true );
$benedicta_pagetitle_bg_cover 			= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_full', true );
$benedicta_pagetitle_text_color 		= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_text_color', true );

$benedicta_theme_pagetitle_bg_image = $benedicta_theme_pagetitle_bg_image_repeat = $benedicta_theme_pagetitle_bg_color = $benedicta_theme_pagetitle_bg_attachment = $benedicta_theme_pagetitle_bg_position = $benedicta_theme_pagetitle_bg_cover = $benedicta_theme_pagetitle_text_color = '';

if( class_exists( 'ReduxFrameworkPlugin' ) ) {
	if( benedicta_options('pagetitle_bg_image','background-image') != '' ) {
		$benedicta_theme_pagetitle_bg_image = benedicta_options('pagetitle_bg_image','background-image');
	}
	if( benedicta_options('pagetitle_bg_image','background-repeat') != '' ) {
		$benedicta_theme_pagetitle_bg_image_repeat = benedicta_options('pagetitle_bg_image','background-repeat');
	}
	if( benedicta_options('pagetitle_bg_image','background-attachment') != '' ) {
		$benedicta_theme_pagetitle_bg_attachment = benedicta_options('pagetitle_bg_image','background-attachment');
	}
	if( benedicta_options('pagetitle_bg_image','background-position') != '' ) {
		$benedicta_theme_pagetitle_bg_position = benedicta_options('pagetitle_bg_image','background-position');
	}
	if( benedicta_options('pagetitle_bg_image','background-size') != '' ) {
		$benedicta_theme_pagetitle_bg_cover = benedicta_options('pagetitle_bg_image','background-size');
	}
	if( benedicta_options('pagetitle_text_color') != '' ) {
		$benedicta_theme_pagetitle_text_color = benedicta_options('pagetitle_text_color');
	}
	if( benedicta_options('pagetitle_bg_image','background-color') != '' ) {
		$benedicta_theme_pagetitle_bg_color = benedicta_options('pagetitle_bg_image','background-color');
	}
}

$benedicta_pagetitle_bg_image 		= ! empty( $benedicta_pagetitle_bg_image ) ? $benedicta_pagetitle_bg_image : $benedicta_theme_pagetitle_bg_image;
$benedicta_pagetitle_bg_color 		= ! empty( $benedicta_pagetitle_bg_color ) ? $benedicta_pagetitle_bg_color : $benedicta_theme_pagetitle_bg_color;
$benedicta_pagetitle_bg_image_repeat = ! empty( $benedicta_pagetitle_bg_image_repeat ) ? $benedicta_pagetitle_bg_image_repeat : $benedicta_theme_pagetitle_bg_image_repeat;
$benedicta_pagetitle_bg_attachment 	= ! empty( $benedicta_pagetitle_bg_attachment ) ? $benedicta_pagetitle_bg_attachment : $benedicta_theme_pagetitle_bg_attachment;
$benedicta_pagetitle_bg_position 	= ! empty( $benedicta_pagetitle_bg_position ) ? $benedicta_pagetitle_bg_position : $benedicta_theme_pagetitle_bg_position;
$benedicta_pagetitle_bg_cover 		= ! empty( $benedicta_pagetitle_bg_cover ) ? $benedicta_pagetitle_bg_cover : $benedicta_theme_pagetitle_bg_cover;
$benedicta_pagetitle_text_color 	= ! empty( $benedicta_pagetitle_text_color ) ? $benedicta_pagetitle_text_color : $benedicta_theme_pagetitle_text_color;

if( isset( $benedicta_pagetitle_bg_image ) && $benedicta_pagetitle_bg_image != '' ) {
	$benedicta_pagetitle_bg_styles .= 'background-image: url('. $benedicta_pagetitle_bg_image .');';
	if( isset( $benedicta_pagetitle_bg_image_repeat ) && $benedicta_pagetitle_bg_image_repeat != '' ) {
		$benedicta_pagetitle_bg_styles .= 'background-repeat: '. $benedicta_pagetitle_bg_image_repeat .';';
	}
	if( isset( $benedicta_pagetitle_bg_attachment ) && $benedicta_pagetitle_bg_attachment != '' ) {
		$benedicta_pagetitle_bg_styles .= 'background-attachment: '. $benedicta_pagetitle_bg_attachment .';';
	}
	if( isset( $benedicta_pagetitle_bg_position ) && $benedicta_pagetitle_bg_position != '' ) {
		$benedicta_pagetitle_bg_styles .= 'background-position: '. $benedicta_pagetitle_bg_position .';';
	}
	if( isset( $benedicta_pagetitle_bg_cover ) && $benedicta_pagetitle_bg_cover != '' ) {
		$benedicta_pagetitle_bg_styles .= 'background-size: '. $benedicta_pagetitle_bg_cover .';';
		$benedicta_pagetitle_bg_styles .= '-moz-background-size: '. $benedicta_pagetitle_bg_cover .';';
		$benedicta_pagetitle_bg_styles .= '-webkit-background-size: '. $benedicta_pagetitle_bg_cover .';';
		$benedicta_pagetitle_bg_styles .= '-o-background-size: '. $benedicta_pagetitle_bg_cover .';';
		$benedicta_pagetitle_bg_styles .= '-ms-background-size: '. $benedicta_pagetitle_bg_cover .';';
	}
}

if( isset( $benedicta_pagetitle_bg_color ) && $benedicta_pagetitle_bg_color != '' ) {
	$benedicta_pagetitle_bg_styles .= 'background-color: '. $benedicta_pagetitle_bg_color .';';
}

if( isset( $benedicta_pagetitle_text_color ) && $benedicta_pagetitle_text_color != '' ) {
	$benedicta_pagetitle_bg_styles .= 'color: '. $benedicta_pagetitle_text_color .';';
}


//	Blog Page Title styles
$benedicta_blog_pagetitle_bg_styles = $benedicta_blog_pagetitle_bg_image = $benedicta_blog_pagetitle_bg_image_repeat = $benedicta_blog_pagetitle_bg_attachment = $benedicta_blog_pagetitle_bg_position = $benedicta_blog_pagetitle_bg_cover = $benedicta_blog_pagetitle_text_color = $benedicta_blog_pagetitle_bg_color = '';

if ( ( is_home() || is_singular('post') || is_category() || is_tag() || is_search() || is_day() || is_month() || is_year() || is_author() ) && class_exists( 'ReduxFrameworkPlugin' ) ) {
	if( benedicta_options('blog_pagetitle_bg_image','background-image') != '' ) {
		$benedicta_blog_pagetitle_bg_image = benedicta_options('blog_pagetitle_bg_image','background-image');
	}
	if( benedicta_options('blog_pagetitle_bg_image','background-repeat') != '' ) {
		$benedicta_blog_pagetitle_bg_image_repeat = benedicta_options('blog_pagetitle_bg_image','background-repeat');
	}
	if( benedicta_options('blog_pagetitle_bg_image','background-attachment') != '' ) {
		$benedicta_blog_pagetitle_bg_attachment = benedicta_options('blog_pagetitle_bg_image','background-attachment');
	}
	if( benedicta_options('blog_pagetitle_bg_image','background-position') != '' ) {
		$benedicta_blog_pagetitle_bg_position = benedicta_options('blog_pagetitle_bg_image','background-position');
	}
	if( benedicta_options('blog_pagetitle_bg_image','background-size') != '' ) {
		$benedicta_blog_pagetitle_bg_cover = benedicta_options('blog_pagetitle_bg_image','background-size');
	}
	if( benedicta_options('pagetitle_text_color') != '' ) {
		$benedicta_blog_pagetitle_text_color = benedicta_options('pagetitle_text_color');
	}
	if( benedicta_options('blog_pagetitle_bg_image','background-color') != '' ) {
		$benedicta_blog_pagetitle_bg_color = benedicta_options('blog_pagetitle_bg_image','background-color');
	}
}

if( $benedicta_blog_pagetitle_bg_image != '' ) {
	$benedicta_blog_pagetitle_bg_styles .= 'background-image: url('. $benedicta_blog_pagetitle_bg_image .');';
	if( $benedicta_blog_pagetitle_bg_image_repeat != '' ) {
		$benedicta_blog_pagetitle_bg_styles .= 'background-repeat: '. $benedicta_blog_pagetitle_bg_image_repeat .';';
	}
	if( $benedicta_blog_pagetitle_bg_attachment != '' ) {
		$benedicta_blog_pagetitle_bg_styles .= 'background-attachment: '. $benedicta_blog_pagetitle_bg_attachment .';';
	}
	if( $benedicta_blog_pagetitle_bg_position != '' ) {
		$benedicta_blog_pagetitle_bg_styles .= 'background-position: '. $benedicta_blog_pagetitle_bg_position .';';
	}
	if( $benedicta_blog_pagetitle_bg_cover != '' ) {
		$benedicta_blog_pagetitle_bg_styles .= 'background-size: '. $benedicta_blog_pagetitle_bg_cover .';';
		$benedicta_blog_pagetitle_bg_styles .= '-moz-background-size: '. $benedicta_blog_pagetitle_bg_cover .';';
		$benedicta_blog_pagetitle_bg_styles .= '-webkit-background-size: '. $benedicta_blog_pagetitle_bg_cover .';';
		$benedicta_blog_pagetitle_bg_styles .= '-o-background-size: '. $benedicta_blog_pagetitle_bg_cover .';';
		$benedicta_blog_pagetitle_bg_styles .= '-ms-background-size: '. $benedicta_blog_pagetitle_bg_cover .';';
	}
}

if( isset( $benedicta_blog_pagetitle_bg_color ) && $benedicta_blog_pagetitle_bg_color != '' ) {
	$benedicta_blog_pagetitle_bg_styles .= 'background-color: '. $benedicta_blog_pagetitle_bg_color .';';
}

if( isset( $benedicta_blog_pagetitle_text_color ) && $benedicta_blog_pagetitle_text_color != '' ) {
	$benedicta_blog_pagetitle_bg_styles .= 'color: '. $benedicta_blog_pagetitle_text_color .';';
}


//	Single Blog Post Title styles
$benedicta_post_single_style = $benedicta_featured_image_url = $benedicta_singleblog_title_bg_styles = '';
$benedicta_post_single_style = get_post_meta( $benedicta_postId, 'benedicta_post_single_style', true );
if ( is_singular('post') && $benedicta_post_single_style == 'fullscreen' ) {
	$benedicta_featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
	$benedicta_singleblog_title_bg_styles .= 'background-image: url('. $benedicta_featured_image_url .');';
}


/* Portfolio Page Title styles */
$benedicta_singleportfolio_title_bg_styles = $benedicta_singleportfolio_title_bg_image = $benedicta_singleportfolio_title_bg_image_repeat = $benedicta_singleportfolio_title_bg_attachment = $benedicta_singleportfolio_title_bg_position = $benedicta_singleportfolio_title_bg_cover = $benedicta_singleportfolio_title_text_color = $benedicta_singleportfolio_title_bg_color = '';

if ( is_singular('portfolio') && class_exists( 'ReduxFrameworkPlugin' ) ) {
	if( benedicta_options('portfolio_single_pagetitle_bg_image','background-image') != '' ) {
		$benedicta_singleportfolio_title_bg_image = benedicta_options('portfolio_single_pagetitle_bg_image','background-image');
	}
	if( benedicta_options('portfolio_single_pagetitle_bg_image','background-repeat') != '' ) {
		$benedicta_singleportfolio_title_bg_image_repeat = benedicta_options('portfolio_single_pagetitle_bg_image','background-repeat');
	}
	if( benedicta_options('portfolio_single_pagetitle_bg_image','background-attachment') != '' ) {
		$benedicta_singleportfolio_title_bg_attachment = benedicta_options('portfolio_single_pagetitle_bg_image','background-attachment');
	}
	if( benedicta_options('portfolio_single_pagetitle_bg_image','background-position') != '' ) {
		$benedicta_singleportfolio_title_bg_position = benedicta_options('portfolio_single_pagetitle_bg_image','background-position');
	}
	if( benedicta_options('portfolio_single_pagetitle_bg_image','background-size') != '' ) {
		$benedicta_singleportfolio_title_bg_cover = benedicta_options('portfolio_single_pagetitle_bg_image','background-size');
	}
	if( benedicta_options('portfolio_single_pagetitle_text_color') != '' ) {
		$benedicta_singleportfolio_title_text_color = benedicta_options('portfolio_single_pagetitle_text_color');
	}
	if( benedicta_options('portfolio_single_pagetitle_bg_image','background-color') != '' ) {
		$benedicta_singleportfolio_title_bg_color = benedicta_options('portfolio_single_pagetitle_bg_image','background-color');
	}
}

if( $benedicta_singleportfolio_title_bg_image != '' ) {
	$benedicta_singleportfolio_title_bg_styles .= 'background-image: url('. $benedicta_singleportfolio_title_bg_image .');';
	if( $benedicta_singleportfolio_title_bg_image_repeat != '' ) {
		$benedicta_singleportfolio_title_bg_styles .= 'background-repeat: '. $benedicta_singleportfolio_title_bg_image_repeat .';';
	}
	if( $benedicta_singleportfolio_title_bg_attachment != '' ) {
		$benedicta_singleportfolio_title_bg_styles .= 'background-attachment: '. $benedicta_singleportfolio_title_bg_attachment .';';
	}
	if( $benedicta_singleportfolio_title_bg_position != '' ) {
		$benedicta_singleportfolio_title_bg_styles .= 'background-position: '. $benedicta_singleportfolio_title_bg_position .';';
	}
	if( $benedicta_singleportfolio_title_bg_cover != '' ) {
		$benedicta_singleportfolio_title_bg_styles .= 'background-size: '. $benedicta_singleportfolio_title_bg_cover .';';
		$benedicta_singleportfolio_title_bg_styles .= '-moz-background-size: '. $benedicta_singleportfolio_title_bg_cover .';';
		$benedicta_singleportfolio_title_bg_styles .= '-webkit-background-size: '. $benedicta_singleportfolio_title_bg_cover .';';
		$benedicta_singleportfolio_title_bg_styles .= '-o-background-size: '. $benedicta_singleportfolio_title_bg_cover .';';
		$benedicta_singleportfolio_title_bg_styles .= '-ms-background-size: '. $benedicta_singleportfolio_title_bg_cover .';';
	}
}

if( isset( $benedicta_singleportfolio_title_bg_color ) && $benedicta_singleportfolio_title_bg_color != '' ) {
	$benedicta_singleportfolio_title_bg_styles .= 'background-color: '. $benedicta_singleportfolio_title_bg_color .';';
}

if( isset( $benedicta_singleportfolio_title_text_color ) && $benedicta_singleportfolio_title_text_color != '' ) {
	$benedicta_singleportfolio_title_bg_styles .= 'color: '. $benedicta_singleportfolio_title_text_color .';';
}


//	WooCommerce
$benedicta_woo_styles = '';
if ( class_exists( 'WooCommerce' ) ) {
	$benedicta_pageshop_bg_styles = $benedicta_pageshop_bg_image = $benedicta_pageshop_bg_image_repeat = $benedicta_pageshop_bg_color = $benedicta_pageshop_bg_attachment = $benedicta_pageshop_bg_position = $benedicta_pageshop_bg_cover = $benedicta_shop_pagetitle_text_color = $benedicta_shop_pagetitle_text_color_set = '';
	if( is_woocommerce() || is_shop() || is_cart() || is_checkout() || is_account_page() ) {
		if( benedicta_options('pageshop_bg_image','background-image') != '' ) {
			$benedicta_pageshop_bg_image = benedicta_options('pageshop_bg_image','background-image');
		}
		if( benedicta_options('pageshop_bg_image','background-repeat') != '' ) {
			$benedicta_pageshop_bg_image_repeat = benedicta_options('pageshop_bg_image','background-repeat');
		}
		if( benedicta_options('pageshop_bg_image','background-attachment') != '' ) {
			$benedicta_pageshop_bg_attachment = benedicta_options('pageshop_bg_image','background-attachment');
		}
		if( benedicta_options('pageshop_bg_image','background-position') != '' ) {
			$benedicta_pageshop_bg_position = benedicta_options('pageshop_bg_image','background-position');
		}
		if( benedicta_options('pageshop_bg_image','background-size') != '' ) {
			$benedicta_pageshop_bg_cover = benedicta_options('pageshop_bg_image','background-size');
		}
		if( benedicta_options('shop_pagetitle_text_color') != '' ) {
			$benedicta_shop_pagetitle_text_color = benedicta_options('shop_pagetitle_text_color');
		}
		
		if( benedicta_options('pageshop_bg_image','background-color') != '' ) {
			$benedicta_pageshop_bg_color = benedicta_options('pageshop_bg_image','background-color');
		}

		if( $benedicta_pageshop_bg_image != '' ) {
			$benedicta_pageshop_bg_styles .= 'background-image: url('. $benedicta_pageshop_bg_image .');';
			if( $benedicta_pageshop_bg_image_repeat != '' ) {
				$benedicta_pageshop_bg_styles .= 'background-repeat: '. $benedicta_pageshop_bg_image_repeat .';';
			}
			if( $benedicta_pageshop_bg_attachment != '' ) {
				$benedicta_pageshop_bg_styles .= 'background-attachment: '. $benedicta_pageshop_bg_attachment .';';
			}
			if( $benedicta_pageshop_bg_position != '' ) {
				$benedicta_pageshop_bg_styles .= 'background-position: '. $benedicta_pageshop_bg_position .';';
			}
			if( $benedicta_pageshop_bg_cover != '' ) {
				$benedicta_pageshop_bg_styles .= 'background-size: '. $benedicta_pageshop_bg_cover .';';
				$benedicta_pageshop_bg_styles .= '-moz-background-size: '. $benedicta_pageshop_bg_cover .';';
				$benedicta_pageshop_bg_styles .= '-webkit-background-size: '. $benedicta_pageshop_bg_cover .';';
				$benedicta_pageshop_bg_styles .= '-o-background-size: '. $benedicta_pageshop_bg_cover .';';
				$benedicta_pageshop_bg_styles .= '-ms-background-size: '. $benedicta_pageshop_bg_cover .';';
			}
		}

		if( $benedicta_pageshop_bg_color != '' ) {
			$benedicta_pageshop_bg_styles .= 'background-color: '. $benedicta_pageshop_bg_color .';';
		}
		
		if( $benedicta_pageshop_bg_styles ) {
			$benedicta_woo_styles .= '
				.woocommerce #pagetitle, .woocommerce-page #pagetitle{'. $benedicta_pageshop_bg_styles .'}
			';
		}
		
		if( $benedicta_shop_pagetitle_text_color != '' ) {
			$benedicta_woo_styles .= '
				.woocommerce #pagetitle h2, .woocommerce #pagetitle p, .woocommerce-page #pagetitle h2, .woocommerce-page #pagetitle p{color: '. $benedicta_shop_pagetitle_text_color .';}
			';
		}
		
	}

	$benedicta_woo_styles .= '
		.woocommerce form.checkout_coupon .form-row-last input,
		.woocommerce-page form.checkout_coupon .form-row-last input{
			background:'. $benedicta_theme_color .';
		}
		.woocommerce .quantity input.qty,
		.woocommerce-page .quantity input.qty,
		.woocommerce button.button.alt.single_add_to_cart_button,
		.summary .product_meta b,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li a{
			font-family:'. $benedicta_heading_font_family .';
		}
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce ul.products .product_wrap.products_list_type1 .shop_list_product_image:before,
		.woocommerce-page ul.products .product_wrap.products_list_type1 .shop_list_product_image:before,
		.woocommerce div.product #product-thumbnails .slick-slide:after,
		.woocommerce-page div.product #product-thumbnails .slick-slide:after,
		#woo-nav-cart .woo-cart-count,
		.woocommerce #review_form #respond input#submit,
		.woocommerce table.cart input,
		.woocommerce-page table.cart input,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce .widget_shopping_cart .total:before,
		.woocommerce-page.widget_shopping_cart .total:before,
		.woocommerce-page .widget_shopping_cart .total:before,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce ul.products li.product-category.product h3 .count,
		.woocommerce-page ul.products li.product-category.product h3 .count,
		.woocommerce ul.products li.product .product_wrap.products_list_type2 .shop_list_product_descr .add_to_cart_button:hover,
		.woocommerce-page ul.products li.product .product_wrap.products_list_type2 .shop_list_product_descr .add_to_cart_button:hover,
		.woocommerce ul.products li.product .product_wrap.products_list_type5 .add_to_cart_button:hover,
		.woocommerce-page ul.products li.product .product_wrap.products_list_type5 .add_to_cart_button:hover,
		.woocommerce button.button.alt.single_add_to_cart_button:hover,
		#woo-nav-cart .widget_shopping_cart_content a.button,
		.woocommerce .widget_shopping_cart_content a.button,
		.woocommerce table.cart .coupon button.button:hover,
		.woocommerce-page table.cart .coupon button.button:hover{
			background-color:'. $benedicta_theme_color .';
		}
		.woocommerce .star-rating span:before,
		.woocommerce div.product span.price,
		.woocommerce div.product p.price,
		.woocommerce-page div.product span.price,
		.woocommerce-page div.product p.price,
		.summary .product_meta a:hover,
		.shop_wrap .cswoo_sharebox .cswoo_social_link:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce .widget .star-rating span:before,
		.woocommerce-page .widget .star-rating span:before,
		.woocommerce div.product .woocommerce-product-rating .woocommerce-review-link:hover{
			color:'. $benedicta_theme_color .';
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
		.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a{
			border-top: 2px solid '. $benedicta_theme_color .';
			border-bottom-color: #fff;
		}
		#woo-nav-cart ul.cart_list li,
		#woo-nav-cart ul.cart_list li a,
		#woo-nav-cart ul.product_list_widget li a,
		#woo-nav-cart .widget_shopping_cart .cart_list li.mini_cart_item a.remove{
			color:'. $benedicta_headersubmenu_font_color .' !important;
		}
		#woo-nav-cart .cart_empty ul.product_list_widget li{
			color:'. $benedicta_headersubmenu_font_color .';
		}
		#woo-nav-cart ul.cart_list li a:hover,
		#woo-nav-cart ul.product_list_widget li a:hover{
			color:'. $benedicta_theme_color .' !important;
		}
		#woo-nav-cart .nav-cart-content path,
		#woo-nav-cart .nav-cart-content circle,
		#header_mobile_wrap .mobile_header_cart_icon path,
		#header_mobile_wrap .mobile_header_cart_icon circle{
			fill:'. $benedicta_headermenu_font_color .';
		}
		#woo-nav-cart .nav-cart-content i:hover,
		#header_mobile_wrap .mobile_header_cart_icon:hover{
			color:'. $benedicta_headermenu_hover_color .';
		}
		#woo-nav-cart .nav-cart-products.cart_empty p{
			font-family:'. $benedicta_headersubmenu_font_family .';
			text-transform:'. $benedicta_headersubmenu_font_transform .';
			font-weight:'. $benedicta_headersubmenu_font_weight .';
			line-height:'. $benedicta_headersubmenu_font_height .';
			font-size:'. $benedicta_headersubmenu_font_size .';
			color:'. $benedicta_headersubmenu_font_color .';
			letter-spacing:'. $benedicta_headersubmenu_font_spacing .';
			background-color:'. $benedicta_headersubmenu_bgcolor .';
		}
		#woo-nav-cart .widget_shopping_cart_content a.button:hover,
		.woocommerce .widget_shopping_cart_content a.button:hover,
		.woocommerce .widget_price_filter .price_slider_amount .button:hover,
		.woocommerce-message .button:hover,
		.woocommerce-Message .button:hover,
		#customer_login .button{
			background-color:'. $benedicta_theme_color .' !important;
		}
		#coupon_code:focus{
			border-color:'. $benedicta_theme_color .' !important;
		}
		body.archive.woocommerce.header-top.pagetitle_hide .header_bg,
		body.woocommerce-page.header-top.pagetitle_hide .header_bg{
			height:auto;
			background-color:'. $benedicta_header_bgcolor .';
		}

		#woo-nav-cart .nav-cart-products{
			background-color:'. $benedicta_headersubmenu_bgcolor .';
		}
		#woo-nav-cart ul.product_list_widget li:before{
			background-color:'. $benedicta_headersubmenu_hover_bgcolor .';
		}
		
		/* Breadcrumbs */
		.woocommerce #breadcrumbs .woocommerce-breadcrumb,
		.woocommerce #breadcrumbs .woocommerce-breadcrumb a,
		.woocommerce #breadcrumbs .woocommerce-breadcrumb span{
			color:'. $benedicta_breadcrumbs_color .';
		}
		.woocommerce #breadcrumbs .woocommerce-breadcrumb a:hover{
			color:'. $benedicta_theme_color .';
		}
	';
}

?>


body{
	font-family:<?php echo esc_html( $benedicta_body_font_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_body_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_body_font_weight ); ?>;
	line-height:<?php echo esc_html( $benedicta_body_font_height ); ?>;
	font-size:<?php echo esc_html( $benedicta_body_font_size ); ?>;
	color:<?php echo esc_html( $benedicta_body_font_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_body_font_spacing ); ?>;
}
body.boxed{
	padding-top:<?php echo esc_html( $benedicta_theme_boxed_margin ); ?>px;
	padding-bottom:<?php echo esc_html( $benedicta_theme_boxed_margin ); ?>px;
	<?php echo esc_html( $benedicta_page_bg_styles ); ?>
}
body.boxed footer.fixed.active{
	bottom:<?php echo esc_html( $benedicta_theme_boxed_margin ); ?>px;
}


/* Header */
<?php echo esc_html( $benedicta_headertop_bg ); ?>

.header_search_icon path{
	fill:<?php echo esc_html( $benedicta_headermenu_font_color ); ?> !important;
}
.header_search_icon:hover path{
	fill:<?php echo esc_html( $benedicta_headermenu_hover_color ); ?> !important;
}
header.header_type2 .menu_creative_btn:hover path{
	fill:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
.header_tagline:before,
.tagline_text_wrap a:after,
.tagline_text_wrap span:after,
header.header-top .header_phone_big_txt:before,
.header_search_icon:before,
.header_wrap .social_links_wrap:before{
	background-color:<?php echo esc_html( $benedicta_header_color ); ?>;
}

#menu-tagline-menu li a:hover,
header.header-top .social_links_wrap .social_link:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
header.header-top.header_type2 .social_links_wrap .social_link:hover{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
#menu-tagline-menu li a,
.tagline_text_wrap a,
.tagline_text_wrap span,
header.header-top .social_links_wrap .social_link,
.benedicta-logo h1 a,
.header_phone_big_txt{
	color:<?php echo esc_html( $benedicta_header_color ); ?>;
}
body.header-fixed header.header-top .header_wrap,
header.header-top .header_wrap.headroom--not-top,
body.single-portfolio header.header-top .header_tagline,
#page-wrap > header#header_mobile_wrap{
	background-color:<?php echo esc_html( $benedicta_header_fixed_bgcolor ); ?>;
}

header .header_btn{
	font-family:<?php echo esc_html( $benedicta_headermenu_font_family ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headermenu_font_weight ); ?>;
	font-size:<?php echo esc_html( $benedicta_headermenu_font_size ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_headermenu_font_spacing ); ?>;
}


/* Header Left Fixed */
header.left_fixed,
header.left_fixed .menu_creative_bottom{
	background-color:<?php echo esc_html( $benedicta_header_left_bgcolor ); ?>;
}
header.left_fixed .social_link{
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
	border-color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
}
header.left_fixed .social_link:hover{
	color:<?php echo esc_html( $benedicta_header_left_bgcolor ); ?>;
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
header.left_fixed .social_links_wrap .social_link:hover{
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
header.left_fixed .copyright,
header.left_fixed .copyright a{
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
}
header.left_fixed .header_search_icon{
	text-transform:<?php echo esc_html( $benedicta_headermenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headermenu_font_weight ); ?>;
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
	letter-spacing: <?php echo esc_html( $benedicta_headersubmenu_font_spacing ); ?>;
}
header.left_fixed #menu-primary-menu:after{
	background-color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
}
header.left_fixed .header_search_icon:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}


/* Menu */
header.header-top .menu-primary-menu-container-wrap > ul > li > a,
header.left_fixed .menu-primary-menu-container-wrap > ul > li > a{
	font-family:<?php echo esc_html( $benedicta_headermenu_font_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_headermenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headermenu_font_weight ); ?>;
	line-height:<?php echo esc_html( $benedicta_headermenu_font_height ); ?>;
	font-size:<?php echo esc_html( $benedicta_headermenu_font_size ); ?>;
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_headermenu_font_spacing ); ?>;
}
header.header-top .menu-primary-menu-container-wrap .sub-menu li.menu-item a,
header.left_fixed .menu-primary-menu-container-wrap .sub-menu li.menu-item a{
	font-family:<?php echo esc_html( $benedicta_headersubmenu_font_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_headersubmenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headersubmenu_font_weight ); ?>;
	line-height:<?php echo esc_html( $benedicta_headersubmenu_font_height ); ?>;
	font-size:<?php echo esc_html( $benedicta_headersubmenu_font_size ); ?>;
	color:<?php echo esc_html( $benedicta_headersubmenu_font_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_headersubmenu_font_spacing ); ?>;
}
header.header-top .menu-primary-menu-container-wrap .sub-menu,
header.header-top .menu-primary-menu-container-wrap .sub-menu .sub-menu{
	background-color:<?php echo esc_html( $benedicta_headersubmenu_bgcolor ); ?>;
}
header.header-top .menu-primary-menu-container-wrap > ul > li > a:hover,
header.header-top .menu-primary-menu-container-wrap ul li.current_page_item > a,
header.header-top .menu-primary-menu-container-wrap ul li.current-menu-item > a,
header.header-top .menu-primary-menu-container-wrap li.current-menu-parent > a,
header.header-top .menu-primary-menu-container-wrap li.current-menu-ancestor > a,
header.left_fixed .menu-primary-menu-container-wrap > ul > li > a:hover,
header.left_fixed .menu-primary-menu-container-wrap ul li.current_page_item > a,
header.left_fixed .menu-primary-menu-container-wrap ul li.current-menu-item > a,
header.left_fixed .menu-primary-menu-container-wrap li.current-menu-parent > a,
header.left_fixed .menu-primary-menu-container-wrap li.current-menu-ancestor > a,
#header_mobile_wrap .menu-primary-menu-container-wrap li a:hover,
#header_mobile_wrap .menu-primary-menu-container-wrap ul li.current_page_item > a,
#header_mobile_wrap .menu-primary-menu-container-wrap ul li.current-menu-item > a,
#header_mobile_wrap .menu-primary-menu-container-wrap li.current-menu-parent > a,
#header_mobile_wrap .menu-primary-menu-container-wrap li.current-menu-ancestor > a{
	color:<?php echo esc_html( $benedicta_headermenu_hover_color ); ?>;
}
header.header-top .menu-primary-menu-container-wrap .sub-menu li a:after,
header.header-top.header_type2 #menu-primary-menu li a:hover,
header.header-top.header_type2 #menu-primary-menu li.current_page_item > a,
header.header-top.header_type2 #menu-primary-menu li.current-menu-item > a,
header.header-top.header_type2 #menu-primary-menu li.current-menu-parent > a,
header.header-top.header_type2 #menu-primary-menu li.current-menu-ancestor > a,
header.left_fixed #menu-primary-menu li a:hover,
header.left_fixed #menu-primary-menu li.current_page_item > a,
header.left_fixed #menu-primary-menu li.current-menu-item > a,
header.left_fixed #menu-primary-menu li.current-menu-parent > a,
header.left_fixed #menu-primary-menu li.current-menu-ancestor > a{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
header.header-top .menu-primary-menu-container-wrap .sub-menu li.menu-item a:hover,
header.header-top .menu-primary-menu-container-wrap .sub-menu li.current-menu-parent a,
header.header-top .menu-primary-menu-container-wrap .sub-menu li.current_page_item a,
header.header-top .menu-primary-menu-container-wrap .sub-menu .sub-menu li.menu-item a:hover,
header.header-top .menu-primary-menu-container-wrap .sub-menu .sub-menu li.current-menu-parent a,
header.header-top .menu-primary-menu-container-wrap .sub-menu .sub-menu li.current_page_item a{
	background-color:<?php echo esc_html( $benedicta_headersubmenu_hover_bgcolor ); ?>;
}

.lang_switcher a{
	font-family:<?php echo esc_html( $benedicta_headermenu_font_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_headermenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headermenu_font_weight ); ?>;
	line-height:<?php echo esc_html( $benedicta_headermenu_font_height ); ?>;
	font-size:<?php echo esc_html( $benedicta_headermenu_font_size ); ?>;
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_headermenu_font_spacing ); ?>;
}
.lang_switcher,
.lang_switcher a{
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
}
header.left_fixed .lang_switcher ,
header.left_fixed .lang_switcher a{
	text-transform:<?php echo esc_html( $benedicta_headermenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headermenu_font_weight ); ?>;
	letter-spacing: <?php echo esc_html( $benedicta_headersubmenu_font_spacing ); ?>;
}
.lang_switcher path{
	fill:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
}
.language_list{
	background-color:<?php echo esc_html( $benedicta_headersubmenu_bgcolor ); ?>;
}
.language_list li{
	font-family:<?php echo esc_html( $benedicta_headersubmenu_font_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_headersubmenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headersubmenu_font_weight ); ?>;
	line-height:<?php echo esc_html( $benedicta_headersubmenu_font_height ); ?>;
	font-size:<?php echo esc_html( $benedicta_headersubmenu_font_size ); ?>;
	color:<?php echo esc_html( $benedicta_headersubmenu_font_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_headersubmenu_font_spacing ); ?>;
}
.language_list li:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
.lang_switcher a:before{
	background-color:<?php echo esc_html( $benedicta_header_color ); ?>;
}


/* Mega Menu */
header.header-top .menu-primary-menu-container-wrap .benedicta-megamenu-wrapper{
	background-color:<?php echo esc_html( $benedicta_headersubmenu_bgcolor ); ?>;
}

/* Mobile Menu */
#header_mobile_wrap ul.nav-menu li a{
	font-family:<?php echo esc_html( $benedicta_headermenu_font_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_headermenu_font_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_headermenu_font_weight ); ?>;
	color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_headermenu_font_spacing ); ?>;
}
.mobile_menu_btn span{
	background-color:<?php echo esc_html( $benedicta_headermenu_font_color ); ?>
}


/* Page Title Background Stylings */
body.page #pagetitle{
	<?php echo esc_html( $benedicta_pagetitle_bg_styles ); ?>
}
body.blog #pagetitle,
body.archive #pagetitle{
	<?php echo esc_html( $benedicta_blog_pagetitle_bg_styles ); ?>
}
body.single-post #pagetitle{
	<?php echo esc_html( $benedicta_singleblog_title_bg_styles ); ?>
}
body.single-portfolio #pagetitle{
	<?php echo esc_html( $benedicta_singleportfolio_title_bg_styles ); ?>
}
<?php if( $benedicta_pagetitle_text_color != '' ) { ?>
	#pagetitle h2,
	#pagetitle a,
	#pagetitle p{
		color:<?php echo esc_html( $benedicta_pagetitle_text_color ); ?>;
	}
<?php } ?>

<?php if( $benedicta_blog_pagetitle_text_color != '' ) { ?>
	#pagetitle h2,
	body.blog #pagetitle h2,
	body.archive #pagetitle h2,
	.author_posts_info .author_posts_count,
	.author_posts_info h5.author_posts_name,
	body.blog #pagetitle a,
	body.archive #pagetitle a,
	body.blog #pagetitle p,
	body.archive #pagetitle p{
		color:<?php echo esc_html( $benedicta_blog_pagetitle_text_color ); ?>;
	}
<?php } ?>

<?php if( $benedicta_singleportfolio_title_text_color != '' ) { ?>
	body.single-portfolio #pagetitle h2,
	body.single-portfolio #pagetitle a,
	body.single-portfolio #pagetitle p{
		color:<?php echo esc_html( $benedicta_singleportfolio_title_text_color ); ?>;
	}
<?php } ?>


/* Breadcrumbs */
#pagetitle #breadcrumbs a,
#pagetitle #breadcrumbs span{
	color:<?php echo esc_html( $benedicta_breadcrumbs_color ); ?>;
}
#pagetitle #breadcrumbs span.sep path{
	fill:<?php echo esc_html( $benedicta_breadcrumbs_color ); ?>;
}
#breadcrumbs .breadcrumbs_wrap i.sep{
	background-color:<?php echo esc_html( $benedicta_breadcrumbs_color ); ?>;
}
#pagetitle #breadcrumbs a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}


/* Footer */
footer #prefooter_area{
	color:<?php echo esc_html( $benedicta_prefooter_color ); ?>;
	background-color:<?php echo esc_html( $benedicta_prefooter_bgcolor ); ?>;
}
footer #prefooter_area a,
footer #prefooter_area .recent_posts_list.grid .recent-post-meta-date{
	color:<?php echo esc_html( $benedicta_prefooter_color ); ?>;
}
footer #prefooter_area a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
footer #prefooter_area .evatheme_social_icons .social_link{
	color:<?php echo esc_html( $benedicta_prefooter_bgcolor ); ?>;
}
footer #footer_bottom{
	color:<?php echo esc_html( $benedicta_footer_color ); ?>;
	background-color:<?php echo esc_html( $benedicta_footer_bgcolor ); ?>;
}
footer #footer_bottom .copyright a{
	color:<?php echo esc_html( $benedicta_footer_color ); ?>;
}
footer #footer_bottom .social_links_wrap .social_link{
	color:<?php echo esc_html( $benedicta_footer_color ); ?> !important;
}
footer #footer_bottom .social_links_wrap .social_link:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
footer aside h4.widget-title{
	font-family:<?php echo esc_html( $benedicta_prefooter_headings_family ); ?>;
	text-transform:<?php echo esc_html( $benedicta_prefooter_headings_transform ); ?>;
	font-weight:<?php echo esc_html( $benedicta_prefooter_headings_weight ); ?>;
	line-height:<?php echo esc_html( $benedicta_prefooter_headings_height ); ?>;
	font-size:<?php echo esc_html( $benedicta_prefooter_headings_size ); ?>;
	color:<?php echo esc_html( $benedicta_prefooter_headings_color ); ?>;
	letter-spacing:<?php echo esc_html( $benedicta_prefooter_headings_spacing ); ?>;
}
#footer-backtop:hover{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}


/* Shortcodes */
.btn:hover,
.btn-default:hover,
.btn:focus,
.btn-default.active,
.btn-default.active:hover,
.btn-default.focus,
.btn-default:active,
.btn-default:focus,
.btn-primary,
.btn.btn-primary,
.btn-primary.active,
.btn-primary.focus,
.btn-primary:active,
.btn-primary:focus{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
	background:<?php echo esc_html( $benedicta_theme_color ); ?>;
}

blockquote:before,
blockquote cite:before,
blockquote small:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
blockquote path{
	fill:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
blockquote cite,
blockquote small,
blockquote:after{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}

/* Custom Colors */
a:hover,
a:focus,
.single-post-content p a,
.contentarea p a{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}

::selection{ background:<?php echo esc_html( $benedicta_theme_color ); ?>; color:#fff; }
::-moz-selection{ background:<?php echo esc_html( $benedicta_theme_color ); ?>; color:#fff; }

.bg_primary,
button:hover,
input[type='button']:hover,
input[type='reset']:hover,
input[type='submit']:hover{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
input[type='text']:focus,
input[type='email']:focus,
input[type='url']:focus,
input[type='password']:focus,
input[type='search']:focus,
textarea:focus,
.wpcf7-form input:focus,
.wpcf7-form textarea:focus{
	color:#333;
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
	background-color:#fff;
}
#blog-single-wrap.fullscreen .form_field:focus{
	color:#333;
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
	background-color:#fff;
}
.widget_meta li a:hover,
.widget_archive li a:hover,
.widget_categories li a:hover,
.widget_product_categories li a:hover,
#portfolio_list.grid .portfolio_descr_wrap .portfolio_title a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
.single_post_meta_tags a:hover,
.tagcloud a:hover,
.eva-pagination .page-numbers:hover,
.eva-pagination .page-numbers.current{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
#loader .bar,
.evatheme_social_icons .social_link:hover,
#blog-single-wrap .sharebox .social_link:hover,
#blog_list.grid_bg_img .post_content_readmore:after,
#blog_list.masonry_bg_img .post_content_readmore:after,
.custom_list_theme_color ul li:after,
.format-link .post_format_content .featured_img_bg:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
.owl-controls .owl-dot:hover,
.owl-controls .owl-dot.active{
	box-shadow: 0 0 0 10px <?php echo esc_html( $benedicta_theme_color ); ?> inset;
}
.form_search_block input[type='text']{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.form_search_block i.fa.fa-search,
.post-image .play_btn i{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_comment_count:hover i{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_widget_instagram li a i:hover:before,
.cstheme_widget_instagram li a i:hover:after{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}

/* Portfolio */
#portfolio_list.masonry_card .portfolio_descr_wrap:before,
#portfolio_list.grid_card .portfolio_descr_wrap:before,
#portfolio_list.chess .portfolio_meta_category:before,
#portfolio_list.carousel .portfolio_content_wrapper:before,
#portfolio_list.chess .portfolio_descr_wrap:before,
#portfolio_list.chess .portfolio_descr_overlay:before,
#portfolio_list.chess .portfolio_descr_overlay:after,
#portfolio_list.rounded .portfolio_descr_wrap:before,
.partner_wrap.with_descr .partner_descr h6:before,
#portfolio_list.grid_bg_img .portfolio_content_wrapper:before,
#portfolio_list.masonry_bg_img .portfolio_content_wrapper:before,
#portfolio_list.masonry_top_img .portfolio_format_content .readmore_arrow,
#portfolio_list.grid_top_img .portfolio_format_content .readmore_arrow,
#portfolio_list.left_img .portfolio_title:after{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
#portfolio_list.carousel .portfolio_title a:hover,
#blog_list.grid_card_min .post-descr-wrap .post-meta i,
#blog_list.masonry_card_min .post-descr-wrap .post-meta i,
#portfolio_list.carousel .portfolio_title a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
#portfolio_list.masonry_card .portfolio_meta_category:hover,
#portfolio_list.grid_card .portfolio_meta_category:hover{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
#portfolio_list.carousel path{
	fill:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#portfolio_list.grid_bg_img .portfolio_content_wrapper .portfolio_format_content:before,
#portfolio_list.masonry_bg_img .portfolio_content_wrapper .portfolio_format_content a:before,
#portfolio_list.rounded .portfolio_format_content a:after,
#portfolio_list.masonry_top_img .portfolio_format_content a:before,
#portfolio_list.grid_top_img .portfolio_format_content a:before,
#portfolio_list.left_img .portfolio_format_content a:before,
#portfolio_list.masonry_card .portfolio_format_content > a:before,
#portfolio_list.grid_card .portfolio_format_content > a:before,
#portfolio_list.chess .portfolio_format_content a:before,
#portfolio_list.carousel .portfolio_format_content a:before{
	background-color:<?php echo esc_html( $benedicta_portfolio_overlay ); ?>
}
#portfolio_list.grid_bg_img .portfolio_content_wrapper:hover .portfolio_format_content:before,
#portfolio_list.masonry_bg_img .portfolio_content_wrapper:hover .portfolio_format_content:before,
#portfolio_list.rounded .portfolio_format_content:hover:after,
#portfolio_list.masonry_top_img .portfolio_content_wrapper:hover .portfolio_format_content:before,
#portfolio_list.grid_top_img .portfolio_content_wrapper:hover .portfolio_format_content:before,
#portfolio_list.left_img .portfolio_format_content a:hover:before,
#portfolio_list.masonry_card .portfolio_content_wrapper:hover .portfolio_format_content a:before,
#portfolio_list.grid_card .portfolio_content_wrapper:hover .portfolio_format_content a:before,
#portfolio_list.chess .portfolio_format_content:hover a:before,
#portfolio_list.carousel .portfolio_content_wrapper:hover .portfolio_format_content a:before{
	opacity: 0.<?php echo esc_html( $benedicta_portfolio_overlay_opacity ); ?>
}
.portfolio_single_nav a i.last{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.portfolio_single_nav a.back-to-portfolio:hover path{
	fill:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.filter_block li a{
	color:<?php echo esc_html( $benedicta_portfolio_filter_color ); ?>
}
.filter_block li a:after{
	background-color:<?php echo esc_html( $benedicta_portfolio_filter_color ); ?>
}
.filter_block li a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.filter_block li a.selected{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}


.vc_tta-style-classic.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab.vc_active > a{
	border-top: 2px solid <?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.vc_tta-style-classic.vc_tta.vc_general.vc_tta-o-no-fill .vc_tta-tabs-list .vc_tta-tab.vc_active > a{
	border-bottom: 3px solid <?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.vc_tta-style-classic.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab.vc_active > a,
.vc_tta-style-classic.vc_tta.vc_general .vc_tta-tabs-list .vc_tta-tab > a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.vc_tta-style-classic.vc_tta.vc_general.vc_tta-o-no-fill.vc_tta-shape-round .vc_tta-tabs-list .vc_tta-tab > a:hover{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.vc_tta-style-classic.vc_tta.vc_general.vc_tta-tabs-position-left .vc_tta-tabs-list .vc_tta-tab.vc_active > a,
.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading{
	border-left: 2px solid <?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover,
.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a{
	color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
.vc_tta.vc_tta-accordion .vc_active .vc_tta-controls-icon.vc_tta-controls-icon-plus,
.ult_design_5 .ult_pricing_table .ult_price_link .ult_price_action_button:hover,
.ult-team-member-wrap.ult-style-1 .ult-team-member-name-wrap .member-name-divider{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
#page-content .wpb_image_grid_uls.hover_style3 li a i{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.ult-carousel-wrapper .slick-dots li.slick-active i{
	color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
#error404_container .btnback{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.coming_soon_wrapper h6 a{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.shop_wrap .sharebox .social_link:hover{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_contactform_type5 span.focus:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_contactform_type5 span input:focus,
.cstheme_contactform_type5 textarea:focus{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_contactform_type6 span.focus:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
	opacity:0.1;
}
.cstheme_contactform_type6 span input:focus,
.cstheme_contactform_type6 textarea:focus,
.cstheme_contactform_type6 p.focus i.icon{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_contactform_type8 p.focus i.icon{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_contactform_type10 span.focus:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.cstheme_contactform_type10 input:focus,
.cstheme_contactform_type10 textarea:focus{
	border-color:#e4e4e4 !important;
	background-color:#f9f9f9 !important;
}
.cstheme_contactform_type4 span input:focus,
.cstheme_contactform_type4 textarea:focus{
	border-color:transparent !important;
}
.button_with_icon .play_btn i{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.widget_categories .current-cat a,
.widget_pages li a:hover,
.widget_nav_menu li a:hover,
.widget_pages li.current_page_item a,
.widget_nav_menu li.current_page_item a,
#pagetitle.pagetitle_fullscreen .single_post_header .post-meta a:hover,
#pagetitle.pagetitle_fullscreen .cstheme_comment_count i,
.recent_posts_list.carousel .recent_post_title a:hover,
#related_posts_list .cstheme_comment_count i{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.default article.post.sticky:before,
form.wpcf7-form input[type='submit']:hover,
form.wpcf7-form input[type='submit']:focus,
.swipebox-counter i{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
.heading_font_family,
.eva-pagination .page-numbers,
.btn,
.portfolio_single_det,
.portfolio_single_nav div > div > a,
.post_content_readmore,
.button,
input,
textarea,
h1, h2, h3, h4, h5, h6,
.filter_block li a{
	font-family:<?php echo esc_html( $benedicta_heading_font_family ); ?>
}


/* Blog Posts Styles */
.post-descr-wrap .post-meta a:hover,
#blog_list.bg_img_card .post_content_readmore svg{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.default .post_meta_category a:hover,
#blog_list.bg_img_card .post_meta_category a:hover,
#blog_list.grid_top_img .post_meta_category a:hover,
#blog_list.masonry_top_img .post_meta_category a:hover,
#blog_list.grid_card .post_meta_category a:hover,
#blog_list.masonry_card .post_meta_category a:hover,
#blog_list.grid_top_img .post-content-wrapper,
#blog_list.masonry_top_img .post-content-wrapper,
#blog_list.grid_card .post-image a:before,
#blog_list.masonry_card .post-image a:before,
#blog_list.grid_card_min .post_meta_category a,
#blog_list.masonry_card_min .post_meta_category a,
#blog_list.frame_min .post_meta_category a{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.default .post_meta_category a:hover,
#blog_list.bg_img_card .post_meta_category a:hover,
#blog_list.grid_top_img .post_meta_category a:hover,
#blog_list.masonry_top_img .post_meta_category a:hover,
#blog_list.grid_card .post_meta_category a:hover,
#blog_list.masonry_card .post_meta_category a:hover{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.frame_min .post-content-wrapper:hover{
	box-shadow: 0 0 0 5px <?php echo esc_html( $benedicta_theme_color ); ?> inset;
}
#blog_list.frame_min .post-title:hover a{
	color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}
#blog_list.bg_img_card .post-title:hover a,
#blog_list.bg_img_card .format-quote h2.post-title:hover a{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.bg_img_card .post-content-quote-wrapper .overlay_border:before,
#blog_list.bg_img_card .post-content-quote-wrapper .overlay_border:after{
	border-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.bg_img_card .post-content-link-wrapper,
#blog_list.bg_img_card .read_more:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.bg_img_card .read_more:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>
}
#blog_list.frame_min .post-content-wrapper:hover{
	box-shadow: 0 0 0 1px <?php echo esc_html( $benedicta_theme_color ); ?> inset;
}
#blog_list.frame_min .post-content-wrapper:hover .post_bottom_inf .text-left,
#blog_list.frame_min .post-content-wrapper:hover .post_bottom_inf .text-right,
#blog_list.frame_min .post-content-wrapper:hover .cstheme_comment_count,
#blog_list.frame_min .post-content-wrapper:hover .cstheme_comment_count i,
#blog_list.frame_min .post-content-wrapper:hover .post_bottom_inf .text-left i,
.single_post_nav a:hover p{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
.single_post_nav a:hover path,
.commentlist .comment-meta .comment-edit-link:hover path,
.commentlist .comment-meta .comment-reply-link:hover path{
	fill:<?php echo esc_html( $benedicta_theme_color ); ?>;
}

body.single-post header.header-top .header_wrap{
	background-color:<?php echo esc_html( $benedicta_header_fixed_bgcolor ); ?>;
}


/* Widgets */
.widget_benedicta_cat_thumbnails li a:before,
.calendar_wrap caption,
.widget .calendar_wrap table td#today:before,
aside h4.widget-title:before{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}
.calendar_wrap thead{
	color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}

/* MailChimp Plugin */
.mc4wp-form .mc4wp_email_wrap.focus i{ color:<?php echo esc_html( $benedicta_theme_color ); ?> }
.mc4wp_light_form .mc4wp-form .mc4wp_submit_wrap input:hover{
	background-color:<?php echo esc_html( $benedicta_theme_color ); ?>;
}

/* Food Menu Element */
.menu_item_title a:hover{
	color:<?php echo esc_html( $benedicta_theme_color ); ?> !important;
}

<?php 

/* WooCommerce */
echo esc_html( $benedicta_woo_styles );

?>