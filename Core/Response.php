<?php

namespace App\Core;

class Response {
    public static function redirect($path){
        header("location: $path");
    }
}