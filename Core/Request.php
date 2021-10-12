<?php

namespace App\Core;

class Request {
    public function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUri() {
        return rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    public function getInput() {
        $data = [];
            
        foreach ($_POST as $key => $value) {
            $data[$key] = filter_input(
                INPUT_POST, 
                $key, 
                FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $data;
    }
}