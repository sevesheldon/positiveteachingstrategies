(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		
		// trigger pop-up by cicking pop-up button and "Free Resources"
		$('.pop-up-button, .menu-item-1771 a').on("click", function(){
			popUp();
		})

		// trigger Speaker pop-up by cicking Speaker pop-up-button and "Hire Me" tile
		$('.speaker-pop-up-button').on("click", function(){
			speakerPopUp();
		})

	});
	
})(jQuery, this);




function popUp() {
	$('.pop-up-wrap').slideToggle();
	$("body, html").toggleClass("noscroll");
}

function speakerPopUp() {
	$('.speaker-pop-up-wrap').slideToggle();
	$("body, html").toggleClass("noscroll");
}





//function menu(){
	// mobile menu clicks
//	$('#burger').on('click', function(){ 
//		$('#burger').parents('#menu').toggleClass('open');
//	});
//}


