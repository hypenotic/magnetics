
// Onclick action to open/close offcanvas menu
jQuery(document).ready(function($) {
	$('#toggler').on('click',function(e){
		$('.menu-btn.text').fadeOut();
	});
	$('#parent').on('click', '.active', function() {
	    $('.menu-btn.text').fadeIn();
	});
});