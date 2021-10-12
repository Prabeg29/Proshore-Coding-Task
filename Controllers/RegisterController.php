<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;
use App\Core\Response;

class RegisterController extends Controller{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('register');
    }

    public function store(Request $request) {
        $userData = $request->getInput();

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        $this->user->createUser([
            'username' => $userData['username'],
            'email' => $userData['email'], 
            'password' => $userData['password']
        ]);

        Response::redirect('/login');
    }
}