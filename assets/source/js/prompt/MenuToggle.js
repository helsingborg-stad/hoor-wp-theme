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
        $('.site-header-container').toggleClass('is-expanded');
        $('.search-top').slideUp(300);
    };

    MenuToggle.prototype.hide = function () {
        $('.site-header-container').removeClass('is-expanded');
    };

    return new MenuToggle();

})(jQuery);
