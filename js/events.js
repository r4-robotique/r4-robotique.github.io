$(document).ready(function() {
    $('.top-navigation').html($('.bottom-navigation').html());

    function update_page() {
        $('.events-page').hide();
        $('.events-page-'+events_page).show();
        $('.events-pagination .change-page').removeClass('active');
        $('.events-pagination .change-page[rel="'+events_page+'"]').addClass('active');
    }
    
    $('.events-pagination .change-page').click(function() {
        events_page = $(this).attr('rel');
        update_page();
    });
    $('.events-pagination .previous-page').click(function() {
        events_page = Math.max(1, events_page-1);
        update_page();
    });
    $('.events-pagination .next-page').click(function() {
        events_page = Math.min(events_pages, events_page+1);
        update_page();
    });
});