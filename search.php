<?php
/**
 * The template for displaying search results pages.
 */

get_header();

global $post;
?>

		<div id="search_result_list">
			<div class="container">
				<?php if (have_posts ()) { ?>
				
					<div class="row">

						<?php while (have_posts ()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-sm-4'); ?>>
								<div class="post-content-wrapper clearfix">
									<div class="post-descr-wrap clearfix">
										<span class="post_type"><?php echo ucfirst( get_post_type( $post->ID ) ); ?></span>
										<h2 class="post-title">
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'benedicta'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php
													$title = wp_strip_all_tags(do_shortcode(get_the_title()));
													echo benedicta_smarty_modifier_truncate($title, 30);
												?>
											</a>
										</h2>
										<div class="post-content">
											<?php
												$text = wp_strip_all_tags(do_shortcode(get_the_content()));
												echo benedicta_smarty_modifier_truncate($text, 100);
											?>
										</div>
									</div>
								</div>
							</article>

						<?php endwhile; ?>
				
						<?php wp_reset_postdata(); ?>

					</div>
				
				<?php benedicta_pagination(); ?>
				
				<?php } else { ?>
				
					<div id="error404-container" class="container text-center">
						<h4 class="error404"><?php esc_html_e('Sorry, but nothing matched your search criteria.', 'benedicta');?><br><?php esc_html_e('Please try again with some different keywords.', 'benedicta');?></h4>
						<?php get_search_form(); ?>
					</div>
					
				<?php } ?>
			</div>
		</div>

<?php get_footer(); ?>