"use strict";

window.jQuery = window.$ = jQuery;

//	Header Height
function benedictaHeaderHeight() {
	
	var headerWrapH = jQuery('header.header-top .header_wrap').height();
	jQuery('#page-wrap > header.header-top').css('padding-bottom', headerWrapH + 'px');
	
	var headerH = jQuery('header.header-top').height();
	jQuery('#pagetitle .container').css('padding-top', headerH + headerWrapH + 'px');
	
	jQuery('body.pagetitle_hide #breadcrumbs').css('margin-top', headerH + headerWrapH + 'px');
	if ( !jQuery('#default_page .contentarea .vc_row:first div').hasClass('rev_slider_wrapper') ) {
		if ( jQuery('body.single-post #pagetitle').hasClass('pagetitle_fullscreen') ) {
			jQuery('body.pagetitle_hide.breadcrumbs_hide #page-content').css('margin-top', '0px');
		} else {
			jQuery('body.pagetitle_hide.breadcrumbs_hide #page-content').css('margin-top', headerH + headerWrapH + 'px');
		}
	} else {
		if ( ( !jQuery('body').hasClass('header_bgcolor') || jQuery('body').hasClass('header_opacity') ) || jQuery(window).width() < 769 ) {
			jQuery('body #page-content').css('padding-top', '0px');
		} else {
			jQuery('body.pagetitle_hide.breadcrumbs_hide #page-content').css('padding-top', headerH + headerWrapH + 'px');
		}
		jQuery('body').addClass('slider_first_row');
	}
	
}

//	Blog Posts Metro Style size
function benedictaBlogMetroHeight() {
	if (jQuery('#blog_list.metro').size() > 0) {
		jQuery('#blog_list.metro article.post').each(function(){
			var postW = jQuery(this).find('.post-content-wrapper').width();
			if (jQuery(this).hasClass('sizing_width2')) {
				if (jQuery('.sizing_width2').hasClass('pl0')) {
					jQuery(this).find('.post-content-wrapper').css('height', postW / 2 + 'px');
				} else {
					jQuery(this).find('.post-content-wrapper').css('height', postW / 2 - 15 + 'px');
				}
			} else if (jQuery(this).hasClass('sizing_height2')) {
				if (jQuery('.sizing_height2').hasClass('pl0')) {
					jQuery(this).find('.post-content-wrapper').css('height', postW * 2 + 'px');
				} else {
					jQuery(this).find('.post-content-wrapper').css('height', postW * 2 + 30 + 'px');
				}
			} else {
				jQuery(this).find('.post-content-wrapper').css('height', postW + 'px');
			}
		});
	}
}

//	Sidebar Height
function benedictaSidebarHeight() {
	
	if( jQuery('#blog_sidebar').length && jQuery(window).width() > 1025 ) {
		var BlogSidebarContentH = jQuery('#blog_sidebar').parent().parent().height();
		jQuery('#blog_sidebar').css('min-height', BlogSidebarContentH + 'px');
	}
}

// Subscribe Form
function benedicta_subscribe_form() {
	
	jQuery('.wpb_column .mc4wp-form').each(function() {
		var mc4wp_wrap = jQuery(this).find('.mc4wp-form'),
			mc4wp_email = jQuery(this).find('.mc4wp_email_wrap'),
			mc4wp_submit = jQuery(this).find('.mc4wp_submit_wrap');
		
		mc4wp_email.css({'width': jQuery(this).width() - mc4wp_submit.width() - 30 + 'px'});
	});
}


//	Header Sticky
function benedicta_headerSticky() {
	"use strict";
	
	if ( jQuery('body').hasClass('admin-bar') ) {
		var headerWrapH = jQuery('header.header-top .header_wrap.fixed').height() - 32;
	} else {
		var headerWrapH = jQuery('header.header-top .header_wrap.fixed').height();
	}
	if ( ( jQuery(window).scrollTop() > jQuery('header').height() + headerWrapH ) && ( jQuery(window).width() > 767 ) && ( !jQuery('body').hasClass('error404') ) ) {
		jQuery('body').addClass('header-fixed');
		jQuery('header.header-top .header_wrap.fixed').css({'top': ' -' + headerWrapH + 'px', 'bottom': 'auto'});
	} else {
		jQuery('body').removeClass('header-fixed');
		jQuery('header.header-top .header_wrap.fixed').css({'bottom': '0', 'top': 'auto'});
	}
}


//	Header Type logo at center
function benedicta_set_center_logo(){
	if( jQuery('header.header_type4').length ) {
		
		var logo_size = jQuery('header.header_type4 .cstheme-logo').width();
		
		if( logo_size > 0 ){
			var logo_size_h = jQuery('header.header_type4 .cstheme-logo').height() + 40;
			var logo_size_m = ( logo_size + 80 ) / 2;
		}
	
		var total_menu_items = jQuery('.menu-primary-menu-container-wrap > ul > li').length;
		var half_position_even = total_menu_items / 2;
		var half_position_odd = ( total_menu_items + 1 ) / 2;
		var ex = /^\d+$/;
		
		if ( ex.test( total_menu_items / 2 ) ) {
			jQuery('.menu-primary-menu-container-wrap > ul > li:nth-child('+half_position_even+')').addClass('cl_before_logo');
			jQuery('.menu-primary-menu-container-wrap > ul > li:nth-child('+(half_position_even+1)+')').addClass('cl_after_logo');
		} else {
			jQuery('.menu-primary-menu-container-wrap > ul > li:nth-child('+half_position_odd+')').addClass('cl_before_logo');
			jQuery('.menu-primary-menu-container-wrap > ul > li:nth-child('+(half_position_odd+1)+')').addClass('cl_after_logo');
		}
		
		jQuery('.cl_before_logo').css('margin-right',logo_size_m);
		jQuery('.cl_after_logo').css('margin-left',logo_size_m);
		jQuery('.header_wrap > .container').css('height',logo_size_h);

	}
}


//	Video Iframe Size
function benedicta_video_size() {
	
	jQuery('.post-video, .portfolio_video, .cstheme_video_iframe, .single-post-content').each(function(){
		jQuery(this).find('iframe').css({'height': jQuery(this).width()*9/16 + 'px'});
	});
}


//	Blog Top Image min height
function benedicta_blogTopImageMinH() {
	
	if (jQuery('#blog_list.grid_top_img').size() > 0) {
		var PostMinH = jQuery('#blog_list.grid_top_img').find('.post.format-image').height();
		jQuery('#blog_list.grid_top_img').find('.format-quote .post-quote, .format-link .post-link').css({'height': PostMinH + 'px'});
	}

}


//	Blog Post Card Style min height
function benedicta_blog_card_minheight() {
	
	var post_height = jQuery('#blog_list.grid_card article.post.format-image').height();
	jQuery('#blog_list.grid_card article.post.format-quote .post-quote, #blog_list.grid_card article.post.format-link .post-link').css({'min-height': post_height + 'px'});
}

//	Portfolio Items ODD
function benedicta_portfolio_odd() {
	
	jQuery('#portfolio_list.chess article:odd').find('.col-md-7').addClass('pull-right').parent().addClass('odd');
	jQuery('#portfolio_list.chess article').each(function(){
		var portfolio_chess_img_h = jQuery(this).find('.portfolio_format_content').height(),
			portfolio_chess_txt_h = jQuery(this).find('.portfolio_descr_wrap').height(),
			portfolio_chess_txt_padtop = ( portfolio_chess_img_h - portfolio_chess_txt_h ) / 2;
		
		jQuery(this).find('.portfolio_descr_wrap').css({'padding-top': portfolio_chess_txt_padtop + 'px', 'padding-bottom': portfolio_chess_txt_padtop + 'px'});
	});
}

//	Coming Soon Page
function benedicta_coming_soon_h() {
	
	var windowH = jQuery(window).height();
	var coming_container_H = jQuery('.coming_soon_wrapper .container').height();
	
	jQuery('.coming_soon_wrapper').css({'min-height': windowH + 'px'});
	jQuery('.coming_soon_wrapper .container').css({'padding-top': (windowH - coming_container_H) / 2 + 'px'});
}

//	Slick Carousel Arrows
function benedicta_slickSliderAr() {
	
	var windowW = jQuery(window).width();
	var containerW = jQuery(".ult-carousel-wrapper").width();
	var leftPart = (windowW - containerW) / 2 - 50;
	jQuery(".slick-prev").css("left", -leftPart);
	jQuery(".slick-next").css("right", -leftPart);
}

function benedicta_creative_menu() {
	
	var windowH = jQuery(window).height(),
		menuH = jQuery('#menu-primary-menu').height(),
		logoH = jQuery('.cstheme-logo').height() + 60,
		copyrightH = jQuery('.menu_creative_bottom').height();
	
	jQuery('header.header_type2 .menu_creative_block').css({'min-height': windowH + 'px'});
	jQuery('header.header_type2 #menu-primary-menu').css({'min-height': windowH - copyrightH + 'px'});

	jQuery('header.left_fixed').css({'min-height': windowH + 'px'});
	jQuery('header.left_fixed .menu-primary-menu-container-wrap').css({'min-height': windowH - logoH - copyrightH + 'px'});

}

//	Single Post Fullscreen
function benedicta_singlepost_fullscreen() {
	
	var windowH = jQuery(window).height();
	
	jQuery('#pagetitle.pagetitle_fullscreen').css({'min-height': windowH + 'px'});
}

//	Fixed Footer
function benedicta_footerFixed(){
	
	if( jQuery('body').hasClass('footer_fixed') && !jQuery('body').hasClass('error404') && jQuery(window).width() > 1279 && jQuery(window).outerHeight(true) > jQuery('footer').outerHeight(true) ){
		jQuery('#page-content').css('margin-bottom', jQuery('footer').outerHeight(true));
		jQuery('footer').addClass('fixed');
	}

}

//	Post Format Gallery
function benedicta_post_gallery_carousel() {
	jQuery('.post_format_content .post-slider.owl-carousel').owlCarousel({
		items: 1,
		margin: 0,
		dots: true,
		nav: true,
		navText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
		],
		loop: true,
		autoplay: true,
		autoplaySpeed: 1000,
		autoplayTimeout: 5000,
		navSpeed: 1000,
		autoplayHoverPause: true,
		thumbs: false
	});
}


function benedicta_portfolio_single_carousel_layout() {
	if (jQuery('#portfolio_single_wrap.gallery_full_width').size() > 0) {
		var FullwidthContainer = jQuery(window).width(),
			container = jQuery('#page-content > .container').width(),
			marginLeft = ( jQuery(window).width() - container ) / 2;
		
		jQuery('.portfolio_format_content').css({'margin-left': -marginLeft + 'px', 'width': FullwidthContainer + 'px', 'padding': '0 50px'});
	}
	
	/*if (jQuery('#portfolio_single_wrap.half_width.position_pull_left').size() > 0) {
		var container = jQuery('#page-content > .container').width(),
			marginLeft = ( jQuery(window).width() - container ) / 2;
		
		jQuery('.portfolio_format_content').css({'margin-left': -marginLeft + 'px', 'margin-top': '-100px', 'margin-bottom': '-100px'});
	}*/
}

jQuery(document).ready(function($) {
	
	//	Preloader
	jQuery("#loader .bar").animate({
		width : '100%'
	}, 1500, function(){
		jQuery("#loader").fadeOut(500);
	});
	
	//	Empty href
	jQuery('.nav-menu a:not([href])').addClass('nohref');

	benedictaHeaderHeight();

	benedicta_set_center_logo();
	
	if (jQuery('blockquote').size() > 0) {
		jQuery('blockquote').prepend($('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 75.999 75.999" xml:space="preserve"><path d="M14.579,5C6.527,5,0,11.716,0,20c0,8.285,6.527,15,14.579,15C29.157,35,19.438,64,0,64v7 C34.69,71,48.286,5,14.579,5z M56.579,5C48.527,5,42,11.716,42,20c0,8.285,6.527,15,14.579,15C71.157,35,61.438,64,42,64v7 C76.69,71,90.286,5,56.579,5z"/></svg>'));
	}
	
	//	Header Search focus
	if (jQuery('header .header_search_icon').size() > 0) {
		var header_search_button = jQuery('.header_search_icon');
		var header_search_form = jQuery('.form_search_block');
		header_search_button.unbind('click').on('click touchend', function() {
			header_search_form.fadeToggle(250, function() {
				if (header_search_form.is(':visible')) {
					header_search_button.addClass('active');
				} else {
					header_search_button.removeClass('active');
				}
			});
			jQuery('.form_search_block input.search-field').focus();
			return false;
		});
	}
	
	//	Header Creative Menu
	if (jQuery('header .menu_creative_btn').size() > 0) {
		var menu_creative_btn = $('.menu_creative_btn'),
			menu_creative_btn_close = $('.menu_creative_btn .menu_close'),
			menu_creative_block = $('.menu_creative_block');
		
		menu_creative_block.hide();
		menu_creative_btn_close.hide();

		menu_creative_btn.unbind('click').on('click touchend', function() {
			setTimeout("benedicta_creative_menu()", 100);
			menu_creative_block.fadeToggle(250, function() {
				if (menu_creative_block.is(':visible')) {
					jQuery('header.header-top.header_type2').addClass('menu_active');
					menu_creative_btn_close.show();
				} else {
					jQuery('header.header-top.header_type2').removeClass('menu_active');
					menu_creative_btn_close.hide();
				}
			});
			return false;
		});
	}
	
	//	Creative Menu Func
	if (jQuery('.menu_creative_block').size() > 0) {
		jQuery('.menu-item-has-children').children('a').on('click', function(event) {
			event.preventDefault();
			jQuery(this).next('ul').slideToggle(300);
		});
	}


	//	Language Switcher
	if (jQuery('.lang_switcher').size() > 0) {
		
		var lang_switcher = jQuery('.lang_switcher');

		jQuery('.language_list li').on('click', function() {
			jQuery('.current_language').text(jQuery(this).text());
		});
		
		jQuery("html, body").on('click', function(e) {
			if (jQuery(e.target).hasClass('lang_btn') || jQuery(e.target).hasClass('current_language') || jQuery(e.target).hasClass('language_list')) {
				return false;
			}
		});
	}


	//	Left Fixed Menu Func
	if (jQuery('header.left_fixed').size() > 0) {
		benedicta_creative_menu();

		jQuery('.menu-item-has-children').children('a').on('click', function(event) {
			event.preventDefault();
			jQuery(this).next('ul').slideToggle(300);
		});
	}
	

	//	Onepage Scroll Scripts	
	if (jQuery('.onepage_menu').size() > 0) {
		if (jQuery('.onepage_div').size() > 0) {
			jQuery('header .nav-menu > li').first().addClass('current-menu-item');
			jQuery('header .nav-menu > li').find('a[href="'+window.location.hash+'"]').parent('li').addClass('current-menu-item');
			
			jQuery('a[href^="#"]').on('click', function(){
				var elementClick = jQuery(this).attr("href");
				if (jQuery('header.header-top').size() > 0) {
					var headerTopH = jQuery('header.header-top .header_wrap').height();
				} else {
					var headerTopH = 0;
				}
				var destination = jQuery(elementClick).offset().top - headerTopH;
				jQuery('html, body').animate({scrollTop: destination}, 1000);
				
				jQuery('header .nav-menu > li').find('.current-menu-item').removeClass('current-menu-item');
				var anchor = jQuery(this);
				if (jQuery(anchor.attr('href')).size() > 0) {
					jQuery('header .nav-menu > li').find('a[href="#'+jQuery(this).attr('id')+'"]').parent('li').addClass('current-menu-item');				
				}

				return false;
			});
		} else {
			var homeURL = jQuery('.cstheme-logo a').attr('href');
			jQuery('header .nav-menu li').each(function(){
				var menuLinkURL = jQuery(this).find('a').attr('href');
				jQuery(this).find('a').removeAttr('href');
				jQuery(this).find('a').attr('href', menuLinkURL);
			});
		}
	}

	
	//	Widget Recent Posts
	if (jQuery(".recent_posts_list.carousel").size() > 0) {
		jQuery(".recent_posts_list.carousel").owlCarousel({
			margin: 0,
			nav: false,
			loop: true,
			autoplay: true,
			autoplaySpeed: 1000,
			autoplayTimeout: 5000,
			navSpeed: 1000,
			autoplayHoverPause: true,
			items: 1,
			thumbs: false
		});
	}
	
	//	List widgets
	jQuery('.widget_archive ul li, .widget_categories ul li').each(function(){
		var str = jQuery(this).html();
		str = str.replace('(', '<span class="val">- ');
		str = str.replace(')', '</span>');

		jQuery(this).html(str);
	});
	
	jQuery('.widget_archive ul li li, .widget_categories ul li li').each(function(){
		var str = jQuery(this).html();
		str = str.replace('(', '<span class="val">- ');
		str = str.replace(')', '</span>');

		jQuery(this).html(str);
	});
	
	jQuery('.widget_archive ul li li li, .widget_categories ul li li li').each(function(){
		var str = jQuery(this).html();
		str = str.replace('(', '<span class="val">- ');
		str = str.replace(')', '</span>');

		jQuery(this).html(str);
	});
	
	//	Price Element
	if (jQuery('.ult_pricing_table').size() > 0) {
		var rex = new RegExp("([0-9]+)", "gm");

		$(".ult_pricing_table .ult_price_figure").each(function(){
			var $this = $(this);
			var content = $this.html();
			$this.html(content.replace(rex, '<span class="cstheme_price_figure">$1</span>'));
			var price_volue = jQuery(this).find('span.cstheme_price_figure').detach();
			jQuery(this).wrapInner('<span class="cstheme_price_value"></span>');
			if (jQuery(this).parent().find('.ult_price_term').html()) {
				jQuery(price_volue).appendTo(this);
			} else {
				jQuery(price_volue).prependTo(this);
			}
		});
		
		jQuery('.ult_pricing_table_wrap.ult_design_5').each(function(){
			if (jQuery(this).hasClass('ult_featured')) {
				jQuery(this).removeClass('ult_featured');
				jQuery(this).parent().parent().addClass('ult_price_item_featured');
			}
		});
	}
	
	
	//	Team Element
	if (jQuery('.ult-team-member-wrap').size() > 0) {
		jQuery('.ult-team-member-wrap.ult-style-1').each(function(){
			jQuery(this).find('.ult-team-member-name').before('<span class="member-name-divider"></span>');
			
			var team_socials = jQuery(this).find('.ult-social-buttons').detach();
			jQuery(this).find('.ult-team-member-image-overlay').after(team_socials);
		});
		
		jQuery('.ult-team-member-wrap.ult-style-2').each(function(){
			var team_style = jQuery(this).attr('style');
			var team_style2 = jQuery(this).find('.ult-team-member-image').attr('style');
			jQuery(this).find('.ult-team-member-image img').after('<span class="csteam_overlay" style="' + team_style2 + '' + team_style + ';"></span>');
		});
		
		jQuery('.ult-team-member-wrap.ult-style-3').each(function(){
			var team_style = jQuery(this).find('.ult-team-member-image').attr('style');
			jQuery(this).attr('style', team_style);
			
			var team_descr = jQuery(this).find('.ult-team-member-description').detach();
			jQuery(this).find('.ult-team-member-name').after(team_descr);
			
			var team_position = jQuery(this).find('.ult-team-member-position').detach();
			jQuery(this).find('.ult-team-member-name').before(team_position);
		});
	}
	
	
	//	Mobile Menu Function
	if (jQuery('#header_mobile_wrap').size() > 0) {
		jQuery('.mobile_menu_btn').on('click', function () {
			jQuery('#header_mobile_wrap .menu-primary-menu-container-wrap').slideToggle();
		});
		
		jQuery('#header_mobile_wrap ul.sub-menu').hide();
		jQuery('#header_mobile_wrap .menu-item-has-children').children('a').on('click', function(event) {
			event.preventDefault();
			jQuery(this).toggleClass('submenu_open');
			jQuery(this).next('ul').slideToggle(300);
		});
	}
	
	//	Contact Form 6 focus
	if (jQuery('.cstheme_contactform_type6').size() > 0) {
		jQuery('.cstheme_contactform_type6 span').each(function(){
			jQuery('.wpcf7-form-control').blur(function() {
				jQuery('.wpcf7-form-control').parent().removeClass("focus");
			}).focus(function() {
				jQuery(this).parent().addClass("focus")
			});
		});
	}
	
	//	Contact Form 5 focus
	if (jQuery('.cstheme_contactform_type5').size() > 0) {
		jQuery('.cstheme_contactform_type5 span').each(function(){
			jQuery('.wpcf7-form-control').blur(function() {
				jQuery('.wpcf7-form-control').parent().removeClass("focus");
			}).focus(function() {
				jQuery(this).parent().addClass("focus")
			});
		});
	}
	
	//	Contact Form 9 focus
	if (jQuery('.cstheme_contactform_type9').size() > 0) {
		jQuery('.cstheme_contactform_type9 span').each(function(){
			jQuery('.wpcf7-form-control').blur(function() {
				jQuery('.wpcf7-form-control').parent().removeClass("focus");
			}).focus(function() {
				jQuery(this).parent().addClass("focus")
			});
		});
	}
	
	//	Contact Form 10 focus
	if (jQuery('.cstheme_contactform_type10').size() > 0) {
		jQuery('.cstheme_contactform_type10 span').each(function(){
			jQuery('.wpcf7-form-control').blur(function() {
				jQuery('.wpcf7-form-control').parent().removeClass("focus");
			}).focus(function() {
				jQuery(this).parent().addClass("focus")
			});
		});
	}
	
	//	MailChimp focus
	if (jQuery('.mc4wp-form-fields').size() > 0) {
		jQuery('.mc4wp-form-fields .mc4wp_email_wrap').each(function(){
			jQuery('input').blur(function() {
				jQuery('input').parent().removeClass("focus");
			}).focus(function() {
				jQuery(this).parent().addClass("focus")
			});
		});
	}
	
	//	if no Related Posts
	if( jQuery('#related_posts_list .item').length < 1 ) {
		jQuery('#related_posts_list').hide();
	}
	
	
	benedicta_subscribe_form();
	
	if (jQuery('#footer-backtop').size() > 0) {
		var backtop = $( '#footer-backtop' );
		$( window ).scroll(function() {
			if( $( this ).scrollTop() > $( window ).height() ) {
				backtop.show();
			} else {
				backtop.hide();
			}
		});
		backtop.on('click touchend', function() {
			$( 'body,html' ).animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	}
	
});


jQuery(window).load(function(){
	
	//	Video Iframe Size
	benedicta_video_size();
	
	//	Evatheme Preloader
	setTimeout(function () {
		jQuery('.evatheme_preloader').fadeOut();
	}, 1000);

	setTimeout(function () {
		benedictaSidebarHeight();
	}, 2000);
	
	if (jQuery("#portfolio_list.carousel").size() > 0) {
		jQuery("#portfolio_list").each(function(){
			jQuery(this).find(".owl-prev").empty().append("<i></i>");
			jQuery(this).find(".owl-next").empty().append("<i></i>");
		});
	}
	
	
	//	VC Gallery Img Alt
	if (jQuery(".wpb_image_grid_uls").size() > 0) {
		jQuery(".wpb_image_grid_uls li").each(function(){
			var gal_alt = jQuery(this).find('img').attr('alt');
			jQuery(this).find('.wpb_gallery_img_alt').append(gal_alt);
		});
	}

	
	//	Blog Posts Metro Style size
	if (jQuery('#blog_list.metro').size() > 0) {
		benedictaBlogMetroHeight();
	}
	
	//	Portfolio Gallery format
	if (jQuery("#portfolio_single_wrap.format-gallery .post-slider.owl-carousel").size() > 0) {
		jQuery('.post-slider.owl-carousel').owlCarousel({
			items: 1,
			margin: 0,
			dots: true,
			nav: true,
			navText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			],
			loop: true,
			autoplay: true,
			autoplaySpeed: 1000,
			autoplayTimeout: 5000,
			navSpeed: 1000,
			autoplayHoverPause: true,
			thumbs: false
		});
	}
	
	if( jQuery('.swipebox').size() > 0 ) {
		
		jQuery("a.swipebox").each(function(){
			var title = jQuery(this).find('img').attr('alt');
			jQuery(this).attr('title', title);
		});

		jQuery( '.swipebox' ).swipebox({
			afterOpen: function(){
		        var $selectorClose = $("#swipebox-close");
		        var clickAction = "touchend click";

		        $selectorClose.unbind(clickAction);

		        $selectorClose.bind(clickAction, function(event){
		          event.preventDefault();
		          event.stopPropagation();

		          $.swipebox.close();
		        });
			}
		});
	}
	
	benedicta_coming_soon_h();
	
	benedicta_portfolio_odd();
	
	benedicta_blog_card_minheight();
	
	benedicta_slickSliderAr();
	
	benedicta_singlepost_fullscreen();
	
	benedicta_footerFixed();
	
	benedicta_blogTopImageMinH();
	
	benedicta_portfolio_single_carousel_layout();
	
});

jQuery(window).resize(function(){
	
	//	Blog Posts Metro Style size
	if (jQuery('#blog_list.metro').size() > 0) {
		benedictaBlogMetroHeight();
	}
	
	// Header Sticky
	if ( jQuery('.header_wrap').hasClass('fixed') ) {
		benedicta_headerSticky();
	}

	//	Video Iframe Size
	benedicta_video_size();
	
	benedicta_post_gallery_carousel();
	
	benedicta_coming_soon_h();
	
	benedicta_creative_menu();

	benedictaHeaderHeight();
	
	benedictaSidebarHeight();
	
	benedicta_subscribe_form();
	
	benedicta_portfolio_odd();
	
	benedicta_blog_card_minheight();
	
	benedicta_slickSliderAr();
	
	benedicta_singlepost_fullscreen();
	
	benedicta_footerFixed();
	
	benedicta_blogTopImageMinH();
	
	benedicta_portfolio_single_carousel_layout();
	
});

jQuery(window).scroll(function(){
	
	// Header Sticky
	if ( jQuery('.header_wrap').hasClass('fixed') ) {
		benedicta_headerSticky();
	}

	if (jQuery('.onepage_menu').size() > 0) {
		if (jQuery('header.header-top').size() > 0) {
			var headerTopH = jQuery('header.header-top .header_wrap').height() + 50;
		} else {
			var headerTopH = 0;
		}
		jQuery('.contentarea > .vc_row-fluid').each(function(){	
			if(jQuery(window).scrollTop() > jQuery(this).offset().top - headerTopH && jQuery(window).scrollTop() < jQuery(this).offset().top - headerTopH + jQuery(this).height()) {
				jQuery('.current-menu-item').removeClass('current-menu-item');
				jQuery('header .nav-menu > li').find('a[href="#'+jQuery(this).attr('id')+'"]').parent('li').addClass('current-menu-item');
			}
		});
	}

	//	if Footer fixed and site boxed
	if (jQuery('body.boxed footer.fixed').size() > 0) {
		if( jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 10) {
			jQuery('footer.fixed').addClass('active');
		} else {
			jQuery('footer.fixed').removeClass('active');
		}
	}
});