<?php

include 'vendor/autoload.php';

$routes = [
    '/' => ['index.html.twig', 'entities.php'],
    '/working-group' => ['working-group.html.twig', 'events.php'],

    '/formations' => ['formations.html.twig'],
    '/presse' => ['presse.html.twig', 'presse.php'],
    '/contact' => ['contact.html.twig'],

    '/plateformes' => ['plateformes.html.twig', 'plateformes.php'],
    '/formations' => ['formations.html.twig', 'formations.php'],
    '/presse' => ['presse.html.twig', 'presse.php'],
    '/ical' => ['', 'ical.php']
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

$twig->addFunction(new \Twig\TwigFunction('path', function ($route) {
    return $route;
}));
$twig->addFunction(new \Twig\TwigFunction('asset', function ($route) {
    $dir = dirname($_SERVER['SCRIPT_NAME']);
    if ($dir[strlen($dir)-1] != '/') $dir .= '/';
    return $dir . $route;
}));

if (isset($routes[$route][1])) {
    $data = @include 'data/'.$routes[$route][1];
}
$data['route'] = $route;

echo $twig->render($routes[$route][0], $data);
