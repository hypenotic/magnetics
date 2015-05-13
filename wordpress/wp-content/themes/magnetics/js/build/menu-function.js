jQuery(document).ready(function() {
	jQuery('#nav-toggle').bigSlide({'side':'right'});

	jQuery(window).on('scroll', function(jQuery){

	  if(jQuery(window).scrollTop() !== 0) {
	    jQuery('nav#toggler').toggleClass('transparent');
	  }

	});

});

