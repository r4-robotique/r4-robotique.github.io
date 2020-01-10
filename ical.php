<?php

$events = @include('data/events.php')['events'];
header('Content-type: text/calendar');

function icalDate($time, $inclTime = true)
{
    $dateTime = new \DateTime;
    $dateTime->setTimestamp($time);
    $tz = new \DateTimeZone('Europe/Paris');
    $time -= $tz->getOffset($dateTime);
    return date('Ymd' . ($inclTime ? '\THis' : ''), $time).'Z';
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
    $str = icalString($event['title'])."\\n".icalString($event['speakers']);

    return $str;
}

function icalUid($event)
{
    return md5(implode('/', $event));
}

?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
<?php foreach ($events as $event) { 
$ts_start = strtotime($event['date_start']); 
$ts_end = strtotime($event['date_end']); 
?>
BEGIN:VEVENT
DTSTAMP:<?php echo icalDate(time())."\n"; ?>
DTSTART:<?php echo icalDate($ts_start)."\n"; ?>
DTEND:<?php echo icalDate($ts_end)."\n"; ?>
SUMMARY:GT ASPIC
DESCRIPTION:<?php echo icalDescription($event); ?><?php if (isset($event['visio'])) echo "\\nVisio: ".$event['visio']; ?><?php echo "\n"; ?>
LOCATION:<?php echo icalString($event['where'])."\n"; ?>
UID:<?php echo icalUid($event)."\n"; ?>
END:VEVENT
<?php } ?>
END:VCALENDAR