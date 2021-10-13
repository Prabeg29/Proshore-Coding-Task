<?php

use App\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\PostController;


Router::get('/', [PagesController::class, 'index']);

Router::get('/users/register', [RegisterController::class, 'index']);
Router::post('/users/register', [RegisterController::class, 'store']);
Router::get('/users/login', [LoginController::class, 'index']);
Router::post('/users/login', [LoginController::class, 'login']);
Router::get('/users/logout', [LogoutController::class, 'logout']);

Router::get('/posts', [PostController::class, 'index']);
Router::post('/posts', [PostController::class, 'store']);
Router::get("/posts/$id", [PostController::class, 'show']);
Router::delete("/posts/$id", [PostController::class, 'destroy']);