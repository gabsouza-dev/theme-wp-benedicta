<?php 

global $post;

$benedicta_featured_image_url 	= wp_get_attachment_url(get_post_thumbnail_id());
$benedicta_post_link 			= get_post_meta($post->ID, 'benedicta_post_link', true);
?>

	<div class="post-link">
		<div class="featured_img_bg" 
			<?php if(!empty($benedicta_featured_image_url)) { ?>
				style="background-image:url(<?php echo esc_url( $benedicta_featured_image_url ); ?>);"
			<?php } ?>
		></div>
		<div class="post_link_wrap text-center">
			<i class="fa fa-link"></i>
			<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'benedicta'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php echo the_title(); ?></a></h4>
			<?php if(!empty($benedicta_post_link)) { echo '<a class="post_link" href="' . esc_url( $benedicta_post_link ) . '">' . esc_attr( $benedicta_post_link ) . '</a>'; } ?>
		</div>
	</div>