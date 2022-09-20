<?php

include(__DIR__ . "/_events.php");
include(__DIR__ . "/_paginate.php");

$year = $_GET["y"] ?? currentYear();
$year = checkYear($year);

list($events, $page, $pages) = paginate(getEvents($year), 5, true);

$data = [
    'events' => $events,
    "year" => $year,
    "page" => $page,
    "pages" => $pages,
    "years" => $available_years
];

return $data;
