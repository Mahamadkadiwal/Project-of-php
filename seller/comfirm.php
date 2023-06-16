<?php
$page = $_SERVER['PHP_SELF'];
$sec = "5";

require_once '../admin/database/dbcon.php';
session_start();

if (isset($_SESSION["id"])) {
    $seller_id = $_SESSION["id"];

}
?>
<?php
    $sql = mysqli_query($con, "SELECT * FROM seller_detail where seller_id='$seller_id' ");
    if (mysqli_num_rows($sql) > 0) {
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm page</title>

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
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    .confirmation {
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      padding: 20px;
      margin-bottom: 20px;
    }
    
    .confirmation p {
      margin: 0 0 10px;
    }
    
    .admin-section {
      display: none;
    }
    
    .admin-button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>

   <body> 


   

  <h1>Confirmation Page</h1>
  
  <div class="confirmation">
    <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
    <h2>Confirmation Details</h2>
    <p><strong>Name:</strong><?php echo $row['seller_name']; ?></p>
    <p><strong>Store-name:</strong> <?php echo $row['store_name']; ?></p>
    <p><strong>Account number:</strong>  <?php echo $row['account_number']; ?></p>
    <p><strong>IFSC code:</strong>  <?php echo $row['ifsc_code']; ?></p>
    <?php } ?>
  </div>
  
  
  
  <!-- <div class="admin-section">
    <h2>Admin Section</h2>
    <p>Please click the button below to confirm:</p>
    <button class="admin-button">Confirm Action</button>
  </div>
  
  <script>
    // JavaScript code
    const adminSection = document.querySelector('.admin-section');
    const adminButton = document.querySelector('.admin-button');
    
    // Show admin section when button is clicked
    adminButton.addEventListener('click', function() {
      adminSection.style.display = 'block';
    });
  </script> -->



<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
  <script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../admin/dist/js/adminlte.min.js"></script>
</body>
</html>
<?php } ?>
<?php
$query = mysqli_query($con, "select * from seller_detail where seller_id='$seller_id'");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $status = $row['status'];
    }
}
if ($status == 1) {
    ?>
    <script>
        Swal.fire({
              title: 'Success',
              text: 'Your request is accept by the admin',
              icon: 'success',
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
            }).then(function () {
              // Redirect to another page
              window.location.href = '../admin/home.php';
            });
    </script>
    
    <?php
} else {
    ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Wait.. for the Admin Confirmation',
            text: 'Your data is checked by the admin'

        });
    </script>
    <?php

}
?>
