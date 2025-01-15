jQuery(document).ready(function($) {
	"use strict";
	
	//	Page template
    var selector = "#page_template";
	var wpb_visual_composer = "#wpb_visual_composer";
	jQuery(wpb_visual_composer).fadeIn();
    jQuery(selector).bind('change', function(){
        var template = jQuery(this).val();
        if(template=='page-comingsoon.php'){
			jQuery(wpb_visual_composer).fadeOut();
		} else {
            jQuery(wpb_visual_composer).fadeIn();
        }
    });    
    jQuery(selector).change();
	
});