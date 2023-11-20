<?php

use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

include(__DIR__ . '/vendor/autoload.php');
$data = include(__DIR__ . '/data/events.php');
$events = $data['events'];
if (!isset($just_first)) {
    $just_first = false;
}

$calendar = Calendar::create('R4 seminaire');

foreach ($events as $event) {
    if ($just_first && $event['passed']) continue;

    $evt = Event::create('R4')
        ->startsAt(new \DateTime($event['date_start']))
        ->endsAt(new \DateTime($event['date_end']))
        ->address($event['where'])
        ->description($event['title'] . "\n" . $event['speakers']);

    if (isset($event['visio'])) {
        $evt->url($event['visio']);
    }

    $calendar->event($evt);

    if ($just_first && !$event['passed']) break;
}

header('Content-type: text/calendar');
echo $calendar->get();
