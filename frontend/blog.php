<?php
    $sql = "SELECT posts.*, categories.name AS category_name
    FROM posts
    LEFT JOIN categories ON posts.category_id = categories.id
    ORDER BY posts.id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/../config.php'?>
    <?php require_once __DIR__ . '/includes/head.php'; ?>
<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>


    <header class="page-header text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Our Latest Articles</h1>
            <p class="text-white">Our blog posts are interactive and informative for anyone interested in technology.</p>
        </div>
    </header>

    <div class="container">
        <div class="row g-4">
            <?php foreach ($posts as $key => $post): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?php echo $post['featured_image'] ?>" class="blog-img" alt="blog">
                        <div class="card-body">
                            <small class="text-primary fw-bold"><?php echo $post['category_name'] ?></small>
                            <h5 class="card-title mt-2 fw-bold"><?php echo $post['title'] ?></h5>
                            <p class="card-text text-muted small">
                               <?php $short_description = strlen($post['short_description']) > 150 ? substr($post['short_description'], 0, 120) . '...' : $post['short_description'];
                               echo $short_description; ?>
                            </p>
                            <a href="<?php echo BASE_URL; ?>blog/<?php echo $post['slug']; ?>" class="stretched-link text-decoration-none text-dark"></a>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
            </div>
    </div>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>