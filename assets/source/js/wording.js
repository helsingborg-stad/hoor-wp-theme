/*
DunkersKultur = DunkersKultur || {};
DunkersKultur.Wording = DunkersKultur.Wording || {};

DunkersKultur.Wording.Wording = (function ($) {

    function Wording() {
        this.SplitString(jQuery("h1"));
    }

    Wording.prototype.SplitString = function (targetObject) {
        var originalText = targetObject.text().trim().split(" ");
        var boldWording = originalText.splice(0,originalText.length / 2);
        targetObject.html((boldWording.length > 0 ? "<span class='bold-wording'>"+ boldWording.join(" ") + "</span> " : boldWording) + originalText.join(" "));
    };

    return new Wording();

})(jQuery);
*/
