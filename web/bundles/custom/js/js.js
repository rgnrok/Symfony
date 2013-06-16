$(document).ready(function(){
    $('.kwicks').kwicks({
        size: 125,
        maxSize : 250,
        spacing : 5,
        behavior: 'menu'
    });

    if ($("#slider-range").size()) {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 1, 400 ],
            slide: function( event, ui ) {
                $( "#clip_edit_time_start" ).val( ui.values[ 0 ]);
                $( "#clip_edit_time_end" ).val( ui.values[ 1 ] );
            }
        });
        $( "#clip_edit_time_start" ).val( $( "#slider-range" ).slider( "values", 0 ));
        $( "#fclip_edit_time_end" ).val( $( "#slider-range" ).slider( "values", 1 ) );
    }

    $('#loadYouTubeVideo').click(function(){
        var $youTubeUrl = $('#clip_edit_url').val();
        if ($youTubeUrl == '') { return false }

        var match = $.trim($youTubeUrl).match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|watch\?feature=player_embedded&v=)([^#\&\?]*).*/);
        if (match[2] === undefined) {
             return false
        }

        var $iframeUrl = 'http://www.youtube.com/embed/' + match[2];

        $('#youTubeIframe').html(
            '<iframe width="560" height="315" src="' + $iframeUrl + '" frameborder="0" allowfullscreen></iframe>'
        );
        $('.video-block').removeClass('hide')
    })
})