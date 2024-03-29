<?php

use App\Router\Web;
use App\Middleware\AuthMiddleware;

$router = new Web();


$router->get('/',
             \App\Controllers\NoteController::class,
             'index',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'register']);
$router->get('/nopage', \App\Controllers\ErrorController::class, 'nopage');
$router->get('/register', \App\Controllers\UserController::class, 'registerPage');
$router->get('/login', \App\Controllers\UserController::class, 'loginPage');

$router->post('/auth/register', \App\Controllers\Auth\AuthController::class, 'register');
$router->post('/auth/login', \App\Controllers\Auth\AuthController::class, 'login');
$router->get('/auth/logout', \App\Controllers\Auth\AuthController::class, 'logout',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'login']);

$router->get('/note/new', \App\Controllers\NoteController::class, 'createPage',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'login']);

$router->post('/note/new/create', \App\Controllers\NoteController::class, 'create',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'login']);

$router->get('/note/preview', \App\Controllers\NoteController::class, 'notePreviewPage',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'login']);

$router->get('/note/delete', \App\Controllers\NoteController::class, 'deleteNote',
             ['middlewareFunction' => 'App\Middleware\AuthMiddleware::isUser', 'arg' => 'login']);
$router->done();