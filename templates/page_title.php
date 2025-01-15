<?php
/**
 * Page Title
 */

	global $post, $wp_query;
	
	$benedicta_postId = ( isset( $post->ID ) ? get_the_ID() : NULL );
	
	$benedicta_pagetitle_class = ' text-center';
	
	/* If Single Post Fullscreen */
	$benedicta_post_single_style = get_post_meta( $benedicta_postId, 'benedicta_post_single_style', true );
	if ( is_singular('post') && $benedicta_post_single_style == 'fullscreen' ) {
		$benedicta_pagetitle_class .= ' pagetitle_fullscreen';
	}
	
	$benedicta_options_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('pagetitle') : 'show';
	$benedicta_pagetitle = ( get_post_meta( $benedicta_postId, 'benedicta_pagetitle', true ) ? get_post_meta( $post->ID, 'benedicta_pagetitle', true ) : $benedicta_options_pagetitle );
	if ( is_home() || is_search() || is_category() || is_tag() || is_day() || is_month() || is_year() ) {
		$benedicta_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_pagetitle') : 'show';
	} else if ( is_singular('post') ) {
		if ( $benedicta_post_single_style != 'fullscreen' ) {
			$benedicta_pagetitle = 'hide';
		} else {
			$benedicta_pagetitle = 'show';
		}
	} else if ( is_singular('portfolio') ) {
		$benedicta_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_single_pagetitle') : 'hide';
	} else if( class_exists('WooCommerce') && ( is_shop() || is_product_category() || is_product_tag() || is_cart() || is_checkout() || is_account_page() ) ) {
		$benedicta_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('shop_pagetitle') : 'show';
	} else if( class_exists('WooCommerce') && is_singular('product') ) {
		$benedicta_pagetitle = 'hide';
	} else if ( is_404() ) {
		$benedicta_pagetitle = 'hide';
	}
	
	
	$benedicta_pagetitle_text			= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_text', true );
	$benedicta_blog_pagetitle_text		= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_pagetitle_text') : esc_html__('Recent Posts', 'benedicta');
	$benedicta_pagetitle_subtext		= get_post_meta( $benedicta_postId, 'benedicta_pagetitle_subtext', true );
	$benedicta_blog_pagetitle_subtext	= class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_pagetitle_subtext') : '';


	if ( $benedicta_pagetitle_subtext != '' ) {
		$benedicta_pagetitle_subtext = $benedicta_pagetitle_subtext;
	} else if ( ( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('blog_pagetitle_subtext') != '' ) && ( is_home() ) ) {
		$benedicta_pagetitle_subtext = $benedicta_blog_pagetitle_subtext;
	} elseif ( is_search() ) {
		$benedicta_pagetitle_subtext = '';
	}
	
	if ( $benedicta_pagetitle_text != '' ) {
		$benedicta_pagetitle_text = $benedicta_pagetitle_text;
	} else if ( is_home() ) {
		$benedicta_pagetitle_text = $benedicta_blog_pagetitle_text;
	} else if ( is_front_page() ) {
		$benedicta_pagetitle_text = get_the_title();
	} else if ( is_singular('portfolio') ) {
		if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('portfolio_single_pagetitle') != 'hide' ) {
			$benedicta_pagetitle_text = get_the_title();
		}
	} else if( class_exists('WooCommerce') && is_shop() ) {
		if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('shop_pagetitle_subtext') != '' ){
			$benedicta_pagetitle_subtext = benedicta_options('shop_pagetitle_subtext');
		}
		if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('shop_pagetitle_text') != '' ){
			$benedicta_pagetitle_text  = benedicta_options('shop_pagetitle_text');
		}
	} else if (is_category()) {
		$benedicta_pagetitle_text = esc_html__( 'Category Archive for :', 'benedicta' ) . ' &#8216;' . single_cat_title( '', false ) . '&#8217;';
	} else if( is_tag() ) {
		$tag_id = get_queried_object_id();
		$tag = get_tag($tag_id);
		$benedicta_pagetitle_text = esc_html__( 'Posts Tagged', 'benedicta' ) . ' &#8216;' . $tag->name . '&#8217;';
	} else if( is_search() ) {
		$benedicta_pagetitle_text = $wp_query->found_posts . ' ' . esc_html__( 'search results for', 'benedicta' ) . ': \'' . esc_html( get_search_query() ) . '\'';
	} else if ( is_day() || is_month() || is_year() ) {
		$benedicta_pagetitle_text = esc_html__( 'Archive for', 'benedicta' ) . ' ' . get_the_time( get_option( 'date_format' ) );
	} else if ( is_author() ) {
		$benedicta_pagetitle_text = esc_html__( 'Author Archive', 'benedicta' );
	} else if ( is_404() ) {
		$benedicta_pagetitle_text = '';
		$benedicta_pagetitle_subtext = '';
	} else if (isset($_GET['paged']) && !empty($_GET['paged'])) {
		$benedicta_pagetitle_text = esc_html__( 'Blog Archives', 'benedicta' );
	} else {
		$benedicta_pagetitle_text = get_the_title();
	}
	
	/* Parallax Effect */
	$benedicta_pagetitle_bg_image_parallax = $benedicta_pagetitle_bg_image_parallax_theme = $benedicta_pagetitle_bg_image_parallax_page = '';
	$benedicta_pagetitle_bg_image_parallax_theme = get_post_meta( $benedicta_postId, 'benedicta_pagetitle_bg_image_parallax', true );
	if( class_exists( 'ReduxFrameworkPlugin' ) ){
		$benedicta_pagetitle_bg_image_parallax_page 	= benedicta_options('pagetitle_bg_image_parallax');
	}
	$benedicta_pagetitle_bg_image_parallax = ! empty( $benedicta_pagetitle_bg_image_parallax_theme ) ? $benedicta_pagetitle_bg_image_parallax_theme : $benedicta_pagetitle_bg_image_parallax_page;
	if ( $benedicta_pagetitle_bg_image_parallax == 'enable' ) {
		wp_enqueue_script('benedicta-parallax', get_template_directory_uri() . '/assets/js/custom-parallax.js', array(), '', true);
		$benedicta_pagetitle_class .= ' benedicta_parallax';
	}
	
	/* Breadcrumbs */
	$benedicta_options_breadcrumbs = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('breadcrumbs') : 'hide';
	$benedicta_breadcrumbs = get_post_meta( $benedicta_postId, 'benedicta_breadcrumbs', true ) ? get_post_meta( $post->ID, 'benedicta_breadcrumbs', true ) : $benedicta_options_breadcrumbs;

	if ( is_singular('post') ) {
		$benedicta_breadcrumbs = 'hide';
	} else if ( is_singular('portfolio') ) {
		$benedicta_breadcrumbs = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_single_breadcrumbs') : 'show';
	} elseif( is_search() || is_404() ) {
		$benedicta_breadcrumbs = 'hide';
	}
	
?>
		
		<?php if ( $benedicta_pagetitle == 'show' && !is_author() ) { ?>
			<div id="pagetitle" class="<?php echo esc_attr( $benedicta_pagetitle_class ); ?>">
				<div class="container">
					
					<?php if ( is_singular('post') && $benedicta_post_single_style == 'fullscreen' ) { ?>
						
						<div class="single_post_header">
							<h2 class="single-post-title"><?php the_title(); ?></h2>
							<div class="post-meta">
								<span class="post-meta-author"><?php echo esc_html__('by','benedicta'); ?><i><?php echo the_author_meta( 'display_name' , $post->post_author ); ?></i></span>
								<span class="post_meta_category"><?php echo esc_html__('in','benedicta'); ?><?php the_category(', '); ?></span>
								<span class="post-meta-date"><?php echo esc_html__('posted on','benedicta'); ?><i><?php the_time( get_option( 'date_format' ) ); ?></i></span>
								<span class="post-meta-comments"><?php echo benedicta_comment_count(); ?></span>
							</div>
						</div>
						
					<?php } else {
						
						if ( !empty( $benedicta_pagetitle_subtext ) ) {
							echo '<p>' . esc_html( $benedicta_pagetitle_subtext ) . '</p>';
						}
						if ( !empty( $benedicta_pagetitle_text ) ) {
							echo '<h2>' . esc_html( $benedicta_pagetitle_text ) . '</h2>';
						}
						
						if ( $benedicta_breadcrumbs == 'show' ) {
							echo '<div id="breadcrumbs">';
									benedicta_breadcrumbs();
							echo '</div>';
						}
						
					} ?>
				</div>
			</div>
		<?php } elseif ( is_author() ) { 

			$benedicta_user_post_count = count_user_posts( get_the_author_meta( 'ID' ), $post_type = 'post' );
			?>
			
			<div id="pagetitle" class="author_posts_info">
				<div class="container text-center">
					<div class="author_posts_avatar"><?php echo get_avatar( get_the_author_meta('user_email'), '120', '' ); ?></div>
					<div class="author_posts_descr">
						<div class="author_posts_count"><?php echo esc_html( $benedicta_user_post_count ) . esc_html__( ' articles', 'benedicta' ) ?></div>
						<h5 class="author_posts_name"><?php the_author(); ?></h5>
					</div>
				</div>
			</div>

		<?php } ?>