<?php

include_once(__DIR__ . "/_events.php");

// Lowercase without accents, to sort and merge the names
function speakerKey($name)
{
    $accents = [
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', 'ã' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
        'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ñ' => 'n', 'ò' => 'o',
        'ó' => 'o', 'ô' => 'o', 'ö' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y',
    ];

    return strtr(mb_strtolower($name), $accents);
}

// Splits the speakers of an event into [name, affiliation]
// "Jane Doe (Some lab)" has an affiliation, "Jane Doe, John Smith & Foo Bar" are three speakers
function splitSpeakers($speakers)
{
    $affiliation = '';
    if (preg_match('/\(([^)]*)\)/', $speakers, $match)) {
        $affiliation = trim($match[1]);
        $speakers = str_replace($match[0], '', $speakers);
    }

    $names = [];
    foreach (preg_split('/\s*(?:,|&|\band\b)\s*/', $speakers) as $name) {
        $name = trim(preg_replace('/\s+/', ' ', preg_replace('/^Dr\.?\s*/', '', trim($name))));
        if ($name != '') {
            $names[] = $name;
        }
    }

    // An affiliation with several speakers can not be attributed
    if (count($names) != 1) {
        $affiliation = '';
    }

    return array_map(function ($name) use ($affiliation) {
        return [$name, $affiliation];
    }, $names);
}

$speakers = [];
foreach ($available_years as $year) {
    foreach (getEvents($year) as $event) {
        if (empty($event['speakers']) || empty($event['title'])) {
            continue;
        }

        foreach (splitSpeakers($event['speakers']) as list($name, $affiliation)) {
            $key = speakerKey($name);
            if (!isset($speakers[$key])) {
                $speakers[$key] = ['name' => $name, 'affiliation' => '', 'talks' => []];
            }
            if ($affiliation) {
                $speakers[$key]['affiliation'] = $affiliation;
            }
            $speakers[$key]['talks'][] = [
                'title' => $event['title'],
                'date' => substr($event['date_start'], 0, 10),
                'youtube' => $event['youtube'] ?? null,
            ];
        }
    }
}
ksort($speakers, SORT_STRING);

// Grouping by initial letter
$letters = [];
foreach ($speakers as $key => $speaker) {
    $letters[strtoupper($key[0])][] = $speaker;
}

return [
    'letters' => $letters,
    'count' => count($speakers),
];
