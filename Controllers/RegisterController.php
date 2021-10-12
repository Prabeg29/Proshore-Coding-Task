<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\User;

class RegisterController {
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        require 'Views/register.view.php';
    }

    public function store(Request $request) {
        $userData = $request->getInput();

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        $this->user->createUser([
            'username' => $userData['username'],
            'email' => $userData['email'], 
            'password' => $userData['password']
        ]);
    }
}