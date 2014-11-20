(function($) {
	
	$.fn.exists = function()
	{
		return $(this).length>0;
	};
	
	
	$.fn.reverse = function() {
	    return this.pushStack(this.get().reverse(), arguments);
	};


	function isMobile()
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
		setupFade();
		
		// trigger events
		$(window).trigger('resize');
		
	});
	
	
	/*
	*  setup_fade
	*
	*/
	
	function setupFade()
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
				var dH=$(document).height();	
				var offset = $(".product_slide").offset();
				var  productSlideHeight=$(".product_slide").height();
				var height = $(".stem_bg_green").height();
				var top = offset.top - scroll;
				var y = window.scrollY;
				//console.log("You've scrolled " + $(window).scrollTop() + " pixels");
				if (scroll > previousScroll){
					if(top <= $(window).height()/2) {	
						count++;
						if(height < productSlideHeight ) {
							height = (scroll-top)/2.2; 
				//			$('.stem_bg_green').height(height);
						}
					}
				} else {
					count--;	
					if(height>0) {
							height = (scroll-top)/2.2;										
					//		$('.stem_bg_green').height(height);
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