jQuery(document).ready(function($){
	function goToByScroll(id){
		$('html,body').animate({ scrollTop: $(id).offset().top},'slow');
	}
	$('#scrollDown').click(function(){
		goToByScroll('#scrollDown');
		return false;
	});
});

