jQuery(document).ready(function($){

	$('a[href$="product-integrations/rov/"], a[href$="product-integrations/auv/"], a[href$="product-integrations/glider/"]').on('click', function(e){
		e.preventDefault;
		return false;
	});

	$('a[href$="product-integrations/rov/"], a[href$="product-integrations/auv/"], a[href$="product-integrations/glider/"]').on('mouseover', function (e) {
	    var $link = $(this),
	        href = $link.attr('href') || $link.data("href");

	    $link.off('click.chrome');
	    $link.on('click.chrome', function (e) {
	        e.preventDefault;
	    })
	    // .attr('data-href', href) //keeps track of the href value
	    // .css({ cursor: 'pointer' })
	    .removeAttr('href'); // <- this is what stops Chrome to display status bar
	});

	var container = jQuery('.tabs.boxes .images');
		// initialize Isotope
	container.isotope({
		itemSelector: 'attachment-full'
	});
	container.css('height','auto');

	// update columnWidth on window resize
	jQuery(window).on('debouncedresize', function(){
		/*jQuery("body.single.products h1, body.single.product-integrations h1").css("font-size", window.innerWidth*1.3/(jQuery('h1').html().length))*/
		container.isotope({
			// update columnWidth to a percentage of container width
			masonry: { columnWidth: container.width() / 2 },
			itemSelector: 'attachment-full'
		});
		container.css('height','auto');
	});
});