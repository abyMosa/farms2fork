(function ($) {
	'use strict';
	
	var cardsGallery = {};
	eltdf.modules.cardsGallery = cardsGallery;
	
	
	cardsGallery.eltdfOnWindowLoad = eltdfOnWindowLoad;
	
	$(window).load(eltdfOnWindowLoad);
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfInitCardsGallery();
	}
	
	/*
	 **	Init cards gallery shortcode
	 */
	function eltdfInitCardsGallery() {
		var holder = $('.eltdf-cards-gallery');
		
		if (holder.length) {
			holder.each(function () {
				var thisHolder = $(this),
					cards = thisHolder.find('.eltdf-cg-card');
				
				cards.each(function () {
					var card = $(this);
					
					card.on('click', function () {
						if (!cards.last().is(card)) {
							card.addClass('eltdf-out eltdf-animating').siblings().addClass('eltdf-animating-siblings');
							card.detach();
							card.insertAfter(cards.last());
							
							setTimeout(function () {
								card.removeClass('eltdf-out');
							}, 200);
							
							setTimeout(function () {
								card.removeClass('eltdf-animating').siblings().removeClass('eltdf-animating-siblings');
							}, 1200);
							
							cards = thisHolder.find('.eltdf-cg-card');
							
							return false;
						}
					});
				});
				
				if (thisHolder.hasClass('eltdf-bundle-animation') && !eltdf.htmlEl.hasClass('touch')) {
					thisHolder.appear(function () {
						thisHolder.addClass('eltdf-appeared');
						thisHolder.find('img').one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
							$(this).addClass('eltdf-animation-done');
						});
					}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
				}
			});
		}
	}
	
})(jQuery);