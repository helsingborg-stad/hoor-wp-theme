//
// @name Search top
// @description  Open the top search
//
HelsingborgPrime = HelsingborgPrime || {};
HelsingborgPrime.Prompt = HelsingborgPrime.Prompt || {};

HelsingborgPrime.Prompt.SearchTopMobile = (function ($) {

    function SearchTopMobile() {
        this.bindEvents();
    }

    SearchTopMobile.prototype.bindEvents = function () {
        $('.js-search-top-mobile').on('click', function (e) {
            $('.site-header-container').slideUp(300);
        }.bind(this));
    };

    return new SearchTopMobile();

})(jQuery);
