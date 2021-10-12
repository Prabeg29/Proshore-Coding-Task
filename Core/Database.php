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
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    protected function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    public function run($sql, $params = null) {
        $stmt = $this->prepare($sql);

        if(!is_null($params)){
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }
        
        try{
            $stmt->execute();
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }

        return $stmt;
    }
}