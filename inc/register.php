<?php
require_once '../admin/database/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inspire User Registration Page </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../admin/plugins/sweetalert2/sweetalert2.min.css">


</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../admin/index2.html" class="h1"><b>Welcome</b> to Inspire</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new seller</p>

        <form action="" method="post">
        <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
              <!-- <input type="submit" value="Send OTP" class="btn btn-primary btn-sm" name="otp"> -->
              <button type="submit" class="otp-btn btn-primary btn-sm" onclick="sendOTP()">Send OTP</button>

            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="verify" id="verifyInput" placeholder="Enter OTP" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" id="nameInput" placeholder="Enter Name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="mobile" id="mobileInput" placeholder="Mobile number" data-inputmask="'mask': '999 999-9999'">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile"></span>
              </div>
            </div>
          </div>
          
          
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password"
              required>
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
                  I agree to the <a href="">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" value="Register" name="submit" class="btn btn-primary" onclick="insertdata()">
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
  <script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../admin/dist/js/adminlte.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>


</body>

</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


// if(isset($_POST['otp'])){
//     echo "<script>alert('haa') </script>";
//    echo '<script>alert("dhkf")</script>';
//   $email = $_POST['email'];
//   $mail = new PHPMailer(true);

//   try {
//     $mail->SMTPDebug = 0; //SMTP::DEBUG SERVER
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'mohdkadiwal786@gmail.com'; // your gmail
//     $mail->Password = 'wqnqoznfxpiuqbrm'; // your gmail app password

//     $mail->SMTPSecure = 'ssl';
//     $mail->Port = 465;

//     $mail->setFrom('mohdkadiwal786@gmail.com'); // your gmail
//     $mail->addAddress($email, $name);

//     $mail->isHTML(true);
//     $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

//     $mail->Subject = 'Email Verication';
//     $mail->Body = '<p>Your Verification Code is : <b style="font-size: 30px;">' .
//       $verification_code . '</b></p>';

//     $mail->send();
// } catch (Exception $e){
//   echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
// }
// }

// if (isset($_POST['submit'])) {

//   $mobile = $_POST['mobile'];
//   $email = $_POST['email'];
//   $verify = $_POST['verify'];
//   $password = $_POST['password'];




//     $errors = []; // Array to store validation errors

//   // Validate the password
//   if (empty($password)) {
//     $errors[] = "Please enter a password.";
//   }
//   if (strlen($password) < 8) {
//     $errors[] = " Passwords must be at least 8 characters long.";
//   }
//   if (!preg_match("/[a-z]/", $password)) {
//     $errors[] = " Passwords must contain at least one lowercase letter.";
//   }
//   if (!preg_match("/[A-Z]/", $password)) {
//     $errors[] = " Passwords must contain at least one uppercase letter.";
//   }
//   if (!preg_match("/[0-9]/", $password)) {
//     $errors[] = " Passwords must contain at least one number.";
//   }
//   if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
//     $errors[] = " Passwords must contain at least one special character (!@#$%^&*()\-_=+{};:,<.>).";
//   }

//   // Check if there are any validation errors
//   if (!empty($errors)) {
//     // Encode the error messages as JSON
//     $errorMessage = json_encode(implode("\n", $errors));

//     // Output the JavaScript code to display the error message
//     echo '<script>';
//     echo 'document.addEventListener("DOMContentLoaded", function() {';
//     echo '    var errorMessage = ' . $errorMessage . ';';
//     echo '    if (errorMessage) {';
//     echo '        alert(errorMessage);';
//     echo '    }';
//     echo '});';
//     echo '</script>';
// }
//  else {

//     $enc_pass = password_hash($password, PASSWORD_DEFAULT);
//     $sql = mysqli_query($con, "update seller_login set mobile='$mobile',password='$enc_pass',email_verified_at= NOW() where email='$email' and 
//         verification_code='$verify'");

//         if(mysqli_affected_rows($con) ==0){
//           die('verification code failed.');
//       }
//       echo "<script>alert('You can login Now.')</script>";
//       header('location: res.php');
//       exit();


// if ($sql) {
//   header('location: res.php');
//   exit(); // Terminate the script to prevent further execution
// } else {
//   header('location: index.php');
//   echo '<script>alert("* Password must be 6 characters");</script>';
//   exit(); // Terminate the script to prevent further execution
// }
// }



// }
?>

<script>

    $(":input").inputmask();

  $("#mobileInput").inputmask({"mask": "999 999-9999"});

  function sendOTP() {
    Swal.fire({
      icon: 'warning',
      title: 'Wait.. for the OTP',
      text: 'Please check your email'

    })
    event.preventDefault();
    // Retrieve the email input

    var email = $("#emailInput").val();
    if (email != '') {
      // Perform the AJAX request
      $.ajax({
        url: "insertemail.php", // Replace with the correct path to the PHP file
        type: "POST",
        data: { email: email },
        success: function (response) {
          // console.log(response);
          var responseObject = JSON.parse(response);
         if(responseObject.message === "Email already exists"){
          Swal.fire({
            title: 'Warning',
            text: responseObject.message,
            icon: 'warning',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          });
         }
         else if(responseObject.message === "Please check your email to verify the code"){
          Swal.fire({
            title: 'Success',
            text: responseObject.message,
            icon: 'success',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          });
         }
        },




        error: function (xhr, status, error) {
          // Handle errors, if any
           Swal.fire({
      icon: 'error',
      title: 'Error sending OTP',
      text: error

    })
        }
      });
    } else {
      Swal.fire({
        title: 'Error',
        text: 'Please write email',
        icon: 'error',
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
      });
    }
  }

    

  function insertdata() {
    event.preventDefault();

    var password = $('#nameInput').val();
    var mobile = $('#mobileInput').val();
    var email = $('#emailInput').val();
    var verify = $('#verifyInput').val();
    var password = $('#passwordInput').val();
    

    if ( name ! ='' && mobile !== '' && email !== ''  && verify !== '' && password !== '') {
      $.ajax({
        type: "post",
        url: "insertuser.php",
        data: {
          'checking': true,
          name: name,
          mobile: mobile,
          email: email,
          verify: verify,
          password: password
          
        },
        success: function (response) {
    // alert("Success function called");

    // Parse the JSON response
    var responseObject = JSON.parse(response);

    var errorMessage = responseObject.errorMessage; // Assuming the response contains an "errorMessage" property
    $('#elementId').append(errorMessage);

    if (responseObject.message === "Successfully logged in") {
        // alert("Successfully function called");
        Swal.fire({
            title: 'Success',
            text: responseObject.message,
            icon: 'success',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function () {
            // Redirect to another page
            window.location.href = 'login.php';
        });
    } else if (responseObject.message === "Please enter valid") {
        // alert(" plz enter function called");
        Swal.fire({
            title: 'Error',
            text: responseObject.message,
            icon: 'error',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    } else if (errorMessage) { // Check if there is a password error message
        Swal.fire({
            title: 'Error',
            text: errorMessage,
            icon: 'error',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    }
},


        error: function (xhr, status, error) {
          // Handle errors, if any
          Swal.fire({
            title: 'Error',
            text: 'Error sending OTP: ' + error,
            icon: 'error',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          });
        }
      });
    } else {
      Swal.fire({
        title: 'Error',
        text: 'Please fill in all fields',
        icon: 'error',
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
      });
    }
  }



</script>