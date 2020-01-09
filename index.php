<?php

include 'vendor/autoload.php';

$routes = [
    '/' => 'index.html.twig',
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
    return dirname($_SERVER['SCRIPT_NAME']) . '/' . $route;
}));

echo $twig->render($routes[$route]);
