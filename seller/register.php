<?php 
    require_once '../admin/database/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b class="text-danger">Inspire Seller</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Register to supplier panel</p>

        <form action="" method="post">
        
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" require>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile" require>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" require>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" require>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <p> *Passwords must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special symbol.</p>
            
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" value="Login" class="btn btn-primary btn-block">Sign up</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        
        
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

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
            echo "Record added successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

?>