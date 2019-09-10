(function ($) {
	"use strict";
	$('[data-icon="hamburguer"]').on('click', function() {

		if(!$('#slide-menu').hasClass('slide-menu-active')) {
			$('#slide-menu').addClass('slide-menu-active');
			$('.menu').addClass('menu-active');
			$('.line').addClass('line-active');
			
		} else {
			$('#slide-menu').removeClass('slide-menu-active');
			$('.menu').removeClass('menu-active');
			$('.line').removeClass('line-active');

		}

	});
})(jQuery);