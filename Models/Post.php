<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Post extends Model{
    protected const TABLE = 'post';

    public function getAllPosts() {
        $sql = "SELECT * FROM ".self::TABLE;

        $stmt = $this->db->run($sql);

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function getPost($postData) {
        $sql = sprintf(
            "SELECT * FROM ".self::TABLE." WHERE %s=%s",
            implode('', array_keys($postData)),
            ':'.implode('', array_keys($postData))
        );

        $stmt = $this->db->run($sql, $postData);

        return $stmt->fetchObject(self::class);
    }

    public function createPost(array $postData){
        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
            implode(', ', array_keys($postData)),
            ':'.implode(', :', array_keys($postData))
        );

        $this->db->run($sql, $postData);
    }
}