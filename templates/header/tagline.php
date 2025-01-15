<?php 
$tagline_type = benedicta_options('tagline_type');

$nav_args = array(
	'theme_location' 	=> 'tagline_menu',
	'container' 		=> 'none',
	'menu_class' 		=> 'nav-menu clearfix',
	'fallback_cb' 		=> false,
	'depth' 			=> 1,
);

$header_search = benedicta_options('header_search');
$header_search_position = benedicta_options('header_search_position');

$header_social_links = benedicta_options('header_social_links');
$header_social_links_position = benedicta_options('header_social_links_position');

$tagline_area_phone = benedicta_options('tagline_area_phone');
$tagline_area_email = benedicta_options('tagline_area_email');
$tagline_address = benedicta_options('tagline_address');
$tagline_time = benedicta_options('tagline_time');

$lang_switcher = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher') : 0;
$lang_switcher_position = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('lang_switcher_position') : 'menuline';
?>		


		<div class="header_tagline">
			<div class="container">
				<div class="pull-left tagline_text_wrap">
					
					<?php if ( $tagline_type == 'menu' ) {
						
						if ( has_nav_menu( 'tagline_menu' ) ) {
							wp_nav_menu( $nav_args );
						}

					} else { ?>
						
						<?php if( !empty( $tagline_area_phone ) ) { ?>
							<a class="tagline_phone mr10 pr10" href="tel:<?php echo esc_url( $tagline_area_phone ); ?>"><i class="theme_color icon Evatheme-Icon-Fonts-thin-0294_phone_call_ringing"></i><?php echo esc_html( $tagline_area_phone ); ?></a>
						<?php } ?>
						<?php if( !empty( $tagline_area_email ) ) { ?>
							<a class="tagline_email mr10 pr10" href="mailto:<?php echo esc_url( $tagline_area_email ); ?>"><i class="theme_color icon Evatheme-Icon-Fonts-thin-0313_email_at_sign"></i><?php echo esc_html( $tagline_area_email ); ?></a>
						<?php } ?>
						<?php if( !empty( $tagline_address ) ) { ?>
							<span class="tagline_address mr10 pr10"><i class="theme_color icon Evatheme-Icon-Fonts-thin-0536_navigation_location_drop_pin_map"></i><?php echo esc_html( $tagline_address ); ?></span>
						<?php } ?>
						<?php if( !empty( $tagline_time ) ) { ?>
							<span class="tagline_time mr10 pr10"><i class="theme_color icon Evatheme-Icon-Fonts-thin-0026_time_watch_clock"></i><?php echo esc_html( $tagline_time ); ?></span>
						<?php } ?>
						
					<?php } ?>

				</div>
				<?php if ( $header_search != '0' && $header_search_position == 'tagline' ) { ?>
					<a class="header_search_icon pull-right" href="javascript:void(0)">
						<i class="fa"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 56.966 56.966" xml:space="preserve" width="17px" height="17px"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 s-17-7.626-17-17S14.61,6,23.984,6z"/></svg></i>
					</a>
				<?php } ?>
				<?php if ( $lang_switcher != '0' && $lang_switcher_position == 'tagline' ) { ?>
					<div class="pull-right">
						<?php echo benedicta_lang_switcher(); ?>
					</div>
				<?php } ?>
				<?php if ( $header_social_links != '0' && $header_social_links_position == 'tagline' ) { ?>
					<div class="social_links_wrap text-right pull-right">
						<?php echo benedicta_social_links(); ?>
					</div>
				<?php } ?>
			</div>
		</div>