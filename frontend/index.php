<?php
    $sql = "SELECT posts.*, categories.name AS category_name
    FROM posts
    LEFT JOIN categories ON posts.category_id = categories.id
    ORDER BY posts.id DESC LIMIT 3";
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

    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <?php foreach ($posts as $key => $post): ?>
                <div class="card mb-4 overflow-hidden border-0 shadow-sm" data-aos="fade-up">
                    <img src="<?php echo $post['featured_image'] ?? 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97' ?>" class="card-img-top" alt="<?php echo $post['title'] ?>">
                    <div class="card-body p-4">
                        <span class="badge bg-primary-soft text-primary mb-2"><?php echo $post['category_name'] ?></span>
                        <h2 class="h3 fw-bold"><?php echo $post['title'] ?></h2>
                        <p class="text-muted"><?php echo $post['short_description'] ?></p>
                        <a href="<?php echo BASE_URL; ?>blog/<?php echo $post['slug']; ?>" class="btn btn-outline-primary btn-sm rounded-pill">Read More</a>
                    </div>
                </div>
                <?php endforeach?>
            </div>

            <div class="col-lg-4">
                <?php require_once __DIR__ . '/includes/sidebar.php'; ?>
            </div>
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