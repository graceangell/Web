jQuery(document).ready(function ($) {
    $("html").on("click", function () {
        $(".site-header .form-section .example").slideUp();
    });

    $(".site-header .form-section").on("click", function (event) {
        event.stopPropagation();
    });

    $("#search-btn").on("click", function () {
        $(".site-header .form-section .example").slideToggle();
        return false;
    });

    $(".btn-form-close").on("click", function () {
        $(".site-header .form-section .example").slideToggle();
        return false;
    });

    /*  Navigation Accessiblity
  --------------------------------------------- */
    $(document).on('mousemove', 'body', function (e) {
        $(this).removeClass('keyboard-nav-on');
    });
    $(document).on('keydown', 'body', function (e) {
        if (e.which == 9) {
            $(this).addClass('keyboard-nav-on');
        }
    });


});

