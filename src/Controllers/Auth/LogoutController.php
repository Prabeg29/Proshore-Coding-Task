<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;

class LogoutController extends Controller{
    public function logout() {
        if(Session::get('user_id')){
            Session::remove('user_id');
        }
        Response::redirect('/');
    }
}
