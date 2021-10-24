<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    protected PDO $pdo;

    public function __construct(array $dbconfig)
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

    protected function prepare(string $sql) {
        return $this->pdo->prepare($sql);
    }

    public function run($sql, array $params = null) {
        $statement = $this->prepare($sql);

        if(!is_null($params)){
            foreach ($params as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
        }

        try{
            $statement->execute();
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }

        return $statement;
    }
}
