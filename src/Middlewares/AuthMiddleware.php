<?php

namespace App\Middlewares;

use App\Core\Session;
use App\Core\Response;

class AuthMiddleware {
    public static function auth() {
        if(!Session::get('user_id')){
            Response::redirect('/users/login');
        }
    }
}
