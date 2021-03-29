$(document).ready(function() {
    all_passed = $('.passed');
    k = all_passed.length-1;

    $('.passed').hide();
    $('.show-passed').click(function() {
        $(all_passed[k]).show();
        k -= 1;
        if (k < 0) {
            $(this).hide();
        }
    });
});