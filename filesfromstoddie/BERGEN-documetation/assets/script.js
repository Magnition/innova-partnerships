/*
 *
 *		SCRIPT.JS
 *
 */

(function($){
 
	function full_screen() {
		
		$(".fullscreen").css("height", $(window).height() + "px");
		
	}
	
	
	$(document).ready(function(){
			
			
		// FULLSCREEN //
		full_screen();
		
		
		// SMOOTHSCROLL //
		$('#menu a[href*=#]:not([href=#]), .next').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 700);
				return false;
				}
			}
		});
		
		
		// SCROPSLY //
		$('body').scrollspy({
			target: '#menu',
			offset: 50
		});
		
	});
	
	$(window).resize(function() {
			
		full_screen();
			
	});
	
})(window.jQuery);