<?php
/**
 * Custom functions and definitions
 */


//	Theme Options
function benedicta_options($index1, $index2 = false) {
    $options = get_option('benedicta_option');
    if ($index2) {
        $output = isset($options[$index1][$index2]) ? $options[$index1][$index2] : false;
        return $output;
    }
    $output = isset($options[$index1]) ? $options[$index1] : false;
    return $output;
}


//	Add specific CSS class by filter
add_filter( 'body_class', 'benedicta_body_class' );
function benedicta_body_class( $classes ) {
	
	global $post;
	
	$benedicta_postId = ( isset( $post->ID ) ? get_the_ID() : NULL );
	
	//	If Site Boxed
	if ( isset( $benedicta_postId ) && get_post_meta( $benedicta_postId, 'benedicta_page_layout', true ) ) {
		$benedicta_options_theme_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('theme_layout') : 'full-width';
		$benedicta_theme_layout = ( get_post_meta( $benedicta_postId, 'benedicta_page_layout', true ) ? get_post_meta( $benedicta_postId, 'benedicta_page_layout', true ) : $benedicta_options_theme_layout );
	} else {
		$benedicta_theme_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('theme_layout') : 'full-width';
	}
	if ($benedicta_theme_layout == 'boxed') {
		$classes[] = 'boxed';
	} else {
		$classes[] = 'full-width';
	}
	
	//	Header Layout
	$benedicta_header_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header-layout') : 'full_width';
	$classes[] = 'header_'. $benedicta_header_layout;
	
	if( $benedicta_header_layout != 'left_fixed' ) {
		
		$classes[] = 'header-top';

		//	Header has BG
		$benedicta_header_bg_style = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_bg_style') : 'bgcolor';
		$benedicta_header_page_bg_style = get_post_meta( $benedicta_postId, 'benedicta_header_page_bg_style', true );
		$benedicta_header_bg_style = !empty( $benedicta_header_page_bg_style ) ? $benedicta_header_page_bg_style : $benedicta_header_bg_style;
		if ( is_search() ) {
			$benedicta_header_bg_style = 'bgcolor';
		}
		$classes[] = 'header_' . $benedicta_header_bg_style;
		
		//	Header has BG with Opacity
		$benedicta_header_bgcolor_opacity = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header_bgcolor_opacity') : '95';
		if ( isset( $benedicta_header_bg_style ) && $benedicta_header_bgcolor_opacity != '99' ) {
			$classes[] = 'header_opacity';
		}
	}
	
	//	Page Title show/hide
	$benedicta_options_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('pagetitle') : 'show';
	$benedicta_post_single_style = get_post_meta( $benedicta_postId, 'benedicta_post_single_style', true );
	$benedicta_pagetitle = ( get_post_meta( $benedicta_postId, 'benedicta_pagetitle', true ) ? get_post_meta( $benedicta_postId, 'benedicta_pagetitle', true ) : $benedicta_options_pagetitle );
	if ( is_home() || is_category() || is_tag() || is_search() || is_day() || is_month() || is_year() ) {
		$benedicta_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('blog_pagetitle') : 'hide';
	} else if ( is_singular('post') && $benedicta_post_single_style != 'fullscreen' ) {
		$benedicta_pagetitle = 'hide';
	} else if ( is_singular('portfolio') ) {
		$benedicta_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('portfolio_single_pagetitle') : 'show';
	} else if( class_exists('WooCommerce') && ( is_shop() || is_product_category() || is_product_tag() || is_cart() || is_checkout() || is_account_page() ) ) {
		$benedicta_shop_pagetitle = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('shop_pagetitle') : 'show';
		$benedicta_pagetitle = $benedicta_shop_pagetitle;
	} else if( class_exists('WooCommerce') && ( is_singular('product') ) ) {
		$benedicta_pagetitle = 'hide';
	}
	
	$classes[] = 'pagetitle_' . $benedicta_pagetitle;
	
	//	Page Title show/hide
	$benedicta_options_breadcrumbs = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('breadcrumbs') : 'show';
	$benedicta_breadcrumbs = ( get_post_meta( $benedicta_postId, 'benedicta_breadcrumbs', true ) ? get_post_meta( $benedicta_postId, 'benedicta_breadcrumbs', true ) : $benedicta_options_breadcrumbs );
	if ( is_singular('post') ) {
		$benedicta_breadcrumbs = 'hide';
	} else if ( is_singular('portfolio') ) {
		$benedicta_breadcrumbs = 'hide';
	} else if( class_exists('WooCommerce') && ( is_singular('product') ) ) {
		$benedicta_breadcrumbs = 'hide';
	}
	$classes[] = 'breadcrumbs_' . $benedicta_breadcrumbs;
	
	//	Footer Fixed
	if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('footer_fixed') != '0' ) {
		$classes[] = 'footer_fixed';
	}
	
	//	One Page Active
	if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('onepage_menu') != '0' ) {
		$classes[] = 'onepage_menu';
	}
	
	if ( class_exists( 'WooCommerce' ) ) {
		if( class_exists( 'ReduxFrameworkPlugin' ) && benedicta_options('products_no_padding') != 0 ) {
			$classes[] = 'woo_no_paddings';
		}
	}
	
	return $classes;
}


//	if WooCommerce Plugin Active
function benedicta_woo_enabled() {
    if ( class_exists( 'WooCommerce' ) )
        return true;
    return false;
}


/**
 * Insert social metadata into the header
 */
if ( ! function_exists( 'benedicta_social_meta' ) ) {
	function benedicta_social_meta() {

		global $post;

		if ( is_singular() ) {

	        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	        echo '<meta property="og:type" content="article"/>';
	        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	        echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>';

			if ( has_post_thumbnail( $post->ID ) ) {
				$benedicta_thumb = get_post_thumbnail_id();
				$benedicta_img_url = wp_get_attachment_image_src( $benedicta_thumb, 'large' );
				$benedicta_img_url = $benedicta_img_url[0];
			} else {
				$benedicta_img_url = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header-logo','url') : get_template_directory_uri() . '/assets/images/logo.png';
			}

			echo '<meta itemprop="image" content="' . $benedicta_img_url . '"> ';
			echo '<meta name="twitter:image:src" content="' . $benedicta_img_url . '">';
			echo '<meta property="og:image" content="' . $benedicta_img_url . '" />';

		}
	}
}


//	Theme Logo
if ( ! function_exists( 'benedicta_logo' ) ) { 
	function benedicta_logo() {
		
		if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
			$benedicta_logo_src 		= get_template_directory_uri() . '/assets/images/logo.png';
			$benedicta_logo_retina_src 	= '';
		} else {
			$benedicta_header_logo_url 		= benedicta_options('header-logo','url');
			$benedicta_header_logo_retina_url = benedicta_options('header-logo-retina','url');
			$benedicta_header_logo_width 	= benedicta_options('header-logo-width');
			
			$benedicta_logo_src 		= !empty( $benedicta_header_logo_url ) ? $benedicta_header_logo_url : '';
			$benedicta_logo_retina_src 	= !empty( $benedicta_header_logo_retina_url ) ? $benedicta_header_logo_retina_url : '';
			$benedicta_logo_width 		= !empty( $benedicta_header_logo_width ) ? $benedicta_header_logo_width : '';
		}
		
		echo '<div class="cstheme-logo">';
			if ( $benedicta_logo_src != '' || $benedicta_logo_retina_src != '' ) {
				echo '<a class="logo" href="' . esc_url( home_url( '/' ) ) . '">';
					if( $benedicta_logo_retina_src != '' ) {
						echo '<img class="logo-img retina" src="' . esc_url( $benedicta_logo_retina_src ) . '" style="width:' . esc_attr( $benedicta_logo_width ) . 'px" alt="' . get_bloginfo( 'name' ) . '" />';
					} else {
						echo '<img class="logo-img" src="' . esc_url( $benedicta_logo_src ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
					}
				echo '</a>';
			} else {
				echo '<h1 class="site-name">';
					echo '<a class="logo" href="'. esc_url( home_url( '/' ) ) .'">';
						bloginfo('name');
					echo '</a>';
				echo '</h1>';
			}
		echo '</div>';
	}
}


//	Theme Favicon
function benedicta_favicon() {
	
	if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) {
		if(	class_exists('ReduxFrameworkPlugin') && benedicta_options('favicon', 'url') ) {
			echo '<link rel="shortcut icon" href="' . esc_url( benedicta_options('favicon', 'url') ) . '"/>';
		} else {
			echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/assets/images/favicon.png" />';
		}
		
		if(class_exists('ReduxFrameworkPlugin') && benedicta_options('favicon-retina', 'url') ) {
			echo '<link rel="apple-touch-icon" href="' . esc_url( benedicta_options('favicon-retina', 'url') ) . '">';
		}
		if( class_exists('ReduxFrameworkPlugin') && benedicta_options('apple_icons_57x57', 'url') ) {
			echo '<link rel="apple-touch-icon" sizes="57x57" href="' . esc_url( benedicta_options('apple_icons_57x57', 'url') ) . '">';
		}
		if( class_exists('ReduxFrameworkPlugin') && benedicta_options('apple_icons_72x72', 'url') ) {
			echo '<link rel="apple-touch-icon" sizes="72x72" href="' . esc_url( benedicta_options('apple_icons_72x72', 'url') ) . '">';
		}
		if( class_exists('ReduxFrameworkPlugin') && benedicta_options('apple_icons_114x114', 'url') ) {
			echo '<link rel="apple-touch-icon" sizes="114x114" href="' . esc_url( benedicta_options('apple_icons_114x114', 'url') ) . '">';
		}	
	}
}


//	Theme Preloader
function benedicta_preloader() {
	
	$benedicta_preloader = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('preloader') : 0;
	
	if( $benedicta_preloader != 0 ) {
		echo '<div id="loader"><div class="loader_wrap"><span>' . esc_attr__( 'Loading', 'benedicta' ) . '</span><div class="bar_wrap"><div class="bar"></div></div></div></div>';
	}
}


//	Social Links
if ( ! function_exists( 'benedicta_social_links' ) ) {

	function benedicta_social_links() {
		
		$output = '';
		$benedicta_social_links = array();
		
		if( class_exists('ReduxFrameworkPlugin') ) {
			if( benedicta_options('facebook_link') != '' ) {
				$benedicta_social_links['facebook'] = benedicta_options('facebook_link');
			}
			if( benedicta_options('twitter_link') != '' ) {
				$benedicta_social_links['twitter'] = benedicta_options('twitter_link');
			}
			if( benedicta_options('linkedin_link') != '') {
				$benedicta_social_links['linkedin'] = benedicta_options('linkedin_link');
			}
			if( benedicta_options('pinterest_link') != '' ) {
				$benedicta_social_links['pinterest'] = benedicta_options('pinterest_link');
			}
			if( benedicta_options('googleplus_link') != '' ) {
				$benedicta_social_links['google-plus'] = benedicta_options('googleplus_link');
			}
			if( benedicta_options('flickr_link') != '' ) {
				$benedicta_social_links['flickr'] = benedicta_options('flickr_link');
			}
			if( benedicta_options('instagram_link') != '' ) {
				$benedicta_social_links['instagram'] = benedicta_options('instagram_link');
			}
			if( benedicta_options('behance_link') != '' ) {
				$benedicta_social_links['behance'] = benedicta_options('behance_link');
			}
			if( benedicta_options('youtube_link') != '' ) {
				$benedicta_social_links['youtube'] = benedicta_options('youtube_link');
			}
			if( benedicta_options('vimeo_link') != '' ) {
				$benedicta_social_links['vimeo'] = benedicta_options('vimeo_link');
			}
			if( benedicta_options('rss_link') != '' ) {
				$benedicta_social_links['rss'] = benedicta_options('rss_link');
			}
			if( benedicta_options('tumblr_link') != '' ) {
				$benedicta_social_links['tumblr'] = benedicta_options('tumblr_link');
			}
			if( benedicta_options('reddit_link') != '' ) {
				$benedicta_social_links['reddit'] = benedicta_options('reddit_link');
			}
			if( benedicta_options('dribbble_link') != '' ) {
				$benedicta_social_links['dribbble'] = benedicta_options('dribbble_link');
			}
			if( benedicta_options('digg_link') != '' ) {
				$benedicta_social_links['digg'] = benedicta_options('digg_link');
			}
			if( benedicta_options('skype_link') != '' ) {
				$benedicta_social_links['skype'] = benedicta_options('skype_link');
			}
			if( benedicta_options('yahoo_link') != '' ) {
				$benedicta_social_links['yahoo'] = benedicta_options('yahoo_link');
			}
			if( benedicta_options('vk_link') != '' ) {
				$benedicta_social_links['vk'] = benedicta_options('vk_link');
			}
			if( benedicta_options('tripadvisor_link') != '' ) {
				$benedicta_social_links['tripadvisor'] = benedicta_options('tripadvisor_link');
			}
		}
		
		$benedicta_icon_class = '';
		$benedicta_social_link = '';
		
		if( isset( $benedicta_social_links ) && is_array( $benedicta_social_links ) ) {
			foreach( $benedicta_social_links as $benedicta_icon => $benedicta_link ) {
				$benedicta_icon_class = $benedicta_icon;
				
				$benedicta_social_link .= '<a class="social_link '. esc_attr( $benedicta_icon ) .'" href="'. esc_url( $benedicta_link ) .'" target="_blank"><i class="fa fa-'. esc_attr( $benedicta_icon ) .'"></i></a>';
			}
		}
		
		if( isset( $benedicta_social_link ) && $benedicta_social_link != '' ) {
			$output .= $benedicta_social_link;
		}

		return $output;
	}
}


/**
 * Post excerpt
 */
if (!function_exists('benedicta_smarty_modifier_truncate')) {
    function benedicta_smarty_modifier_truncate($string, $length = 80, $etc = '... ',
		$break_words = false)
    {
        if ($length == 0)
            return '';

        if (mb_strlen($string, 'utf8') > $length) {
            $length -= mb_strlen($etc, 'utf8');
            if (!$break_words) {
                $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
            }
            return mb_substr($string, 0, $length, 'utf8') . $etc;
        } else {
            return $string;
        }
    }
}

//	Comments Count
if (!function_exists('benedicta_comment_count')) {
	function benedicta_comment_count() {
		$benedicta_comment_count = get_comments_number('0', '1', '%');
		if ($benedicta_comment_count == 0) {
			$benedicta_comment_trans = esc_attr__('No Comments', 'benedicta');
		} elseif ($benedicta_comment_count == 1) {
			$benedicta_comment_trans = esc_attr__('1 Comment', 'benedicta');
		} else {
			$benedicta_comment_trans = $benedicta_comment_count . ' ' . esc_attr__('Comments', 'benedicta');
		}
		return '<a class="cstheme_comment_count" href="' . get_comments_link() . '" title="' . $benedicta_comment_trans . '"><i class="icon Evatheme-Icon-Fonts-thin-0274_chat_message_comment_bubble"></i>' . $benedicta_comment_trans . '</a>';
	}
}

/**
 * Single Post Comments List
 */

if (!function_exists('benedicta_comment')) {
    function benedicta_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		$comment_author_url = get_comment_author_url(); ?>
	
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
				<div class="comment-avatar">
					<?php if( $comment_author_url != '' ){ ?>
						<a href="<?php echo esc_url( $comment_author_url ); ?>" target="_blank">
					<?php } ?>
							<?php echo get_avatar($comment, $size = '70'); ?>
					<?php if( $comment_author_url != '' ){ ?>
						</a>
					<?php } ?>
				</div>
				<div class="comment-content">
					<div class="comment-meta clearfix">
						<span><?php echo esc_html__('author','benedicta'); ?></span>
						<?php if( $comment_author_url != '' ){ ?>
							<a class="comment_author" href="<?php echo esc_url( $comment_author_url ); ?>" target="_blank"><?php comment_author(); ?></a>
						<?php } else { ?>
							<span class="comment_author"><?php comment_author(); ?></span>
						<?php } ?>
						<span><?php echo esc_html__('posted on','benedicta'); ?></span>
						<span class="comment-date"><?php comment_date('F jS Y. g:i a'); ?></span>
						<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'depth' => $depth,
										'max_depth' => $args['max_depth'],
										'reply_text' => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" xml:space="preserve"><path d="M149.333,117.333V32L0,181.333l149.333,149.333V243.2C256,243.2,330.667,277.333,384,352 C362.667,245.333,298.667,138.667,149.333,117.333z"/></svg>'
									)
								)
							); ?>
						<?php edit_comment_link( '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"><path d="M432,0c44.182,0,80,35.817,80,80c0,18.01-5.955,34.629-16,48l-32,32L352,48l32-32C397.371,5.955,413.988,0,432,0z M32,368 L0,512l144-32l296-296L328,72L32,368z M357.789,181.789l-224,224l-27.578-27.578l224-224L357.789,181.789z"/></svg>',' ','' ); ?>
					</div>
					<div class="comment-text clearfix">
						<?php comment_text(); ?>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'benedicta'); ?></em>
							<br>
						<?php endif; ?>
					</div>
				</div>
			</div>
	<?php
	}
}


//	Display navigation to next/previous set of posts when applicable.
if ( ! function_exists( 'benedicta_pagination' ) ) { 

	function benedicta_pagination( $pages = '' ) {
		
		global $wp_query, $wp_rewrite;
		
		$compile = '';
		
		$pages = ($pages) ? $pages : $wp_query->max_num_pages;

		// Don't print empty markup if there's only one page.
		if ( $pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
	
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
	
		$pagenum_link = esc_url ( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	
		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
		
		// Set up paginated links.
		$links = paginate_links( array(
			'base'     				=> $pagenum_link,
			'format'   				=> $format,
			'total'    				=> $pages,
			'current'  				=> $paged,
			'show_all' 				=> false,
			'mid_size' 				=> 2,
			'type' 					=> 'array',
			'add_args' 				=> array_map( 'urlencode', $query_args ),
			'prev_text' 			=> esc_html__('Previous', 'benedicta'),
			'next_text' 			=> esc_html__('Next', 'benedicta'),
		) );

		if ( !empty($links) ) {
			$compile .= '<div class="eva-pagination">';
			foreach( $links as $link ) {
				$compile .= $link;
			}
			$compile .= '</div>';
		}

		return $compile;
	}
}


/**
 *	Load More button
 */

if (!function_exists('benedicta_infinite_scroll')) {
	function benedicta_infinite_scroll( $pages = "" ) {
		
		global $paged, $benedicta_wp_query_in_shortcodes;
		
		$compile = '';

        if (empty($paged)) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
		$pages = intval($benedicta_wp_query_in_shortcodes->max_num_pages);
		if (empty($pages)) {
			$pages = 1;
		}
		if (1 != $pages) {
			$compile .= '<div class="text-center">';
				$compile .= '<div class="eva-infinite-scroll" data-has-next="' . ( $paged === $pages ? 'false' : 'true' ) . '">';
					$compile .= '<a class="btn btn-infinite-scroll no-more hide" href="#">' . esc_html__('No more posts', 'benedicta') . '</a>';
					$compile .= '<a class="btn btn-infinite-scroll loading" href="#"><i class="fa fa-refresh"></i></a>';
					$compile .= '<a class="btn btn-infinite-scroll next" href="' . get_pagenum_link( $paged + 1 ) . '">' . esc_html__('Load more posts', 'benedicta') . '</a>';
				$compile .= '</div>';
			$compile .= '</div>';
		}
		
		return $compile; 
	}
}



//	Posts per author posts page
add_filter( 'pre_option_posts_per_page', 'benedicta_author_posts_per_page' );
function benedicta_author_posts_per_page( $posts_per_page ) {
	global $wp_query;
	if ( is_author() ) {
		return 9;
	}
	
	if ( is_search() ) {
		return 500;
	} 

	return $posts_per_page;
}


//	Portfolio Filter
if (!function_exists('benedicta_portfolio_filter')) {
    function benedicta_portfolio_filter($post_type_terms = "")
    {
        if (!isset($term_list)) {
            $term_list = '';
        }
        $permalink = get_permalink();
        $args = array('taxonomy' => 'Category', 'include' => $post_type_terms);
        $terms = get_terms('portfolio_category', $args);
        $count = count($terms);
        $i = 0;
        $iterm = 1;
		
		$compile = '';
		
        if ($count > 0) {
            $cape_list = '';
            if ($count > 1) {
                $term_list .= '<li class="' . (!isset($_GET['slug']) ? 'selected' : '') . '">';

                $args_for_count_all_terms = array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish'
                );
                $query_for_count_all_terms = new WP_Query($args_for_count_all_terms);

                $term_list .= '<a href="#filter" data-option-value="*" data-catname="all" data-title="' . $query_for_count_all_terms->post_count . '">' . esc_html__('All', 'benedicta') . '</a>
				</li>';
            }
            $termcount = count($terms);
            if (is_array($terms)) {
                foreach ($terms as $term) {

                    $args_for_count_all_terms = array(
                        'post_type' => 'portfolio',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio_category',
                                'field' => 'id',
                                'terms' => $term->term_id
                            )
                        )
                    );
                    $query_for_count_all_terms = new WP_Query($args_for_count_all_terms);

                    $i++;
                    $permalink = esc_url(add_query_arg("slug", $term->term_id, $permalink));
                    $term_list .= '<li ';
                    if (isset($_GET['slug'])) {
                        $getslug = $_GET['slug'];
                    } else {
                        $getslug = '';
                    }

                    if (strnatcasecmp($getslug, $term->term_id) == 0) $term_list .= 'class="selected"';

                    $tempname = strtr($term->name, array(
                        ' ' => '-',
                    ));
                    $tempname = strtolower($tempname);
                    $term_list .= '><a data-option-value=".' . $tempname . '" data-catname="' . $tempname . '" href="#filter"  data-title="' . $query_for_count_all_terms->post_count . '">' . $term->name . '</a>
                </li>';
                    if ($count != $i) $term_list .= ' '; else $term_list .= '';

                    $iterm++;
                }
            }
            
			$compile .= '<div class="filter_block"><ul data-option-key="filter" class="optionset">' . $term_list . '</ul></div>';
			
			return $compile;
			
        }
    }
}


/**
 * Generate dynamic css
 */

if ( !function_exists( 'benedicta_generate_dynamic_css' ) ):
	function benedicta_generate_dynamic_css() {
		ob_start();
		get_template_part( 'assets/css/dynamic-css' );
		$output = ob_get_contents();
		ob_end_clean();
		return benedicta_compress_css_code( $output );
	}
endif;


/**
 * Compress CSS Code
 */

if ( !function_exists( 'benedicta_compress_css_code' ) ) :
	function benedicta_compress_css_code( $code ) {

		// Remove Comments
		$code = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code );

		// Remove tabs, spaces, newlines, etc.
		$code = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $code );

		return $code;
	}
endif;


/**
 * Sanitize text field
 */

function benedicta_sanitize_text_field($text) {
	return $text;
}



/**
 * Language Switcher
 */

if ( !function_exists( 'benedicta_lang_switcher' ) ) {
	function benedicta_lang_switcher() {
	
		$compile = '';

    	$compile .= '<div class="lang_switcher">';
    		$compile .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="8px" height="8px" viewBox="0 0 451.846 451.847" xml:space="preserve"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
		L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284 c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"/></svg>';
			$compile .= '<a href="#" class="lang_btn current_language">'. esc_html__('Eng', 'benedicta') .'</a>';
            $compile .= '<ul class="language_list">';
                $compile .= '<li>'. esc_html__('Eng', 'benedicta') .'</li>';
                $compile .= '<li>'. esc_html__('Deu', 'benedicta') .'</li>';
                $compile .= '<li>'. esc_html__('Fra', 'benedicta') .'</li>';
            $compile .= '</ul>';
		$compile .= '</div>';
		
		return $compile;

	}
}