<?php

namespace App\Controllers;

use App\Core\Controller;

class PagesController extends Controller{
    public function index() {
        $this->view('index');
    }
}