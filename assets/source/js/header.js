DunkersKultur = DunkersKultur || {};
DunkersKultur.Liquid = DunkersKultur.Liquid || {};

DunkersKultur.Liquid.Liquid = (function ($) {

	var TopOffset = 5;
	var TargetElement = "#site-header";
	var JqClassName = "liquid-header";

	function Liquid() {
        jQuery(function(){
            this.process();
        	jQuery(window).scroll(function(){
        		this.process();
        	}.bind(this));
        }.bind(this));
    }

    Liquid.prototype.process = function () {
        if (jQuery(window).scrollTop() < TopOffset) {
            this.removeClass();
        } else {
            this.addClass();
        }
    }

	Liquid.prototype.addClass = function () {
	   jQuery(TargetElement).addClass(JqClassName);
    };

    Liquid.prototype.removeClass = function () {
		 jQuery(TargetElement).removeClass(JqClassName);
    };

    Liquid.prototype.updateTriggerValue = function () {
        if( jQuery(TargetElement).attr('data-trigger-value') && this.isInt( jQuery(TargetElement).attr('data-trigger-value') ) ) {
            TopOffset = jQuery(TargetElement).attr('data-trigger-value');
        }
    };

    Liquid.prototype.isInt = function (value) {
        var x;
        if (isNaN(value)) { return false; }
        x = parseFloat(value);
        return (x | 0) === x;
    };

	return new Liquid();

})(jQuery);
