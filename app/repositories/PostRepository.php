<?php

class PostRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPosts()
    {
        $stmt = $this->pdo->query("SELECT * FROM posts");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($postId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPost($title, $description, $uuid, $images, $userId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, description, uuid, images_json, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $uuid,json_encode($images), $userId]);
        return $this->pdo->lastInsertId();
    }

    public function updatePost($postId, $title, $description, $uuid, $images)
    {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = ?, description = ?, uuid = ?, images_json = ? WHERE id = ?");
        $stmt->execute([$title, $description, $uuid, json_encode($images), $postId]);
    }

    public function deletePost($postId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
    }
}
