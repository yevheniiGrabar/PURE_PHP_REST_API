<?php

require_once '../config/db_config.php';
require_once '../app/models/PostModel.php';
require_once '../app/repositories/PostRepository.php';

class PostController
{
    private $repository;

    public function __construct()
    {
        global $pdo;
        $this->repository = new PostRepository($pdo);
    }


    public function getPosts()
    {
        $posts = $this->repository->getAllPosts();
        echo json_encode(['payload' => $posts]);
    }

    public function getPostById($postId)
    {
        $post = $this->repository->getPostById($postId);
        echo json_encode($post);
    }

    public function createPost()
    {
        if (!$this->isValidUser()) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $title = $_POST['title'];
        $description = $_POST['description'];
        $uuid = $_POST['uuid'];
        $images = $_POST['images'];
        $userId = $_POST['user_id'];

        if (!$this->isValidData($title, $description, $images)) {
            return;
        }

        $postId = $this->repository->createPost($title, $description, $uuid, $images, $userId);
        $post = $this->repository->getPostById($postId);
        echo json_encode(['payload' => $post, 'status' => 'success']);
    }

    public function updatePost($postId, $title, $description, $uuid, $images)
    {
        $this->repository->updatePost($postId, $title, $description, $uuid, $images);
        echo json_encode(['message' => 'Post updated successfully']);
    }

    public function deletePost($postId)
    {
        $this->repository->deletePost($postId);
        echo json_encode(['message' => 'Post deleted successfully']);
    }

    public function notFound()
    {
        http_response_code(404);
        echo json_encode(['error' => "We cannot find what you're looking for."]);
    }

    private function isValidUser(): bool
    {
        $cookieValue = $_COOKIE['user_cookie'];
        $_SESSION['user_cookie'] = $cookieValue;

        return isset($_SESSION['user_cookie']);
    }

    private function isValidData($title, $description, $uuid): bool
    {
        $errors = [];

        if (empty($title)) {
            $errors[] = 'Title field cannot be empty.';
        }

        if (empty($description)) {
            $errors[] = 'Description field cannot be empty.';
        }

        if (empty($uuid)) {
            $errors[] = 'UUID field cannot be empty.';
        }


        if (mb_strlen($title) > 255) {
            $errors[] = 'Title field should not exceed 255 characters.';
        }

        if (mb_strlen($description) > 1000) {
            $errors[] = 'Description field should not exceed 1000 characters.';
        }

        if (empty($errors)) {
            return true;
        } else {
            http_response_code(400);
            echo json_encode(['error' => implode(' ', $errors)]);
            return false;
        }
    }
}

