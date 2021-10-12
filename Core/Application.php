<?php

namespace App\Core;

use App\Core\Router;
use Exception;

class Application{
    protected Router $router;
    protected Request $request;
    public Database $database;

    public function __construct($config)
    {
        $this->database = new Database($config['db']);
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run() {
        Router::loadRoutes('routes.php');
        try{
            echo $this->router->resolve();
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
}