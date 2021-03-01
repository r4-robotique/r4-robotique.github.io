$(document).ready(function() {
    $('.passed').hide();
    $('.show-passed').click(function() {
        $(this).hide();
        $('.passed').show();
    });
});