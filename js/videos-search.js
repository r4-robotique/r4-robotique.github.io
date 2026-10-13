$(document).ready(function() {
    var $input = $('#videos-search');
    var $status = $('#videos-search-status');
    var $results = $('#videos-search-results');
    var $listing = $('#videos-listing');
    var $categories = $('#videos-categories .videos-category');
    var videos = null;
    var loading = false;

    // Extra keywords have no number of occurrences, matching one is worth this many
    var extraWeight = 10;

    // Categories: their labels, and the ones that are currently used as a filter
    var labels = {};
    var selected = [];
    $categories.each(function() {
        labels[$(this).data('category')] = $(this).text().trim();
    });

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

                // Keywords of the transcript, with their number of occurrences
                video.occurrences = {};
                Object.keys(video.keywords || {}).forEach(function(keyword) {
                    var key = normalize(keyword);
                    video.occurrences[key] = (video.occurrences[key] || 0) + video.keywords[keyword];
                });
                video.categories = (video.categories || []).filter(function(category) {
                    return category in labels;
                });
                // The categories of a video can be searched, as extra keywords
                video.extra = (video.extra || []).concat(video.categories.map(function(category) {
                    return labels[category];
                })).map(normalize);
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

        var $pills = $('<div class="videos-pills">').append(video.categories.map(function(category) {
            return $('<a class="badge badge-pill badge-secondary videos-category">')
                .attr('data-category', category)
                .attr('href', '?c=' + encodeURIComponent(category))
                .toggleClass('active', selected.indexOf(category) !== -1)
                .text(labels[category]);
        }));

        var $iframe = $('<iframe width="100%" height="315" frameborder="0" allowfullscreen loading="lazy">')
            .attr('title', video.title)
            .attr('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture')
            .attr('src', 'https://www.youtube.com/embed/' + encodeURIComponent(video.youtube));

        return $('<div class="col-sm-6 p-2">').append(
            $('<div class="card h-100">').append(
                $('<div class="card-header">').append(
                    $('<div class="card-title">').append(
                        $('<h4>').append(document.createTextNode(video.title), '<br/>', $small, $pills)
                    )
                ),
                $('<div class="card-body">').append($('<div class="card-text">').append($iframe))
            )
        );
    }

    // Number of occurrences of a term in a video (title, speakers, abstract and transcript)
    function occurrences(video, term) {
        var count = video.haystack.split(term).length - 1;
        for (var keyword in video.occurrences) {
            if (keyword.indexOf(term) !== -1) {
                count += video.occurrences[keyword];
            }
        }
        video.extra.forEach(function(keyword) {
            if (keyword.indexOf(term) !== -1) {
                count += extraWeight;
            }
        });
        return count;
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
        if (selected.length) {
            url.searchParams.set('c', selected.join(','));
        } else {
            url.searchParams.delete('c');
        }
        history.replaceState(null, '', url);

        $('.videos-category').each(function() {
            var active = selected.indexOf($(this).data('category')) !== -1;
            $(this).toggleClass('active', active);
            if ($(this).is('button')) {
                $(this).attr('aria-pressed', active ? 'true' : 'false');
            }
        });

        if (!terms.length && !selected.length) {
            $results.prop('hidden', true).empty();
            $listing.show();
            $status.text('');
            return;
        }

        if (videos === null) {
            load();
            return;
        }

        // A video matches if it is in all the selected categories and if all the terms are found,
        // the ones with the most occurrences come first
        var matches = [];
        videos.forEach(function(video) {
            var filtered = selected.some(function(category) {
                return video.categories.indexOf(category) === -1;
            });
            if (filtered) return;

            var score = 0;
            var found = terms.every(function(term) {
                var count = occurrences(video, term);
                score += count;
                return count > 0;
            });
            if (found) {
                matches.push({video: video, score: score});
            }
        });
        matches.sort(function(a, b) {
            return b.score - a.score;
        });
        matches = matches.map(function(match) {
            return match.video;
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

    // Categories are toggled by the buttons below the search bar, and by the pills of the videos
    $(document).on('click', '.videos-category', function(event) {
        event.preventDefault();
        var category = $(this).data('category');
        var index = selected.indexOf(category);
        if (index === -1) {
            selected.push(category);
        } else {
            selected.splice(index, 1);
        }
        search();
    });

    var initial = new URL(window.location.href).searchParams;
    selected = (initial.get('c') || '').split(',').filter(function(category) {
        return category in labels;
    });
    if (initial.get('q') || selected.length) {
        $input.val(initial.get('q') || '');
        search();
    }
});
