jQuery(document).ready(function($){

	var $container = $('#timeline > ul');
	// initialize Isotope
	$container.isotope();

	// update columnWidth on window resize
	$(window).on('debouncedresize', function(){
	  $container.isotope({
	    // update columnWidth to a percentage of container width
	    masonry: { columnWidth: $container.width() / 2 }
	  });
	});

	// Iterate over <li> items, find out their position.
	// From there, we'll have before and after CSS Bullets.

	jQuery('#timeline > ul').find('li').each(function(i,e){

		if(jQuery(e).css('left').charAt(0) === '0') {
			jQuery(e).addClass('left');
		}

		// TODO: Find Blockquote inside JS
		if(jQuery(e).find(jQuery('<blockquote>'))) {
			jQuery(e).addClass('quoukukjhkjhhtetestt');
		}

	});

	$container.isotope({
		// set columnWidth to a percentage of container width
		masonry: { columnWidth: $container.width() / 2 }

	});

});