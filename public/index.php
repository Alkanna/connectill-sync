<?php

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

define('APP_VER', '0.0.1');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require_once '../routes/routes.php';
require_once  '../controllers/IndexController.php';

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;
defineRoutes($router);
$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);