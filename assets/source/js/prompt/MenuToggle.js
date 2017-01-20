//
// @name Search top
// @description  Open the top search
//
HelsingborgPrime = HelsingborgPrime || {};
HelsingborgPrime.Prompt = HelsingborgPrime.Prompt || {};

HelsingborgPrime.Prompt.MenuToggle = (function ($) {

    function MenuToggle() {
        this.bindEvents();
    }

    MenuToggle.prototype.bindEvents = function () {
        $('.js-menu-toggle').on('click', function (e) {
            e.preventDefault();
            this.toggle();
        }.bind(this));
    };

    MenuToggle.prototype.toggle = function () {
        $('.site-header-container').slideToggle(300);
        $('.search-top').slideUp(300);
    };

    return new MenuToggle();

})(jQuery);
