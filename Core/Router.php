<?php

namespace App\Core;

use App\Core\Request;
use Exception;

class Router {
    protected static array $routes = [];

    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function get($uri, $callback) {
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback) {
        self::$routes['POST'][$uri] = $callback;
    }

    public static function put($uri, $callback) {
        self::$routes['PUT'][$uri] = $callback;
    }

    public static function delete($uri, $callback) {
        self::$routes['DELETE'][$uri] = $callback;
    }

    public static function loadRoutes($routesFile) {
        return require $routesFile;
    }

    public function resolve(){
        $method = $_REQUEST['_method'] ?? $this->request->getMethod();
        $uri = $this->request->getUri();

        $id = substr(ltrim($uri, '/'), strpos(ltrim($uri, '/'), '/')+1) ?? '';
        
        if(is_string($id) && preg_match('/^[0-9]*$/', $id)){
            $oldUri = substr($uri, 0, strpos(ltrim($uri, '/'), '/') + 2);
            self::$routes[$method][$uri] = self::$routes[$method][$oldUri];
            unset(self::$routes[$method][$oldUri]);
        }

        $callback = self::$routes[$method][$uri] ?? false;

        if(!$callback){
            throw new Exception('Route not defined');
        }

        $callback[0] = new $callback[0];

        return call_user_func($callback, $this->request, $id);
    }
}