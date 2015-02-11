jQuery(document).ready(function($){
		

	jQuery("body.single.products h1, body.single.product-integrations h1").css("font-size", window.innerWidth*1.3/(jQuery('h1').html().length))
		
		/*
		jQuery('h1').html(function(i, v) { 
		    return  jQuery.trim(v).replace(/([\S]*)\s(.*)/, "$1 <span>$2</span>");
		});

		var e = 0;
		var i = 0;
		jQuery("h1").text().split(/\s+/).forEach(function(e, index){ 
				if (e.length > e) {
				i = index;
			}
		}
		*/




		var $container = $('.tabs.boxes .images');
		// initialize Isotope
		$container.isotope({
			itemSelector: 'attachment-full'
		});

		$container.css('height','auto');

	// update columnWidth on window resize
	jQuery(window).on('debouncedresize', function(){

		jQuery("body.single.products h1, body.single.product-integrations h1").css("font-size", window.innerWidth*1.3/(jQuery('h1').html().length))
	  


	  $container.isotope({
	    // update columnWidth to a percentage of container width
	    masonry: { columnWidth: $container.width() / 2 },
		itemSelector: 'attachment-full'
	  });

	  $container.css('height','auto');
	});


});