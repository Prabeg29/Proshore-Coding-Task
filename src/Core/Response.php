<?php

namespace App\Core;

class Response {
    public static function redirect(string $path){
        header("location: $path");
    }
}
