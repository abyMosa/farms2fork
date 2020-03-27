(function($) {
	'use strict';
	
	var pricingList = {};
	eltdf.modules.pricingList = pricingList;
	
	pricingList.eltdfInitPricingList = eltdfInitPricingList;
	
	pricingList.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitPricingList();
	}
	
	/**
	 * Init pricing List Item Image
	 */
	function eltdfInitPricingList() {
		var holder = $('.eltdf-pricing-list .eltdf-pricing-list-item.eltdf-pl-img-animation .eltdf-pli-image-holder');
		
		if (holder.length) {
			holder.each(function() {
				var thisHolder = $(this);
				
				thisHolder.appear(function() {
					thisHolder.addClass('eltdf-pl-img-appear');
				},{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}
	
})(jQuery);