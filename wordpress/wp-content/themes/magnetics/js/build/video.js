jQuery(document).ready(function(e) { 
		var h = e('.wrapper').height();
		var w = e(window).width();
		e('#big-video-vid').css('height',h+'px');
		e('.vjs-tech').css({'width':w+'px','height':h+'px'});
		e('video').css({'width':w+'px'});
		e('#big-video-image').css({'width':w+'px','height':h+'px'});
	e(window).resize(function(){
		var w = e(window).width();	
		e('#big-video-image').css({'width':w+'px','height':h+'px'});
	});
});