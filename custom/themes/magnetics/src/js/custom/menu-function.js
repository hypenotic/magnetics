jQuery(document).ready(function() {
	jQuery('#nav-toggle').bigSlide({'side':'right'});

	jQuery(window).on('scroll', function() {

	  if(jQuery(window).scrollTop() !== 0) {
	    jQuery('nav#toggler:not(.transparent)').addClass('transparent');
	  } else {
	  	jQuery('nav#toggler').removeClass('transparent');
	  }
	});
});

