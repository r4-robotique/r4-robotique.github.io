<?php

include(__DIR__ . "/_events.php");
include(__DIR__ . "/_paginate.php");

$events = [];
foreach ($available_years as $year) {
    foreach (getEvents($year) as $event) {
        if (isset($event["youtube"])) {
            $events[] = $event;
        }
    }
}

$events = array_reverse($events);

list($events, $page, $pages) = paginate($events, 10);

$data = [
    'events' => $events,
    'page' => $page,
    'pages' => $pages
];

return $data;
