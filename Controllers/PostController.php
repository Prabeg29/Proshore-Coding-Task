<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\Post;

class PostController extends Controller {
    protected Post $post;

    protected array $viewData = [];

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index() {
        $this->view('post-form');
    }

    public function store(Request $request) {
        $postData = $request->getInput();

        $this->viewData['input'] = $postData;

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->post->createPost([
                'title' => $postData['title'],
                'body' => $postData['body']
            ]);
    
            Response::redirect('/');
        }

        $this->view('post-form', $this->viewData);
    }
}