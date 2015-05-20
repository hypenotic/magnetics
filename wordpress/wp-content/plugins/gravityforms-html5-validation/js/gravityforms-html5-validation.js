(function ($) {

	$(document).ready( function(){

		if (typeof gf_do_action == 'function') {
			var gf_do_action_original = gf_do_action;
			gf_do_action = function (action, targetId, useAnimation, defaultValues, isInit, callback){

				// Gravity Forms Conditional Visibility Fix
				// ========================================
				// In cases where conditional visibility is used, required fields may be hidden which 
				// produces a javascript error when trying to submit a hidden html5 required field. We
				// use a data attribute to store whether the input is html5 required and toggle the 
				// actual html5 required attribute according to conditional field visibility.

				if(action == "show"){

					$('input', targetId).each( function() {
						if ($(this).data('gf-html5-required'))
							$(this).attr('required',"required");
						
					});

				} else {

					$("input[required]", targetId).each( function() {
						$(this).removeAttr('required');
						$(this).data('gf-html5-required', true );
					});
				}
				gf_do_action_original(action, targetId, useAnimation, defaultValues, isInit, callback);
			}
		}
	});

})(jQuery);