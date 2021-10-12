<?php

use App\Core\Router;
use App\Controllers\PagesController;

Router::get('/', [PagesController::class, 'index']);