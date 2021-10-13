<?php

namespace App\Models;

use App\Core\Model;

class User extends Model{
    protected const TABLE = 'users';

    public function getUserByUsername(array $where, array $column = ['*']) {
        $sql = sprintf(
            "SELECT %s FROM ".self::TABLE." WHERE %s=%s",
            implode('', $column),
            implode(', ', array_keys($where)),
            ':'.implode(', :', array_keys($where))
        );

        $stmt = $this->db->run($sql, $where);

        return $stmt->fetchObject(self::class);
    }

    public function createUser(array $userData){
        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
            implode(', ', array_keys($userData)),
            ':'.implode(', :', array_keys($userData))
        );

        $this->db->run($sql, $userData);
    }
}