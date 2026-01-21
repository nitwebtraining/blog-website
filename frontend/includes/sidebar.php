<?php
    $sql = "SELECT c.id, c.name, COUNT(p.id) AS total_posts
            FROM categories c
            LEFT JOIN posts p ON p.category_id = c.id
            GROUP BY c.id, c.name
            ORDER BY c.id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ✅ Recent Blogs (last 3 posts)
    $sqlRecent = "SELECT id, title, slug, featured_image, published_at, created_at
                  FROM posts
                  ORDER BY created_at DESC
                  LIMIT 3";
    $stmtRecent = $pdo->prepare($sqlRecent);
    $stmtRecent->execute();
    $recentPosts = $stmtRecent->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card p-4 mb-4" data-aos="fade-left">
    <h5 class="widget-title">Categories</h5>
    <div class="category-list">
        <?php foreach ($categories as $category): ?>
        <a href="#" class="category-link"><span><?php echo $category['name'] ?></span> <span class="badge bg-light text-dark"><?php echo $category['total_posts'] ?></span></a>
        <?php endforeach?>
    </div>
</div>

<div class="card p-4 mb-4 sticky-top" style="top: 90px;" data-aos="fade-left">
    <h5 class="widget-title">Recent Blogs</h5>
      <?php foreach ($recentPosts as $post): ?>
        <a href="<?php echo BASE_URL; ?>blog/<?php echo $post['slug']; ?>" class="recent-post-item">
            <img
                src="<?php echo ! empty($post['featured_image']) ? htmlspecialchars($post['featured_image']) : 'https://picsum.photos/seed/' . $post['id'] . '/200'; ?>"
                class="recent-post-img"
                alt="thumb"
            >
            <div>
                <p class="recent-post-title">
                    <?php echo htmlspecialchars($post['title']); ?>
                </p>
                <span class="recent-post-date">
                    <?php echo date('M d, Y', strtotime($post['published_at'])); ?>
                </span>
            </div>
        </a>
    <?php endforeach; ?>
</div>
