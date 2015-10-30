/*! bigSlide - v0.4.3 - 2014-01-25
* http://ascott1.github.io/bigSlide.js/
* Copyright (c) 2014 Adam D. Scott; Licensed MIT */
(function($) {
  'use strict';

  $.fn.bigSlide = function(options) {

    var settings = $.extend({
      'menu': ('#menu'),
      'push': ('.push'),
      'side': 'left',
      'speed': '300'
    }, options);
	
	if(window.innerWidth > 850 ) { 
      settings.menuWidth = '40em'; 
    } else { 
      settings.menuWidth = '15em';
    }

	var overlay = $('.site-overlay');
    var menuLink = this,
        menu = $(settings.menu),
        push = $(settings.push),
        width = jQuery('.panel').width();

    var positionOffScreen = {
      'position': 'fixed',
      'top': '0',
      'bottom': '0',
      'settings.side': '-' + settings.menuWidth,
      'width': settings.menuWidth,
      'height': '100%'
    };

    var animateSlide = {
      '-webkit-transition': settings.side + ' ' + settings.speed + 'ms ease',
      '-moz-transition': settings.side + ' ' + settings.speed + 'ms ease',
      '-ms-transition': settings.side + ' ' + settings.speed + 'ms ease',
      '-o-transition': settings.side + ' ' + settings.speed + 'ms ease',
      'transition': settings.side + ' ' + settings.speed + 'ms ease'
    };

    menu.css(positionOffScreen);
    push.css(settings.side, '0');
    menu.css(animateSlide);
    push.css(animateSlide);

    menu._state = 'closed';

    menu.open = function() {
      menu._state = 'open';
      menu.css(settings.side, '0');
      push.css(settings.side, settings.menuWidth);
    };

    menu.close = function() {
		menu._state = 'closed';
		menu.css(settings.side, '-' + settings.menuWidth);
		push.css(settings.side, '0');
    };

    menuLink.on('click', function(e) {
      e.preventDefault();
      if (menu._state === 'closed') {
        menu.open();
		menuLink.addClass('active');
		overlay.show();
		$('.menu-btn.text').hide();
      } else {
		menu.close();
		menuLink.removeClass('active');
		overlay.hide();
		$('.menu-btn.text').show();
      }
    });
	overlay.on('click', function(e) {
		menuLink.removeClass('active');
		menu.close();
		overlay.hide();
	});
    //menuLink.on('touchend', function(e){
    //  menuLink.trigger('click');
    //  e.preventDefault();
    //});

    return menu;

  };

}(jQuery));

jQuery(document).ready(function() {

  jQuery(window).on('resize', function() {
  
      jQuery('#nav-toggle').bigSlide({'side':'right'});

  });

  var waypoints = jQuery('.banner, header.masthead').waypoint({
    handler: function(direction) {
      jQuery('#toggler').toggleClass('white');
      //console.log('hit');
    }
  });

})