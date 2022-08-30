<?php

use App\Router\Web;

$router = new Web();

$router->get('/', \App\Controllers\NoteController::class, 'index');
$router->get('/nopage', \App\Controllers\ErrorController::class, 'nopage');

$router->done();