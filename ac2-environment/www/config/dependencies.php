<?php

declare(strict_types=1);

use ac2\www\Controller\FlashController;
use ac2\www\Controller\HomeController;
use ac2\www\Controller\VisitsController;
use DI\Container;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Flash\Messages;
use ac2\www\Controller\CookieMonsterController;

$container = new Container();

$container->set('view', function () {
    return Twig::create(__DIR__ . '/../templates', ['cache' => false]);
});

$container->set('flash',  function () {
    return new Messages();
});
$container->set(
    FlashController::class,
    function (Container $c) {
        $controller = new FlashController($c->get("view"), $c->get("flash"));
        return $controller;
    }
);
$container->set(
    HomeController::class,
    function (ContainerInterface $c) {
        $controller = new HomeController($c->get("view"), $c->get("flash"));
        return $controller;
    }
);

$container->set(VisitsController::class, function (ContainerInterface $c) {
    return new VisitsController($c->get('view'));
});

$container->set(CookieMonsterController::class, function (ContainerInterface $c) {
    return new CookieMonsterController($c->get('view'));
});



