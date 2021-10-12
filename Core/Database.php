<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    protected PDO $pdo;

    public function __construct($dbconfig)
    {
        $dsn = $dbconfig['dsn'] ?? '';
        $username = $dbconfig['username'] ?? '';
        $password = $dbconfig['password'] ?? '';

        try{
            $this->pdo = new PDO($dsn, $username, $password);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
}