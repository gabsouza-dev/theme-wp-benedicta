<?php 

global $post;

$benedicta_featured_image_url 		= wp_get_attachment_url(get_post_thumbnail_id());
$benedicta_post_quote_text 			= get_post_meta($post->ID, 'benedicta_post_quote_text', true);
$benedicta_post_quote_author 		= get_post_meta($post->ID, 'benedicta_post_quote_author', true);
$benedicta_post_quote_author_position = get_post_meta($post->ID, 'benedicta_post_quote_author_position', true);
?>

	<div class="post-quote">
		<div class="featured_img_bg" 
			<?php if( !empty( $benedicta_featured_image_url ) ) { ?>
				style="background-image:url(<?php echo esc_url( $benedicta_featured_image_url ); ?>);"
			<?php } ?>
		></div>
		<div class="post_quote_wrap text-center">
			<i class="theme_color">”</i>
			<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'benedicta'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php if(!empty($benedicta_post_quote_text)) { echo esc_attr( $benedicta_post_quote_text ); } else { echo the_title(); } ?></a></h4>
			<p><?php if(!empty($benedicta_post_quote_author)) { echo esc_attr( $benedicta_post_quote_author ); } else { echo get_the_author_meta('display_name'); } ?></p>
			<?php if(!empty($benedicta_post_quote_author_position)) { echo '<span>' . esc_attr( $benedicta_post_quote_author_position ) . '</span>'; } ?>
		</div>
	</div>