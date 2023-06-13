<?php

require_once '../admin/database/dbcon.php';
if (isset($_POST['checking'])) {
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $verify = $_POST['verify'];
  $password = $_POST['password'];

  $errors = []; // Array to store validation errors

  // Validate the password
  if (empty($password)) {
    $errors[] = "Please enter a password.";
  }
  if (strlen($password) < 8) {
    $errors[] = " Passwords must be at least 8 characters long.";
  }
  if (!preg_match("/[a-z]/", $password)) {
    $errors[] = " Passwords must contain at least one lowercase letter.";
  }
  if (!preg_match("/[A-Z]/", $password)) {
    $errors[] = " Passwords must contain at least one uppercase letter.";
  }
  if (!preg_match("/[0-9]/", $password)) {
    $errors[] = " Passwords must contain at least one number.";
  }
  if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
    $errors[] = " Passwords must contain at least one special character (!@#$%^&*()\-_=+{};:,<.>).";
  }

  // Check if there are any validation errors
  if (!empty($errors)) {
    // Encode the error messages as JSON
    $errorMessage = json_encode(implode("\n", $errors));

    // Output the JavaScript code to display the error message
    $return= '<script>';
    $return.= 'document.addEventListener("DOMContentLoaded", function() {';
    $return.= '    var errorMessage = ' . $errorMessage . ';';
    $return.= '    if (errorMessage) {';
    $return.= '        alert(errorMessage);';
    $return.= '    }';
    $return.= '});';
    $return.= '</script>';
    echo $return;
  } else {

    $enc_pass = password_hash($password, PASSWORD_DEFAULT);
    $query = mysqli_query($con, "UPDATE seller_login SET mobile='$mobile', password='$enc_pass', email_verified_at=NOW() WHERE email='$email' AND verification_code='$verify'");

    if ($query) {
      if (mysqli_affected_rows($con) > 0) {
        $return = "Successfully logged in";
        echo $return;
      } else {
        $return = "Please enter valid";
        echo $return;
      }
    } else {
      $return = "Update failed";
      echo $return;
    }




    // if ($sql) {
    //   header('location: res.php');
    //   exit(); // Terminate the script to prevent further execution
    // } else {
    //   header('location: index.php');
    //   echo '<script>alert("* Password must be 6 characters");</script>';
    //   exit(); // Terminate the script to prevent further execution
    // }
  }



}


?>