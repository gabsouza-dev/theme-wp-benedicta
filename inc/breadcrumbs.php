<?php

/**
 * 	Evatheme Core Breadcrumbs Function
 */

if ( ! function_exists('breadcrumbs')) {
	
	function benedicta_breadcrumbs() {

		/* === OPTIONS === */
		$text['home']     = esc_html__('Home', 'benedicta'); // text for the 'Home' link
		$text['category'] = esc_html__('Archive by Category "%s"', 'benedicta'); // text for a category page
		$text['search']   = esc_html__('Search Results for "%s" Query', 'benedicta'); // text for a search results page
		$text['tag']      = esc_html__('Posts Tagged "%s"', 'benedicta'); // text for a tag page
		$text['author']   = esc_html__('Articles Posted by %s', 'benedicta'); // text for an author page
		$text['404']      = esc_html__('Error 404', 'benedicta'); // text for the 404 page
		$text['page']     = esc_html__('Page %s', 'benedicta'); // text 'Page N'
		$text['cpage']    = esc_html__('Comment Page %s', 'benedicta'); // text 'Comment Page N'

		$sep            = ' <span class="sep"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="8px" height="8px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744 		L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
		c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"/></svg></span> '; // separator between crumbs
		$showCurrent 	= 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
		$show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$show_current   = 1; // 1 - show current page title, 0 - don't show
		$before         = '<span class="current">'; // tag before the current crumb
		$after          = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		
		$home_link      = home_url( '/' );
		$link_before    = '';
		$link_after     = '';
		$link_attr      = '';
		$link_in_before = '';
		$link_in_after  = '';
		$link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
		$frontpage_id   = get_option('page_on_front');
		$parent_id      = isset( $post->post_parent ) ? $post->post_parent : NULL;

		if (is_home() || is_front_page()) {

			if ($show_on_home) echo '<div class="breadcrumbs_wrap"><a class="front_page_link" href="' . esc_url( $home_link ) . '">' . $text['home'] . '</a>'. $sep . $before . get_the_title( get_option('page_for_posts', true) ) . $after .'</div>';

		} elseif ( get_post_type() == 'product' ) {

			woocommerce_breadcrumb();

		} else {

			echo '<div class="breadcrumbs_wrap">';
			if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

			if ( is_category() ) {
				$cat = get_category(get_query_var('cat'), false);
				if ($cat->parent != 0) {
					$cats = get_category_parents($cat->parent, TRUE, $sep);
					$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
					if ($show_home_link) echo ' ' . $sep;
					echo ' ' . $cats;
				}
				if ( get_query_var('paged') ) {
					$cat = $cat->cat_ID;
					echo ' ' . $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) echo ' ' . $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
				}

			} elseif ( is_search() ) {
				if (have_posts()) {
					if ($show_home_link && $show_current) echo ' ' . $sep;
					if ($show_current) echo ' ' . $before . sprintf($text['search'], get_search_query()) . $after;
				} else {
					if ($show_home_link) echo ' ' . $sep;
					echo ' ' . $before . sprintf($text['search'], get_search_query()) . $after;
				}

			} elseif ( is_day() ) {
				if ($show_home_link) echo ' ' . $sep;
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
				echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
				if ($show_current) echo ' ' . $sep . $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				if ($show_home_link) echo ' ' . $sep;
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
				if ($show_current) echo ' ' . $sep . $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				if ($show_home_link && $show_current) echo ' ' . $sep;
				if ($show_current) echo ' ' . $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ($show_home_link) echo ' ' . $sep;
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($show_current) echo ' ' . $sep . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $sep);
					if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
					echo ' ' . $cats;
					if ( get_query_var('cpage') ) {
						echo ' ' . $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
					} else {
						if ($show_current) echo ' ' . $before . get_the_title() . $after;
					}
				}

			// custom post type
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				if ( get_query_var('paged') ) {
					echo ' ' . $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) echo ' ' . $sep . $before . $post_type->label . $after;
				}

			} elseif ( is_attachment() ) {
				if ($show_home_link) echo ' ' . $sep;
				$parent = get_post($parent_id);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				if ($cat) {
					$cats = get_category_parents($cat, TRUE, $sep);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
					echo ' ' . $cats;
				}
				printf($link, get_permalink($parent), $parent->post_title);
				if ($show_current) echo ' ' . $sep . $before . get_the_title() . $after;

			} elseif ( is_page() && !$parent_id ) {
				if ($show_current) echo ' ' . $sep . $before . get_the_title() . $after;

			} elseif ( is_page() && $parent_id ) {
				if ($show_home_link) echo ' ' . $sep;
				if ($parent_id != $frontpage_id) {
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						if ($parent_id != $frontpage_id) {
							$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					for ($i = 0; $i < count($breadcrumbs); $i++) {
						echo ' ' . $breadcrumbs[$i];
						if ($i != count($breadcrumbs)-1) echo ' ' . $sep;
					}
				}
				if ($show_current) echo ' ' . $sep . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				if ( get_query_var('paged') ) {
					$tag_id = get_queried_object_id();
					$tag = get_tag($tag_id);
					echo ' ' . $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) echo ' ' . $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
				}

			} elseif ( is_author() ) {
				global $author;
				$author = get_userdata($author);
				if ( get_query_var('paged') ) {
					if ($show_home_link) echo ' ' . $sep;
					echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_home_link && $show_current) echo ' ' . $sep;
					if ($show_current) echo ' ' . $before . sprintf($text['author'], $author->display_name) . $after;
				}

			} elseif ( is_404() ) {
				if ($show_home_link && $show_current) echo ' ' . $sep;
				if ($show_current) echo ' ' . $before . $text['404'] . $after;

			} elseif ( has_post_format() && !is_singular() ) {
				if ($show_home_link) echo ' ' . $sep;
				echo get_post_format_string( get_post_format() );
			}

			echo '</div>';

		}

	}
}
?>