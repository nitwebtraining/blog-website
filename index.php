<?php
require_once __DIR__ . '/config.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Authentication Check
$isLoggedIn = isset($_SESSION['user_id']);

// redirect to dashboard if already logged in and trying to access login or register
if ($isLoggedIn && ($request == '/admin/login' || $request == '/admin/register')) {
    header("Location: " . BASE_URL . "admin/dashboard");
    exit();
}

// redirect to login if not logged in and trying to access dashboard
if (! $isLoggedIn && strpos($request, '/admin/dashboard') !== false) {
    header("Location: " . BASE_URL . "admin/login");
    exit();
}

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
    case '/admin/logout':
        require_once __DIR__ . '/backend/logout.php';
        break;
    case '/admin/register':
        require_once __DIR__ . '/backend/register.php';
        break;
    case '/admin/dashboard':
        require_once __DIR__ . '/backend/dashboard.php';
        break;
    case '/admin/contact-list':
        require_once __DIR__ . '/backend/contact/contact-list.php';
        break;

    // category route
    case '/admin/categories':
        require_once __DIR__ . '/backend/categories/index.php';
        break;
    case '/admin/category/create':
        require_once __DIR__ . '/backend/categories/create.php';
        break;
    case '/admin/category/edit':
        require_once __DIR__ . '/backend/categories/edit.php';
        break;
    case '/admin/category/delete':
        require_once __DIR__ . '/backend/categories/delete.php';
        break;

    // blog route
    case '/admin/blogs':
        require_once __DIR__ . '/backend/blogs/index.php';
        break;
    case '/admin/blog/create':
        require_once __DIR__ . '/backend/blogs/create.php';
        break;
    case '/admin/blog/edit':
        require_once __DIR__ . '/backend/blogs/edit.php';
        break;
    case '/admin/blog/delete':
        require_once __DIR__ . '/backend/blogs/delete.php';
        break;

    // run migration
    case '/admin/db-migration':
        require_once __DIR__ . '/backend/migrations/migrate.php';
        break;

    default:
        http_response_code(404);
        require_once __DIR__ . '/frontend/404.php';
        break;
}
