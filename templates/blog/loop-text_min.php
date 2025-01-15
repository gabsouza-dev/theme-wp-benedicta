<?php
/**
 * The blog post content
 */

global $post;

$benedicta_post_excerpt = benedicta_smarty_modifier_truncate(get_the_excerpt(), $excerpt_count);
$benedicta_comment_count = get_comments_number('0', '1', '%');
?>
 
			<div class="post-content-wrapper">
				<div class="post-descr-wrap clearfix text-center">
					<div class="post-meta">
						<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'benedicta'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="post-content clearfix">
						<p><?php echo esc_html( $benedicta_post_excerpt ); ?></p>
					</div>
					<div class="clearfix">
						<a class="post_content_readmore" href="<?php echo get_permalink(); ?>"><?php echo esc_html__('Read More','benedicta'); ?><svg aria-hidden="true" data-prefix="far" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-right fa-w-14"><path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z" class=""></path></svg></a>
					</div>
				</div>
			</div>