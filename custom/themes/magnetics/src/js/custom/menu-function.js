jQuery(document).ready(function() {
	jQuery('#nav-toggle').bigSlide({'side':'right'});

	jQuery(window).on('scroll', function() {

	  if(jQuery(window).scrollTop() !== 0) {
	    jQuery('nav#toggler:not(.transparent)').addClass('transparent');
	  } else {
	  	jQuery('nav#toggler').removeClass('transparent');
	  }
	});

	jQuery('#nav-menu-item-956 >a').on('click', function(e) {
		e.preventDefault();
	});
	jQuery('#nav-menu-item-957 >a').on('click', function(e) {
		e.preventDefault();
	});
	jQuery('#nav-menu-item-958 >a').on('click', function(e) {
		e.preventDefault();
	});
	jQuery('#nav-menu-item-959 >a').on('click', function(e) {
		e.preventDefault();
	});
	jQuery('#nav-menu-item-960 >a').on('click', function(e) {
		e.preventDefault();
	});
	jQuery('#nav-menu-item-961 >a').on('click', function(e) {
		e.preventDefault();
	});
});

