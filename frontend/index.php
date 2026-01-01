<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/includes/config.php'; ?>
    <?php require_once __DIR__ . '/includes/head.php'; ?>

<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>

    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4 overflow-hidden border-0 shadow-sm" data-aos="fade-up">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" class="card-img-top" alt="post">
                    <div class="card-body p-4">
                        <span class="badge bg-primary-soft text-primary mb-2">Technology</span>
                        <h2 class="h3 fw-bold">Web Design-er Shera 5-ti Tool</h2>
                        <p class="text-muted">2024-e web design ke aro shohoj korte nicher tool gulo apnar proyojon...</p>
                        <a href="/blog-details" class="btn btn-outline-primary btn-sm rounded-pill">Read More</a>
                    </div>
                </div>

                <div class="card mb-4 overflow-hidden border-0 shadow-sm" data-aos="fade-up">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97" class="card-img-top" alt="post">
                    <div class="card-body p-4">
                        <span class="badge bg-success-soft text-success mb-2">Programming</span>
                        <h2 class="h3 fw-bold">Python Keno Shekha Uchit?</h2>
                        <p class="text-muted">Data Science theke shuru kore Automation—Python-er proyojoniyota ekhon shobar upore...</p>
                        <a href="/blog-details" class="btn btn-outline-success btn-sm rounded-pill">Read More</a>
                    </div>
                </div>
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