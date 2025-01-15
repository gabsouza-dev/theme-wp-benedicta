<?php
/**
 * The template for displaying products
 */

get_header();

$benedicta_shop_class = '';

$benedicta_shop_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('shop_layout') : 'right-sidebar';
if( $benedicta_shop_layout == 'left-sidebar' ) {
	$benedicta_sidebar_class = 'pull-left ';
	$benedicta_shop_class .= 'left_sidebar ';
	$benedicta_shop_list_class = 'col-md-9 pull-right';
} elseif( $benedicta_shop_layout == 'right-sidebar' ) {
	$benedicta_sidebar_class = 'pull-right';
	$benedicta_shop_class .= 'right_sidebar ';
	$benedicta_shop_list_class = 'col-md-9 pull-left ';
} else {
	$benedicta_sidebar_class = $benedicta_shop_list_class = '';
	$benedicta_shop_class .= 'no_sidebar ';
}

$benedicta_shop_columns = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('shop_columns') : 'col3';
$benedicta_shop_class .= $benedicta_shop_columns . ' ';
?>

		<div id="products_list" class="container <?php echo esc_html( $benedicta_shop_class ); ?>">
			
			<?php
			if( $benedicta_shop_layout != 'no-sidebar' && !is_product() ) {
			echo '
				<div class="row">
					<div class="' . esc_html( $benedicta_shop_list_class ) . '">';
			}
			?>

						<div class="shop_wrap clearfix">
				
							<?php woocommerce_content(); ?>
						
						</div>
					
			<?php
			if( $benedicta_shop_layout != 'no-sidebar' && !is_product() ) {
			echo '</div>';
			}
			?>
				
			<?php if( $benedicta_shop_layout != 'no-sidebar' && !is_product() ) { ?>
					<div class="col-md-3 <?php echo esc_html( $benedicta_sidebar_class ); ?>">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php } ?>
			
		</div>

<?php get_footer(); ?>