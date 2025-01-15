<?php
/**
 * The template for displaying all single portfolio posts and attachments
 */

get_header();
the_post();

global $post;

$portfolio_single_class = '';

$benedicta_pf = get_post_format();
if (empty( $benedicta_pf )) $benedicta_pf = 'image';
$portfolio_single_class .= 'format-' . esc_attr( $benedicta_pf ) . ' ';

$benedicta_portfolio_single_layout 				= get_post_meta( $post->ID, 'benedicta_portfolio_single_layout', true );
$description_box 							= get_post_meta( $post->ID, 'benedicta_portfolio_single_description_box', true );
$benedicta_portfolio_single_client 				= get_post_meta( $post->ID, 'benedicta_portfolio_single_client', true );
$benedicta_portfolio_single_add_field_title 	= get_post_meta( $post->ID, 'benedicta_portfolio_single_add_field_title', true );
$benedicta_portfolio_single_add_field 			= get_post_meta( $post->ID, 'benedicta_portfolio_single_add_field', true );
$benedicta_portfolio_single_add_field_title2 	= get_post_meta( $post->ID, 'benedicta_portfolio_single_add_field_title2', true );
$benedicta_portfolio_single_add_field2 			= get_post_meta( $post->ID, 'benedicta_portfolio_single_add_field2', true );
$benedicta_portfolio_single_add_field_title3 	= get_post_meta( $post->ID, 'benedicta_portfolio_single_add_field_title3', true );
$benedicta_portfolio_single_add_field3 			= get_post_meta( $post->ID, 'benedicta_portfolio_single_add_field3', true );
$benedicta_portfolio_single_link 				= get_post_meta( $post->ID, 'benedicta_portfolio_single_link', true );
$benedicta_portfolio_single_link_name 			= get_post_meta( $post->ID, 'benedicta_portfolio_single_link_name', true );
$benedicta_portfolio_single_carousel_enable 	= get_post_meta( $post->ID, 'benedicta_portfolio_single_carousel_enable', true );
$benedicta_portfolio_single_carousel_layout 	= get_post_meta( $post->ID, 'benedicta_portfolio_single_carousel_layout', true );
$benedicta_portfolio_single_grid_pullleft 		= get_post_meta( $post->ID, 'benedicta_portfolio_single_grid_pullleft', true );

$portfolio_single_class .= $benedicta_portfolio_single_layout . ' ';
if( $benedicta_portfolio_single_carousel_enable != 'enable' ) {
	$portfolio_single_class .= 'gallery_grid ';
} else {
	$portfolio_single_class .= 'gallery_carousel ';
}
if( $benedicta_portfolio_single_layout == 'full_width' ) {
	$portfolio_single_class .= 'gallery_' . $benedicta_portfolio_single_carousel_layout . ' ';
}
if( $benedicta_portfolio_single_grid_pullleft != 'disable' ) {
	$portfolio_single_class .= 'position_pull_left ';
}

$benedicta_portfolio_category = get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
$benedicta_portfolio_tags = get_the_term_list($post->ID, 'portfolio_tag', '', ', ', '');

/* ADD 1 view for this post */
$benedicta_post_views = (get_post_meta(get_the_ID(), "post_views", true) > 0 ? get_post_meta(get_the_ID(), "post_views", true) : "0");
update_post_meta(get_the_ID(), "post_views", (int)$benedicta_post_views + 1);

$benedicta_portfolio_single_navigation = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_single_navigation') : '1';
?>
		
		<div class="<?php if( $benedicta_portfolio_single_grid_pullleft == 'disable' ) { echo esc_attr( 'container ' ); } ?>">
			<div id="portfolio_single_wrap" class="<?php echo esc_attr( $portfolio_single_class ); ?> clearfix mb50">
				<div class="row">
					
					<?php if( $benedicta_portfolio_single_layout == 'full_width' ) { ?>
						
						<div class="col-md-12">
							<div class="row">
								<?php $portfolio_single_content_class = $description_box != 'hide' ? 'col-lg-8 col-md-7' : 'col-lg-12'; ?>
								<div class="<?php echo esc_attr( $portfolio_single_content_class ); ?>">
									<div class="portfolio_single_content clearfix">
										<?php if( benedicta_options('portfolio_single_pagetitle') != 'show' ) { ?>
											<h3 class="portfolio_single_title"><?php the_title(); ?></h3>
										<?php } ?>
										<?php
											the_content(esc_html__('Read more!', 'benedicta'));
											wp_link_pages(array('before' => '<div class="page-link mb20">' . esc_html__('Pages', 'benedicta') . ': ', 'after' => '</div>'));
										?>
									</div>
								</div>
								
								<?php if( $description_box != 'hide' ){ ?>
									<div class="col-lg-4 col-md-5">
										<div class="portfolio_single_details_wrap">
											
											<?php if( isset( $benedicta_portfolio_single_client ) && $benedicta_portfolio_single_client != '' ) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php esc_html_e('Client', 'benedicta') ?></strong>
													<span class="portfolio-client">
														<?php echo esc_attr( $benedicta_portfolio_single_client ); ?>
													</span></p>
												</div>
											<?php } ?>
											<?php if( !empty( $benedicta_portfolio_category ) ) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php esc_html_e('Category', 'benedicta') ?></strong>
													<span class="portfolio-category">
														<?php echo strip_tags($benedicta_portfolio_category) ?>
													</span></p>
												</div>
											<?php } ?>
											<?php if(get_the_term_list($post->ID, 'portfolio_tag', '', ',', '')) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php esc_html_e('Tags', 'benedicta') ?></strong>
													<span class="portfolio-tag">
														<?php echo strip_tags($benedicta_portfolio_tags) ?>
													</span></p>
												</div>
											<?php } ?>
											<div class="portfolio_single_det">
												<p><strong><?php esc_html_e('Date', 'benedicta') ?></strong>
												<span class="portfolio-date">
													<?php the_date( get_option( 'date_format' ) ); ?>
												</span></p>
											</div>
											<?php if( isset( $benedicta_portfolio_single_add_field_title ) && $benedicta_portfolio_single_add_field_title != '' ) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php echo esc_attr( $benedicta_portfolio_single_add_field_title ); ?></strong>
													<span class="portfolio-add_field">
														<?php echo esc_attr( $benedicta_portfolio_single_add_field ); ?>
													</span></p>
												</div>
											<?php } ?>
											<?php if( isset( $benedicta_portfolio_single_add_field_title2 ) && $benedicta_portfolio_single_add_field_title2 != '' ) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php echo esc_attr( $benedicta_portfolio_single_add_field_title2 ); ?></strong>
													<span class="portfolio-add_field">
														<?php echo esc_attr( $benedicta_portfolio_single_add_field2 ); ?>
													</span></p>
												</div>
											<?php } ?>
											<?php if( isset( $benedicta_portfolio_single_add_field_title3 ) && $benedicta_portfolio_single_add_field_title3 != '' ) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php echo esc_attr( $benedicta_portfolio_single_add_field_title3 ); ?></strong>
													<span class="portfolio-add_field">
														<?php echo esc_attr( $benedicta_portfolio_single_add_field3 ); ?>
													</span></p>
												</div>
											<?php } ?>
											<?php if( isset( $benedicta_portfolio_single_link ) && $benedicta_portfolio_single_link != '' ) { ?>
												<div class="portfolio_single_det">
													<p><strong><?php esc_html_e('Link', 'benedicta') ?></strong>
													<span class="portfolio-custom-link">
														<a class="theme_color" href="<?php echo esc_url( $benedicta_portfolio_single_link ); ?>" target="_blank">
															<?php echo esc_attr( ( $benedicta_portfolio_single_link_name != '' ) ? $benedicta_portfolio_single_link_name : $benedicta_portfolio_single_link ); ?>
														</a>
													</span></p>
												</div>
											<?php } ?>
											
										</div>
									</div>
								<?php } ?>
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="portfolio_format_content">
								<?php get_template_part( 'templates/portfolio/post-format/post', $benedicta_pf ); ?>
							</div>
						</div>
					
					<?php } elseif ( $benedicta_portfolio_single_layout == 'half_width' ) { ?>
						
						<div class="col-lg-8 col-md-7 mb50">
							<div class="portfolio_format_content">
								<?php get_template_part( 'templates/portfolio/post-format/post', $benedicta_pf ); ?>
							</div>
						</div>
						<div class="col-lg-4 col-md-5 mb50">
							<div class="portfolio_single_content clearfix">
								<?php if( benedicta_options('portfolio_single_pagetitle') != 'show' ) { ?>
									<h3 class="portfolio_single_title"><?php the_title(); ?></h3>
								<?php } ?>
								<?php
									the_content(esc_html__('Read more!', 'benedicta'));
									wp_link_pages(array('before' => '<div class="page-link mb20">' . esc_html__('Pages', 'benedicta') . ': ', 'after' => '</div>'));
								?>
							</div>
						
							<?php if( $description_box != 'hide' ) { ?>
								<div class="portfolio_single_details_wrap">
									
									<?php if( isset( $benedicta_portfolio_single_client ) && $benedicta_portfolio_single_client != '' ) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php esc_html_e('Client', 'benedicta') ?></strong>
											<span class="portfolio-client">
												<?php echo esc_attr( $benedicta_portfolio_single_client ); ?>
											</span></p>
										</div>
									<?php } ?>
									<?php if( !empty( $benedicta_portfolio_category ) ) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php esc_html_e('Category', 'benedicta') ?></strong>
											<span class="portfolio-category">
												<?php echo strip_tags($benedicta_portfolio_category) ?>
											</span></p>
										</div>
									<?php } ?>
									<?php if(get_the_term_list($post->ID, 'portfolio_tag', '', ',', '')) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php esc_html_e('Tags', 'benedicta') ?></strong>
											<span class="portfolio-tag">
												<?php echo strip_tags($benedicta_portfolio_tags) ?>
											</span></p>
										</div>
									<?php } ?>
									<div class="portfolio_single_det">
										<p><strong><?php esc_html_e('Date', 'benedicta') ?></strong>
										<span class="portfolio-date">
											<?php the_date( get_option( 'date_format' ) ); ?>
										</span></p>
									</div>
									<?php if( isset( $benedicta_portfolio_single_add_field_title ) && $benedicta_portfolio_single_add_field_title != '' ) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php echo esc_attr( $benedicta_portfolio_single_add_field_title ); ?></strong>
											<span class="portfolio-add_field">
												<?php echo esc_attr( $benedicta_portfolio_single_add_field ); ?>
											</span></p>
										</div>
									<?php } ?>
									<?php if( isset( $benedicta_portfolio_single_add_field_title2 ) && $benedicta_portfolio_single_add_field_title2 != '' ) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php echo esc_attr( $benedicta_portfolio_single_add_field_title2 ); ?></strong>
											<span class="portfolio-add_field">
												<?php echo esc_attr( $benedicta_portfolio_single_add_field2 ); ?>
											</span></p>
										</div>
									<?php } ?>
									<?php if( isset( $benedicta_portfolio_single_add_field_title3 ) && $benedicta_portfolio_single_add_field_title3 != '' ) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php echo esc_attr( $benedicta_portfolio_single_add_field_title3 ); ?></strong>
											<span class="portfolio-add_field">
												<?php echo esc_attr( $benedicta_portfolio_single_add_field3 ); ?>
											</span></p>
										</div>
									<?php } ?>
									<?php if( isset( $benedicta_portfolio_single_link ) && $benedicta_portfolio_single_link != '' ) { ?>
										<div class="portfolio_single_det">
											<p><strong><?php esc_html_e('Link', 'benedicta') ?></strong>
											<span class="portfolio-custom-link">
												<a class="theme_color" href="<?php echo esc_url( $benedicta_portfolio_single_link ); ?>" target="_blank">
													<?php echo esc_attr( ( $benedicta_portfolio_single_link_name != '' ) ? $benedicta_portfolio_single_link_name : $benedicta_portfolio_single_link ); ?>
												</a>
											</span></p>
										</div>
									<?php } ?>
									
								</div>
							<?php } ?>
							
						</div>
						
					<?php } ?>
					
				</div>
			</div>
		</div>
		
		<?php if( $benedicta_portfolio_single_navigation != 0) { ?>
			<div class="portfolio_single_nav">
					
				<?php $benedicta_options_header_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header-layout') : 'full_width'; ?>
				<?php $benedicta_header_layout = get_post_meta( $post->ID, 'benedicta_header_layout', true ) ? get_post_meta( $post->ID, 'benedicta_header_layout', true ) : $benedicta_options_header_layout; ?>
				<div class="<?php if( $benedicta_header_layout != 'full_width' ) { echo 'container'; } ?> clearfix">
					
					<?php
						
						$benedicta_prev_post = get_adjacent_post(false, '', false);
						$benedicta_next_post = get_adjacent_post(false, '', true);
						if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('portfolio_single_navigation_backbtn') != '' ){
							$benedicta_portfolio_single_navigation_backbtn = benedicta_options('portfolio_single_navigation_backbtn');
						}
						
						if($benedicta_prev_post){
							$benedicta_post_url = get_permalink( $benedicta_prev_post->ID );            
							echo '<div class="pull-left"><a href="' . esc_url( $benedicta_post_url ) . '" title="' . $benedicta_prev_post->post_title . '"><i class="first fa fa-angle-left"></i><i class="last fa fa-angle-left"></i><span>' . $benedicta_prev_post->post_title . '</span></a></div>';
						}
						
						if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('portfolio_single_navigation_backbtn') != '' ){
							echo '<a class="back-to-portfolio" href="' . esc_url( $benedicta_portfolio_single_navigation_backbtn ) . '">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 486.8 486.8" width="30px" height="30px" xml:space="preserve">
<path d="M140.35,32c0-17.6-14.4-32-32-32h-76.3c-17.6,0-32,14.4-32,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32V32 H140.35z M115.85,108.3c0,4.1-3.4,7.5-7.5,7.5h-76.3c-4.1,0-7.5-3.4-7.5-7.5V32c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5 v76.3H115.85z"/>
<path d="M140.35,205.3c0-17.6-14.4-32-32-32h-76.3c-17.6,0-32,14.4-32,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32 v-76.2H140.35z M115.85,281.5c0,4.1-3.4,7.5-7.5,7.5h-76.3c-4.1,0-7.5-3.4-7.5-7.5v-76.2c0-4.1,3.4-7.5,7.5-7.5h76.2 c4.1,0,7.5,3.4,7.5,7.5v76.2H115.85z"/>
<path d="M108.35,346.5h-76.3c-17.6,0-32,14.4-32,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2 C140.35,360.9,125.95,346.5,108.35,346.5z M115.85,454.8c0,4.1-3.4,7.5-7.5,7.5h-76.3c-4.1,0-7.5-3.4-7.5-7.5v-76.2 c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2H115.85z"/>
<path d="M173.35,281.5c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32 L173.35,281.5L173.35,281.5z  M197.85,205.3c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2 c-4.1,0-7.5-3.4-7.5-7.5L197.85,205.3L197.85,205.3z"/>
<path d="M173.35,454.8c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32 L173.35,454.8L173.35,454.8z M197.85,378.5c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2 c-4.1,0-7.5-3.4-7.5-7.5L197.85,378.5L197.85,378.5z"/>
<path d="M346.55,281.5c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32 L346.55,281.5L346.55,281.5z M371.05,205.3c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2 c-4.1,0-7.5-3.4-7.5-7.5L371.05,205.3L371.05,205.3z"/>
<path d="M346.55,454.8c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32v-76.2c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32 L346.55,454.8L346.55,454.8z M371.05,378.5c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2 c-4.1,0-7.5-3.4-7.5-7.5L371.05,378.5L371.05,378.5z"/>
<path d="M173.35,32v76.2c0,17.6,14.4,32,32,32h76.2c17.6,0,32-14.4,32-32V32c0-17.6-14.4-32-32-32h-76.2 C187.65,0,173.35,14.4,173.35,32z M197.85,32c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2c0,4.1-3.4,7.5-7.5,7.5h-76.2 c-4.1,0-7.5-3.4-7.5-7.5L197.85,32L197.85,32z"/>
<path d="M378.55,140.3h76.2c17.6,0,32-14.4,32-32V32c0-17.6-14.4-32-32-32h-76.2c-17.6,0-32,14.4-32,32v76.2 C346.55,125.9,360.95,140.3,378.55,140.3z M371.05,32c0-4.1,3.4-7.5,7.5-7.5h76.2c4.1,0,7.5,3.4,7.5,7.5v76.2 c0,4.1-3.4,7.5-7.5,7.5h-76.2c-4.1,0-7.5-3.4-7.5-7.5L371.05,32L371.05,32z"/>
</svg>

							</a>';
						}
						
						if( $benedicta_next_post ) {
							$benedicta_post_url = get_permalink( $benedicta_next_post->ID );            
							echo '<div class="pull-right text-right"><a href="' . esc_url( $benedicta_post_url ) . '" title="' . $benedicta_next_post->post_title . '"><i class="first fa fa-angle-right"></i><i class="last fa fa-angle-right"></i><span>' . $benedicta_next_post->post_title . '</span></a></div>';
						} 
					?>
					
				</div>
			</div>
		<?php } ?>

<?php get_footer(); ?>
