<?php

namespace App\Core;

class Router {
    protected static array $routes = [];

    public static function get($uri, $callback) {
        self::$routes['GET'][$uri] = $callback;
    }

    public static function loadRoutes($routesFile) {
        return require $routesFile;
    }

    public function resolve(){
        return "Hello World";
    }
}