<?php

namespace App\Core;

class Session {
    public static function init() {
        session_start();
    }

    public static function set(string $key, string $value) {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key) {
        return $_SESSION[$key];
    }

    public static function remove(string $key) {
        unset($_SESSION[$key]);
    }
}