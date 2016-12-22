HelsingborgPrime = HelsingborgPrime || {};

HelsingborgPrime.Helper = HelsingborgPrime.Helper || {};

HelsingborgPrime.Helper.ToggleSubmenuItems = (function ($) {

    function ToggleSubmenuItems() {
        this.init();
    }

    ToggleSubmenuItems.prototype.init = function () {
        $("#sidebar-menu, #main-menu").on('click', 'button', function(event){
            event.preventDefault();
            if(!this.useAjax(event.target)) {
                this.toggleSibling(event.target);
            } else {
                this.ajaxLoadItems(event.target);
                this.toggleSibling(event.target);
            }
        }.bind(this));
    };

    ToggleSubmenuItems.prototype.useAjax = function (target) {
        if($(target).siblings("ul").length) {
            return false;
        } else {
            return true;
        }
    };

    ToggleSubmenuItems.prototype.ajaxLoadItems = function (target) {
        var markup = '';
        var parentId = this.getItemId(target);

        $.get('/?hoor_submenu_unauthorized=' + parentId, function(response){

            if(response.length !== "") {
                $(target).after(response);
            } else {
                window.location.href = $(target).attr('href');
            }

        }.bind(target)).fail(function(){
            window.location.href = $(target).attr('href');
        }.bind(target));
    };

    ToggleSubmenuItems.prototype.getItemId = function (target) {
        return $(target).parent('li').data('page-id');
    };

    ToggleSubmenuItems.prototype.toggleSibling = function (target) {
        $(target).parent().toggleClass('is-expanded');
    };

    return new ToggleSubmenuItems();

})(jQuery);
