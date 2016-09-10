<?php

require_once __DIR__.'/../vendor/autoload.php';

// symfony components
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// setup
$app = new Silex\Application();
$app['debug'] = true;

if (!empty($dbUrl)) {
    define('ENVIRONMENT', 'production');
} else {
    define('ENVIRONMENT', 'development');
}

if (ENVIRONMENT == 'production') {
    $app['debug'] = false;
}

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/', function ()  use ($app) {
    return "ciao";
});

return $app;
