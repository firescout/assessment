$(document).ready(function(){
    $('.title_filter').select2({
        placeholder: 'Enter movie title'
    });
    $('.genres_filter').select2({
        placeholder: 'Select a genre'
    });
    $('.actors_filter').select2({
        placeholder: 'Select an actor' 
    });
    $('.year_filter').select2({
        placeholder: 'Select a year' 
    });
    

    $('.title_filter').change(function() {
        var val = $(this).val();
        if (val) {
            hideMovie();
            $('.movie[data-title="'+val+'"]').fadeIn();
        }
    });
    $('.genres_filter').change(function() {
        var val = $(this).val();
        if (val.length != 0) {
            hideMovie();
            val.forEach(function(x, i) {
                $('.movie[data-genres~="'+x+'"]').fadeIn();
            });
        } else {
            clearfilter();
        }
    });
    $('.actors_filter').change(function() {
        var val = $(this).val();
        if (val.length != 0) {
            hideMovie();
            val.forEach(function(x, i) {
                $('.movie[data-actors~="'+x+'"]').fadeIn();
            });
        } else {
            clearfilter();
        }
    });
    $('.year_filter').change(function() {
        var val = $(this).val();
        if (val.length != 0) {
            hideMovie();
            val.forEach(function(x, i) {
                $('.movie[data-year="'+x+'"]').fadeIn();
            });
        } else {
            clearfilter();
        }
    });
    clearSelects();
    $('#changeView').change(function() {
        checkView(); 
    });
    checkView();
});
function checkView() {
    var checked = $('#changeView').is(':checked');
    if (checked == false) {
        $('.movie').removeClass("col-md-2").addClass('movie-list');
        $('.movie-poster-wrapper').removeClass("col-md-12").addClass('col-md-4');
    } else {
        $('.movie').removeClass('movie-list').addClass("col-md-2");
        $('.movie-poster-wrapper').removeClass("col-md-4").addClass('col-md-12');
    }
}
function hideMovie() {
    $('.movie').hide();
}
function clearSelects() {
    $('.title_filter').val(null).trigger('change');
    $('.genres_filter').val(null).trigger('change');
    $('.actors_filter').val(null).trigger('change');
    $('.year_filter').val(null).trigger('change');
}
function clearfilter() {
    $('.movie').show();
}
function clearModal() {
    $('.modal-title').text('');
    $('.modal-year').text('');
    $('.modal-story').text('');
    $('.modal-poster').attr('src','').attr('alt','');
    $('.modal-rated').text('');
    $('.modal-genre').html('');
    $('.modal-actors').html('');

}