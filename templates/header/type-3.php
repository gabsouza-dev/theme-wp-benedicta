<?php

$benedicta_header_wrap_class = 'header_wrap ';

$benedicta_header_sticky = benedicta_options('header_sticky');
$benedicta_header_wrap_class .= $benedicta_header_sticky .' ';

$header_search = benedicta_options('header_search');

$shop_icon = 0;
if( class_exists('WooCommerce') && ( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('shop_icon') != '0' ) ) {
	$shop_icon = 1;
}

$header_social_links = benedicta_options('header_social_links');

$lang_switcher = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher') : 0;
$lang_switcher_position = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher_position') : 'menuline';

$nav_args = array(
    'theme_location' => 'primary',
    'container' => 'none',
    'menu_class' => 'nav-menu clearfix',
    'depth' => 3,
    'fallback_cb' => 'benedictaMegaMenuFrontendWalker::fallback',
    'walker' => new benedictaMegaMenuFrontendWalker(),
);
?>
		
		<div class="<?php echo esc_attr( $benedicta_header_wrap_class ); ?>">
			<div class="container">
				<div class="header_logo_wrap clearfix">
					<div class="header_logo_wrap_left">
						<?php if ( $header_social_links != '0' ) { ?>
							<div class="social_links_wrap">
								<?php echo benedicta_social_links(); ?>
							</div>
						<?php } ?>
					</div>
					<?php benedicta_logo(); ?>
					<div class="header_logo_wrap_right">
						<?php if( $shop_icon != 0 ) {
							benedicta_woo_nav_cart();
						} ?>
						<?php if ( $header_search != '0' ) { ?>
							<a class="header_search_icon pull-right" href="javascript:void(0)">
								<i class="fa"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56.966 56.966" xml:space="preserve" width="17px" height="17px"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 s-17-7.626-17-17S14.61,6,23.984,6z"/></svg></i>
							</a>
						<?php } ?>
						<?php if ( $lang_switcher != '0' && $lang_switcher_position == 'menuline' ) { ?>
							<div class="pull-right">
								<?php echo benedicta_lang_switcher(); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="menu-primary-menu-container-wrap text-center">
					<?php if ( has_nav_menu( 'primary' ) )
						wp_nav_menu( $nav_args );
					?>
				</div>
			</div>
		</div>
		<div class="header_bg"></div>