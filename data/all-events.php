<?php

include_once(__DIR__ . "/_events.php");
include_once(__DIR__ . "/_paginate.php");

$events = getVideoEvents();

list($events, $page, $pages) = paginate($events, 10);

$categories = getCategories();
$labels = array_column($categories, 'label', 'id');
foreach ($events as &$event) {
    $event['categories'] = [];
    foreach (getVideoKeywords($event['youtube'])['categories'] as $id) {
        if (isset($labels[$id])) {
            $event['categories'][] = ['id' => $id, 'label' => $labels[$id]];
        }
    }
}
unset($event);

$data = [
    'events' => $events,
    'categories' => $categories,
    'page' => $page,
    'pages' => $pages
];

return $data;
