<?php

$data = include(__DIR__ . '/data/events.php');
$events = $data['events'];
if (!isset($just_first)) {
    $just_first = false;
}
header('Content-type: text/calendar');

function icalDate($time, $inclTime = true)
{
  $dateTime = new \DateTime;
  $dateTime->setTimestamp($time);
  $tz = new \DateTimeZone('Europe/Paris');
  $time -= $tz->getOffset($dateTime);
  return date('Ymd' . ($inclTime ? '\THis' : ''), $time) . 'Z';
}

function icalString($string)
{
  $lines = explode("\n", strip_tags($string));
  foreach ($lines as &$line) {
    $line = trim($line);
  }

  return implode(" ", $lines);
}

function icalDescription($event)
{
  $str = icalString($event['title']) . "\\n" . icalString($event['speakers']);

  return $str;
}

function icalUid($event)
{
  return md5(implode('/', $event));
}

function fold($str)
{
  $result = '';
  while (true) {
    if (strlen($str) > 75) {
      $result .= substr($str, 0, 75);
      $result .= "\r\n";
      $str = ' '.substr($str, 75);
    } else {
      $result .= $str;
      break;
    }
  }
  return $result;
}

echo "BEGIN:VCALENDAR\r\n";
echo "VERSION:2.0\r\n";
echo "PRODID:-//hacksw/handcal//NONSGML v1.0//EN\r\n";
foreach ($events as $event) {
  if ($just_first && $event['passed']) continue;
  $ts_start = strtotime($event['date_start']);
  $ts_end = strtotime($event['date_end']);

  echo "BEGIN:VEVENT\r\n";
  echo "DTSTAMP:" . icalDate(time()) . "\r\n";
  echo "DTSTART:" . icalDate($ts_start) . "\r\n";
  echo "DTEND:" . icalDate($ts_end) . "\r\n";
  echo "SUMMARY:R4\r\n";
  $desc = "DESCRIPTION:" . icalDescription($event);
  if (isset($event['visio'])) {
    $desc .= "\\nVisio: " . $event['visio'];
  }
  echo fold($desc);
  echo "\r\n";
  echo "LOCATION:" . icalString($event['where']) . "\r\n";
  echo "UID:" . icalUid($event) . "\r\n";
  echo "END:VEVENT\r\n";
  if ($just_first && !$event['passed']) break;
}
echo "END:VCALENDAR\r\n";