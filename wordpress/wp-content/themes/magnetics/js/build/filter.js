jQuery(document).ready(function(e) {
	    e('.filter li').each(function() {
			if(e(this).hasClass('active')) {
				e(this).css('background-color',e(this).attr('data-background'));
			}
		});
		var id=	e('.filter li a').attr('id');
		e('.related .span-9').each(function(){
			if(e(this).attr('data-category')==id) {
				e(this).show();
			}else {
				e(this).hide();
			}
		
		});
    e('.filter li a').click(function(){
		var id = e(this).attr('id');
		
	    e('.filter li').each(function() {
				e(this).removeClass('active');
				e(this).css('background-color','');

		});
		e(this).parent().addClass('active');
		e(this).parent().css('background-color',e(this).parent().attr('data-background'));
		e('.related .span-9').each(function(){
			if(e(this).attr('data-category')==id) {
				e(this).show();
			}else {
				e(this).hide();
			}
			
		});
		return false;
	});
});