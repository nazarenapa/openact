<?php

require_once __DIR__.'/../vendor/autoload.php';

// repositories
use Openact\controller\ApiController;

// symfony components
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

// setup production / development variables

$dbUrl = getenv("DATABASE_URL");
$isOnHeroku = !empty($dbUrl);

if ($isOnHeroku) {
	define('ENVIRONMENT', 'production');
    $app['debug'] = false;
    $parsedDbUrl = parse_url($dbUrl);
    $defaultDbConfiguration = [
	    'driver'    => 'pdo_pgsql',
	    'host'      => $parsedDbUrl['host'],
	    'dbname'    => substr($parsedDbUrl['path'],1),
	    'user'      => $parsedDbUrl['user'],
	    'password'  => $parsedDbUrl['pass'],
	    'charset'   => 'utf8'
	];
} else {
	define('ENVIRONMENT', 'development');
	$app['debug'] = true;
	$defaultDbConfiguration = [
	    'driver'    => 'pdo_pgsql',
	    'host'      => 'localhost',
	    'dbname'    => 'openact',
	    'user'      => 'openact',
	    'password'  => 'openact',
	    'charset'   => 'utf8'
	];
}
    $app['debug'] = true;

// services registration
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $defaultDbConfiguration,
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// routes
$app->get('/', function ()  use ($app) {
    return $app['twig']->render('home.twig');
});

$apiController = new ApiController($app);
$app->mount('/API', $apiController->build());


return $app;
