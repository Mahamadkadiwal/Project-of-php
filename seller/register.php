<?php 
    require_once '../admin/database/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inspire seller Registration Page </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../admin/index2.html" class="h1"><b>Inspire</b>Seller</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new seller</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="mobile "placeholder="Mobile number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
       
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
   if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = []; // Array to store validation errors
    
    // Validate the password
    if (empty($password)) {
        $errors[] = "Please enter a password.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Invalid password. Passwords must be at least 8 characters long.";
    }
    if (!preg_match("/[a-z]/", $password)) {
        $errors[] = "Invalid password. Passwords must contain at least one lowercase letter.";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Invalid password. Passwords must contain at least one uppercase letter.";
    }
    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Invalid password. Passwords must contain at least one number.";
    }
    if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
        $errors[] = "Invalid password. Passwords must contain at least one special character (!@#$%^&*()\-_=+{};:,<.>).";
    }

    // Check if there are any validation errors
    if (!empty($errors)) {
        // Display the validation errors
       
    } else {
        // Password is valid, insert the record into the database
        $sql = mysqli_query($con, "INSERT INTO `seller_login`(`name`, `mobile`, `email`, `password`) VALUES ('$name','$mobile','$email','$password')");

        if ($sql) {
            header('location:res.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

?>