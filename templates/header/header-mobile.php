<?php

$header_search = class_exists('ReduxFrameworkPlugin') ? benedicta_options('header_search') : 0;

$shop_icon = 0;
if( class_exists('WooCommerce') && ( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('shop_icon') != 0 ) ) {
	$shop_icon = 1;
}
?>

		<header id="header_mobile_wrap">
			<div class="container">
				<?php benedicta_logo(); ?>
				<?php if ( $header_search != 0 ) { ?>
					<a class="header_search_icon" href="javascript:void(0)">
						<i class="icon Evatheme-Icon-Fonts-thin-0033_search_find_zoom"></i>
					</a>
				<?php } ?>
				<?php if( $shop_icon != 0 ) { ?>
					<a class="mobile_header_cart_icon" href="<?php esc_url( the_permalink( wc_get_page_id( 'cart' ) ) ); ?>">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 50.613 50.613" xml:space="preserve">
<path d="M49.569,11.145H20.055c-0.961,0-1.508,0.743-1.223,1.661l4.669,13.677c0.23,0.738,1.044,1.336,1.817,1.336h19.35 c0.773,0,1.586-0.598,1.814-1.336l4.069-14C50.783,11.744,50.344,11.145,49.569,11.145z"/><circle cx="22.724" cy="43.575" r="4.415"/><circle cx="41.406" cy="43.63" r="4.415"/>
<path d="M46.707,32.312H20.886L10.549,2.568H2.5c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5h4.493L17.33,37.312h29.377 c1.381,0,2.5-1.119,2.5-2.5S48.088,32.312,46.707,32.312z"/>
</svg>
					</a>
				<?php } ?>
				<a class="mobile_menu_btn" href="javascript:void(0)"><span></span><span></span><span></span></a>
			</div>
			<div class="menu-primary-menu-container-wrap">
				<?php wp_nav_menu( array( 'menu_class' => 'nav-menu', 'theme_location' => 'primary' ) ); ?>
			</div>
		</header>