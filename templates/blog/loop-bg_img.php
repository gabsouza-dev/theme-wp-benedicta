<?php
/**
 * The blog post content
 */

$img_size = 'full';
if( isset( $style ) ) {
	if ( $style == 'grid_bg_img' ){
		if( $columns == 'col2' ) {
			$img_size  = 'benedicta_570x400';
		} else {
			$img_size  = 'full';
		}
	} elseif( $style == 'masonry_bg_img' ){
		if( $columns == 'col2' ) {
			$img_size  = 'benedicta_570x9999';
			$img_size  = 'benedicta_570x400';
		} elseif( $columns == 'col3' ) {
			$img_size  = 'benedicta_490x9999';
		} elseif( $columns == 'col4' ) {
			$img_size  = 'benedicta_270x9999';
		} elseif( $columns == 'col5' ) {
			$img_size  = 'benedicta_210x9999';
		} else {
			$img_size  = 'benedicta_1170x9999';
		}
	}
}

$attachment_title = get_the_title();
?>
 
			<div class="post-content-wrapper">
				<?php if( has_post_thumbnail() ) { ?>
					<div class="post_format_content">
						<div class="featured_image_img">
							<?php the_post_thumbnail( $img_size ); ?>
						</div>
					</div>
				<?php } ?>
				<div class="post-descr-wrap">
					<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'benedicta'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<a class="post_content_readmore pull-left" href="<?php echo get_permalink(); ?>"><?php echo esc_html__('Read More','benedicta'); ?><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg></a>
				</div>
			</div>