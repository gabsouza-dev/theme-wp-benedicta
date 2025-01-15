<?php
/**
 * The portfolio post content
 */

global $post;

$excerpt_count = 70;
$img_size = 'full';
if( isset( $style ) ) {
	if( $style == 'grid_card' ) {
		if( $thumb_size_2x ) {
			$img_size = 'benedicta_570x510';
		} else {
			if( $columns == 'col2' ) {
				$img_size = 'benedicta_570x510';
				$excerpt_count = 110;
			} elseif( $columns == 'col3' ) {
				$img_size = 'benedicta_370x310';
			} elseif( $columns == 'col4' ) {
				$img_size = 'benedicta_270x220';
			} elseif( $columns == 'col5' ) {
				$img_size = 'benedicta_210x200';
			}
		}
	} else if ( $style == 'masonry_card' ) {
		if( $thumb_size_2x ) {
			$img_size = 'benedicta_570x9999';
		} else {
			if( $columns == 'col2' ) {
				$img_size = 'benedicta_570x9999';
			} elseif( $columns == 'col3' ) {
				$img_size = 'benedicta_370x9999';
			} elseif( $columns == 'col4' ) {
				$img_size = 'benedicta_270x9999';
			} elseif( $columns == 'col5' ) {
				$img_size = 'benedicta_210x9999';
			}
		}
	}
}
$attachment_title = get_the_title();
$benedicta_portfolio_category = get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
$text = wp_strip_all_tags(do_shortcode(get_the_content()));
$excerpt = benedicta_smarty_modifier_truncate($text, $excerpt_count);
?>
 
		<div class="portfolio_content_wrapper">
			<?php if( has_post_thumbnail() ) { ?>
				<div class="portfolio_format_content">
					<a href="<?php the_permalink(); ?>">
						<span class="portfolio_meta_category"><?php echo strip_tags( $benedicta_portfolio_category ); ?></span>
						<?php the_post_thumbnail( $img_size ); ?>
					</a>
				</div>
			<?php } ?>
			<div class="portfolio_descr_wrap">
				<h2 class="portfolio_title"><a href="<?php the_permalink(); ?>"><?php echo esc_html( $attachment_title ); ?></a></h2>
				<div class="portfolio_content">
					<?php echo esc_html( $excerpt ); ?>
				</div>
			</div>
		</div>