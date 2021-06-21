$(document).ready(function() {
    $('.without_search').select2({
        theme: 'bootstrap4',
        minimumResultsForSearch: -1
    });
    $('.with_search').select2({
        theme: 'bootstrap4'
    });

    $('#id_external_request').hide();
    $("label[for='id_external_request']").hide();

    $('#123456789').hide();

    $('#id_external_request_type').on('change', function() {
        if ($("#id_external_request_type").val() == 1) {
            $('#id_external_request').fadeOut();
            $("label[for='id_external_request']").fadeOut();
        } else {
            $('#id_external_request').fadeIn();
            $("label[for='id_external_request']").fadeIn();
        }
    });

    $('#id_request_type').on('change', function() {
        if ($("#id_request_type").val() == 3) {
            $('#123456789').slideDown();
        } else {
            $('#123456789').slideUp();
        }
    });



});