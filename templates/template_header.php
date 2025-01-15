<?php

/**
 * Render Header
 */

if ( ! function_exists( 'benedicta_render_header' ) ) {
	function benedicta_render_header() {
		
		global $post;

		$benedicta_header_class = 'clearfix ';

		$benedicta_header_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header-layout') : 'full_width';
		$benedicta_header_class .= $benedicta_header_layout . ' ';

		if( $benedicta_header_layout != 'left_fixed' ){

			$benedicta_header_class .= 'header-top ';

			$header_type = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_type') : '1';
			$benedicta_header_class .= 'header_type'. $header_type .' ';

			$benedicta_tagline_area = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('tagline_area') : '0';
			if ($benedicta_tagline_area == 1 && ( $header_type == 1 || $header_type == 4 )) {
				$benedicta_header_class .= 'has_tagline_area ';
			}
		}


		echo '<header class="'. esc_attr( $benedicta_header_class ) .'">';
			
			if ( $benedicta_header_layout != 'left_fixed' ) {
				
				if ($benedicta_tagline_area == 1 && ( $header_type == 1 || $header_type == 4 )) {
					get_template_part('templates/header/tagline');
				}

				switch ( $header_type ) {
					case 1 :
						get_template_part( 'templates/header/type', '1' );
						break;
					case 2 :
						get_template_part( 'templates/header/type', '2' );
						break;
					case 3 :
						get_template_part( 'templates/header/type', '3' );
						break;

					case 4 :
						get_template_part( 'templates/header/type', '4' );
						break;
				}

			} else {

				get_template_part( 'templates/header/left_fixed' );
			
			}

		echo '</header>';

		get_template_part( 'templates/header/header-mobile' );
		
	}
}