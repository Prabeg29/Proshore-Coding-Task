<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

class LogoutController extends Controller{
    public function logout() {
        Session::remove('user_id');
        Response::redirect('/');
    }
}