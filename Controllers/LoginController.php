<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;
use App\Core\Response;

class LoginController extends Controller{
    protected User $user;

    protected array $viewData = [];

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('login');
    }

    public function login(Request $request) {
        $credentials = $request->getInput();

        $user = $this->user->getUserByEmail(['email' => $credentials['email']]);

        if($user && password_verify($credentials['password'], $user->password)){
            Response::redirect('/posts');
        }

        $this->viewData['error'] = "Invalid Credentials. Please try again";

        $this->view('login', $this->viewData);
    }
}