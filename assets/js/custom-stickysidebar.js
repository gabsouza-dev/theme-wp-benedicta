/*!
 * Theia Sticky Sidebar v1.7.0
 * https://github.com/WeCodePixels/theia-sticky-sidebar
 *
 * Glues your website's sidebars, making them permanently visible while scrolling.
 *
 * Copyright 2013-2016 WeCodePixels and other contributors
 * Released under the MIT license
 */

!function(i){i.fn.theiaStickySidebar=function(t){var e,o,a,s,n,d;function r(t,e){return!0===t.initialized||!(i("body").width()<t.minWidth)&&(function(t,e){t.initialized=!0,0===i("#theia-sticky-sidebar-stylesheet-"+t.namespace).length&&i("head").append(i('<style id="theia-sticky-sidebar-stylesheet-'+t.namespace+'">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));e.each(function(){var e={};if(e.sidebar=i(this),e.options=t||{},e.container=i(e.options.containerSelector),0==e.container.length&&(e.container=e.sidebar.parent()),e.sidebar.parents().css("-webkit-transform","none"),e.sidebar.css({position:e.options.defaultPosition,overflow:"visible","-webkit-box-sizing":"border-box","-moz-box-sizing":"border-box","box-sizing":"border-box"}),e.stickySidebar=e.sidebar.find(".theiaStickySidebar"),0==e.stickySidebar.length){var o=/(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;e.sidebar.find("script").filter(function(i,t){return 0===t.type.length||t.type.match(o)}).remove(),e.stickySidebar=i("<div>").addClass("theiaStickySidebar").append(e.sidebar.children()),e.sidebar.append(e.stickySidebar)}e.marginBottom=parseInt(e.sidebar.css("margin-bottom")),e.paddingTop=parseInt(e.sidebar.css("padding-top")),e.paddingBottom=parseInt(e.sidebar.css("padding-bottom"));var a,s,n,d=e.stickySidebar.offset().top,r=e.stickySidebar.outerHeight();function p(){e.fixedScrollTop=0,e.sidebar.css({"min-height":"1px"}),e.stickySidebar.css({position:"static",width:"",transform:"none"})}e.stickySidebar.css("padding-top",1),e.stickySidebar.css("padding-bottom",1),d-=e.stickySidebar.offset().top,r=e.stickySidebar.outerHeight()-r-d,0==d?(e.stickySidebar.css("padding-top",0),e.stickySidebarPaddingTop=0):e.stickySidebarPaddingTop=1,0==r?(e.stickySidebar.css("padding-bottom",0),e.stickySidebarPaddingBottom=0):e.stickySidebarPaddingBottom=1,e.previousScrollTop=null,e.fixedScrollTop=0,p(),e.onScroll=function(e){if(e.stickySidebar.is(":visible"))if(i("body").width()<e.options.minWidth)p();else{if(e.options.disableOnResponsiveLayouts){var o=e.sidebar.outerWidth("none"==e.sidebar.css("float"));if(o+50>e.container.width())return void p()}var a,s,n=i(document).scrollTop(),d="static";if(n>=e.sidebar.offset().top+(e.paddingTop-e.options.additionalMarginTop)){var r,b=e.paddingTop+t.additionalMarginTop,l=e.paddingBottom+e.marginBottom+t.additionalMarginBottom,h=e.sidebar.offset().top,f=e.sidebar.offset().top+(a=e.container,s=a.height(),a.children().each(function(){s=Math.max(s,i(this).height())}),s),g=0+t.additionalMarginTop,S=e.stickySidebar.outerHeight()+b+l<i(window).height();r=S?g+e.stickySidebar.outerHeight():i(window).height()-e.marginBottom-e.paddingBottom-t.additionalMarginBottom;var m=h-n+e.paddingTop,y=f-n-e.paddingBottom-e.marginBottom,u=e.stickySidebar.offset().top-n,k=e.previousScrollTop-n;"fixed"==e.stickySidebar.css("position")&&"modern"==e.options.sidebarBehavior&&(u+=k),"stick-to-top"==e.options.sidebarBehavior&&(u=t.additionalMarginTop),"stick-to-bottom"==e.options.sidebarBehavior&&(u=r-e.stickySidebar.outerHeight()),u=k>0?Math.min(u,g):Math.max(u,r-e.stickySidebar.outerHeight()),u=Math.max(u,m),u=Math.min(u,y-e.stickySidebar.outerHeight());var v=e.container.height()==e.stickySidebar.outerHeight();d=(v||u!=g)&&(v||u!=r-e.stickySidebar.outerHeight())?n+u-e.sidebar.offset().top-e.paddingTop<=t.additionalMarginTop?"static":"absolute":"fixed"}if("fixed"==d){var x=i(document).scrollLeft();e.stickySidebar.css({position:"fixed",width:c(e.stickySidebar)+"px",transform:"translateY("+u+"px)",left:e.sidebar.offset().left+parseInt(e.sidebar.css("padding-left"))-x+"px",top:"0px"})}else if("absolute"==d){var T={};"absolute"!=e.stickySidebar.css("position")&&(T.position="absolute",T.transform="translateY("+(n+u-e.sidebar.offset().top-e.stickySidebarPaddingTop-e.stickySidebarPaddingBottom)+"px)",T.top="0px"),T.width=c(e.stickySidebar)+"px",T.left="",e.stickySidebar.css(T)}else"static"==d&&p();"static"!=d&&1==e.options.updateSidebarHeight&&e.sidebar.css({"min-height":e.stickySidebar.outerHeight()+e.stickySidebar.offset().top-e.sidebar.offset().top+e.paddingBottom}),e.previousScrollTop=n}},e.onScroll(e),i(document).on("scroll."+e.options.namespace,(a=e,function(){a.onScroll(a)})),i(window).on("resize."+e.options.namespace,(s=e,function(){s.stickySidebar.css({position:"static"}),s.onScroll(s)})),"undefined"!=typeof ResizeSensor&&new ResizeSensor(e.stickySidebar[0],(n=e,function(){n.onScroll(n)}))})}(t,e),!0)}function c(i){var t;try{t=i[0].getBoundingClientRect().width}catch(i){}return void 0===t&&(t=i.width()),t}return(t=i.extend({containerSelector:"",additionalMarginTop:0,additionalMarginBottom:0,updateSidebarHeight:!0,minWidth:0,disableOnResponsiveLayouts:!0,sidebarBehavior:"modern",defaultPosition:"relative",namespace:"TSS"},t)).additionalMarginTop=parseInt(t.additionalMarginTop)||0,t.additionalMarginBottom=parseInt(t.additionalMarginBottom)||0,r(e=t,o=this)||(console.log("TSS: Body width smaller than options.minWidth. Init is delayed."),i(document).on("scroll."+e.namespace,(n=e,d=o,function(t){var e=r(n,d);e&&i(this).unbind(t)})),i(window).on("resize."+e.namespace,(a=e,s=o,function(t){var e=r(a,s);e&&i(this).unbind(t)}))),this}}(jQuery);


function benedicta_SidebarSticky() {
    "use strict";
	
	if( jQuery(window).width() > 768 ) {
		if (jQuery('#blog_list.default.has_sidebar').size() > 0) {
			jQuery('#blog_list.default.has_sidebar > .row > .col-lg-8, #blog_list.default.has_sidebar > .row > .col-lg-4').theiaStickySidebar({
				additionalMarginTop: 100
			});
		}
		
		if (jQuery('#blog-single-wrap').size() > 0) {
			jQuery('#blog-single-wrap > .row > .col-lg-8, #blog-single-wrap > .row > .col-lg-4').theiaStickySidebar({
				additionalMarginTop: 100
			});
		}
		
		if (jQuery('#portfolio_single_wrap.half_width').size() > 0) {
			jQuery('#portfolio_single_wrap > .row > .col-lg-8, #portfolio_single_wrap > .row > .col-lg-4').theiaStickySidebar({
				additionalMarginTop: 100
			});
		}
	}
}

jQuery(window).load(function() {
	"use strict";
	
	setTimeout(function(){
		benedicta_SidebarSticky();
	}, 100);
});

jQuery(window).resize(function(){
	"use strict";
	
	benedicta_SidebarSticky();
	
});