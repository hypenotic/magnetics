jQuery(document).ready(function($){
		$('body.products > section > article > h1').fitText();

		var $container = $('.tabs.boxes .images');
		// initialize Isotope
		$container.isotope({
			itemSelector: 'attachment-full'
		});

		$container.css('height','auto');

	// update columnWidth on window resize
	$(window).on('debouncedresize', function(){
	  $container.isotope({
	    // update columnWidth to a percentage of container width
	    masonry: { columnWidth: $container.width() / 2 },
		itemSelector: 'attachment-full'
	  });

	  $container.css('height','auto');
	});


});