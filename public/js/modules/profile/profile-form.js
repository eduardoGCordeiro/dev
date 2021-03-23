$(function () {
    $('#file').on('change', function () {
        $('#label-profile').text($(this).val().split('\\')[2]);
    });
});