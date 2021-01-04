<?php

// https://webconf.u-bordeaux.fr/b/gre-2dg-d6u

$dir = __DIR__.'/../events/';
$files = scandir($dir);
$events = [];
foreach ($files as $file) {
  $parts = explode('.', $file);
  if ($parts[count($parts)-1] == 'php') {
    $date = $parts[0];
    $sessionEvents = include($dir.$file);
    foreach ($sessionEvents as $event) {
      $event['date_start'] = $date.' '.$event['date_start'];
      $event['date_end'] = $date.' '.$event['date_end'];
      $ts = strtotime($event['date_end']);
      $event['passed'] = $ts < time();

      if (isset($event['files'])) {
        foreach ($event['files'] as &$event_file) {
          if (substr($event_file, 0, 5) != 'http:' && substr($event_file, 0, 6) != 'https:') {
              $event_file = 'files/'.$event_file;
          }
        }
      }

      $events[] = $event;
    }
  }
}

$data = ['events' => $events];

return $data;
