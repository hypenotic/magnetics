
/*
(function(t,i,e){var h,r=[],o=function(){var t=e.createElement("modernizr").style,i="objectFit",h="Webkit Moz O ms",r=h.split(" "),o=i.charAt(0).toUpperCase()+i.slice(1),n=(i+" "+r.join(o+" ")+o).split(" ");for(var a in n){var i=n[a];if(~(""+i).indexOf("-")&&void 0!==t[i])return"pfx"==prefixed?i:!0}return!1},n=function(i){var i=i||"contain",e=o();return this.each(function(){e?t(this).css("object-fit",i):a(this,i)})},a=function(i,e){function h(t){var i=t.parent(),e=i.css("display");return"block"==e||"-webkit-box"==e&&i.width()>0?{obj:i,width:i.width(),height:i.height(),ratio:i.width()/i.height()}:h(i)}var o="string"==typeof e?e:e.type,n=void 0===e.hideOverflow?!0:e.hideOverflow;r.push({elem:i,params:{type:o,hideOverflow:n}});var a,d,c=t(i),s=c.data("ratio"),f=h(c),w=t("<img/>").load(function(){a=this.width,d=this.height,void 0===s&&(s=a/d,c.data("ratio",s)),"contain"===o?f.ratio>s?c.width(f.height*s):c.height(f.width/s).width("100%"):"cover"===o&&((f.width>a||f.height>d)&&(f.ratio>s?c.width(f.width).height(f.height*s):c.height(f.height).width(f.width*s)),n&&f.obj.css("overflow","hidden"))});w.attr("src",c.attr("src"))};t.fn.objectFit=n,t(i).resize(function(){clearTimeout(h);for(var t=0,i=r.length;i>t;t++){var e=r[t];h=setTimeout(function(){a(e.elem,e.params)},100)}})})(jQuery,window,document);

		jQuery(function() {
			jQuery('video').objectFit({ type: 'fill', hideOverflow: true});
		});

*/


// Onclick action to open/close offcanvas menu
jQuery(document).ready(function($) {
	// $('#toggler').on('click',function(e){
		// $('.menu-btn.text').fadeOut();
	// });
	// $('#nav-toggle').on('click', '.active', function() {
	    // $('.menu-btn.text').fadeIn();
	// });
});

