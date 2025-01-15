<?php

/**
 * Register sidebars
 */
function benedicta_widgets_init() {
	
	//	Blog Sidebar
	register_sidebar( array(
		'name'          	=> esc_html__( 'Blog Sidebar', 'benedicta' ),
		'id'            	=> 'blog-sidebar',
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );
	
	//	Prefooter Area
	if( class_exists( 'ReduxFrameworkPlugin' ) ) {
		$benedicta_widgets_grid = benedicta_options('prefooter_col');
		$i = 1;
		foreach (explode('-', $benedicta_widgets_grid) as $benedicta_widgets_g) {
			register_sidebar(array(
				'name' 				=> esc_html__('Prefooter Area ', 'benedicta') . $i,
				'id' 				=> "footer-area-$i",
				'description' 		=> esc_html__('The prefooter area widgets', 'benedicta'),
				'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 		=> '</aside>',
				'before_title' 		=> '<h4 class="widget-title">',
				'after_title'   	=> '</h4>',
			));
			$i++;
		}
	}
	
	//	Shop Sidebar
	if( benedicta_woo_enabled() ) {
		register_sidebar( array(
			'name'          	=> esc_html__( 'Shop Sidebar', 'benedicta' ),
			'id'            	=> 'shop-sidebar',
			'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  	=> '</aside>',
			'before_title'  	=> '<h4 class="widget-title">',
			'after_title'   	=> '</h4>',
		) );
	}
	
	$benedicta_unlimited_sidebar = benedicta_options('unlimited_sidebar');
	
	if ( !empty( $benedicta_unlimited_sidebar ) ) {	
		if( class_exists( 'ReduxFrameworkPlugin' ) && $benedicta_unlimited_sidebar != '' ) {
			foreach( $benedicta_unlimited_sidebar as $benedicta_sidebar ) {
				if ( isset( $benedicta_sidebar ) && !empty( $benedicta_sidebar ) ) {
					register_sidebar( array(
						'name' 				=> $benedicta_sidebar,
						'id' 				=> benedicta_generateSlug($benedicta_sidebar, 45),
						'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
						'after_widget' 		=> '</aside>',
						'before_title' 		=> '<h4 class="widget-title">',
						'after_title'   	=> '</h4>',
					));
				}
			}
		}
	}
	
}
add_action( 'widgets_init', 'benedicta_widgets_init' );


/**
 * Unlimited Sidebars
 */

function benedicta_generateSlug($phrase, $maxLength) {
    $result = strtolower($phrase);
    $result = preg_replace("/[^a-z0-9\s-]/", "", $result);
    $result = trim(preg_replace("/[\s-]+/", " ", $result));
    $result = trim(substr($result, 0, $maxLength));
    $result = preg_replace("/\s/", "-", $result);
    return $result;
}


/**
 * Include widgets
 */

require_once( get_template_directory() . '/inc/widgets/widget-cat.php' );
require_once( get_template_directory() . '/inc/widgets/widget-posts.php' );
require_once( get_template_directory() . '/inc/widgets/widget-social.php' );


/**
 * Register widgets
 */

function benedicta_register_widgets() {
	register_widget( 'benedicta_widget_cat_thumbnails' );
	register_widget( 'benedicta_widget_post_thumb' );
	register_widget( 'benedicta_widget_social' );
}

add_action( 'widgets_init', 'benedicta_register_widgets' );