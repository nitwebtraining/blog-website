<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/includes/config.php'; ?>
    <?php require_once __DIR__ . '/includes/head.php'; ?>

<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>

    <header class="page-header text-center py-5">
        <div class="container">
            <h1 class="fw-bold">About US</h1>
            <p class="text-white">About Us for any questions or feedback.</p>
        </div>
    </header>

    <!-- About -->
   <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-4 shadow-lg" alt="About Us">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h1 class="display-4 fw-bold text-primary mb-4">Our Mission</h1>
                <p class="lead">Amader ekhonkar lokkho holo technology ebong creativity niye shothik ebong upokari tottho prochar kora.</p>
                <p class="text-muted">Amra protiniyoto chesta kori web development, programming, ebong latest tech trends niye amader obhigghota share korte. Amader blog-e apni paben shikhoniyo ebong interactive shob post.</p>
                <div class="mt-4">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i> <span>Quality Content First</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i> <span>Community Driven Insights</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-2"></i> <span>Daily Tech Updates</span>
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