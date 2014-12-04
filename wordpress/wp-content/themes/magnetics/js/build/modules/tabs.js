jQuery(document).ready(function($) {
	$('.tabs header li a').click(function(e){
		$(this).parent().addClass('active');
		$('.tabs .active').removeClass('active');
		$('.tabs > section:nth-child('+parseInt($(this).parent().index()+2)+')').addClass('active');
		return false;

	});

	$('.tabs header select').change(function(e){

		$('.tabs .active').removeClass('active');
		$('.tabs > section:nth-child('+parseInt($(this).find('option:selected').index()+2)+')').addClass('active');
		return false;
		});

});