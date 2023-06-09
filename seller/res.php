<?php
require_once '../admin/database/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seller Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../admin/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../admin/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page" >
     <div class="res-box">
     <div class="card-header text-center">
      <a href="../admin/index2.html" class="h1"><b>Inspire</b>Seller</a>
    </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Registration</h3>
                </div>
                <div class="card-body p-0">
                  <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                      <!-- your steps here -->
                      <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="address-part"
                          id="logins-part-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">Address</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="bankinfo-part"
                          id="information-part-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">Bank Details</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#storeinfo-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="storeinfo-part"
                          id="information-part-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Store Details</span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger" >
                        <div class="form-group">
                          <label for="exampleInputEmail1">Floor/ Appartment/ Office</label>
                          <input type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Write Floor/ Appartment/ Office">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Street</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter street">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Landmark</label>
                          <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter landmark">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">City/ Postal</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter city">
                        </div>
                        <div class="form-group">
                          <label>State</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Selected</option>
                            <option>Gujarat</option>
                            <option>Rajasthan</option>
                            <option>Punjab</option>
                            <option>Maharashtra</option>
                            <option>Madhya pradesh</option>
                            <option>Andra Pradesh</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Pincode</label>
                          <input type="number" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter street">
                        </div>

                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="information-part" class="content" role="tabpanel"
                        aria-labelledby="information-part-trigger">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Bank Account Number</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter account number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Confirm Account Number</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter city">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Bank IFSC code</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Please write valid IFSC code">
                        </div>
                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                      </div>
                      <div id="storeinfo-part" class="content" role="tabpanel"
                        aria-labelledby="information-part-trigger">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Store Name</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Store Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Full Name</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter your name">
                        </div>
                        
                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      
                    
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
          </div>
       

  <!-- jQuery -->
  <script src="../admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="../admin/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="../admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="../admin/plugins/moment/moment.min.js"></script>
  <script src="../admin/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="../admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="../admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="../admin/plugins/dropzone/min/dropzone.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../admin/dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    </script>
   
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