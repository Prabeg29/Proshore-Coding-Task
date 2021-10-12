<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;
use App\Core\Response;

class RegisterController extends Controller{
    protected User $user;

    protected array $viewData = [];

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('register');
    }

    public function store(Request $request) {
        $userData = $request->getInput();

        $this->viewData['input'] = $userData;

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

            $this->user->createUser([
                'username' => $userData['username'],
                'email' => $userData['email'], 
                'password' => $userData['password']
            ]);
    
            Response::redirect('/login');
        }

        $this->view('register', $this->viewData);
    }
}