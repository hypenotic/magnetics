jQuery(document).ready(function(e) {
    e('.tab-header li a').click(function(){
		var id= e(this).attr('id');
		
		e('.tab-header li').each(function() {
			e(this).removeClass('active-tab-header');
		});
		e(this).parent('li').addClass('active-tab-header');
		e('.tab-content .tab').each(function() {
			e(this).removeClass('active-tab-content');
		});
		e('.tab-content .tab#'+id).addClass('active-tab-content');
		return false;
	});
});