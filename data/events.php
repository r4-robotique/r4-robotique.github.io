<?php

include_once(__DIR__ . "/_paginate.php");
include_once(__DIR__ . "/_events.php");

$year = $params["y"] ?? currentYear();
$year = checkYear($year);

$events = getEvents($year);
$pages = ceil(count($events) / $results_per_page);

$page = intval($params["p"] ?? $pages);


$data = ['events' => array_slice($events, $results_per_page * ($page - 1), $results_per_page), "year" => $year, "page" => $page, "pages" => $pages, "years" => $available_years];

$year = $params["y"] ?? currentYear();
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
