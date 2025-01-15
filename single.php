<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();

global $post;

$benedicta_pf = get_post_format();
if (empty( $benedicta_pf )) $benedicta_pf = 'image';

$benedicta_blogsingle_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blogsingle_layout') : 'right-sidebar';

if( $benedicta_blogsingle_layout == 'left-sidebar' ) {
	$benedicta_sidebar_class = 'pull-left ';
	$benedicta_blogsingle_wrap_class = 'left_sidebar ';
	$benedicta_blogsingle_class = 'col-lg-8 col-md-9 col-sm-12 pull-right mb100 ';
} elseif( $benedicta_blogsingle_layout == 'right-sidebar' ) {
	$benedicta_sidebar_class = 'pull-right';
	$benedicta_blogsingle_wrap_class = 'right_sidebar ';
	$benedicta_blogsingle_class = 'col-lg-8 col-md-9 col-sm-12 pull-left mb100 ';
} else {
	$benedicta_sidebar_class = $benedicta_blogsingle_class = '';
	$benedicta_blogsingle_wrap_class = 'no_sidebar ';
}

$benedicta_post_single_style = get_post_meta( $post->ID, 'benedicta_post_single_style', true );
$benedicta_single_post_author = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('single_post_author') : 1;
$benedicta_single_post_navigation = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('single_post_navigation') : 1;
$benedicta_single_post_related_posts = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('single_post_related_posts') : 1;
$benedicta_blog_element_author = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_element_author') : '1';
?>
		
	<div class="container">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="blog-single-wrap" class="<?php echo 'format-' . esc_html( $benedicta_pf ) . ' ' . esc_html( $benedicta_blogsingle_wrap_class ) . ' ' . esc_html( $benedicta_post_single_style ); ?> clearfix">
				
				<?php if( $benedicta_post_single_style == 'fullscreen' ) { ?>
					
					<?php if( $benedicta_blogsingle_layout != 'no-sidebar' ) { ?>
						<div class="row">
							<div class="<?php echo esc_html( $benedicta_blogsingle_class ); ?>">
						<?php } ?>
								
								<?php if( $benedicta_pf != 'image' && $benedicta_pf != 'standard' ) { ?>
									<div class="post_format_content text-center">
										<?php get_template_part( 'templates/blog/post-format/post', $benedicta_pf ); ?>
									</div>
								<?php } ?>

								<div class="single-post-content clearfix">
									
									<?php
										the_content( esc_html__('Read more!', 'benedicta'));
										
										wp_link_pages( array(
											'before'      => '<div class="page-links mb20">' . esc_html__( 'Pages:', 'benedicta' ),
											'after'       => '</div>',
											'link_before' => '<span class="page-number">',
											'link_after'  => '</span>',
										) );
									?>
									
								</div>
								
								<div class="posts_nav_link"><?php posts_nav_link(); ?></div>
								
								<div class="single_post_meta_tags">
									<?php if( has_tag() ) {
										the_tags('','', '');
									} ?>
								</div>
							
						<?php if( $benedicta_blogsingle_layout != 'no-sidebar' ) { ?>
							</div>
							
							<div class="col-lg-4 col-md-3 col-sm-12 <?php echo esc_html( $benedicta_sidebar_class ); ?>">
								<?php get_sidebar(); ?>
							</div>
						</div>
					<?php } ?>
					
					<?php if( $benedicta_single_post_author != 0 ) {
						get_template_part( 'templates/blog/authorinfo' );
					} ?>
					
					<?php if( $benedicta_single_post_navigation != 0 ) {
						get_template_part( 'templates/blog/single-post-nav' );
					} ?>
				
					<?php if( $benedicta_single_post_related_posts != 0 ) {
						get_template_part('templates/blog/related-posts');
					} ?>
					
					<?php 
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					
				<?php } else { ?>
				
					<?php if( $benedicta_blogsingle_layout != 'no-sidebar' ) { ?>
						<div class="row">
							<div class="<?php echo esc_html( $benedicta_blogsingle_class ); ?>">
						<?php } ?>
							
								<div class="single_post_header">
									<h2 class="single-post-title"><?php the_title(); ?></h2>
									<div class="clearfix">
										<div class="post-meta pull-left">
											<?php if( $benedicta_blog_element_author != 0 ) { ?>
												<span class="post-meta-author"><?php echo esc_attr__('by','benedicta'); ?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a></span>
											<?php } ?>
											<span class="post_meta_category"><?php echo esc_attr__('in','benedicta'); ?><?php the_category(', '); ?></span>
											<span class="post-meta-date"><?php echo esc_attr__('posted on','benedicta'); ?><i><?php the_date( get_option( 'date_format' ) ); ?></i></span>
										</div>
										<div class="pull-right">
											<span class="post-meta-comments"><i class="icon Evatheme-Icon-Fonts-thin-0274_chat_message_comment_bubble"></i><?php echo get_comments_number('0', '1', '%'); ?></span>
										</div>
									</div>
								</div>
								
								<div class="post_format_content text-center">
									<?php get_template_part( 'templates/blog/post-format/post', $benedicta_pf ); ?>
								</div>

								<div class="single-post-content clearfix">
									
									<?php
										the_content(esc_html__('Read more!', 'benedicta'));
										
										wp_link_pages( array(
											'before'      => '<div class="page-links mb20">' . esc_html__( 'Pages:', 'benedicta' ),
											'after'       => '</div>',
											'link_before' => '<span class="page-number">',
											'link_after'  => '</span>',
										) );
									?>
									
								</div>
								
								<div class="posts_nav_link"><?php posts_nav_link(); ?></div>
								
								<div class="single_post_meta_tags">
									<?php if( has_tag() ) {
										the_tags('','', '');
									} ?>
								</div>
								
								<?php if( $benedicta_single_post_author != 0 ) {
									get_template_part( 'templates/blog/authorinfo' );
								} ?>
								
								<?php if( $benedicta_single_post_navigation != 0 ) {
									get_template_part( 'templates/blog/single-post-nav' );
								} ?>
							
								<?php if( $benedicta_single_post_related_posts != 0 ) {
									get_template_part('templates/blog/related-posts');
								} ?>
								
								<?php 
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
						
						<?php if( $benedicta_blogsingle_layout != 'no-sidebar' ) { ?>
							</div>
							
							<div class="col-lg-4 col-md-3 col-sm-12 <?php echo esc_html( $benedicta_sidebar_class ); ?>">
								<?php get_sidebar(); ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
		
	</div>

<?php get_footer(); ?>
