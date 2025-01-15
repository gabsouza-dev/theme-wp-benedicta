<?php

global $post;

$benedicta_single_post_related_posts_title = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('single_post_related_posts_title') : esc_html__('Related Posts', 'benedicta');
?>
	
	<?php
		
		$categories = get_the_category($post->ID);

		if ($categories) {

			$category_ids = array();

			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
			
			$args = array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page' => 3,
				'ignore_sticky_posts' => 1,
				'orderby' => 'rand'
			);
		
	?>
	
				<div id="related_posts_list">
					
					<?php if ( !empty( $benedicta_single_post_related_posts_title ) ) { ?>
						<h4><?php echo esc_attr( $benedicta_single_post_related_posts_title ); ?></h4>
					<?php } ?>
					
					<div class="row">

						<?php

							$my_query = new WP_Query($args);
							
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post();
									
									$attachment_title = get_the_title();
									
									echo '
										<div class="item col-md-4">
											<div class="posts_carousel_wrap clearfix">';
												if( has_post_thumbnail() ) {
													echo '<div class="post_format_content"><a href="' . get_permalink() . '">';
														the_post_thumbnail('benedicta_370x270');
													echo '</a></div>';
												}
											echo '
											</div>
											<div class="posts_carousel_content">
												<span class="post-meta-date">' . get_the_time( get_option( 'date_format' ) ) . '</span>
												<h5 class="post-title"><a href="' . get_permalink() . '">' . esc_html( $attachment_title ) . '</a></h5>
												' . benedicta_comment_count() . '
											</div>
										</div>
									';
									
								endwhile;
								
								wp_reset_postdata();
							}
				
						?>

					</div>
				</div>
				
		<?php } ?>