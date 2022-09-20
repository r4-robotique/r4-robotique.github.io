<?php

function paginate(array $data, int $results_per_page = 5, bool $start_end = false): array
{
    $pages = ceil(count($data) / $results_per_page);
    $page = intval($_GET["p"] ?? ($start_end ? $pages : 1));
    $data = array_slice($data, $results_per_page * ($page - 1), $results_per_page);

    return [$data, $page, $pages];
}