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
    if($sql){
      echo $return ="Please check your email to verify the code";
    }
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




?>
