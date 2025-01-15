<?php

/**
 * Widget Name: List Categories with Thumbnails
 */

if (!class_exists('benedicta_widget_cat_thumbnails')) {
	class benedicta_widget_cat_thumbnails extends WP_Widget {

		function __construct() {
			parent::__construct(
				false,
				esc_html__('Evatheme Categories with Thumbnails', 'benedicta'),
				array(
					'classname' => 'widget_benedicta_cat_thumbnails',
					'description' => esc_html__('Displays your list of post categories with thumbnails', 'benedicta')
				)
			);
		}
	 
		function widget($args, $instance) {
			extract( $args );
			$title 	= apply_filters('widget_title', $instance['title']);
			$number = $instance['number'];

			$args = array(
				'number' 	=> $number,
			);
			
			$cats = get_categories($args);
			
			echo benedicta_sanitize_text_field( $before_widget );
				
			if ( $title ) {
				echo benedicta_sanitize_text_field( $before_title . esc_html( $title ) . $after_title );
			}
					
				echo '<ul>';
					
					foreach( $cats as $cat ) {
		
						if( $cat->slug == 'uncategorized' ) {
							continue;
						}
						
						echo '<li>';
					
							$query = new WP_Query( array(
								'posts_per_page' => 1,
								'cat' => $cat->term_id,
								'meta_query' => array(
									array(
										'key' => '_thumbnail_id',
									),
								),
							) );
							
							if( $query->have_posts() ) {
								$post_id = $query->posts[0]->ID;
							}
							
							$link = get_category_link( $cat->term_id );
							$count = $cat->category_count;
							
							echo '
								<a href="' . esc_url( $link ) . '" class="cat_block ' . esc_attr( $cat->slug ) . '">
									' . get_the_post_thumbnail( $post_id, array(80, 50) ) . '
									<h6>' . esc_attr( $cat->name ) . '</h6>
									<span>' . esc_html( $count ) . ' ' . esc_html__('Posts','benedicta') . '</span>
								</a>
							';
					
						echo '</li>';
						
					}
				echo '</ul>';
				
			echo benedicta_sanitize_text_field( $after_widget );
	
		}
	 
		/** @see WP_Widget::update -- do not rename this */
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = strip_tags($new_instance['number']);
			
			return $instance;
		}

		function form($instance) {
	 
			$title 	= $instance['title'];
			$number	= $instance['number'];
			
			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:','benedicta'); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('number') ); ?>"><?php esc_html_e('Number of categories to display','benedicta'); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
			</p>

			<?php
		}
	 
	 
	}
}