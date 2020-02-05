<?php

include 'vendor/autoload.php';

$routes = [
    '/' => ['index.html.twig', 'plateformes.php'],
    '/formations' => ['formations.html.twig'],
    '/groupe-de-travail' => ['groupe-de-travail.html.twig', 'events.php'],
    '/presse' => ['presse.html.twig', 'presse.php']
];

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
    return $_SERVER['SCRIPT_NAME'] . $route;
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
