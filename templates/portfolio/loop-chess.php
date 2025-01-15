<?php
/**
 * The portfolio post content
 */

global $post;

$attachment_title = get_the_title();
$text = wp_strip_all_tags(do_shortcode(get_the_content()));
$excerpt = benedicta_smarty_modifier_truncate($text, 90);
$benedicta_portfolio_category = get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
?>
 
		<div class="portfolio_content_wrapper clearfix">
			<?php if( has_post_thumbnail() ) { ?>
				<div class="col-md-7 col-sm-6 portfolio_format_content">
					<a href="<?php the_permalink(); ?>">
						<span class="portfolio_meta_category"><?php echo strip_tags( $benedicta_portfolio_category ); ?></span>
						<?php the_post_thumbnail('benedicta_685x9999'); ?>
					</a>
				</div>
			<?php } ?>
			<div class="col-md-5 col-sm-6 portfolio_descr_wrap">
				<h2 class="portfolio_title"><a href="<?php the_permalink( $post->ID ); ?>"><?php echo esc_html( $attachment_title ); ?></a></h2>
				<div class="portfolio_content">
					<?php echo esc_html( $excerpt ); ?>
				</div>
				<a class="post_content_readmore" href="<?php echo get_permalink(); ?>"><?php echo esc_html__('Read more', 'benedicta'); ?><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg></a>
				<div class="portfolio_descr_overlay"></div>
			</div>
		</div>