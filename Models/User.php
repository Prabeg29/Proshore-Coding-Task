<?php

namespace App\Models;

use App\Core\Model;
use PDOException;

class User extends Model{
    protected const TABLE = 'users';

    public function createUser(array $userData){
        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
            implode(', ', array_keys($userData)),
            ':'.implode(', :', array_keys($userData))
        );

        $this->db->run($sql, $userData);
    }
}