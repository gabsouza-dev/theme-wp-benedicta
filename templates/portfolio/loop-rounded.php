<?php
/**
 * The portfolio post content
 */

global $post;

$img_size = 'full';
if( isset( $style ) ) {
	if( $thumb_size_2x ){
		$img_size = 'benedicta_550x570';
	} else {
		if( $columns == 'col2' ) {
			$img_size = 'benedicta_490x510';
		} elseif( $columns == 'col3' ) {
			$img_size = 'benedicta_290x310';
		} elseif( $columns == 'col4' ) {
			$img_size = 'benedicta_190x210';
		} elseif( $columns == 'col5' ) {
			$img_size = 'benedicta_120x140';
		}
	}
}
	
$attachment_title = get_the_title();
$benedicta_portfolio_category = get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
?>
 
		<div class="portfolio_content_wrapper">
			<?php if( has_post_thumbnail() ) { ?>
				<div class="portfolio_format_content">
					<a href="<?php echo esc_url( the_permalink() ); ?>">
						<?php the_post_thumbnail( $img_size ); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 448 512"><path d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>
					</a>
				</div>
			<?php } ?>
			<div class="portfolio_descr_wrap text-center">
				<span class="portfolio_meta_category theme_color"><?php echo strip_tags( $benedicta_portfolio_category ); ?></span>
				<h2 class="portfolio_title"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html( $attachment_title ); ?></a></h2>
			</div>
		</div>