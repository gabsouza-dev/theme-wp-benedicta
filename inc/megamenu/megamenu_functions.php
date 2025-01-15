<?php
/**
 * benedicta Theme Mega Menu Framework
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) { exit; }

if( ! class_exists( 'benedicta_Mega_Menu_Core' ) ) {

    /**
     * benedicta_Mega_Menu_Core Class Init
     */
    class benedicta_Mega_Menu_Core {
	
		/**
		 * benedicta_Mega_Menu_Core constructor
		 */
        function __construct() {
			
			// Adds Stylesheets and Scripts
			add_action( 'admin_menu', array( $this, 'benedicta_menu_enqueue_scripts' ) );
			
			// Add Custom Nav fields to menu
			add_filter( 'wp_setup_nav_menu_item', array( $this, 'benedicta_add_custom_fields' ) );
			
			// Update Custom Nav fields to menu
			add_action( 'wp_update_nav_menu_item', array( $this, 'benedicta_update_custom_fields' ), 10, 3 );
			
			// Edit Custom Nav fields to menu
            add_filter( 'wp_edit_nav_menu_walker', array( $this, 'benedicta_edit_custom_fields' ), 10, 2 );

        }


		/**
		 * Register Megamenu stylesheets and scripts		
		 */
		function benedicta_menu_enqueue_scripts() {

			wp_enqueue_script( 'benedicta-megamenu', get_template_directory_uri() . '/inc/megamenu/megamenu.js', array( 'jquery' ), false, true );
			
			wp_enqueue_style( 'benedicta-megamenu', get_template_directory_uri() . '/inc/megamenu/megamenu.css' );
			
		}
		
		/**
		 * Add custom fields to menu		
		 *		
		 * @return object custom fields menu object
		*/
		function benedicta_add_custom_fields( $menu_item ) {
		
			$menu_item->benedicta_megamenu_menutype = 'page';
			$menu_item->benedicta_megamenu_status = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_status', true );
			$menu_item->benedicta_megamenu_columns = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_columns', true );
            $menu_item->benedicta_megamenu_title = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_title', true );
			$menu_item->benedicta_megamenu_link = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_link', true );
			$menu_item->benedicta_megamenu_widgetarea = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_widgetarea', true );
            $menu_item->benedicta_megamenu_content = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_content', true );
			$menu_item->benedicta_megamenu_label = get_post_meta( $menu_item->ID, '_menu_item_benedicta_megamenu_label', true );
			
			return $menu_item;	    
		}
		
		/**
         * Save the custom fields menu item data
         *
         * @return void
         */
        function benedicta_update_custom_fields( $menu_id, $menu_item_db_id, $args ) {

			$cf_name_suffix = array( 'status', 'columns', 'title', 'link', 'widgetarea', 'content', 'label' );

			foreach ( $cf_name_suffix as $key ) {
				if( !isset( $_REQUEST['menu-item-benedicta-megamenu-'.$key][$menu_item_db_id] ) ) {
					$_REQUEST['menu-item-benedicta-megamenu-'.$key][$menu_item_db_id] = '';
				}

				$value = $_REQUEST['menu-item-benedicta-megamenu-'.$key][$menu_item_db_id];
				update_post_meta( $menu_item_db_id, '_menu_item_benedicta_megamenu_'.$key, $value );
			}
        }
		
		/**
         * New Walker for Menu
         *
         * @return string Class name of new navwalker
         */
        function benedicta_edit_custom_fields() {

            return 'benedicta_Backend_Walker_Nav_Menu';

        }

	}

	$benedicta_mega_menu = new benedicta_Mega_Menu_Core();

}

if( ! class_exists( 'benedictaMegaMenuFrontendWalker' ) ) {
	class benedictaMegaMenuFrontendWalker extends Walker_Nav_Menu {

		/**
		 * @var string $benedicta_megamenu_status holds information about we currently rendering a mega menu or not
		 */
		private $benedicta_megamenu_status = "";		

		/**
		 * @var int $columns_count holds number of columns in mega menu 
		 */
		private $columns_count = 0;

		/**
		 * @var int $max_columns maximum number of columns within mega menu 
		 */
		private $max_columns = 4;
		
		/**
		 * @var int $total_columns total number of columns within a mega menu
		 */
		private $total_columns = 0;
		
		/**
		 * @var int $total_rows number of rows in the mega menu
		 */
		private $total_rows = 1;

		/**
		 * @var array $rows_counter holds number of columns per row
		 */
		private $rows_counter = array();

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
		 * @var string $benedicta_megamenu_label holds menu item label
		 */
		private $benedicta_megamenu_label = '';

		/**
		 * @see Walker::start_lvl()		
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );

			if( $depth === 0 && $this->benedicta_megamenu_status == "enabled" ) {
				$output .= "\n{first_level}\n";
				$output .= "\n$indent<ul class='benedicta-megamenu clearfix'>\n";
			} elseif( $depth === 0 ) {
				$output .= "\n$indent<ul role=\"menu\" class=\" sub-menu\">\n";
			} elseif( $depth >= 2 && $this->benedicta_megamenu_status == "enabled" ) {
				$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu sub-menu-2 depth-level\">\n";
			} elseif( $depth >= 2 ) {
				$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu sub-menu-2 depth-level\">\n";
			} else {
				$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu\">\n";
			}		
			
		}

		/**
		 * @see Walker::end_lvl()		 
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$row_width = '';
			
			if( $depth === 0  && $this->benedicta_megamenu_status == "enabled" ) {

				$output .= "\n</ul>\n</div>\n";
				
				if( $this->benedicta_megamenu_widget_area && is_active_sidebar( $this->benedicta_megamenu_widget_area ) ) {
					$output = str_replace( "{first_level}", "<div class='benedicta-megamenu-wrapper columns-" . $this->total_columns . " widgets_wrap'>", $output );
				} else {
					$output = str_replace( "{first_level}", "<div class='benedicta-megamenu-wrapper columns-" . $this->total_columns . "'>", $output );
				}
				
				foreach($this->rows_counter as $row => $columns) {
					
					$output = str_replace( "{row_number_".$row."}", "col-sm-12 benedicta-megamenu-row-columns-" . $columns, $output);

					$output = str_replace( "{current_row_".$row."}", "benedicta-megamenu-columns-".$columns." ", $output );
				}
			} else {
				$output .= "$indent</ul>\n";
			}
		}

		/**
		 * @see Walker::start_el()		 
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
			$item_output = $column_classes = '';
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			/* Get Stored vars */
			if( $depth === 0 ) {

				$this->benedicta_megamenu_status = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_status', true );
				$menu_columns_count = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_columns', true );
				if( $menu_columns_count != "auto" ) {
					$this->max_columns = $menu_columns_count;
				}			
				$this->columns_count = $this->total_columns = 0;
			}

			$this->benedicta_megamenu_title = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_title', true);
			$this->benedicta_megamenu_link = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_link', true);
			$this->benedicta_megamenu_widget_area = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_widgetarea', true);
			$this->benedicta_megamenu_content = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_content', true);
			$this->benedicta_megamenu_label = get_post_meta( $item->ID, '_menu_item_benedicta_megamenu_label', true);			

			/* Inside Megamenu */
			if( $depth === 1 && $this->benedicta_megamenu_status == "enabled" ) {

				$this->columns_count++;
				$this->total_columns++;
				
				/* Check columns count with maximum columns allowed to start new row */
				if( $this->columns_count > $this->max_columns ) {
					$this->columns_count = 1;
					$this->total_rows++;
					$output .= "\n</ul>\n<ul class=\"benedicta-megamenu row-".$this->total_rows." {row_number_".$this->total_rows."}\">\n";
				}

				$this->rows_counter[$this->total_rows] = $this->columns_count;

				if( $this->max_columns < $this->columns_count ) { $this->max_columns = $this->columns_count; }

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

				$column_classes = ' {current_row_'.$this->total_rows.'}';
				
				if($this->columns_count == 1)
				{
					$column_classes .= " benedicta_megamenu_columns_first";
				}
				
				if( $this->benedicta_megamenu_widget_area && is_active_sidebar( $this->benedicta_megamenu_widget_area ) ) {
					$column_classes .= " widget_li";
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
				$atts['title']  = ! empty( $item->attr_title )	? 'title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$atts['target'] = ! empty( $item->target )	    ? 'target="' . esc_attr( $item->target     ) .'"' : '';
				$atts['rel']    = ! empty( $item->xfn )		    ? 'rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				
				$link_url = '';
				
				$link_url = benedicta_get_parallax_link( $item );
				
				// If item has_children add atts to a.
				if ( $args->has_children && $depth === 0 ) {
					$atts['href']   		= $link_url;
					$atts['data-toggle']	= '';
				} else {
					$atts['href'] = ! empty( $link_url ) ? $link_url : '';
				}
				
				$atts['class']			= 'menu_item_link';
	
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );				
	
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {

						$value = ( 'href' === $attr ) ? esc_attr( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
						
					}
				}

				$item_output .= $args->before;
				
				/* Check to set label */
				if( ! empty( $this->benedicta_megamenu_label ) && $this->benedicta_megamenu_status == "enabled" ) {
					$item_output .= '<a ' . $attributes . '><span class="benedicta-megamenu-label ' . $this->benedicta_megamenu_label . '">' . $this->benedicta_megamenu_label . '</span>';
				} else {
					$item_output .= '<a '. $attributes .'>';
				}

				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

				$item_output .= '</a>';

				$item_output .= $args->after;

			}

			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			
			$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children ) {
				if( $depth === 0 && $this->benedicta_megamenu_status == "enabled" ) {
					$class_names .= ' benedicta-megamenu-menu-parent';
				} elseif( $depth === 1 && $this->benedicta_megamenu_status == "enabled" ) {
					$class_names .= ' benedicta-megamenu-submenu';
				}
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ). $column_classes . '"' : '';
			
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
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()		 
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element )
				return;

			$id_field = $this->db_fields['id'];

			// Display this element.
			if ( is_object( $args[0] ) )
			   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a manu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 *
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'manage_options' ) ) {

				extract( $args );

				$fb_output = null;
				
				if ( $container ) {
					$fb_output = '<' . $container;
	
					if ( $container_id )
						$fb_output .= ' id="' . $container_id . '"';
	
					if ( $container_class )
						$fb_output .= ' class="' . $container_class . '"';
	
					$fb_output .= '>';
				}
	
				$fb_output .= '<ul';
	
				if ( $menu_id )
					$fb_output .= ' id="' . $menu_id . '"';
	
				if ( $menu_class )
					$fb_output .= ' class="' . $menu_class . '"';
	
				$fb_output .= '>';
				$fb_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">Add a menu</a></li>';
				$fb_output .= '</ul>';
	
				if ( $container )
					$fb_output .= '</' . $container . '>';
	
				echo wp_kses_post( $fb_output );
			}
		}
	}  // end benedictaMegaMenuFrontendWalker() class
}


if( ! class_exists( 'benedicta_Backend_Walker_Nav_Menu' ) ) {

    class benedicta_Backend_Walker_Nav_Menu extends Walker_Nav_Menu {

		/**		
		 * @see Walker_Nav_Menu::start_lvl()		
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int $depth Depth of menu item.
		 * @param array $args Not used.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {}

		/**		
		 * @see Walker_Nav_Menu::end_lvl()		
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference.
		 * @param int $depth Depth of menu item.
		 * @param array $args Not used.
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {}

		/**		
		 * @see Walker_Nav_Menu::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param array $args Not used.
		 * @param int $id Not used.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $_wp_nav_menu_max_depth;
			$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

			ob_start();
			$item_id = esc_attr( $item->ID );
			$removed_args = array(
				'action',
				'customlink-tab',
				'edit-menu-item',
				'menu-item',
				'page-tab',
				'_wpnonce',
			);

			$original_title = '';
			if ( 'taxonomy' == $item->type ) {
				$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
				if ( is_wp_error( $original_title ) )
					$original_title = false;
			} elseif ( 'post_type' == $item->type ) {
				$original_object = get_post( $item->object_id );
				$original_title = get_the_title( $original_object->ID );
			}

			$classes = array(
				'menu-item menu-item-depth-' . $depth,
				'menu-item-' . esc_attr( $item->object ),
				'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
			);

			$title = $item->title;

			if ( ! empty( $item->_invalid ) ) {
				$classes[] = 'menu-item-invalid';
				/* translators: %s: title of menu item which is invalid */
				$title = sprintf( esc_html__( '%s (Invalid)', 'benedicta'), $item->title );
			} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
				$classes[] = 'pending';
				/* translators: %s: title of menu item in draft status */
				$title = sprintf( esc_html__('%s (Pending)', 'benedicta'), $item->title );
			}

			$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

			$submenu_text = '';
			if ( 0 == $depth )
				$submenu_text = 'style="display: none;"';

			?>
			<li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode(' ', $classes ); ?>">
				<dl class="menu-item-bar">
					<dt class="menu-item-handle">
						<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo esc_attr( $submenu_text ); ?>><?php esc_attr_e( 'sub item', 'benedicta' ); ?></span></span>
						<span class="item-controls">
							<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
							<span class="item-order hide-if-js">
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-up-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'benedicta'); ?>">&#8593;</abbr></a>
								|
								<a href="<?php
									echo wp_nonce_url(
										add_query_arg(
											array(
												'action' => 'move-down-menu-item',
												'menu-item' => $item_id,
											),
											remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
										),
										'move-menu_item'
									);
								?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'benedicta'); ?>">&#8595;</abbr></a>
							</span>
							<a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php esc_attr_e('Edit Menu Item', 'benedicta'); ?>" href="<?php
								echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
							?>"></a>
						</span>
					</dt>
				</dl>

				<div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
					<?php if( 'custom' == $item->type ) : ?>
						<p class="field-url description description-wide">
							<label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
								<?php esc_attr_e( 'URL', 'benedicta' ); ?><br />
								<input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_url( $item->url ); ?>" />
							</label>
						</p>
					<?php endif; ?>
					<p class="description description-thin">
						<label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_attr_e( 'Navigation Label', 'benedicta' ); ?><br />
							<input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
						</label>
					</p>
					<p class="description description-thin">
						<label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_attr_e( 'Title Attribute', 'benedicta' ); ?><br />
							<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
						</label>
					</p>
					<p class="field-link-target description">
						<label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
							<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
							<?php esc_attr_e( 'Open link in a new window/tab', 'benedicta' ); ?>
						</label>
					</p>
					<p class="field-css-classes description description-thin">
						<label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_attr_e( 'CSS Classes (optional)', 'benedicta' ); ?><br />
							<input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
						</label>
					</p>
					<p class="field-xfn description description-thin">
						<label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_attr_e( 'Link Relationship (XFN)', 'benedicta' ); ?><br />
							<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
						</label>
					</p>
					<p class="field-description description description-wide">
						<label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
							<?php esc_attr_e( 'Description', 'benedicta' ); ?><br />
							<textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
							<span class="description"><?php esc_attr_e('The description will be displayed in the menu if the current theme supports it.', 'benedicta'); ?></span>
						</label>
					</p>
					<?php /* New fields insertion */ ?>
					<div class="clear"></div>
					<div class="benedicta-megamenu-options">
						<?php // Enable Mega Menu ?>
						<p class="field-benedicta-megamenu-status description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-status-<?php echo esc_attr( $item_id ); ?>">
								<input type="checkbox" id="edit-menu-item-benedicta-megamenu-status-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-status" name="menu-item-benedicta-megamenu-status[<?php echo esc_attr( $item_id ); ?>]" value="enabled" <?php checked( 'enabled', esc_attr( $item->benedicta_megamenu_status ), true ); ?> />
								<strong><?php esc_attr_e( 'Enable Mega Menu', 'benedicta' ); ?></strong>
							</label>
						</p>
						<?php // Mega Menu Columns ?>
						<p class="field-benedicta-megamenu-columns description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-columns-<?php echo esc_attr( $item_id ); ?>">
								<?php esc_attr_e( 'Number of Columns', 'benedicta' ); ?>
								<select id="edit-menu-item-benedicta-megamenu-columns-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-columns" name="menu-item-benedicta-megamenu-columns[<?php echo esc_attr( $item_id ); ?>]">
									<option value="2" <?php selected( '2', esc_attr( $item->benedicta_megamenu_columns ), true ); ?>><?php esc_attr_e( '2', 'benedicta' ); ?></option>
									<option value="3" <?php selected( '3', esc_attr( $item->benedicta_megamenu_columns ), true ); ?>><?php esc_attr_e( '3', 'benedicta' ); ?></option>
									<option value="4" <?php selected( '4', esc_attr( $item->benedicta_megamenu_columns ), true ); ?>><?php esc_attr_e( '4', 'benedicta' ); ?></option>
								</select>
							</label>
						</p>
						<?php // Disable Mega Menu Column Title ?>						
						<p class="field-benedicta-megamenu-title description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-title-<?php echo esc_attr( $item_id ); ?>">
								<input type="checkbox" id="edit-menu-item-benedicta-megamenu-title-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-title" name="menu-item-benedicta-megamenu-title[<?php echo esc_attr( $item_id ); ?>]" value="disabled" <?php checked( 'disabled', esc_attr( $item->benedicta_megamenu_title ), true ); ?> />
								<?php esc_attr_e( 'Disable Title', 'benedicta' ); ?>
							</label>
						</p>
						<?php // Disable Mega Menu Column Title Link ?>						
						<p class="field-benedicta-megamenu-link description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-link-<?php echo esc_attr( $item_id ); ?>">
								<input type="checkbox" id="edit-menu-item-benedicta-megamenu-link-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-link" name="menu-item-benedicta-megamenu-link[<?php echo esc_attr( $item_id ); ?>]" value="disabled" <?php checked( 'disabled', esc_attr( $item->benedicta_megamenu_link ), true ); ?> />
								<?php esc_attr_e( 'Disable Title Link', 'benedicta' ); ?>
							</label>
						</p>
						<?php // Mega Menu Label ?>						
						<p class="field-benedicta-megamenu-label description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-label-<?php echo esc_attr( $item_id ); ?>">
								<?php esc_attr_e( 'Menu item label', 'benedicta' ); ?>
								<select id="edit-menu-item-benedicta-megamenu-label-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-label" name="menu-item-benedicta-megamenu-label[<?php echo esc_attr( $item_id ); ?>]">
									<option value="" <?php selected('', esc_attr( $item->benedicta_megamenu_label ), true); ?>><?php esc_attr_e( 'no label', 'benedicta' ); ?></option>
									<option value="new" <?php selected( 'new', esc_attr( $item->benedicta_megamenu_label ), true ); ?>><?php esc_attr_e( 'new', 'benedicta' ); ?></option>
									<option value="hot" <?php selected( 'hot', esc_attr( $item->benedicta_megamenu_label ), true ); ?>><?php esc_attr_e( 'hot', 'benedicta' ); ?></option>
									<option value="sale" <?php selected( 'sale', esc_attr( $item->benedicta_megamenu_label ), true ); ?>><?php esc_attr_e( 'sale', 'benedicta' ); ?></option>
								</select>								
							</label>
						</p>
						<?php // Mega Menu Widget Area ?>
						<p class="field-benedicta-megamenu-widgetarea description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-widgetarea-<?php echo esc_attr( $item_id ); ?>">
								<?php esc_attr_e( 'Mega Menu Widget Area', 'benedicta' ); ?>
								<select id="edit-menu-item-benedicta-megamenu-widgetarea-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-widgetarea" name="menu-item-benedicta-megamenu-widgetarea[<?php echo esc_attr( $item_id ); ?>]">
									<option value="0"><?php esc_attr_e( 'Select Widget Area', 'benedicta' ); ?></option>
									<?php
									global $wp_registered_sidebars;
									if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ):
									foreach( $wp_registered_sidebars as $sidebar ):
									?>
									<option value="<?php echo esc_attr( $sidebar['id'] ); ?>" <?php selected( esc_attr( $item->benedicta_megamenu_widgetarea ), $sidebar['id'] ); ?>><?php echo esc_attr( $sidebar['name'] ); ?></option>
									<?php endforeach; endif; ?>
								</select>
							</label>
						</p>
						<?php // Mega Menu Custom Content ?>	
						<p class="field-benedicta-megamenu-content description description-wide">
							<label for="edit-menu-item-benedicta-megamenu-content-<?php echo esc_attr( $item_id ); ?>">
								<?php esc_attr_e( 'Mega Menu Content', 'benedicta' ); ?>
								<textarea id="edit-menu-item-benedicta-megamenu-content-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-benedicta-megamenu-content" rows="3" cols="20" name="menu-item-benedicta-megamenu-content[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->benedicta_megamenu_content ); // textarea_escaped ?></textarea>
								<span class="description"><?php esc_attr_e('Mega Menu Content area will be any shortcodes or HTML block. Use if not choosed any widget area.', 'benedicta'); ?></span>
							</label>
						</p>
					</div>
					<?php /* New fields insertion Ends */ ?>
					<p class="field-move hide-if-no-js description description-wide">
						<label>
							<span><?php esc_attr_e( 'Move', 'benedicta' ); ?></span>
							<a href="#" class="menus-move-up"><?php esc_attr_e( 'Up one', 'benedicta' ); ?></a>
							<a href="#" class="menus-move-down"><?php esc_attr_e( 'Down one', 'benedicta' ); ?></a>
							<a href="#" class="menus-move-left"></a>
							<a href="#" class="menus-move-right"></a>
							<a href="#" class="menus-move-top"><?php esc_attr_e( 'To the top', 'benedicta' ); ?></a>
						</label>
					</p>

					<div class="menu-item-actions description-wide submitbox">
						<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
							<p class="link-to-original">
								<?php printf( esc_html__('Original: %s', 'benedicta'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
							</p>
						<?php endif; ?>
						<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php
						echo wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'delete-menu-item',
									'menu-item' => $item_id,
								),
								admin_url( 'nav-menus.php' )
							),
							'delete-menu_item_' . $item_id
						); ?>"><?php esc_attr_e( 'Remove', 'benedicta' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
							?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php esc_attr_e('Cancel', 'benedicta'); ?></a>
					</div>
					<div class="clear"></div>

					<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>" />
					<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
					<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
					<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
					<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
					<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
				</div><!-- .menu-item-settings-->
				<ul class="menu-item-transport"></ul>
			<?php $output .= ob_get_clean(); 
		}

    } // end benedicta_Backend_Walker_Nav_Menu() class

}

//	Parallax Menu Links Creation
if ( ! function_exists( 'benedicta_get_parallax_link' ) ) {

	function benedicta_get_parallax_link( $item ) {
		global $wp_query;

		$post_data = $link = '';
	   
		// Front and Blog page
		$blog_page_id 	= get_option('page_for_posts');
		$front_page_id 	= get_option('page_on_front');
		
		// Get URL
		if( !is_page_template( 'template-parallax-page' ) ) {
			$blog_url = esc_url( home_url() ) . '/';
		} else {
			$blog_url = '';
		}
		
		$front_url   = is_front_page() ? esc_url( $blog_url ) . '#section-top' : esc_url( home_url() ) . '/' ;
		
		if ( !empty( $item->object_id ) ) {
			$post_data = get_post($item->object_id);
		}
		
		$slug = ( isset($post_data->post_name)) ? $post_data->post_name : '';
		
		// Regular link for blog - all other menu items are anchors
		if( $blog_page_id == ( isset( $item->object_id ) && $item->object_id ) || $item->benedicta_megamenu_menutype == 'page' ) {
			
			$link = ! empty( $item->url ) ? esc_attr( $item->url ) : '';
			
		} 
		// Regular link for the front page or an anchors
		elseif( $front_page_id == $item->object_id ) {
			
			// Front page
			if( is_front_page() ) {				
				$link = ! empty( $item->url ) ? esc_url( $blog_url ) . '#section-top' : '';
			} else {
				// Regular link
				$link = ! empty( $item->url ) ? esc_attr( $item->url ) : '';				
				
			}
			
		} else {
			$link = ! empty( $slug ) ? esc_url( $blog_url ) . '#section-' . esc_attr( $slug ) : '';
		}
		
		return $link;
		
	}
	
}