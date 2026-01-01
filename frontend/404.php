<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/includes/config.php'; ?>
    <?php require_once __DIR__ . '/includes/head.php'; ?>

<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>

    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh">
    <div class="text-center">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
        <p class="lead">
            The page you're looking for doesn't exist.
        </p>
        <a href="/" class="btn btn-primary px-5 py-3 rounded-pill shadow">
            Go Home
        </a>
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