<?php
    require_once __DIR__ . '/../config.php';
    $name    = $email    = $subject    = $message    = "";
    $errors  = [];
    $success = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($name = trim($_POST["name"]))) {
            $errors["name"] = "Name is required.";
        } else {
            $name = htmlspecialchars($name);
        }

        if (empty($email = trim($_POST["email"]))) {
            $errors["email"] = "Email is required.";
        } else {
            $email = htmlspecialchars($email);
        }

        if (empty($subject = trim($_POST["subject"]))) {
            $errors["subject"] = "Subject is required.";
        } else {
            $subject = htmlspecialchars($subject);
        }
        if (empty($message = trim($_POST["message"]))) {
            $errors["message"] = "Message is required.";
        } else {
            $message = htmlspecialchars($message);
        }

        // Save to database if no errors
        if (empty($errors)) {
            $created_at = date('Y-m-d H:i:s');
            $stmt       = $pdo->prepare("INSERT INTO contacts (name, email, subject, message, created_at) VALUES (:name, :email, :subject, :message, :created_at)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->execute();
        }

        // If no error → redirect to success page
        if (empty($errors)) {
            $success['message'] = "Data Submitted Successfully!";
            $name               = $email               = $subject               = $message               = "";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/includes/head.php'; ?>

<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>

    <header class="page-header text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Contact US</h1>
            <p class="text-white">Contact us for any questions or feedback.</p>
        </div>
    </header>

    <div class="container my-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="fw-bold">Contact Us</h1>
            <p class="text-muted">Apnar jekono jiggesha ba feedback thakle amader janate paren.</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-4" data-aos="fade-right">
                <div class="card border-0 shadow-sm p-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box bg-primary text-white p-3 rounded-3 me-3">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Email Us</h6>
                            <p class="text-muted mb-0 small">contact@amarblog.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-success text-white p-3 rounded-3 me-3">
                            <i class="fas fa-phone-alt fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Call Us</h6>
                            <p class="text-muted mb-0 small">+880 1234 567 890</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8" data-aos="fade-left">
                <form class="card p-4 border-0 shadow-sm" method="POST" autocomplete="off" novalidate>
                    <div class="row g-3">
                        <?php if (isset($success['message'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo isset($success['message']) ? $success['message'] : '' ?>
                        </div>
                        <?php endif?>
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $name ?>" placeholder="Enter your name">
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['name']) ? $errors['name'] : '' ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" value="<?php echo $email ?>" name="email" placeholder="name@example.com">
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['email']) ? $errors['email'] : '' ?></p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" value="<?php echo $subject ?>" placeholder="What is this regarding?">
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['subject']) ? $errors['subject'] : '' ?></p>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="5" name="message" placeholder="Type your message..."><?php echo $message ?></textarea>
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['message']) ? $errors['message'] : '' ?></p>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5 py-2">Send Message</button>
                        </div>
                    </div>
                </form>
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