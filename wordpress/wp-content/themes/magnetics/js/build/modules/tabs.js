jQuery(document).ready(function($) {
	$('.tabs header li a').click(function(e){
		$('.tabs .active').removeClass('active');
		$(this).parent().addClass('active');
		$('.tabs > section:nth-child('+parseInt($(this).parent().index()+2)+')').addClass('active');
		return false;

	});

	$('.tabs header select').change(function(e){

		$('.tabs .active').removeClass('active');
		$('.tabs > section:nth-child('+parseInt($(this).find('option:selected').index()+2)+')').addClass('active');
		
		$('.tabs header select option').each(function (i, e) {
		    var text = $(e).text().replace(' ▾', '');
		     $(this).text(text) ;
		});

		$('.tabs header select option:selected').append(' ▾');

		return false;

		});

});