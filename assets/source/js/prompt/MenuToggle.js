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
        $('.site-header-container').slideToggle(300, function() {
            $(this).toggleClass('is-expanded');
            $(this).css('display', '');
        });
        $('.search-top').slideUp(300);
    };

    // Not used here atm but can be used by others, e.g search toggle.
    MenuToggle.prototype.hide = function () {
        $('.site-header-container').slideUp(300, function() {
            $(this).removeClass('is-expanded');
            $(this).css('display', '');
        });
    };

    return new MenuToggle();

})(jQuery);
