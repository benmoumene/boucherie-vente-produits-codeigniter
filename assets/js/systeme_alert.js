
jQuery(document).ready(function() {

    $('#bld').on('click', function (e) {
        e.preventDefault();
        $('#alt').hide(1500);
    });

    setTimeout(function () {
        $('#alt').show(1500);
    }, 500);

    setTimeout(function () {
        $('#alt').hide(1500);
    }, 10000);

    $('form').attr('autocomplete', 'off');

    $('.form-control').on('focus', function () {
        $(this).removeClass('is-invalid');
    });

});
