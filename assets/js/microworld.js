$('.thumbs img').hover(function() {
    var url = $(this).attr('src');
    $('#main').attr('src', url);
});