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

$nav_args = array(
    'theme_location' => 'primary',
    'container' => 'none',
    'menu_class' => 'clearfix',
    'fallback_cb' => false,
    'depth' => 3,
);

$lang_switcher = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher') : 0;
$lang_switcher_position = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher_position') : 'menuline';

$header_copyright = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_copyright') : '0';
$copyright = benedicta_options('footer_copyright');
?>
		
			
		<div class="<?php echo esc_attr( $benedicta_header_wrap_class ); ?>">
			<div class="container">
				<?php benedicta_logo(); ?>
				<div class="right_part_menu clearfix">
					<a class="menu_creative_btn" href="javascript:void(0);">
						<svg class="menu_btn" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384.97 384.97" xml:space="preserve" width="30px" height="31px"><path d="M12.03,120.303h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03 c-6.641,0-12.03,5.39-12.03,12.03C0,114.913,5.39,120.303,12.03,120.303z"/><path d="M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03 S379.58,180.455,372.939,180.455z"/><path d="M372.939,264.667H132.333c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h240.606 c6.641,0,12.03-5.39,12.03-12.03C384.97,270.056,379.58,264.667,372.939,264.667z"/></svg>

						<svg class="menu_close" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 47.971 47.971" xml:space="preserve" width="22px" height="22px"><path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88 c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242 C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879 s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/></svg>

					</a>
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
					<?php if( $shop_icon != 0 ) {
						benedicta_woo_nav_cart();
					} ?>
					<div class="menu_creative_block">
						<div class="container">
							<?php if ( has_nav_menu( 'primary' ) )
								wp_nav_menu( $nav_args );
							?>
							<div class="menu_creative_bottom">
								<?php if ( $header_social_links != '0' ) { ?>
									<div class="social_links_wrap">
										<?php echo benedicta_social_links(); ?>
									</div>
								<?php } ?>
								<?php if( $header_copyright != 0 && !empty( $copyright ) ) 
									echo '<div class="copyright">'. $copyright .'</div>';
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header_bg"></div>