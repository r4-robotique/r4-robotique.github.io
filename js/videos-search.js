$(document).ready(function() {
    var $input = $('#videos-search');
    var $status = $('#videos-search-status');
    var $results = $('#videos-search-results');
    var $listing = $('#videos-listing');
    var videos = null;
    var loading = false;

    // Lowercase and strip accents, so that "detection" matches "Détection"
    function normalize(text) {
        return text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');
    }

    function load() {
        if (videos !== null || loading) return;
        loading = true;

        $.getJSON($input.data('index')).done(function(data) {
            videos = data;
            videos.forEach(function(video) {
                video.haystack = normalize([video.title, video.speakers, video.date, video.abstract].join(' '));
            });
            search();
        }).fail(function() {
            loading = false;
            $status.text('Unable to load the videos index.');
        });
    }

    function card(video) {
        var $small = $('<small>');
        var $muted = $('<span class="text-muted">').appendTo($small);
        if (video.speakers) {
            $muted.append($('<em>').text(video.speakers), ' ');
        }
        $muted.append($('<span class="badge badge-warning">').text(video.date));

        var $iframe = $('<iframe width="100%" height="315" frameborder="0" allowfullscreen loading="lazy">')
            .attr('title', video.title)
            .attr('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture')
            .attr('src', 'https://www.youtube.com/embed/' + encodeURIComponent(video.youtube));

        return $('<div class="col-sm-6 p-2">').append(
            $('<div class="card h-100">').append(
                $('<div class="card-header">').append(
                    $('<div class="card-title">').append(
                        $('<h4>').append(document.createTextNode(video.title), '<br/>', $small)
                    )
                ),
                $('<div class="card-body">').append($('<div class="card-text">').append($iframe))
            )
        );
    }

    function search() {
        var query = $input.val().trim();
        var terms = normalize(query).split(/\s+/).filter(Boolean);

        // Keep the query in the URL, so that a search can be shared
        var url = new URL(window.location.href);
        if (query) {
            url.searchParams.set('q', query);
        } else {
            url.searchParams.delete('q');
        }
        history.replaceState(null, '', url);

        if (!terms.length) {
            $results.prop('hidden', true).empty();
            $listing.show();
            $status.text('');
            return;
        }

        if (videos === null) {
            load();
            return;
        }

        var matches = videos.filter(function(video) {
            return terms.every(function(term) {
                return video.haystack.indexOf(term) !== -1;
            });
        });

        $listing.hide();
        $results.empty().append(matches.map(card)).prop('hidden', false);
        $status.text(matches.length ? matches.length + ' video' + (matches.length > 1 ? 's' : '') + ' found' : 'No video found');
    }

    var timer = null;
    $input.on('focus', load);
    $input.on('input', function() {
        clearTimeout(timer);
        timer = setTimeout(search, 200);
    });

    var initial = new URL(window.location.href).searchParams.get('q');
    if (initial) {
        $input.val(initial);
        search();
    }
});
