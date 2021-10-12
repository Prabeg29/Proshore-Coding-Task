<?php

use App\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;


Router::get('/', [PagesController::class, 'index']);

Router::get('/users/register', [RegisterController::class, 'index']);
Router::post('/users/register', [RegisterController::class, 'store']);
Router::get('/users/login', [LoginController::class, 'index']);
Router::post('/users/login', [LoginController::class, 'login']);