<?php

session_start();

require_once '../app/controllers/PostController.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$controller = new PostController();

switch ($method) {
    case 'GET':
        if ($uri == '/api/posts') {
            $controller->getPosts();
        } elseif (preg_match('/\/api\/posts\/[1-9]/', $uri)) {
            $controller->getPostById(basename($uri));
        } else {
            $controller->notFound();
        }
        break;
    case 'POST':
        if ($uri == '/api/posts') {
            $controller->createPost();
        } else {
            $controller->notFound();
        }
        break;
    case 'DELETE':
        if (preg_match('/\/api\/posts\/[1-9]/', $uri)) {
            $controller->deletePost(basename($uri));
        } else {
            $controller->notFound();
        }
        break;
    default:
        $controller->notFound();
}
