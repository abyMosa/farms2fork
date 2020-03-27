(function($) {
	'use strict';
	
	var imageWidthText = {};
	eltdf.modules.imageWidthText = imageWidthText;
	
	imageWidthText.eltdfInitImageWidthText = eltdfInitImageWidthText;
	
	imageWidthText.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitImageWidthText();
	}
	
	/**
	 * Init pricing List Item Image
	 */
	function eltdfInitImageWidthText() {
		var holder = $('.eltdf-image-with-text-holder.eltdf-animated-section  ');
		
		if (holder.length) {
			holder.each(function() {
				var thisHolder = $(this);
				
				thisHolder.appear(function() {
					thisHolder.addClass('eltdf-iwt-appear');
				},{accX: 0, accY: 300});
			});
		}
	}
	
})(jQuery);