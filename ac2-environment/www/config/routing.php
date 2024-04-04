<?php

declare(strict_types=1);

use ac2\www\Controller\HomeController;
use ac2\www\Controller\VisitsController;
use ac2\www\Middleware\AfterMiddleware;
use ac2\www\Middleware\SessionMiddleware;
use ac2\www\Controller\CookieMonsterController;
use ac2\www\Controller\FlashController;

$app->add(SessionMiddleware::class);

$app->get('/', HomeController::class . ':apply')->setName('home');

$app->get('/visits', VisitsController::class . ':showVisits')->setName('visits');
$app->get('/cookies', CookieMonsterController::class . ':showAdvice')->setName('cookies');
$app->get('/flash', FlashController::class . ':addMessage')->setName('flash');
