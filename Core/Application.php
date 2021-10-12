<?php

namespace App\Core;

use App\Core\Router;
class Application{
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run() {
        Router::loadRoutes('routes.php');
        echo $this->router->resolve();
    }
}