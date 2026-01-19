<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/../config.php'?>
    <?php require_once __DIR__ . '/includes/head.php'; ?>

    <?php

        $slug = $_GET['slug'] ?? null;

        if (! $slug) {
            echo "Blog not found!";
            exit();
        }

        $stmt = $pdo->prepare("SELECT * FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        $postBy = $post['created_by'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$postBy]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (! $post) {
            echo "Blog not found!";
            exit();
        }

    ?>
<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>


    <div class="container mt-4">
        <div class="row">

            <div class="col-lg-8">
                <article>
                    <h1 class="article-title"><?php echo $post['title']; ?></h1>
                    <div class="post-meta">
                        <span><i class="far fa-user me-1"></i> <?php echo $user['name']; ?></span> |
                        <span><i class="far fa-calendar me-1"></i> <?php echo date('F j, Y', strtotime($post['published_at'])) ?></span> |
                        <span><i class="far fa-comments me-1"></i> 12 Comments</span>
                    </div>

                    <img src="<?php echo $post['featured_image']; ?>" class="featured-image shadow-sm" alt="Web Design">

                    <div class="main-content">
                        <p><?php echo $post['long_description']; ?></p>
                    </div>

                    <div class="author-box">
                        <img src="https://i.pravatar.cc/150?u=admin" class="author-img" alt="author">
                        <div>
                            <h5 class="mb-1">Written by Tanvir Rahman</h5>
                            <p class="mb-0 text-muted small">Tanvir ekjon Senior Web Designer. Tini protiniyoto technology ebong UI/UX niye lekhalekhi koren.</p>
                        </div>
                    </div>

                    <div class="comment-section">
                        <h4 class="fw-bold mb-4">Comments (2)</h4>

                        <div class="comment-card">
                            <div class="d-flex align-items-center mb-2">
                                <h6 class="mb-0 me-2">Rahim Uddin</h6>
                                <span class="text-muted small">2 hours ago</span>
                            </div>
                            <p>Darun article! Figma niye aro kichu tutorial asha korchi.</p>
                        </div>

                        <div class="mt-5 p-4 bg-white border rounded shadow-sm">
                            <h5>Leave a Reply</h5>
                            <form>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="4" placeholder="Write your comment..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="button">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
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