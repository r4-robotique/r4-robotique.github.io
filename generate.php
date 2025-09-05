<?php

include 'vendor/autoload.php';

$routes = [
    '/' => ['index.html.twig', 'entities.php'],
    '/cover' => ['cover.html.twig', 'entities.php'],
    '/working-group' => ['working-group.html.twig', 'events.php'],
    '/videos' => ['videos.html.twig', 'all-events.php'],
    '/workshop' => ['workshop.html.twig', null],
    '/workshop-videos' => ['workshop-videos.html.twig', 'videos.php'],

    '/formations' => ['formations.html.twig', null],
    '/presse' => ['presse.html.twig', 'presse.php'],
    '/contact' => ['contact.html.twig', null],

    '/plateformes' => ['plateformes.html.twig', 'plateformes.php'],
    '/formations' => ['formations.html.twig', 'formations.php'],
    '/presse' => ['presse.html.twig', 'presse.php'],
    '/ical' => ['', 'ical.php'],
    '/next' => ['', 'ical.php'],
];

/////////////////////////////////////////////////////////////////////////////

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$route = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/cache',
    'auto_reload' => true
]);

if (!isset($routes[$route])) {
    $route = '/';
}

function routeToFilename($route, $params = [])
{
    $ext = "html";

    if ($route == '/ical' || $route == '/next') {
        $ext = "ics";
    }

    if ($params) {
        // Keep only no-empty values
        $values = array_filter($params, function ($v) {
            return $v !== null && $v !== "";
        });

        $route .= '_' . implode('_', array_values($values));
    }

    if ($route == '/') return "index.$ext";
    return trim($route, '/') . ".$ext";
}

$twig->addFunction(new \Twig\TwigFunction('path', function ($route, $params = []) {
    return routeToFilename($route, $params);
}));
$twig->addFunction(new \Twig\TwigFunction('asset', function ($route) {
    $dir = dirname($_SERVER['SCRIPT_NAME']);
    if ($dir[strlen($dir) - 1] != '/') $dir .= '/';
    return $dir . $route;
}));

function generate($tpl, $route, $data, array $params = []): array
{
    global $output_directory, $twig;

    $data['route'] = $route;

    $filename = $output_directory . "/" . routeToFilename($route, $params);

    $contents = $data["contents"] ?? $twig->render($tpl, $data);

    echo "* Generating $filename\n";
    file_put_contents($filename, $contents);

    return $data;
}

$output_directory = __DIR__ . '/web';

foreach ($routes as $route => list($tpl, $data_file)) {
    $data = $data_file ? @include 'data/' . $data_file : [];
    $data = generate($tpl, $route, $data);


    if (isset($data["pages"])) {
        $years = $data["years"] ?? [null];
        foreach ($years as $y) {
            for ($p = 1; $p <= $data["pages"]; $p++) {
                $params = ["y" => $y, "p" => $p];
                $data = $data_file ? @include 'data/' . $data_file : [];
                generate($tpl, $route, $data, $params);
            }
        }
    }
}
