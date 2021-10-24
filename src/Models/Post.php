<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Post extends Model{
    protected const TABLE = 'posts';
    protected int $totalRecords;
    protected int $limit = 3;

    public function __construct()
    {
        parent::__construct();
    }

    public function setTotalRecords() {
        $sql   = "SELECT id FROM ".self::TABLE." WHERE status=1";
        $statement = $this->db->run($sql); 
        $this->totalRecords = $statement->rowCount();
    }

    public function getCurrentPage(): int {
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    public function getPaginationNumber(): int {
        return ceil($this->totalRecords / $this->limit);
    }

    public function getAllPublishedPosts() {
        $this->setTotalRecords();
        $offSet = 0;
        if($this->getCurrentPage() > 1){
            $offSet = ($this->getCurrentPage() * $this->limit) - $this->limit;
        }

        $sql = "SELECT 
            posts.id, 
            posts.title, 
            posts.description, 
            posts.status, 
            posts.updated_at, 
            posts.user_id, 
            users.username 
            FROM ".self::TABLE.
            " INNER JOIN users
             ON ".self::TABLE.".user_id=users.id 
             WHERE status=1 
             ORDER BY posts.updated_at DESC 
             LIMIT $offSet, $this->limit";

        $statement = $this->db->run($sql);

        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function getUserPost($postData) {
        $sql = sprintf(
            "SELECT 
            posts.id, 
            posts.title, 
            posts.description, 
            posts.status, 
            posts.updated_at, 
            posts.user_id, 
            users.username 
            FROM ".self::TABLE.
            " INNER JOIN users
             ON ".self::TABLE.".user_id=users.id
             WHERE users.id=%s
             ORDER BY posts.updated_at DESC",
            ':'.implode(', :', array_keys($postData))  
        );

        $statement = $this->db->run($sql, $postData);

        return $statement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function getPost($postData) {
        $sql = sprintf(
            "SELECT posts.id, 
                    posts.title, 
                    posts.description, 
                    posts.status, 
                    posts.updated_at, 
                    posts.user_id,
                    posts.slug,
                    users.username 
            FROM ".self::TABLE.
            " INNER JOIN users
             ON ".self::TABLE.".user_id=users.id 
             WHERE ".self::TABLE.".%s=%s",
            implode('', array_keys($postData)),
            ':'.implode('', array_keys($postData))
        );

        $statement = $this->db->run($sql, $postData);

        return $statement->fetchObject(self::class);
    }

    public function createPost(array $postData){
        $sql = sprintf(
            "INSERT INTO ".self::TABLE."(%s) VALUES(%s)",
            implode(', ', array_keys($postData)),
            ':'.implode(', :', array_keys($postData))
        );

        $this->db->run($sql, $postData);
    }

    public function updatePost(array $postData){
        $sql = "UPDATE ".self::TABLE." SET title=:title, slug=:slug, description=:description, status=:status WHERE id=:id";

        $this->db->run($sql, $postData);
    }

    public function deletePost(array $postData) {
        $sql = sprintf(
            "DELETE FROM ".self::TABLE." WHERE %s=%s",
            implode('', array_keys($postData)),
            ':'.implode('', array_keys($postData))
        );

        $this->db->run($sql, $postData);
    }
}