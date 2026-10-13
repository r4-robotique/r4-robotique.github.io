<?php

$prefix = __DIR__ . '/../events/';

$available_dirs = scandir($prefix);
$available_years = [];
foreach ($available_dirs as $dir) {
    if ($dir[0] != ".") {
        $available_years[] = $dir;
    }
}

function getEvents($year)
{
    global $prefix;

    $directory = "$prefix/$year/";
    $files = scandir($directory);
    $events = [];

    foreach ($files as $file) {
        $parts = explode('.', $file);
        if ($parts[count($parts) - 1] == 'php') {
            $date = $parts[0];
            $sessionEvents = include($directory . $file);
            foreach ($sessionEvents as $event) {
                if (!isset($event['date_start']) || !isset($event['date_end'])) {
                    $event["date_tbd"] = true;
                }
                $event['date_start'] = $date . ' ' . $event['date_start'];
                $event['date_end'] = $date . ' ' . $event['date_end'];
                $ts = strtotime($event['date_end']);
                $event['passed'] = $ts < time();

                if (isset($event['files'])) {
                    foreach ($event['files'] as &$event_file) {
                        if (substr($event_file, 0, 5) != 'http:' && substr($event_file, 0, 6) != 'https:') {
                            $event_file = 'files/' . $event_file;
                        }
                    }
                }

                $events[] = $event;
            }
        }
    }

    return $events;
}

// All the events that have a video, most recent first
function getVideoEvents()
{
    global $available_years;

    $events = [];
    foreach ($available_years as $year) {
        foreach (getEvents($year) as $event) {
            if (isset($event["youtube"])) {
                $events[] = $event;
            }
        }
    }

    return array_reverse($events);
}

// The thematic categories of the videos
function getCategories()
{
    return json_decode(file_get_contents(__DIR__ . '/../keywords/categories.json'), true);
}

// Keywords of a video: the words of its transcript with their number of occurrences, and the
// extra keywords and categories written from the understanding of it (see update_keywords.sh)
function getVideoKeywords($video)
{
    $result = ['keywords' => [], 'extra' => [], 'categories' => []];
    $file = __DIR__ . '/../keywords/' . $video . '.json';

    if (file_exists($file)) {
        $result['keywords'] = json_decode(file_get_contents($file), true)['keywords'] ?? [];
    }
    if (file_exists($file . '_extra.json')) {
        $extra = json_decode(file_get_contents($file . '_extra.json'), true);
        $result['extra'] = $extra['keywords'] ?? [];
        $result['categories'] = $extra['categories'] ?? [];
    }

    return $result;
}

function currentYear()
{
    global $available_dirs;
    return $available_dirs[count($available_dirs) - 1];
}

function checkYear($year)
{
    global $available_years;
    if (in_array($year, $available_years)) {
        return $year;
    } else {
        return currentYear();
    }
}

$results_per_page = 5;
