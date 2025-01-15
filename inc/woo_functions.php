<?php 

if ( !function_exists( 'woocommerce_support' ) ) {
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'woocommerce_support' );


/**
 * Hooks to WooCommerce actions, filters
 */

add_filter( 'benedicta_after_single_product_image', 'benedicta_product_thumbnails' );


//	Products Columns
add_filter('loop_shop_columns', 'benedicta_shop_columns');
if (!function_exists('benedicta_shop_columns')) {
	function benedicta_shop_columns() {
		
		if( class_exists( 'ReduxFrameworkPlugin' ) ) {
			if( benedicta_options('shop_columns') == 'col2' ) {
				return 2;
			} else if( benedicta_options('shop_columns') == 'col3' ){
				return 3;
			} else {
				return 4;
			}
		} else {
			return 3;
		}
	}
}


//	Products per page
add_filter( 'loop_shop_per_page', function ( $cols ) {

	$benedicta_products_per_page = ( strlen( benedicta_options('products_per_page') ) > 0 ) ? intval( benedicta_options('products_per_page') ) : 6;
	
	return $benedicta_products_per_page;
}, 20 );


//	Page Title
add_filter('woocommerce_show_page_title', 'benedicta_woo_title_none');
if (!function_exists('benedicta_woo_title_none')) {
	function benedicta_woo_title_none(){
		return false;
	}
}

//	WooCommerce Product Item
add_action('woocommerce_before_shop_loop_item', 'benedicta_before_shop_loop_item',5);
add_action('woocommerce_after_shop_loop_item', 'benedicta_after_shop_loop_item',5);

if ( ! function_exists( 'benedicta_before_shop_loop_item' ) ) {
	function benedicta_before_shop_loop_item() {
		global $woocommerce, $product, $post;
		
		$benedicta_products_list_type = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('products_list_type') : 'type1';
		
		?>
		
		<div class="product_wrap <?php if ( $product->is_on_sale() ) { echo 'product_sale'; } ?> <?php echo 'products_list_' . $benedicta_products_list_type; ?>">

			<?php if( $benedicta_products_list_type == 'type2' ) { ?>
				
				<div class="shop_list_product_image">
					<a href="<?php the_permalink(); ?>">
						<?php 
							echo woocommerce_get_product_thumbnail();
							
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								$secondary_image_id = $attachment_ids['0'];
								echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
							}
						?>
					</a>
					<?php if ( $product->is_on_sale() ) {

						$benedicta_sale_text = esc_attr__( 'Sale', 'benedicta' );
				
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $benedicta_sale_text . '</span>', $post, $product );
						
					} ?>
				</div>
				<div class="shop_list_product_descr">
					<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="product_categories">', '</span>' ); ?>
					<h6 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h6>
					<div class="price_wrap"><?php woocommerce_template_loop_price(); ?></div>
				</div>
			
			<?php } elseif( $benedicta_products_list_type == 'type3' ) { ?>
				
				<div class="shop_list_product_image">
					<a href="<?php the_permalink(); ?>">
						<?php 
							echo woocommerce_get_product_thumbnail();
							
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								$secondary_image_id = $attachment_ids['0'];
								echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
							}
						?>
					</a>
					<?php if ( $product->is_on_sale() ) {

						$benedicta_sale_text = esc_attr__( 'Sale', 'benedicta' );
				
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $benedicta_sale_text . '</span>', $post, $product );
						
					} ?>
					<?php woocommerce_template_loop_add_to_cart(); ?>
				</div>
				<div class="shop_list_product_descr">
					<div class="clearfix">
						<h6 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h6>
						<?php woocommerce_template_loop_price(); ?>
					</div>
					<?php woocommerce_template_loop_rating(); ?>
				</div>
			
			<?php } elseif( $benedicta_products_list_type == 'type4' ) { ?>
				
				<div class="shop_list_product_image">
					<a href="<?php the_permalink(); ?>">
						<?php 
							echo woocommerce_get_product_thumbnail();
							
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								$secondary_image_id = $attachment_ids['0'];
								echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
							}
						?>
					</a>
					<?php if ( $product->is_on_sale() ) {

						$benedicta_sale_text = esc_attr__( 'Sale', 'benedicta' );
				
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $benedicta_sale_text . '</span>', $post, $product );
						
					} ?>
					<?php woocommerce_template_loop_add_to_cart(); ?>
				</div>
				<div class="shop_list_product_descr text-center">
					<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="product_categories">', '</span>' ); ?>
					<h6 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h6>
					<?php woocommerce_template_loop_price(); ?>
				</div>
				
			<?php } elseif( $benedicta_products_list_type == 'type5' ) { ?>
				
				<div class="shop_list_product_image">
					<a href="<?php the_permalink(); ?>">
						<?php 
							echo woocommerce_get_product_thumbnail();
							
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								$secondary_image_id = $attachment_ids['0'];
								echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
							}
						?>
					</a>
					<?php if ( $product->is_on_sale() ) {

						$benedicta_sale_text = esc_attr__( 'Sale', 'benedicta' );
				
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $benedicta_sale_text . '</span>', $post, $product );
						
					} ?>
				</div>
				<div class="shop_list_product_descr">
					<h6 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h6>
					<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="product_categories">', '</span>' ); ?>
					<?php woocommerce_template_loop_price(); ?>
				</div>
				
			<?php } else { ?>
				
				<div class="shop_list_product_image">
					<a href="<?php the_permalink(); ?>">
						<?php 
							echo woocommerce_get_product_thumbnail();
							
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								$secondary_image_id = $attachment_ids['0'];
								echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
							}
						?>
					</a>
					<?php if ( $product->is_on_sale() ) {

						$benedicta_sale_text = esc_attr__( 'Sale', 'benedicta' );
				
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $benedicta_sale_text . '</span>', $post, $product );
						
					} ?>
				</div>
				<div class="shop_list_product_descr">
					<h6 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h6>
					
					<?php woocommerce_template_loop_rating(); ?>
					
					<div class="clearfix">
						<span class="price"><?php woocommerce_template_loop_price(); ?></span>
						
						<?php woocommerce_template_loop_add_to_cart(); ?>
					</div>
				</div>
				
			<?php } ?>

			<div class="hide">
			<?php
	}
}

if ( ! function_exists( 'benedicta_after_shop_loop_item' ) ) {
	function benedicta_after_shop_loop_item() {
		?>
			</div>
		</div>
		<?php
	}
}


// Custom Shop Pagination
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'benedicta_get_shop_pagination', 10);
if (!function_exists('benedicta_get_shop_pagination')) {	
	function benedicta_get_shop_pagination() {
		echo benedicta_pagination();
	}
}


/* Change Positions */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing',50);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);	
add_action('woocommerce_single_product_summary', 'benedicta_woocommerce_template_single_meta', 50);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 60);


/* Product Single Share Buttons */
add_action('woocommerce_share','benedicta_wooshare');
function benedicta_wooshare(){
	
	global $post;

	if ( benedicta_options('shop_single_share') != 1 ) {
		return false;
	}

	$benedicta_featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );
?>
	
	<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
		<div class="cswoo_sharebox">
			<b><?php echo esc_attr__( 'Share', 'benedicta' ); ?></b>
			<div class="cswoo_sharebox_links">
				<a class="cswoo_social_link facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="<?php echo esc_attr__( 'Facebook', 'benedicta') ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
				
				<a class="cswoo_social_link twitter" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" title="<?php echo esc_attr__( 'Twitter', 'benedicta') ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
				
				<a class="cswoo_social_link google-plus" href="http://plus.google.com/share?url=<?php the_permalink() ?>&amp;title=<?php echo str_replace(' ', '+', the_title('', '', false)); ?>" title="<?php echo esc_attr__( 'Google+', 'benedicta') ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
				
				<a class="cswoo_social_link pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen($benedicta_featured_image_url[0]) > 0) ? $benedicta_featured_image_url[0] : get_option( 'benedicta_logo' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-pinterest-p"></i></a>
			</div>
		</div>
	<?php } ?>
	
<?php
}


/* Related Products on Single page */
add_filter( 'woocommerce_output_related_products_args', 'benedicta_related_products_args' );
function benedicta_related_products_args( $args ) {
	
	$args['posts_per_page'] = 4;
	
	return $args;
}


//	Single Meta
function benedicta_woocommerce_template_single_meta(){
	global $post, $product;
	
	?>
	<div class="product_meta">

		<?php do_action( 'woocommerce_product_meta_start' ); ?>

		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

			<span class="sku_wrapper"><b><?php echo esc_attr__( 'SKU', 'benedicta' ); ?></b><span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_attr__( 'N/A', 'benedicta' ); ?></span></span>

		<?php endif; ?>

		<?php if( count( $product->get_category_ids() ) > 0 ){ ?>
			<span class="posted_in"><b><?php echo esc_attr__( 'Categories', 'benedicta' ); ?></b><?php echo wc_get_product_category_list( $product->get_id(), ', ' ); ?></span>
		<?php } ?>
		
		<?php if( count( $product->get_tag_ids() ) > 0 ){ ?>
			<span class="tagged_as"><b><?php echo esc_attr__( 'Tags', 'benedicta' ); ?></b><?php echo wc_get_product_tag_list( $product->get_id(), ', ' ); ?></span>
		<?php } ?>

		<?php do_action( 'woocommerce_product_meta_end' ); ?>

	</div>
<?php }


//	Nav Cart Icon
if(!function_exists('benedicta_woo_nav_cart')) {
	function benedicta_woo_nav_cart() {
		global $woocommerce;
	
		$inactive = '';
		$cart_count = $woocommerce->cart->get_cart_contents_count();
		?>
	
		<div id="woo-nav-cart">
			<div class="nav-cart-content">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 50.613 50.613" xml:space="preserve"><path d="M49.569,11.145H20.055c-0.961,0-1.508,0.743-1.223,1.661l4.669,13.677c0.23,0.738,1.044,1.336,1.817,1.336h19.35 c0.773,0,1.586-0.598,1.814-1.336l4.069-14C50.783,11.744,50.344,11.145,49.569,11.145z"/><circle cx="22.724" cy="43.575" r="4.415"/><circle cx="41.406" cy="43.63" r="4.415"/><path d="M46.707,32.312H20.886L10.549,2.568H2.5c-1.381,0-2.5,1.119-2.5,2.5s1.119,2.5,2.5,2.5h4.493L17.33,37.312h29.377 c1.381,0,2.5-1.119,2.5-2.5S48.088,32.312,46.707,32.312z"/></svg>
				<?php if( $cart_count > 0 ) { ?>
					<span class="woo-cart-count"><?php echo esc_attr( $cart_count ); ?></span>
				<?php } ?>
			</div>
			<div class="nav-cart-products <?php if( $cart_count < 1 ) { echo 'cart_empty';} ?>">
				<div class="widget_shopping_cart"><div class="widget_shopping_cart_content"></div></div>				
			</div>
		</div>
	
	<?php 
	}
}


/**
 * Get product thumnails
 *
 * @since  1.0.0
 * @return string
 */
function benedicta_product_thumbnails() {
	global $post, $product, $woocommerce;

	$attachment_ids = $product->get_gallery_image_ids();

	if ( $attachment_ids ) {
		
		?>
		<div class="product-thumbnails" id="product-thumbnails">
			<div class="thumbnails"><?php

				$image_thumb = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );

				if ( $image_thumb ) {

					printf(
						'<div>%s</div>',
						$image_thumb
					);

				}

				if ( $attachment_ids ) {
					foreach ( $attachment_ids as $attachment_id ) {

						$props = wc_get_product_attachment_props( $attachment_id, $post );

						if ( ! $props['url'] ) {
							continue;
						}

						echo apply_filters(
							'woocommerce_single_product_image_thumbnail_html',
							sprintf(
								'<div>%s</div>',
								wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $props )
							),
							$attachment_id,
							$post->ID
						);
					}
				}

				?>
			</div>
		</div>
		<?php
	}

}


// Breadcrumbs
add_filter( 'woocommerce_breadcrumb_defaults', 'benedicta_change_breadcrumb_delimiter' );
function benedicta_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = '<span class="sep"><i class="fa fa-chevron-right"></i></span>';
	return $defaults;
}