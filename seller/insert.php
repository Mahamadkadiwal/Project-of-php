<?php
  require_once '../admin/database/dbcon.php';

  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if(isset($_POST['email'])){
    // echo "<script>alert('haa') </script>";
//    echo '<script>alert("dhkf")</script>';
  $email = $_POST['email'];
  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = 0; //SMTP::DEBUG SERVER
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mohdkadiwal786@gmail.com'; // your gmail
    $mail->Password = 'wqnqoznfxpiuqbrm'; // your gmail app password

    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('mohdkadiwal786@gmail.com'); // your gmail
    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $mail->Subject = 'Email Verication';
    $mail->Body = '<p>Your Verification Code is : <b style="font-size: 30px;">' .
      $verification_code . '</b></p>';

    $mail->send();
    $sql = mysqli_query($con, "INSERT INTO `seller_login`( `mobile`, `email`, `password`, `verification_code`, `email_verified_at`) VALUES (NULL,'$email',NULL,'$verification_code',NULL)");
} catch (Exception $e){
  echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
}
}

// if (isset($_POST["email"])) {
//     // echo '<script>alert("jdf");</script>';
// //   Retrieve the email input
//   $email = $_POST["email"];

//   // Prepare the INSERT statement
//   $sql = "INSERT INTO your_table (email_column) VALUES (?)";

//   // Create a prepared statement
//   $stmt = $conn->prepare($sql);

//   // Bind the email parameter to the statement
//   $stmt->bind_param("s", $email);

//   // Execute the statement
//   if ($stmt->execute()) {
//     echo "Email inserted successfully!";
//   } else {
//     echo "Error inserting email: " . $stmt->error;
//   }

//   // Close the statement
//   $stmt->close();
// }

// // Close the connection
// $conn->close();



if(isset($_POST['checking'])){
    $mobile= $_POST['mobile'];
    $email = $_POST['email'];
    $verify= $_POST['verify'];
    $password= $_POST['password'];

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
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo '    var errorMessage = ' . $errorMessage . ';';
        echo '    if (errorMessage) {';
        echo '        alert(errorMessage);';
        echo '    }';
        echo '});';
        echo '</script>';
    }
     else {
    
        $enc_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = mysqli_query($con, "update seller_login set mobile='$mobile',password='$enc_pass',email_verified_at= NOW() where email='$email' and 
            verification_code='$verify'");
        
            if(mysqli_affected_rows($con) ==0){
              die('verification code failed.');
          }
          echo "<script>alert('You can login Now.')</script>";
          header('location: res.php');
          exit();
    
    
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
