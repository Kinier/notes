<?php

use App\Router\Web;
use App\Middleware\AuthMiddleware;

$router = new Web();


$router->get('/',
             \App\Controllers\NoteController::class,
             'index',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'register']);
$router->get('/nopage', \App\Controllers\ErrorController::class, 'nopage');
$router->get('/register', \App\Controllers\UserController::class, 'register');
$router->get('/login', \App\Controllers\UserController::class, 'login');

$router->post('/auth/register', \App\Controllers\Auth\AuthController::class, 'register');
$router->post('/auth/login', \App\Controllers\Auth\AuthController::class, 'login');
$router->get('/auth/logout', \App\Controllers\Auth\AuthController::class, 'logout',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'login']);

$router->done();