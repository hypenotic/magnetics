(function($) {
	
	$.fn.exists = function()
	{
		return $(this).length>0;
	};
	
	
	$.fn.reverse = function() {
	    return this.pushStack(this.get().reverse(), arguments);
	};


	function is_mobile()
	{
		var mobile = false;
		
		
		// testing on browser
		if( $(window).width() <= 800 )
		{
			mobile = true;
		}
		
		
		// actual mobile
		if( $('html').hasClass('touch') )
		{
			mobile = true;
		}
		
		return mobile;
		
	}
	
	
		
	/*--------------------------------------------------------------------------------------------
	*
	*	document.ready
	*
	*--------------------------------------------------------------------------------------------*/
	
	$(document).ready(function()
	{
		//	setup_tweets();
		setup_fade();
		
		// trigger events
		$(window).trigger('resize');
		
	});
	
	
	/*
	*  setup_fade
	*
	*/
	
	function setup_fade()
	{
	
		// validate
		if( ! $('.product_slide li.fade').exists() )
		{
			return false;
		}
		
		
		// vars
		var posts = $('.product_slide li.fade');//.reverse();
		
		var previousScroll = 0;	
		var count = 1;
		$(window).on('scroll', function(){
				var scroll = $(window).scrollTop();
				var d_h=$(document).height();	
				var offset = $(".product_slide").offset();
				var  product_slide_height=$(".product_slide").height();
				var height = $(".stem_bg_green").height();
				var top = offset.top - scroll;
				$(".stem_bg_green").height();
				if (scroll > previousScroll){
					if(top <= $(window).height()/2) {	
						count++;
						if(height < product_slide_height ) {
							height = 40*count;										
							$('.stem_bg_green').height(height);
						}
					}
				} else {
					count--;	
					if(height>0) {
						height = 40*count;					
						$('.stem_bg_green').height(height);
					}
				}
				previousScroll = scroll;
				
				var middle = $(window).height() / 2;
			
			
			// fade posts
			$('.product_slide > li').each(function( el ){
				
				// vars
				var post = $(this),
					relative = post.offset().top - scroll;
				
				if( relative < middle)
				{
					$('.product_slide > li').each(function( el ){
						$(this).addClass('fade');
					});
					post.removeClass('fade');
				}
				
			});
		});
		
		
	}

})(jQuery);