<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/includes/config.php'; ?>
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
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://picsum.photos/id/101/400/250" class="blog-img" alt="blog">
                    <div class="card-body">
                        <small class="text-primary fw-bold">Technology</small>
                        <h5 class="card-title mt-2 fw-bold">Future of Web Development</h5>
                        <p class="card-text text-muted small">AI kivabe web development-ke bodle dichche seta niye alochona...</p>
                        <a href="details.html" class="stretched-link text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://picsum.photos/id/102/400/250" class="blog-img" alt="blog">
                    <div class="card-body">
                        <small class="text-success fw-bold">Life Style</small>
                        <h5 class="card-title mt-2 fw-bold">Morning Routine Tips</h5>
                        <p class="card-text text-muted small">Ekta pro-active din shuru korar sherka kichu upay...</p>
                        <a href="details.html" class="stretched-link text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://picsum.photos/id/103/400/250" class="blog-img" alt="blog">
                    <div class="card-body">
                        <small class="text-danger fw-bold">Travel</small>
                        <h5 class="card-title mt-2 fw-bold">Exploring Cox's Bazar</h5>
                        <p class="card-text text-muted small">Prithibir dirghotomo shomudro shoikot bhromon guide...</p>
                        <a href="details.html" class="stretched-link text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://picsum.photos/id/104/400/250" class="blog-img" alt="blog">
                    <div class="card-body">
                        <small class="text-warning fw-bold">Education</small>
                        <h5 class="card-title mt-2 fw-bold">Best Coding Resources</h5>
                        <p class="card-text text-muted small">Projukti shekhar free ebong paid sherka platform gulo...</p>
                        <a href="details.html" class="stretched-link text-decoration-none text-dark"></a>
                    </div>
                </div>
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