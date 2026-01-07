<?php
    require_once __DIR__ . '/../config.php';
    $email  = $password  = "";
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($email = trim($_POST["email"]))) {
            $errors["email"] = "Email is required.";
        } elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format.";
        } else {
            $email = htmlspecialchars($email);
        }

        if (empty($password = trim($_POST["password"]))) {
            $errors["password"] = "Password is required.";
        } else {
            $password = htmlspecialchars($password);
        }

        // fetch user data by email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: /admin/dashboard");
            exit();
        } else {
            $errors['general_error'] = "Invalid email or password.";
        }

}?>

<!DOCTYPE html>
<html lang="en">

 <?php require_once __DIR__ . '/includes/head.php'; ?>
 <body class="bg-gradient-login">

  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="POST" autocomplete="off">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/admin/register">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->

  <?php require_once __DIR__ . '/includes/script.php'; ?>
</body>

</html>