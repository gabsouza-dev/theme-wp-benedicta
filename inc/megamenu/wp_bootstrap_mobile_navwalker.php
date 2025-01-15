<?php

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Twitter Bootstrap 2.3.2 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.2
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_mobile_navwalker extends Walker_Nav_Menu {


    private $current_Item;
	
	/**
	 * @var string $benedicta_megamenu_status holds information about we currently rendering a mega menu or not
	 */
	private $benedicta_megamenu_status = "";
	
	/**
	 * @var string $benedicta_megamenu_title holds to display column title
	 */
	private $benedicta_megamenu_title = '';
	
	/**
	 * @var string $benedicta_megamenu_link holds to have link for column title
	 */
	private $benedicta_megamenu_link = '';
	
	/**
	 * @var string $benedicta_megamenu_widgetarea holds widget area
	 */
	private $benedicta_megamenu_widget_area = '';

	/**
	 * @var string $benedicta_megamenu_content holds menu content
	 */
	private $benedicta_megamenu_content = '';

	/**
	 * @var string $benedicta_megamenu_label holds menu item _label
	 */
	private $benedicta_megamenu_label = '';

    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
		
		if( $depth === 0 && $this->benedicta_megamenu_status == "enabled" ) {
			$output .= "\n{first_level}\n";
			$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu megamenu\">\n";
		} elseif( $depth === 0 ) {
			$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu \">\n";
		} elseif( $depth === 1 && $this->benedicta_megamenu_status == "enabled" ) {
			$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu\">\n";
		} elseif( $depth === 1 ) {
			$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu \">\n";
		} else {
			$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu sub-menu-2 \">\n";
		}
				
    }
	
	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$row_width = '';
		
		if( $depth === 0 && $this->benedicta_megamenu_status == "enabled" ) {
			$output .= "\n</ul>\n</div>\n";
			
			$output = str_replace( "{first_level}", "<div class='benedicta-megamenu-wrapper benedicta-megamenu'>", $output );
		} else {
			$output .= "$indent</ul>\n";
		}
		
	}

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$item_output = '';
		
        $this->current_Item = $item;
		
		/* Get Stored vars */
		if( $depth === 0 ) {
			$this->benedicta_megamenu_status = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_status', true );	
		}
		
		$this->benedicta_megamenu_title = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_title', true);
		$this->benedicta_megamenu_link = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_link', true);
		$this->benedicta_megamenu_widget_area = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_widgetarea', true);
		$this->benedicta_megamenu_content = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_content', true);
		$this->benedicta_megamenu_label = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_label', true);
		
		
		/* Inside Megamenu */
		if( $depth === 1 && $this->benedicta_megamenu_status == "enabled" ) {

			$title = apply_filters( 'the_title', $item->title, $item->ID );			
			
			if( $title != "-" && $title != '"-"' ) {
				$heading_title = do_shortcode($title);
				$link = '';
				$link_url = '';
				$link_end = '';

				if( ! empty($item->url) && $item->url != "#" && $item->url != 'http://' && ! $this->benedicta_megamenu_link ) {
					$link_url = benedicta_get_parallax_link( $item );
						
					$link = '<a href="' . $link_url . '">';
					$link_end = '</a>';
				}

				/* Check to set label */
				$title_extras = '';
				if( ! empty( $this->benedicta_megamenu_label ) ) {
					$title_extras = '<span class="benedicta-megamenu-label ' . $this->benedicta_megamenu_label . '">' . $this->benedicta_megamenu_label . '</span>';
				}

				$heading_title = sprintf( '%s%s%s%s', $link, $title, $title_extras, $link_end );

				if( $this->benedicta_megamenu_title != 'disabled' ) {
					$item_output .= "<h6 class='benedicta-megamenu-title'>" . $heading_title . "</h6>";
				} else {
					$item_output .= "";
				}
				
			}
			
			if( $this->benedicta_megamenu_widget_area && is_active_sidebar( $this->benedicta_megamenu_widget_area ) ) {
				$item_output .= '<div class="benedicta-megamenu-widgets-container second-level-widget">';
				ob_start();
					dynamic_sidebar( $this->benedicta_megamenu_widget_area );

				$item_output .= ob_get_clean() . '</div>';
			} else {

				if( $this->benedicta_megamenu_content ) {
					$item_output .= '<div class="benedicta-megamenu-content-container second-level-content">';
					ob_start();
						echo do_shortcode( $this->benedicta_megamenu_content );
	
					$item_output .= ob_get_clean() . '</div>';
				}		
				
			}	

		} else if( $depth === 2 && ( $this->benedicta_megamenu_widget_area || $this->benedicta_megamenu_content )&& $this->benedicta_megamenu_status == "enabled" ) {
		
			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if( $title != "-" && $title != '"-"' ) {
				$heading = do_shortcode($title);
				$link = '';
				$link_url = '';
				$link_end = '';

				if( ! empty($item->url) && $item->url != "#" && $item->url != 'http://' && ! $this->benedicta_megamenu_link ) {
					
					$link_url = benedicta_get_parallax_link( $item );
			
					$link = '<a href="' . $link_url . '">';
					$link_end = '</a>';	
					
				}

				/* Check to set label */
				$title_extras = '';
				if( ! empty( $this->benedicta_megamenu_label ) ) {
					$title_extras = '<span class="benedicta-megamenu-label ' . $this->benedicta_megamenu_label . '">' . $this->benedicta_megamenu_label . '</span>';
				}

				$heading_title = sprintf( '%s%s%s%s', $link, $title, $title_extras, $link_end );

				if( $this->benedicta_megamenu_title != 'disabled' ) {
					$item_output .= "<h6 class='benedicta-megamenu-title'>" . $heading_title . "</h6>";
				} else {
					$item_output .= "";
				}
				
			}
			
			if( $this->benedicta_megamenu_widget_area && is_active_sidebar( $this->benedicta_megamenu_widget_area ) ) {
				$item_output .= '<div class="benedicta-megamenu-widgets-container third-level-widget">';
				ob_start();
					dynamic_sidebar( $this->benedicta_megamenu_widget_area );

				$item_output .= ob_get_clean() . '</div>';
			} else {

				if( $this->benedicta_megamenu_content ) {
					$item_output .= '<div class="benedicta-megamenu-content-container third-level-content">';
					ob_start();
						echo do_shortcode( $this->benedicta_megamenu_content );

					$item_output .= ob_get_clean() . '</div>';
				}
				
			}

		} else {	
	
			$atts = array();
			$atts['title']  = ! empty( $item->title )   ? $item->title  : '';
			$atts['target'] = ! empty( $item->target )  ? $item->target : '';
			$atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';			
			
			$link_url = '';
				
			$link_url = benedicta_get_parallax_link( $item );
				
			$atts['href']   = ! empty( $link_url ) ? $link_url : '';
			
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
	
			$item_output .= $args->before;
				
			/* Check to set label */
			if( ! empty( $this->benedicta_megamenu_label ) && $this->benedicta_megamenu_status == "enabled" ) {
				$item_output .= '<a ' . $attributes . '><span class="benedicta-megamenu-label ' . $this->benedicta_megamenu_label . '">' . $this->benedicta_megamenu_label . '</span>';
			} else {
				$item_output .= '<a'. $attributes .'>';
			}
	
			$caret = ($depth === 0) ? 'down' : 'right';
				
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			$item_output .=  '</a>';
			$item_output .= $args->after;
	
		}
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
		$class_names = $value = '';
	
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';
				
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
    }
	
	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}	
		
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth. 
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */

    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
       }

       parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
   }
}

