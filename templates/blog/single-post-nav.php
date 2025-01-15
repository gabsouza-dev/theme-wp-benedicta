<?php

$benedicta_prev_post = get_adjacent_post(false, '', true);
$benedicta_next_post = get_adjacent_post(false, '', false);
?>

	<div class="single_post_nav clearfix">
		<?php
			if( $benedicta_prev_post ){
				$benedicta_post_url = get_permalink($benedicta_prev_post->ID);            
				echo '<div class="pull-left"><a href="'. esc_url( $benedicta_post_url ) .'" title="'. esc_attr( $benedicta_prev_post->post_title ) .'"><i></i><span class="heading_font_family">'. esc_html( $benedicta_prev_post->post_title ) .'</span><p>' . esc_html__('Previous','benedicta') . '</p></a></div>';
			}

			if( $benedicta_next_post ) {
				$benedicta_post_url = get_permalink($benedicta_next_post->ID);            
				echo '<div class="pull-right text-right"><a href="'. esc_url( $benedicta_post_url ) .'" title="'. esc_attr( $benedicta_next_post->post_title ) .'"><i></i><span class="heading_font_family">'. esc_html( $benedicta_next_post->post_title ) .'</span><p>' . esc_html__('Next','benedicta') . '</p></a></div>';
			} 
		?>
	</div>