<?php
/**
 * Template Name: Page - Coming Soon
 */

get_header('comingsoon');

global $post;

$benedicta_coming_soon_subtitle = get_post_meta( $post->ID, 'benedicta_coming_soon_subtitle', true );
$benedicta_coming_soon_title 	= get_post_meta( $post->ID, 'benedicta_coming_soon_title', true );
$benedicta_coming_soon_descr 	= get_post_meta( $post->ID, 'benedicta_coming_soon_descr', true );
$benedicta_coming_soon_email 	= get_post_meta( $post->ID, 'benedicta_coming_soon_email', true );

$benedicta_coming_soon_bg_styles = $benedicta_coming_soon_bg_image = $benedicta_coming_soon_bg_image_repeat = $benedicta_coming_soon_bg_color = $benedicta_coming_soon_bg_attachment = $benedicta_coming_soon_bg_position = $benedicta_coming_soon_bg_cover = $benedicta_coming_soon_text_color = '';
$benedicta_coming_soon_bg_image = get_post_meta( $post->ID, 'benedicta_coming_soon_bg_image', true );

if ( $benedicta_coming_soon_bg_image ) {
	if ( is_numeric( $benedicta_coming_soon_bg_image ) ) {
		$benedicta_coming_soon_bg_image = wp_get_attachment_image_src( $benedicta_coming_soon_bg_image, 'full' );
		$benedicta_coming_soon_bg_image = $benedicta_coming_soon_bg_image[0];
	}
}

$benedicta_coming_soon_bg_image_repeat 	= get_post_meta( $post->ID, 'benedicta_coming_soon_bg_repeat', true );
$benedicta_coming_soon_bg_color 		= get_post_meta( $post->ID, 'benedicta_coming_soon_bg_color', true );
$benedicta_coming_soon_bg_attachment 	= get_post_meta( $post->ID, 'benedicta_coming_soon_bg_attachment', true );
$benedicta_coming_soon_bg_position 		= get_post_meta( $post->ID, 'benedicta_coming_soon_bg_position', true );
$benedicta_coming_soon_bg_cover 		= get_post_meta( $post->ID, 'benedicta_coming_soon_bg_full', true );

if( isset( $benedicta_coming_soon_bg_image ) && $benedicta_coming_soon_bg_image != '' ) {
	$benedicta_coming_soon_bg_styles .= 'background-image: url('. $benedicta_coming_soon_bg_image .');';
	if( isset( $benedicta_coming_soon_bg_image_repeat ) && $benedicta_coming_soon_bg_image_repeat != '' ) {
		$benedicta_coming_soon_bg_styles .= 'background-repeat: '. $benedicta_coming_soon_bg_image_repeat .';';
	}
	if( isset( $benedicta_coming_soon_bg_attachment ) && $benedicta_coming_soon_bg_attachment != '' ) {
		$benedicta_coming_soon_bg_styles .= 'background-attachment: '. $benedicta_coming_soon_bg_attachment .';';
	}
	if( isset( $benedicta_coming_soon_bg_position ) && $benedicta_coming_soon_bg_position != '' ) {
		$benedicta_coming_soon_bg_styles .= 'background-position: '. $benedicta_coming_soon_bg_position .';';
	}
	if( isset( $benedicta_coming_soon_bg_cover ) && $benedicta_coming_soon_bg_cover != '' ) {
		$benedicta_coming_soon_bg_styles .= 'background-size: '. $benedicta_coming_soon_bg_cover .';';
		$benedicta_coming_soon_bg_styles .= '-moz-background-size: '. $benedicta_coming_soon_bg_cover .';';
		$benedicta_coming_soon_bg_styles .= '-webkit-background-size: '. $benedicta_coming_soon_bg_cover .';';
		$benedicta_coming_soon_bg_styles .= '-o-background-size: '. $benedicta_coming_soon_bg_cover .';';
		$benedicta_coming_soon_bg_styles .= '-ms-background-size: '. $benedicta_coming_soon_bg_cover .';';
	}
}

if( isset( $benedicta_coming_soon_bg_color ) && $benedicta_coming_soon_bg_color != '' ) {
	$benedicta_coming_soon_bg_styles .= 'background-color: '. $benedicta_coming_soon_bg_color .';';
}

if( $benedicta_coming_soon_bg_styles ) {
	echo '
		<style>
			.coming_soon_wrapper { ' . $benedicta_coming_soon_bg_styles . ' }
		</style>
	';
}
?>
		
		<div class="coming_soon_wrapper text-center">
			<div class="container">
				<div class="text-center">
					<h4><?php echo esc_html( $benedicta_coming_soon_subtitle ); ?></h4>
				</div>
				<h1><?php echo esc_html( $benedicta_coming_soon_title ); ?></h1>
				<h6><?php echo esc_html( $benedicta_coming_soon_descr ) . ' <a href="mailto:' . esc_html( $benedicta_coming_soon_email ) . '">' . esc_html( $benedicta_coming_soon_email ) . '</a>'; ?></h6>
				
				<!-- COUNTDOWN -->
				<ul class="countdown">
					<li>
						<span class="days">00</span>
						<p class="days_ref"><?php echo esc_attr__('days', 'benedicta'); ?></p>
					</li>
					<li>
						<span class="hours">00</span>
						<p class="hours_ref"><?php echo esc_attr__('hours', 'benedicta'); ?></p>
					</li>
					<li>
						<span class="minutes">00</span>
						<p class="minutes_ref"><?php echo esc_attr__('minutes', 'benedicta'); ?></p>
					</li>
					<li>
						<span class="seconds">00</span>
						<p class="seconds_ref"><?php echo esc_attr__('seconds', 'benedicta'); ?></p>
					</li>
				</ul><!-- //COUNTDOWN -->
			</div>
		</div>

<?php get_footer('comingsoon'); ?>