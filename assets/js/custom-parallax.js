!function(n){var t=n(window),e=t.height();t.resize(function(){e=t.height()}),n.fn.benedicta_parallax=function(o,i,r){function u(){var r=t.scrollTop();l.each(function(){var t=n(this),u=t.offset().top,s=c(t);r>u+s||u>r+e||l.css("backgroundPosition",o+" "+Math.round((h-r)*i)+"px")})}var c,h,l=n(this);l.each(function(){h=l.offset().top}),c=r?function(n){return n.outerHeight(!0)}:function(n){return n.height()},(arguments.length<1||null===o)&&(o="50%"),(arguments.length<2||null===i)&&(i=.1),(arguments.length<3||null===r)&&(r=!0),t.bind("scroll",u).resize(u),u()}}(jQuery);

function benedicta_parallax() {
	"use strict";
	
	if( jQuery('.benedicta_parallax').length && jQuery(window).width() > 1025 ) {
		jQuery('.benedicta_parallax').each(function(){
			jQuery(this).benedicta_parallax("50%", -0.25);
		});
	}
}

jQuery(window).load(function(){
	"use strict";
	
	benedicta_parallax();
});

jQuery(window).resize(function(){
	"use strict";
	
	benedicta_parallax();
});