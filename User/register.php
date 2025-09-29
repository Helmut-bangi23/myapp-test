<?php
session_start();
include 'Index/Sql/config.php'; // ✅ adjust path if needed

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email    = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];
  $confirm  = $_POST['confirm_password'];

  // ✅ Check if passwords match
  if ($password !== $confirm) {
    $message = "Passwords do not match!";
  } else {
    // ✅ Check if email already exists
    $check_sql = "SELECT * FROM user WHERE customer_email = '$email'";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
      $message = "Email already registered. Please log in.";
    } else {
      // ✅ Hash password before storing
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
      if (mysqli_query($conn, $sql)) {
        // ✅ Auto-login after registration (optional)
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        header("Location: /E-Commerce/User/Index/index.php");
        exit();
      } else {
        $message = "Registration failed: " . mysqli_error($conn);
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-lg">
        <div class="card-header text-center bg-success text-white">
          <h4>Create Account</h4>
        </div>
        <div class="card-body">
          <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
          <?php endif; ?>

          <form method="POST" action="">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" placeholder="Re-enter password" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">Register</button>
          </form>

          <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
