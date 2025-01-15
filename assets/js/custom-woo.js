jQuery(document).ready(function($) {
	"use strict";
	
	//	List widgets
	jQuery('.widget_product_categories ul li').each(function(){
		var str = jQuery(this).html();
		str = str.replace('(', '<span class="val">- ');
		str = str.replace(')', '</span>');

		jQuery(this).html(str);
	});
	
	//	WooCommerce Quantity btn
	if (jQuery('.woocommerce .quantity input.qty, .woocommerce-page .quantity input.qty').size() > 0) {
		jQuery(this).find('.input-text.qty').attr('type', 'text');
		var $testProp = $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).find( 'qty' );
		if ( $testProp && $testProp.prop( 'type' ) != 'date' ) {
			// Quantity buttons
			$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<span class="plus"></span>' ).prepend( '<span class="minus"></span>' );

			// Target quantity inputs on product pages
			$( 'input.qty:not(.product-quantity input.qty)' ).each(	function() {

					var min = parseFloat( $( this ).attr( 'min' ) );

					if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
						$( this ).val( min );
					}
				}
			);

			$( document ).on('click', '.plus, .minus', function() {

				// Get values
				var $qty = $( this ).closest( '.quantity' ).find( '.qty' ),
					currentVal = parseFloat( $qty.val() ),
					max = parseFloat( $qty.attr( 'max' ) ),
					min = parseFloat( $qty.attr( 'min' ) ),
					step = $qty.attr( 'step' );

				// Format values
				if ( !currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
				if ( max === '' || max === 'NaN' ) max = '';
				if ( min === '' || min === 'NaN' ) min = 0;
				if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

				// Change the value
				if ( $( this ).is( '.plus' ) ) {

					if ( max && ( max == currentVal || currentVal > max ) ) {
						$qty.val( max );
					} else {
						$qty.val( currentVal + parseFloat( step ) );
					}

				} else {

					if ( min && ( min == currentVal || currentVal < min ) ) {
						$qty.val( min );
					} else if ( currentVal > 0 ) {
						$qty.val( currentVal - parseFloat( step ) );
					}

				}

				// Trigger change event
				$qty.trigger( 'change' );
			});
		}
	}
	
	//	Product Categories Count
	if (jQuery('ul.products li.product-category').size() > 0) {
		jQuery('ul.products li.product-category .count').each(function(){
			var str = jQuery(this).html();
			str = str.replace('(', '');
			str = str.replace(')', '');

			jQuery(this).html(str);
		});
	}

	
	// Product Thumbail Slick
	if (jQuery('#product-images-content').size() > 0) {

		var $thumbnails = $('#product-thumbnails').find('.thumbnails'),
			$images = $('#product-images');

		// Product thumnails and featured image slider
		$images.not('.slick-initialized').slick({
			slidesToShow  : 1,
			slidesToScroll: 1,
			infinite      : false,
			asNavFor      : $thumbnails,
			prevArrow     : '<span class="fa fa-angle-left slick-prev-arrow"></span>',
			nextArrow     : '<span class="fa fa-angle-right slick-next-arrow"></span>'
		});

		$thumbnails.not('.slick-initialized').slick({
			slidesToShow  : 6,
			slidesToScroll: 1,
			asNavFor      : $images,
			focusOnSelect : true,
			vertical      : true,
			infinite      : false,
			prevArrow     : '<span class="fa fa-angle-up slick-prev-arrow"></span>',
			nextArrow     : '<span class="fa fa-angle-down slick-next-arrow"></span>'
		});
		
	};
	
});

jQuery(window).load(function(){
	"use strict";
	
	
});