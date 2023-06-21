<?php 
    require_once '../admin/database/dbcon.php';

    if(isset($_SESSION['user_name'])){
      header('location: ../admin/home.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inspire Seller | Log in</title>

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
        <p class="login-box-msg">Login to supplier panel</p>

        <form action="" method="post">
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
              <button type="submit" name="submit" value="Login" class="btn btn-primary btn-block">Sign In</button>
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

        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
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
     if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $pass= $_POST['password'];
      
      $sql = mysqli_query($con, "select * from seller_login where email='$email'");
      
      if($count= mysqli_num_rows($sql) > 0){
          $row= mysqli_fetch_assoc($sql);
          $verify = password_verify($pass, $row['password']);

          if($verify==1){
              $_SESSION['seller_name']= $row['email'];
              $_SESSION['seller_role']= $row['role'];
              // echo '<script>alert('.$_SESSION['seller_role'].')</script>';
              $_SESSION['seller_id']= $row['id'];
              // echo '<script>alert('.$_SESSION['seller_id'].')</script>';
              header('location:../admin/home.php');
              die();
              
              
          }
          else{
              ?>
           <script>
              alert( "please enter correct  password");</script>
              <?php
          }
      }else{
          ?>
       <script>
          alert( "please enter correct username & password");</script>
          <?php
      }
  }

?>