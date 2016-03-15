(function ($, undefined) {
    $(document).ready(function () {
        $(".hamburger").click(function () {
            $(".nav-menu").slideToggle("slow", function () {
            });
        });
    });
})(jQuery);
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide"
    });
});
