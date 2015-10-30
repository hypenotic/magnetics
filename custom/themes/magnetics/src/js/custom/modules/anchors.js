jQuery(document).ready(function(){

	function goToByScroll(id){
	jQuery('html,body').animate({scrollTop: jQuery(id).offset().top},'slow');
	}

	jQuery('#scrollDown').click(function(){
			goToByScroll('#scrollDown');
			return false;
		});
});

