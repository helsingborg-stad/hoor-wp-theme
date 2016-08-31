console.info("Welcome!");


var DunkersKultur; DunkersKultur = DunkersKultur || {};
DunkersKultur.Liquid = DunkersKultur.Liquid || {};

DunkersKultur.Liquid.Liquid = (function ($) {

	var TopOffset = 5;
	var TargetElement = jQuery("#site-header"); 
	var JqClassName = "liquid-header"; 

	function Liquid() {
        jQuery(function(){
        	jQuery(window).scroll(function(element){
        		if (element.scrollTop < this.TopOffset) {
        			this.removeClass(); 
        		} else {
        			this.addClass(); 
        		}
        	}.bind(this)); 
        }.bind(this));
    };

	Liquid.prototype.addClass = function () {
	   //this.TargetElement.addClass(this.JqClassName); 
    };

    Liquid.prototype.removeClass = function () {
		//this.TargetElement.removeClass(this.JqClassName); 
    };

	return new Liquid();

})(jQuery);