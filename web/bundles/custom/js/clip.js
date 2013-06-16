// Get the ul that holds the collection of tags
var collectionHolder = $('ul.tags');

// setup an "add a tag" link
var $newLinkLi = $('<li></li>').append( $('.add_tag_link'));

jQuery(document).ready(function() {

    // add the "add a tag" anchor and li to the tags ul
    collectionHolder.append($newLinkLi);
    collectionHolder.find('li.tags').each(function() {
        addTagFormDeleteLink($(this));
    });

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    collectionHolder.data('index', collectionHolder.find(':input').length);


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



    $('.add_tag_link').on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTagForm(collectionHolder, $newLinkLi);
    });
});

function addTagForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.data('prototype');

    // get the new index
    var index = collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<button class="btn">delete</button>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $tagFormLi.remove();
    });
}


