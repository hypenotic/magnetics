jQuery(document).ready(function($){

	setTimeout(function(){

		var $ = jQuery;

		var $container = $('#timeline > ul');

		$container.addClass('gradient');
		// initialize Isotope
		$container.isotope();

		jQuery('#timeline > ul').find('li').each(function(i,e){


			if(window.innerWidth > 860) {
				if(jQuery(e).css('left').charAt(0) === '0') {
					jQuery(e).addClass('left');
				}

				if(jQuery(e).prev().css('top')) {
					if((jQuery(e).prev().css('top').split('px')[0] || 0)  - jQuery(e).css('top').split('px')[0] < 200 ) {
						jQuery(e).css('margin-top',40 + i*20 +'px');
					}
				}

				if(jQuery(e).css('left').split('px')[0] > 0) {
					jQuery(e).addClass('rightSide');
					jQuery(e).removeClass('left');
				}
			} else {	
					jQuery(e).removeClass('left');
					jQuery(e).removeClass('rightSide');
					jQuery(e).css('margin-top',0);
			}

			// TODO: Find Blockquote inside JS
			if(jQuery(e).has('blockquote').length) {
				jQuery(e).addClass('quote');
			}

		});

	}, 1600);

});

jQuery(window).on('resize', function() {

	setTimeout(function(){

		var $ = jQuery;

		var $container = $('#timeline > ul');

		$container.addClass('gradient');
		// initialize Isotope
		$container.isotope();

		jQuery('#timeline > ul').find('li').each(function(i,e){


			if(window.innerWidth > 860) {
				if(jQuery(e).css('left').charAt(0) === '0') {
					jQuery(e).addClass('left');
				}

				if(jQuery(e).prev().css('top')) {
					if((jQuery(e).prev().css('top').split('px')[0] || 0)  - jQuery(e).css('top').split('px')[0] < 200 ) {
						jQuery(e).css('margin-top',40 + i*20 +'px');
					}
				}

				if(jQuery(e).css('left').split('px')[0] > 0) {
					jQuery(e).addClass('rightSide');
					jQuery(e).removeClass('left');
				}
			} else {	
					jQuery(e).removeClass('left');
					jQuery(e).removeClass('rightSide');
					jQuery(e).css('margin-top',0);
			}

			// TODO: Find Blockquote inside JS
			if(jQuery(e).has('blockquote').length) {
				jQuery(e).addClass('quote');
			}

		});

	}, 1000);


});