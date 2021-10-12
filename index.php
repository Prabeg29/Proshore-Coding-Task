<?php

use App\Core\Application;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn'=> $_ENV['DB_DSN'],
        'username'=> $_ENV['DB_USERNAME'],
        'password'=> $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application($config);
$app->run();