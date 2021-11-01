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

        $this->viewData['input']['filePath'] = $this->fileUpload();

        if(empty(array_values($this->viewData['error']))){
            $this->post->createPost([
                'title' => $this->viewData['input']['title'],
                'slug' => $this->viewData['input']['slug'],
                'description' => $this->viewData['input']['description'],
                'imagePath' => $this->viewData['input']['filePath'],
                'status' => $this->viewData['input']['status'] === 'true' ? 1 : 0,
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
        
        $this->viewData['input']['filePath'] = $this->fileUpload();

        if(empty(array_values($this->viewData['error']))){
            $this->post->updatePost([
                'title' => $this->viewData['input']['title'],
                'slug' => $this->viewData['input']['slug'],
                'description' => $this->viewData['input']['description'],
                'imagePath' => $this->viewData['input']['filePath'],
                'status' => $this->viewData['input']['status'] === 'true' ? 1 : 0,
                'id' => $this->viewData['input']['id']
            ]);
            Response::redirect("/posts/{$this->viewData['input']['id']}");
        }
        $this->view('Posts/post-edit', $this->viewData);
    }

    public function destroy(Request $request, $id){
        if($this->post->getPost(['id' => $id])){
            $this->post->deletePost(['id' => $id]);
            Response::redirect('/my-posts');
        }
        echo 'Something went wrong';
    }

    protected function fileUpload() {
        $allowedExtensions = array('.jpg', '.png', '.jpeg', '.gif');

        $fileExtension = pathinfo($_FILES["fileToUpload"]["name"])['extension'];
        $filePath = "../public/storage/".time().'_'.basename($_FILES["fileToUpload"]["name"]);

  
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $this->viewData['error']['image'] = "Sorry, your file is too large.";
        }
  
        // Allow certain file formats
        if(in_array($fileExtension, $allowedExtensions)) {
            $this->viewData['error']['image'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
  
        if (!move_uploaded_file(
            $_FILES["fileToUpload"]["tmp_name"],
            $filePath)
        ) {
            $this->viewData['error']['image'] =  "Sorry, there was an error uploading your file.";
        }

        return $filePath;
    }
}
