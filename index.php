<?php
/**
 * The main template file
 */

get_header();

$benedicta_sidebar_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_layout') : 'right-sidebar';
if( $benedicta_sidebar_layout == 'left-sidebar' ) {
	$benedicta_sidebar_class = 'pull-left ';
	$benedicta_blog_list_wrap_class = 'left_sidebar has_sidebar ';
	$benedicta_blog_list_class = 'col-lg-8 col-md-9 col-sm-12 pull-right';
} elseif( $benedicta_sidebar_layout == 'right-sidebar' ) {
	$benedicta_sidebar_class = 'pull-right';
	$benedicta_blog_list_wrap_class = 'right_sidebar has_sidebar ';
	$benedicta_blog_list_class = 'col-lg-8 col-md-9 col-sm-12 pull-left ';
} else {
	$benedicta_sidebar_class = $benedicta_blog_list_class = '';
	$benedicta_blog_list_wrap_class = 'no_sidebar ';
}
?>
		
		<div id="blog_list" class="container default mt0 <?php echo esc_html( $benedicta_blog_list_wrap_class ); ?>">
			<div class="row">
			
			<?php
			if( $benedicta_sidebar_layout != 'no-sidebar' ) {
			echo '
				<div class="' . esc_html( $benedicta_blog_list_class ) . '">
					<div class="row">
				';
			}
			?>

						<?php
							while (have_posts()) {
								the_post();
						?>
								
								<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
									
									<?php get_template_part('templates/blog/loop'); ?>
									
								</article>
								
						<?php 
							}
						?>
					
			<?php
			if( $benedicta_sidebar_layout != 'no-sidebar' ) {
			echo '
					</div>';
					
					echo benedicta_pagination( $pages = '' );
					
				echo '
				</div>
				';
			}
			?>
				
				<?php if( $benedicta_sidebar_layout != 'no-sidebar' ) { ?>
					<div class="col-lg-4 col-md-3 col-sm-12 <?php echo esc_html( $benedicta_sidebar_class ); ?>">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
				
				<?php if( $benedicta_sidebar_layout == 'no-sidebar' ) { ?>
					<?php echo benedicta_pagination( $pages = '' ); ?>
				<?php } ?>
				
			</div>
			
		</div>

<?php get_footer(); ?>