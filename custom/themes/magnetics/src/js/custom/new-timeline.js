jQuery(document).ready(function($){
	var $container = $('.cd-container > ul');
	$('.cd-container > ul').attr('id','cd-timeline');
	$container.find('li').each(function(){
		$(this).addClass('cd-timeline-block');
		// TODO: Find Blockquote inside JS
		if($(this).has('blockquote').length) {
			$(this).addClass('quote');
		}
		var html=$(this).html();
		$(this).html('<div class="cd-timeline-icon"></div><div class="cd-timeline-content">'+html+'</div>');
	});
	
	var timelineBlocks = $('.cd-timeline-block'),
		offset = 0.8;

	//hide timeline blocks which are outside the viewport
	hideBlocks(timelineBlocks, offset);

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) 
			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});

	function hideBlocks(blocks, offset) {
		blocks.each(function(){
			var positionTop=$(this).offset().top;
			if(positionTop > $(window).scrollTop()+$(window).height()*offset ){
				$(this).find('.cd-timeline-icon, .cd-timeline-content').addClass('is-hidden');
				//$(this).find('.cd-timeline-content').addClass('is-hidden');
			}
		});
	}

	function showBlocks(blocks, offset) {
		blocks.each(function(){
			var positionTop=$(this).offset().top;
			if(positionTop <= $(window).scrollTop()+$(window).height()*offset && $(this).find('.cd-timeline-icon').hasClass('is-hidden')) {
				$(this).find('.cd-timeline-icon, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
				//$(this).find('.cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	}
});