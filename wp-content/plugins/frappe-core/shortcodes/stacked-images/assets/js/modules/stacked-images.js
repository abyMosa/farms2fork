(function($) {
	'use strict';
	
	var stackedImages = {};
	eltdf.modules.stackedImages = stackedImages;

	stackedImages.eltdfInitItemShowcase = eltdfInitStackedImages;


	stackedImages.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitStackedImages();
	}
	
	/**
	 * Init item showcase shortcode
	 */
	function eltdfInitStackedImages() {
		var stackedImages = $('.eltdf-stacked-images-holder');

		if (stackedImages.length) {
			stackedImages.each(function(){
				var thisStackedImages = $(this),
					itemImage = thisStackedImages.find('.eltdf-si-images');

				//logic
				thisStackedImages.animate({opacity:1},200);

				setTimeout(function(){
					thisStackedImages.appear(function(){
						itemImage.addClass('eltdf-appeared');
					},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
				},100);
			});
		}
	}
	
})(jQuery);