<?php

namespace App\Controllers\Auth;

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
        $this->view('Auth/register');
    }

    public function store(Request $request) {
        $validationMsg = [
            'confirmPassword' => 'Please re-enter password for confirmation'
        ];

        $this->viewData['input'] = $request->getInput();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = array_key_exists($key, $validationMsg) ? 
                $validationMsg[$key] : 
                "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->viewData['input']['password'] = password_hash(
                $this->viewData['input']['password'], 
                PASSWORD_DEFAULT);

            $this->user->createUser([
                'username' => $this->viewData['input']['username'],
                'email' => $this->viewData['input']['email'], 
                'password' => $this->viewData['input']['password']
            ]);
    
            Response::redirect('/users/login');
        }

        $this->view('Auth/register', $this->viewData);
    }
}
