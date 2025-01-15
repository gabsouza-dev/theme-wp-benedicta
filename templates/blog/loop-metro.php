<?php
/**
 * The blog post content
 */

global $post;

$img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$thumb_url = $img_url[0];
$metro_sizing = get_post_meta( $post->ID, 'benedicta_metro', true );
$attachment_title = get_the_title();
?>
 
	<div class="post-content-wrapper">
		<?php if (!empty( $thumb_url )) { ?>
			<div class="featured_img_bg" style="background-image:url(<?php echo esc_url( $thumb_url ); ?>);"></div>
		<?php } ?>
		<div class="post-descr-wrap">
			<span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ) ?></span>
			<h2 class="post-title"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html( $attachment_title ); ?></a></h2>
			<a class="read_more" href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html__('Read More','benedicta') ?></a>
		</div>
	</div>