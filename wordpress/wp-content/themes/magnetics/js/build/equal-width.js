function equalWidth() {
    var span = jQuery('.equal-width-category span'),
        widest = 0,
        thisWidth = 0;

    setEqWidth = function(elem) {
        widest = 0;
        elem.each(function() {
            thisWidth = jQuery(this).outerWidth();

            if (thisWidth > widest) {
                widest = thisWidth;
            }
        });

        elem.css({ 'min-width': widest });
    }
    setEqWidth(span);
}
equalWidth();