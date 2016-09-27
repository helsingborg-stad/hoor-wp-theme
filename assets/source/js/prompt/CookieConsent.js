//
// @name Cookie consent
//
HelsingborgPrime = HelsingborgPrime || {};
HelsingborgPrime.Prompt = HelsingborgPrime.Prompt || {};

HelsingborgPrime.Prompt.CookieConsent = (function ($) {

    var useLocalStorage = true;
    var animationSpeed = 1000;

    function CookieConsent() {
        this.init();
    }

    CookieConsent.prototype.init = function () {
        var showCookieConsent = (HelsingborgPrime.Args.get('cookieConsent.show')) ? HelsingborgPrime.Args.get('cookieConsent.show') : true;

        if (showCookieConsent && !this.hasAccepted()) {
            this.displayConsent();

            $(document).on('click', '[data-action="cookie-consent"]', function (e) {
                e.preventDefault();
                var btn = $(e.target).closest('button');
                this.accept();
            }.bind(this));
        }
    };

    CookieConsent.prototype.displayConsent = function() {
        var wrapper = $('body');

        if ($('#wrapper:first-child').length > 0) {
            wrapper = $('#wrapper:first-child');
        }

        var consentText = 'This website uses cookies to ensure you get the best experience browsing the website.';
        if (HelsingborgPrime.Args.get('cookieConsent.message')) {
            consentText = HelsingborgPrime.Args.get('cookieConsent.message') ? HelsingborgPrime.Args.get('cookieConsent.message') : 'This website is using cookies to give you the best experience possible.';
        }

        var buttonText = 'Got it';
        if (HelsingborgPrime.Args.get('cookieConsent.button')) {
            buttonText = HelsingborgPrime.Args.get('cookieConsent.button') ? HelsingborgPrime.Args.get('cookieConsent.button') : 'Okey';
        }

        var placement = HelsingborgPrime.Args.get('cookieConsent.placement') ? HelsingborgPrime.Args.get('cookieConsent.placement') : null;

        wrapper.prepend('\
            <div id="cookie-consent" class="cookie-consent ' + placement + '">\
                <div class="container">' + consentText + '<button class="button__cookie-consent" data-action="cookie-consent"><span class="button__cookie-consent--icon"></span>' + buttonText + '</button></div>\
            </div>\
        ');

        $('#cookie-consent').show();
    };

    CookieConsent.prototype.hasAccepted = function() {
        if (useLocalStorage) {
            return window.localStorage.getItem('cookie-consent');
        } else {
            return HelsingborgPrime.Helper.Cookie.check('cookie-consent', true);
        }
    };

    CookieConsent.prototype.accept = function() {
        $('#cookie-consent').remove();

        if (useLocalStorage) {
            try {
                window.localStorage.setItem('cookie-consent', true);
                return true;
            } catch(e) {
                return false;
            }
        } else {
            HelsingborgPrime.Helper.Cookie.set('cookie-consent', true, 60);
        }
    };

    return new CookieConsent();

})(jQuery);
