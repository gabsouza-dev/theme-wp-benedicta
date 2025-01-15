<?php

$benedicta_authordesc = get_the_author_meta( 'description' );
?>

	<?php if ( ! empty ( $benedicta_authordesc ) ) { ?>
	
		<div id="author-info" class="clearfix">
			<div class="author-image">
				<a class="author-avatar" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '60', '' ); ?></a>
			</div>
			<div class="author_descr">
				<h5 class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></h5>
				<p><?php echo the_author_meta('description'); ?></p>
			</div>
		</div>
		
	<?php } ?>