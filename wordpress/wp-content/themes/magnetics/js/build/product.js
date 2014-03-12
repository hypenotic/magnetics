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
		var posts = $('.product_slide li.fade').reverse();
		
				var height=10;		
		$(window).on('scroll', function(){
				var scroll = $(window).scrollTop();

				var offset = $(".product_slide").offset();
				var top = offset.top-scroll;
				if(top<=250) {
					height += 40;					
					$('.stem_bg_green').height(height);
				}
				
				
			// find new scroll
			var scroll = $(window).scrollTop(),
				middle = $(window).height() / 2;
			
			
			// fade posts
			posts.addClass('fade').each(function( i ){
				
				// vars
				var post = $(this),
					relative = post.position().top - scroll,
					stem_class = "";
				
				
				if( relative < middle)
				{
					if( post.hasClass('tweet') )
					{
						stem_class = "tweet";
					}
					
					$('#stem-holder').attr('class', stem_class);
					
					post.removeClass('fade');
					
					return false;
				}
				
			});

		});
		
		
	}

})(jQuery);