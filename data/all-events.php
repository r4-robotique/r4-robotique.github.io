<?php

include_once(__DIR__ . "/_events.php");
include_once(__DIR__ . "/_paginate.php");

$events = getVideoEvents();

list($events, $page, $pages) = paginate($events, 10);

$data = [
    'events' => $events,
    'page' => $page,
    'pages' => $pages
];

return $data;
