<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;
use App\Core\Response;
use App\Core\Session;

class LoginController extends Controller{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('login');
    }

    public function login(Request $request) {
        $this->viewData['input'] = $request->getInput();

        $user = $this->user->getUserByUsername(['username' => $this->viewData['input']['username']]);

        if($user && password_verify($this->viewData['input']['password'], $user->password)){
            $this->saveUserSession($user);
            Response::redirect('/');
        }

        $this->viewData['error'] = "Invalid Credentials. Please try again";

        $this->view('login', $this->viewData);
    }

    protected function saveUserSession($user) {
        Session::set('user_id', $user->id);
        Session::set('username', $user->username);
    }
}