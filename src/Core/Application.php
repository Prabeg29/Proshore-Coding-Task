<?php

namespace App\Core;

use App\Core\Router;
use App\Core\Request;
use App\Core\Session;
use Exception;

class Application{
    protected Router $router;
    protected Request $request;
    public Database $database;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
        Session::init();
    }

    public function run() {
        Router::loadRoutes('../src/routes.php');
        try{
            echo $this->router->resolve();
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
}
