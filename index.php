<?php
// Router Path
$request = $_SERVER['REQUEST_URI'];

// Router Logic
switch ($request) {
    case '/':
    case '/':
        require_once __DIR__ . '/frontend/index.php';
        break;

    case '/blog':
        require_once __DIR__ . '/frontend/blog.php';
        break;

    case '/about':
        require_once __DIR__ . '/frontend/about.php';
        break;

    case '/contact':
        require_once __DIR__ . '/frontend/contact.php';
        break;

    case '/blog-details':
        require_once __DIR__ . '/frontend/blog-details.php';
        break;

    // backend route
    case '/admin/login':
        require_once __DIR__ . '/backend/login.php';
        break;
    case '/admin/register':
        require_once __DIR__ . '/backend/register.php';
        break;
    case '/admin/dashboard':
        require_once __DIR__ . '/backend/dashboard.php';
        break;

    default:
        http_response_code(404);
        require_once __DIR__ . '/frontend/404.php';
        break;
}
