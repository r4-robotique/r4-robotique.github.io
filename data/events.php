<?php

include_once(__DIR__ . "/_paginate.php");
include_once(__DIR__ . "/_events.php");

$year = $params["y"] ?? currentYear();
$year = checkYear($year);

$allEvents = getEvents($year);
$pages = ceil(count($allEvents) / $results_per_page);

$page = intval($params["p"] ?? $pages);


$data = ['events' => array_slice($allEvents, $results_per_page * ($page - 1), $results_per_page), "year" => $year, "page" => $page, "pages" => $pages, "years" => $available_years];

$year = $params["y"] ?? currentYear();
$year = checkYear($year);

list($events, $page, $pages) = paginate($allEvents, 5, true);

$data = [
    'events' => $events,
    "year" => $year,
    "page" => $page,
    "pages" => $pages,
    "years" => $available_years
];

return $data;
