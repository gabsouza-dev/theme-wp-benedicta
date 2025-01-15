<?php

$benedicta_header_wrap_class = 'header_wrap scroll-wrap ';

$header_search = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_search') : 0;

$shop_icon = 0;
if( class_exists('WooCommerce') && ( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('shop_icon') != '0' ) ) {
	$shop_icon = 1;
}

$header_social_links = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_social_links') : '0';

$header_left_copyright = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_left_copyright') : '0';
$copyright = benedicta_options('footer_copyright');

$header_left_align = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_left_align') : 'left';
$benedicta_header_wrap_class .= 'text-'. $header_left_align .' ';

$lang_switcher = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher') : 0;

$nav_args = array(
    'theme_location' => 'primary',
    'container' 	=> 'none',
    'menu_class' 	=> 'nav-menu clearfix',
    'depth' 		=> 3,
    'fallback_cb' 	=> 'false',
);
?>
		
			
		<div class="<?php echo esc_attr( $benedicta_header_wrap_class ); ?>">
			<?php benedicta_logo(); ?>
			<div class="menu-primary-menu-container-wrap">
				<?php if ( has_nav_menu( 'primary' ) )
					wp_nav_menu( $nav_args );
				?>

				<?php if ( $header_search != '0' ) { ?>
					<a class="header_search_icon" href="javascript:void(0)">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56.966 56.966" xml:space="preserve" width="17px" height="17px"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 s-17-7.626-17-17S14.61,6,23.984,6z"/></svg>
						<?php echo esc_html__('Search','benedicta'); ?>
					</a>
				<?php } ?>
				<?php if( $shop_icon != 0 ) {
					benedicta_woo_nav_cart();
				} ?>
				<?php if ( $lang_switcher != '0' ) { ?>
					<?php echo benedicta_lang_switcher(); ?>
				<?php } ?>
			</div>

			<div class="menu_creative_bottom">
				<?php if ( $header_social_links != '0' ) { ?>
					<div class="social_links_wrap">
						<?php echo benedicta_social_links(); ?>
					</div>
				<?php } ?>
				<?php if( $header_left_copyright != 0 && !empty( $copyright ) ) 
					echo '<div class="copyright">'. $copyright .'</div>';
				?>
			</div>
		</div>