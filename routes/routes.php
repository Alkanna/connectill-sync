<?php

use League\Plates\Engine;

if (!defined('APP_VER')) {
    die();
}

function defineRoutes($router) {
    $container = new League\Container\Container;
    $container->add(IndexController::class)->addArgument(Engine::class);
    $container->add(Engine::class);
    $strategy = (new League\Route\Strategy\ApplicationStrategy)->setContainer($container);
    $router->setStrategy($strategy);

    $router->map('GET', '/', IndexController::class);
}