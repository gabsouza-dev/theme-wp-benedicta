<?php
/**
 * The sidebar containing the main widget area
 */
 
global $post;

$benedicta_sidebar = get_post_meta( $post->ID, 'benedicta_sidebar', true );

if(is_home() || is_singular('post') || is_archive() || is_category() || is_tag() || is_search() || is_day() || is_month() || is_year()) {
	$benedicta_sidebar = 'blog-sidebar';
}

if( benedicta_woo_enabled() && get_post_type() == 'product' ) {
    $benedicta_sidebar = 'shop-sidebar';
}
?>
	<div id="blog_sidebar" class="<?php echo esc_html( $benedicta_sidebar ); ?>">
		
		<?php
			if ( is_active_sidebar( $benedicta_sidebar ) ) {
				dynamic_sidebar( $benedicta_sidebar );
			}
		?>
		
	</div>