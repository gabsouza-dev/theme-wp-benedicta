<?php
/**
 * The template for displaying pages
 */

get_header(); ?>
		
		<div id="default_page">
			<div class="container">
				<div class="contentarea clearfix">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<?php the_content(esc_html__('Read more!', 'benedicta')); ?>
						
						<?php wp_link_pages(array('before' => '<div class="page-link mb20">' . esc_html__('Pages', 'benedicta') . ': ', 'after' => '</div>')); ?>
						
						<?php 
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
				
					<?php endwhile; ?>
					
					<?php endif; ?>
					
				</div>
			</div>
		</div>

<?php get_footer(); ?>