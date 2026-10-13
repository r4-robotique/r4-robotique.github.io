<?php

include_once(__DIR__ . "/_events.php");

// Search index for the videos page, used client-side by js/videos-search.js
$index = [];
foreach (getVideoEvents() as $event) {
    $keywords = getVideoKeywords($event['youtube']);

    $index[] = [
        'title' => $event['title'] ?? '',
        'speakers' => $event['speakers'] ?? '',
        'date' => substr($event['date_start'], 0, 10),
        'youtube' => $event['youtube'],
        'abstract' => trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($event['abstract'] ?? '')))),
        'keywords' => (object)$keywords['keywords'],
        'extra' => $keywords['extra'],
        'categories' => $keywords['categories'],
    ];
}

return [
    "contents" => json_encode($index, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
];
