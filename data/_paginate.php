<?php

function paginate(array $data, int $results_per_page = 5, bool $start_now = false): array
{
    global $params;
    
    $pages = ceil(count($data) / $results_per_page);

    $now_page = $pages;
    foreach ($data as $k => $entry) {
        if (!$entry["passed"]) {
            $now_page = 1 + floor($k / $results_per_page);
            break;
        }
    }

    $page = intval($params["p"] ?? ($start_now ? $now_page : 1));
    $data = array_slice($data, $results_per_page * ($page - 1), $results_per_page);

    return [$data, $page, $pages];
}
