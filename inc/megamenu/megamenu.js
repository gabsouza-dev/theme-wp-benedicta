/*
 * benedicta Theme Megamenu Framework
 */

( function( $ ) {

	"use strict";
	
	var benedicta_megamenu = {

		menu_item_move: function() {
			$(document).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $(event.target).is('a') ) {
					setTimeout( benedicta_megamenu.update_megamenu_fields, 200 );
				}
			});
		},

		update_megamenu_status: function() {

			$(document).on( 'click', '.edit-menu-item-benedicta-megamenu-status', function() {
				var parent_menu_item = $( this ).parents( '.menu-item:eq(0)' );

				if( $( this ).is( ':checked' ) ) {
					parent_menu_item.addClass( 'benedicta-megamenu-active' );
				} else 	{
					parent_menu_item.removeClass( 'benedicta-megamenu-active' );
				}

				benedicta_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_items = $( '.menu-item');

			menu_items.each( function( i ) 	{

				var benedicta_megamenu_status = $( '.edit-menu-item-benedicta-megamenu-status', this );

				if( ! $(this).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_items.filter( ':eq('+(i-1)+')' );

					if( check_against.is( '.benedicta-megamenu-active' ) ) {

						benedicta_megamenu_status.attr( 'checked', 'checked' );
						$(this).addClass( 'benedicta-megamenu-active' );
					} else {
						benedicta_megamenu_status.attr( 'checked', '' );
						$(this).removeClass( 'benedicta-megamenu-active' );
					}
				} else {
					if( benedicta_megamenu_status.attr( 'checked' ) ) {
						$(this).addClass( 'benedicta-megamenu-active' );
					}
				}
			});
		}

	};
	
	$(document).ready(function(){
	
		benedicta_megamenu.menu_item_move();
		benedicta_megamenu.update_megamenu_status();
		benedicta_megamenu.update_megamenu_fields();
		
	});
	
})( jQuery );