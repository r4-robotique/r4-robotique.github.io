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
