<?php

namespace App\Migrations;

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Database;
use PDOException;

class Migration {
    protected string $sqlUsers;
    protected string $sqlPosts;

    public function __construct()
    {
        $this->sqlUsers = "CREATE TABLE IF NOT EXISTS users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255),
        )";

        $this->sqlPosts = "CREATE TABLE IF NOT EXISTS posts(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            slug VARCHAR(255) NOT NULL,
            imagePath VARCHAR(255) NOT NULL,
            status BOOLEAN DEFAULT 0,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";
    }

    public function run() {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $config = [
            'db' => [
                'dsn'=> $_ENV['DB_DSN'],
                'username'=> $_ENV['DB_USERNAME'],
                'password'=> $_ENV['DB_PASSWORD'],
            ]
        ];
        $db = new Database($config['db']);

        try{
            $db->run($this->sqlUsers);
            $db->run($this->sqlPosts);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        
    }
}

$migration = new Migration();
$migration->run();
