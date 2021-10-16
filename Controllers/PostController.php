<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\Post;

class PostController extends Controller {
    protected Post $post;

    protected array $viewData = [
        'input' => [],
        'error' => [],
    ];

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index() {
        $this->view('post-add');
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
                'description' => $postData['description'],
                'status' => $postData['status'] === 'true' ? true : false,
                'user_id' => $postData['user_id']
            ]);
    
            Response::redirect('/');
        }

        $this->view('post-add', $this->viewData);
    }

    public function show(Request $request, $id) {
        $post = $this->post->getPost(['id' => $id]);

        $this->view('post', $post);
    }

    public function showEditForm(Request $request, $id) {
        $this->viewData['input'] = (array) $this->post->getPost(['id' => $id]);
        $this->view('post-edit', $this->viewData);
    }

    public function update(Request $request, $id) {
        $postData = $request->getInput();

        $this->viewData['input'] = $postData;

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $this->post->updatePost([
                'title' => $postData['title'],
                'description' => $postData['description'],
                'status' => $postData['status'] === 'true' ? true : false,
                'id' => $postData['id']
            ]);
            Response::redirect("/posts/{$postData['id']}");
        }
        $this->view('post-add', $this->viewData);
    }

    public function destroy(Request $request, $id){
        $this->post->deletePost(['id' => $id]);

        Response::redirect('/');
    }
}