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
			$img_size = 'benedicta_270x180';
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
			$img_size = 'benedicta_370x9999';
		}
	}
}

?>
	
	<?php if( has_post_thumbnail() ) { ?>
		<div class="post-image">
			<?php if ( !is_single() ) { ?>
				<a href="<?php echo esc_url( the_permalink() ); ?>">
			<?php } ?>
				<?php the_post_thumbnail( $img_size ); ?>
			<?php if ( !is_single() ) { ?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>