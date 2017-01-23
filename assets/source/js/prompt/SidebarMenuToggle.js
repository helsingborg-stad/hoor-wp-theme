//
// @name Search top
// @description  Open the top search
//
// TODO(af): merge this with MenuToggle.js
HelsingborgPrime = HelsingborgPrime || {};
HelsingborgPrime.Prompt = HelsingborgPrime.Prompt || {};

HelsingborgPrime.Prompt.SidebarMenuToggle = (function ($) {

    function SidebarMenuToggle() {
        this.bindEvents();
    }

    SidebarMenuToggle.prototype.bindEvents = function () {
        $('.sidebar-menu__navigation-button').on('click', function (e) {
            e.preventDefault();
            this.toggle();
        }.bind(this));
    };

    SidebarMenuToggle.prototype.toggle = function () {
        $('#sidebar-menu').slideToggle(300, function() {
            $(this).toggleClass('is-expanded');
            $(this).css('display', '');
        });
        $('.search-top').slideUp(300);
    };

    // Not used here atm but can be used by others.
    SidebarMenuToggle.prototype.hide = function () {
        $('#sidebar-menu').slideUp(300, function() {
            $(this).removeClass('is-expanded');
            $(this).css('display', '');
        });
    };

    return new SidebarMenuToggle();

})(jQuery);
