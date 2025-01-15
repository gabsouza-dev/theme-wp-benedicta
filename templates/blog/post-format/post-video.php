<?php

global $post;

$img_size = 'full';
if( isset( $style ) ) {
	if( $style == 'grid_top_img' || $style == 'grid_card' ) {
		if( $columns == 'col2' ) {
			$img_size = 'benedicta_570x400';
		} elseif( $columns == 'col3' ) {
			$img_size = 'benedicta_370x270';
		} elseif( $columns == 'col4' ) {
			$img_size = 'benedicta_270x220';
		} elseif( $columns == 'col5' ) {
			$img_size = 'benedicta_281x156';
		}
	} else if ( $style == 'masonry_top_img' || $style == 'masonry_card' ) {
		if( $columns == 'col2' ) {
			$img_size = 'benedicta_570x9999';
		} elseif( $columns == 'col3' ) {
			$img_size = 'benedicta_490x9999';
		} elseif( $columns == 'col4' ) {
			$img_size = 'benedicta_270x9999';
		} elseif( $columns == 'col5' ) {
			$img_size = 'benedicta_210x9999';
		}
	}
}
$benedicta_post_video_embed = get_post_meta($post->ID, 'benedicta_post_video_embed', true);

?>
	
	<?php if( has_post_thumbnail() ) { ?>
		<?php if ( !is_single() ) { ?>
			<div class="post-image">
				<a href="<?php echo esc_url( the_permalink() ); ?>">
					<?php the_post_thumbnail( $img_size ); ?>
					<div class="play_btn"><span></span><i class="fa fa-play"></i></div>
				</a>
			</div>
		<?php } else { ?>
			<div class="post-video">
				<?php echo apply_filters( "the_content", wp_specialchars_decode( $benedicta_post_video_embed ) ); ?>
			</div>
		<?php } ?>
	<?php } ?>