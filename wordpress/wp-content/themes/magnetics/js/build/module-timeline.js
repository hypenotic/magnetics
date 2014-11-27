jQuery(document).ready(function($){
	var $container = $('#timeline > ul');
	// initialize Isotope
	$container.isotope({
		// options...
		resizable: false, // disable normal resizing
		// set columnWidth to a percentage of container width
		masonry: { columnWidth: $container.width() / 2 }

	});
		// update columnWidth on window resize
	$(window).smartresize(function(){
	  $container.isotope({
	    // update columnWidth to a percentage of container width
	    masonry: { columnWidth: $container.width() / 2 }
	  });
	});

	$container.isotope( 'on', 'layoutComplete', function() {

  		$container.each(function(i,e){

  			if($(e).css('left').charAt(0)) {
  				$(e).addClass('left');
  			}

  			if($(e).has('blockquote')) {
  				$(e).addClass('quote');
  			}

  		});

	});

});