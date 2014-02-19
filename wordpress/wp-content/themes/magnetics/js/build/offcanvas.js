
// Onclick action to open/close offcanvas menu
jQuery(document).ready(function($) {
	$('.offcanvas-menu-button a').on('click',function(e){
		var parent=$(this).parent('div');
		if(parent.hasClass('left')) {
			$('.offcanvas-menu.left').show();
			$('body').toggleClass('open-left');
			$('.offcanvas-menu.right').hide();
		}else {
			$('.offcanvas-menu.left').hide();
			$('.offcanvas-menu.right').show();
			$('body').toggleClass('open-right');
		}
		e.preventDefault();
	});
	$('.offcanvas-close-button').on('click',function(e){
			$('body').removeClass('open-left');
			$('body').removeClass('open-right');
			e.preventDefault();
	});
	$('.search-icon a').on('click',function(e){
		$('#search').slideToggle( "slow" );
		e.preventDefault();
	});
});