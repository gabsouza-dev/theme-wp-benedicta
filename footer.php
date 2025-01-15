<?php
/**
 * The template for displaying the footer
 */

global $post;

$benedicta_postId = ( isset( $post->ID ) ? get_the_ID() : NULL );

$benedicta_footer_class = '';

$benedicta_options_enable_prefooter = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('enable_prefooter') : 'hide';
$benedicta_enable_prefooter = get_post_meta( $benedicta_postId, 'benedicta_enable_prefooter', true ) ? get_post_meta( $benedicta_postId, 'benedicta_enable_prefooter', true ) : $benedicta_options_enable_prefooter;
$benedicta_options_footer = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer') : 'show';
$benedicta_enable_footer = get_post_meta( $benedicta_postId, 'benedicta_footer', true ) ? get_post_meta( $benedicta_postId, 'benedicta_footer', true ) : $benedicta_options_footer;

if ( !is_404() && !is_search() ) {
	$benedicta_options_footer_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer_layout') : 'boxed';
	$benedicta_footer_layout = get_post_meta( $post->ID, 'benedicta_footer_layout', true ) ? get_post_meta( $post->ID, 'benedicta_footer_layout', true ) : $benedicta_options_footer_layout;
} else {
	$benedicta_footer_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer_layout') : 'boxed';
}

$benedicta_footer_class .= $benedicta_footer_layout;

$benedicta_footer_backtop = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer_backtop') : 1;
if( $benedicta_footer_backtop != 0 ) {
	$benedicta_footer_class .= ' with_backtotop ';
}

$benedicta_footer_socials = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer-social') : 0;

$benedicta_onepage_menu = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('onepage_menu') : 0;
?>
		
		</div><!-- //page-content -->
		
		<?php if ( is_front_page() && $benedicta_onepage_menu != 0 ) { ?>
			<div class="onepage_div"></div>
		<?php } ?>

		<footer class="<?php echo esc_attr( $benedicta_footer_class ); ?>">
		
			<!-- Prefooter Area -->
			<?php if( $benedicta_enable_prefooter == 'show' ) { ?>
				<div id="prefooter_area">
					<div class="container">
						<div class="row">
							<?php
								$benedicta_widgets_grid = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('prefooter_col') : '4-4-4';
								$i = 1;
								foreach (explode('-', $benedicta_widgets_grid) as $benedicta_widgets_g) {
									echo '<div class="col-md-' . esc_attr( $benedicta_widgets_g ) . ' col-' . esc_attr( $i ) . '">';
										dynamic_sidebar("footer-area-$i");
									echo '</div>';
									$i++;
								}
							?>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<!-- Footer Area -->
			<?php if( $benedicta_enable_footer == 'show' ) { ?>
				<div id="footer_bottom">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 copyright_wrap">
								<?php $benedicta_footer_copyright = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('footer_copyright') : 'Copyright © 2018 Benedicta. All Rights Reserved.'; ?>
								<?php if(!empty( $benedicta_footer_copyright ) ) { echo '<div class="copyright">' . $benedicta_footer_copyright . '</div>'; } ?>
							</div>
							<div class="col-sm-6 social_links_wrap text-right">
								<?php if( $benedicta_footer_socials != 0 ) { ?>
									<?php echo benedicta_social_links(); ?>
								<?php } ?>
								<?php if( $benedicta_footer_backtop != 0 ) { ?>
									<a id="footer-backtop" href="javascript:void(0);"><i></i></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</footer>
		
	</div><!-- //Page Wrap -->
	
<?php wp_footer(); ?>

</body>
</html>