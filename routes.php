<?php

use App\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\RegisterController;

Router::get('/', [PagesController::class, 'index']);

Router::get('/users/register', [RegisterController::class, 'index']);
Router::post('/users/register', [RegisterController::class, 'store']);