<?php
    require_once __DIR__ . '/../config.php';
    $name   = $email   = $password   = $confirmed_password   = "";
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($name = trim($_POST["name"]))) {
            $errors["name"] = "Name is required.";
        } else {
            $name = htmlspecialchars($name);
        }

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

        if (empty($confirmed_password = trim($_POST["confirmed_password"]))) {
            $errors["confirmed_password"] = "Confirmed Password is required.";
        } else {
            $confirmed_password = htmlspecialchars($confirmed_password);
        }

        if ($password != $confirmed_password) {
            $errors["general_error"] = "Password & Confirmed Password is not match!";
        }

        // Save to database if no errors
        if (empty($errors)) {
            $created_at     = date('Y-m-d H:i:s');
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt           = $pdo->prepare("INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, :created_at)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->execute();
        }

        // If no error → redirect to success page
        if (empty($errors)) {
            header("Location: /admin/login");
            exit;
        }

}?>

<!DOCTYPE html>
<html lang="en">

 <?php require_once __DIR__ . '/includes/head.php'; ?>
 <body class="bg-gradient-login">

  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form method="POST" autocomplete="off">
                    <p class="text-danger text-center"><?php echo isset($errors['general_error']) ? $errors['general_error'] : '' ?></p>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" placeholder="Enter Name">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['name']) ? $errors['name'] : '' ?></p>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                            placeholder="Enter Email Address">
                            <p class="text-danger mt-1 mb-2"><?php echo isset($errors['email']) ? $errors['email'] : '' ?></p>
                        </div>
                      </div>

                      <div class="col-md-6 mb-2">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" id="password" value="<?php echo $password ?>" name="password" placeholder="Password">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['password']) ? $errors['password'] : '' ?></p>
                        </div>
                      </div>

                      <div class="col-md-6 mb-2">
                         <div class="form-group">
                        <label id="confirmed_password">Repeat Password</label>
                        <input type="password" name="confirmed_password" class="form-control" id="confirmed_password"
                          placeholder="Repeat Password" value="<?php echo $confirmed_password ?>">
                          <p class="text-danger mt-1 mb-2"><?php echo isset($errors['confirmed_password']) ? $errors['confirmed_password'] : '' ?></p>
                      </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/admin/login">Already have an account?</a>
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
  <!-- Register Content -->

  <?php require_once __DIR__ . '/includes/script.php'; ?>
</body>

</html>