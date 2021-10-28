<?php

namespace App\Core;

abstract class Controller {
    protected array $viewData = [
        'input' => [],
        'error' => [],
    ];

    public function view(string $viewFile, array $viewData = []){
        extract($viewData);

        require "../src/Views/$viewFile.view.php";
    }
}
