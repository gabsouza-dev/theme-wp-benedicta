<?php

global $post;

$benedicta_postid = get_the_ID();
$gallery_image_ids = get_post_meta($post->ID, 'gallery_image_ids', true);

if (!empty($gallery_image_ids)) {
	$benedicta_posts_image_gallery = get_post_meta($benedicta_postid, 'gallery_image_ids', true);
} else {
	// Backwards compat
	$attachment_ids = get_posts('post_parent=' . $benedicta_postid . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
	$attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
	$benedicta_posts_image_gallery = implode(',', $attachment_ids);
}

$attachments = array_filter(explode(',', $benedicta_posts_image_gallery));

    if ($attachments) {
        echo '<div class="post-slider owl-carousel clearfix">';
			foreach ($attachments as $attachment) {
				$img_url = wp_get_attachment_image_src( $attachment, 'post-thumbnail');
				$thumb_url = $img_url[0];
				$attachment_title = get_post_meta($attachment, '_wp_attachment_image_alt', true);
				?>
				<div class="item">
					<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $attachment_title ); ?>" />
				</div>
			<?php  }
        echo '</div>';
    }
?>