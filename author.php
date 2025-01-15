<?php
/**
 * The template for displaying Author Archive pages
 */
 
get_header(); ?>

		<div id="author_posts_page">
			
			<?php if ( have_posts() ) : the_post(); ?>
				
				<div id="blog_list" class="container masonry_card_min col3">
					<div class="row">
						<div class="isotope_container_wrap">
							<div class="isotope-container">
						
								<?php while ( have_posts() ) : the_post(); ?>

									<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
									
										<?php get_template_part('templates/blog/loop-card_min'); ?>
										
									</article>

								<?php endwhile; ?>
								
								<?php wp_reset_postdata(); ?>
						
							</div>
						</div>
					</div>
					<div class="text-center">
						<?php echo benedicta_pagination( $pages = '' ); ?>
					</div>
				</div>
				
			<?php endif; ?>

		</div>

<?php get_footer(); ?>