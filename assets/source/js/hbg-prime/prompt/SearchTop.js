//
// @name Search top
// @description  Open the top search
//
HelsingborgPrime = HelsingborgPrime || {};
HelsingborgPrime.Prompt = HelsingborgPrime.Prompt || {};

HelsingborgPrime.Prompt.SearchTop = (function ($) {

    function SearchTop() {
        this.bindEvents();
    }

    SearchTop.prototype.bindEvents = function () {
        $('.toggle-search-top').on('click', function (e) {
            this.toggle(e);
        }.bind(this));
    };

    SearchTop.prototype.toggle = function (e) {
        e.preventDefault();
        $('.search-top').slideToggle(300, function() {
            // Set focus when done (not on click) to prevent jumpy animation.
            $('.search-top').find('input[type=search]').focus();
        });
    };

    return new SearchTop();

})(jQuery);
