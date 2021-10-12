<?php

use App\Core\Router;

Router::get('/', [PagesController::class, 'index']);