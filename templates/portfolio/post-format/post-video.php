<?php

$benedicta_posrtfolio_single_iframe = get_post_meta( $post->ID, 'benedicta_posrtfolio_single_iframe', true );
?>

		<div class="portfolio_video">
			<?php echo apply_filters("the_content", wp_specialchars_decode( $benedicta_posrtfolio_single_iframe )) ?>
		</div>