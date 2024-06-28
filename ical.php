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
    if (!isset($event['date_start']) || !isset($event['date_end'])) continue;
    if ($just_first && $event['passed']) continue;

    $desc = $event['title'] . "\n" . $event['speakers'];
    if (isset($event['visio'])) {
        $desc .= "\n" . $event['visio'];
    }

    $evt = Event::create('R4')
        ->startsAt(new \DateTime($event['date_start'], new DateTimeZone('Europe/Paris')))
        ->endsAt(new \DateTime($event['date_end'], new DateTimeZone('Europe/Paris')))
        ->address($event['where'])
        ->description($desc);

    if (isset($event['visio'])) {
        $evt->url($event['visio']);
    }

    $calendar->event($evt);

    if ($just_first && !$event['passed']) break;
}

header('Content-type: text/calendar');
echo $calendar->get();
