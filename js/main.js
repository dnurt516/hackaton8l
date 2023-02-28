$(document).ready(function() {
	window.onscroll = function() {
	    checkMarginToTop();
	};

	var menu = $('.menu').parent();
	var wrapper = menu.parent();

	var pos = menu.offset().top;
	function checkMarginToTop() {
	    if (window.pageYOffset >= pos) {
	        menu.addClass("menu_scroll");
	        $('body').css('padding-top', menu.height()+'px');
	    } else {
	        menu.removeClass("menu_scroll");
	        $('body').css('padding-top', '0');
	    }
	}

	$(window).scrollTop();
});