<?php
/**
 * The blog post content
 */

if ( is_author() ) {
	$excerpt_count = 100;
}
$benedicta_post_excerpt = benedicta_smarty_modifier_truncate( get_the_excerpt(), $excerpt_count);
$benedicta_blog_element_author = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_element_author') : '1';
$benedicta_blog_element_comments = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_element_comments') : '1';
$benedicta_blog_comments_count = get_comments_number('0', '1', '%');
?>
			
	<div class="post-content-wrapper">
		<div class="post-descr-wrap clearfix">
			<span class="post_meta_category"><?php the_category(' '); ?></span>
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<div class="post-content clearfix">
				<?php echo esc_html( $benedicta_post_excerpt ); ?>
			</div>
			<div class="clearfix">
				<a class="post_content_readmore pull-left" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__('Read More','benedicta'); ?><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg></a>
				<div class="post-meta pull-right">
					<!-- <?php if( $benedicta_blog_element_author != 0 ) { ?>
						<span class="post-meta-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 0c88.366 0 160 71.634 160 160s-71.634 160-160 160S96 248.366 96 160 167.634 0 256 0zm183.283 333.821l-71.313-17.828c-74.923 53.89-165.738 41.864-223.94 0l-71.313 17.828C29.981 344.505 0 382.903 0 426.955V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48v-37.045c0-44.052-29.981-82.45-72.717-93.134z"></path></svg><?php echo get_the_author_meta('display_name'); ?></a></span>
					<?php } ?> -->
					<?php if( $benedicta_blog_element_comments != 0 ) { ?>
						<span class="post-meta-comments"><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 9.8 11.2 15.5 19.1 9.7L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zM288 264c0 4.4-3.6 8-8 8H136c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm96-96c0 4.4-3.6 8-8 8H136c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16z"></path></svg><?php echo esc_html( $benedicta_blog_comments_count ); ?></span>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>