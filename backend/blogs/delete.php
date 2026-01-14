<?php
$id = $_GET['id'] ?? null;

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $post['featured_image'];

        if (! empty($post['featured_image']) && file_exists($filePath)) {
            unlink($filePath);
        }

        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
    }

    $_SESSION['success'] = "Post Deleted Successfully!";
    header('Location: ' . BASE_URL . 'admin/blogs');
    exit();
}
