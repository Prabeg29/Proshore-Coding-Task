<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Middlewares\AuthMiddleware;
use App\Models\Post;

class PostController extends Controller {
    protected Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index() {
        AuthMiddleware::auth(); 

        $this->view('Posts/post-add');
    }

    public function store(Request $request) {
        $this->viewData['input'] = $request->getInput();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->post->createPost([
                'title' => $this->viewData['input']['title'],
                'slug' => $this->viewData['input']['slug'],
                'description' => $this->viewData['input']['description'],
                'status' => $this->viewData['input']['status'] === 'true',
                'user_id' => $this->viewData['input']['user_id']
            ]);
    
            Response::redirect('/');
        }

        $this->view('Posts/post-add', $this->viewData);
    }

    public function userPost(Request $request, $id) {
        AuthMiddleware::auth(); 
        $userPost = (array) $this->post->getUserPost(['id'=> Session::get('user_id')]);
        $this->view('Posts/my-posts', $userPost);
    }

    public function show(Request $request, $id) {
        $this->viewData['input'] = (array) $this->post->getPost(['id' => $id]);

        $this->view('Posts/post', $this->viewData);
    }

    public function showEditForm(Request $request, $id) {
        AuthMiddleware::auth(); 

        $this->viewData['input'] = (array) $this->post->getPost(['id' => $id]);
        $this->view('Posts/post-edit', $this->viewData);
    }

    public function update(Request $request, $id) {
        $this->viewData['input'] = $request->getInput();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->post->updatePost([
                'title' => $this->viewData['input']['title'],
                'slug' => $this->viewData['input']['slug'],
                'description' => $this->viewData['input']['description'],
                'status' => $this->viewData['input']['status'] === 'true' ? true : false,
                'id' => $this->viewData['input']['id']
            ]);
            Response::redirect("/posts/{$this->viewData['input']['id']}");
        }
        $this->view('Posts/post-add', $this->viewData);
    }

    public function destroy(Request $request, $id){
        if($this->post->getPost(['id' => $id])){
            $this->post->deletePost(['id' => $id]);
            Response::redirect('/my-posts');
        }
        echo 'Something went wrong';
    }
}