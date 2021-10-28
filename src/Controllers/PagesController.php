<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Post;

class PagesController extends Controller{
    public function index() {
        $postModel = new Post();

        $post = $postModel->getAllPublishedPosts();
        $pages = $postModel->getPaginationNumber();

        $this->view('Posts/index', ['post' => $post, 'pages' => $pages]);
    }
}
