<?php
require_once '../admin/database/dbcon.php';
session_start();
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seller Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

<body class="hold-transition register-page">
  <div class="res-box">

    <div class="card-header text-center">
      <a href="#" class="h1"><b>Inspire</b>Seller</a>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Registration</h3>
          </div>
          <div class="card-body p-0">
            <form action="" method="post">  
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#logins-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="address-part" id="logins-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Address</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="bankinfo-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Bank Details</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#storeinfo-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="storeinfo-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Store Details</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Floor/ Appartment/ Office</label>
                      <input type="text" class="form-control" name="floor" id="exampleInputEmail1" placeholder="Write Floor/ Appartment/ Office">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Street</label>
                      <input type="text" class="form-control" name="street" id="exampleInputPassword1" placeholder="Enter street">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Landmark</label>
                      <input type="text" class="form-control" name="landmark" id="exampleInputPassword1" placeholder="Enter landmark">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">City/ Postal</label>
                      <input type="text" class="form-control" name="city" id="exampleInputPassword1" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                      <label>State</label>
                      <select class="form-control select2" name="state" style="width: 100%;">
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
                      <input type="number" class="form-control" name="pincode" id="exampleInputPassword1" placeholder="Enter street">
                    </div>

                    <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                  </div>
                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Bank Account Number</label>
                      <input type="number" class="form-control" name="bank" id="exampleInputPassword1" placeholder="Enter account number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Account Number</label>
                      <input type="number" class="form-control" name="bankcom" id="exampleInputPassword1" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Bank IFSC code</label>
                      <input type="text" class="form-control" name="ifsc" id="exampleInputPassword1" placeholder="Please write valid IFSC code">
                    </div>
                    <button class="btn btn-primary" type="button" onclick="stepper.previous()">Previous</button>
                    <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  </div>
                  <div id="storeinfo-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Store Name</label>
                      <input type="text" class="form-control" name="store" id="exampleInputPassword1" placeholder="Enter Store Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Full Name</label>
                      <input type="text" class="form-control" name="seller_name" id="exampleInputPassword1" placeholder="Enter your name">
                    </div>

                    <button class="btn btn-primary" type="button" onclick="stepper.previous()">Previous</button>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>

            </form>
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
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
  </script>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
  $seller_id = $_SESSION['id'];
  $floor = $_POST['floor'];
  $street = $_POST['street'];
  $landmark = $_POST['landmark'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  $bank = $_POST['bank'];
  $bankcom = $_POST['bankcom'];
  $ifsc = $_POST['ifsc'];
  $store = $_POST['store'];
  $seller_name = $_POST['seller_name'];
  $status;
  $sql = mysqli_query($con, "INSERT INTO `seller_detail`( `seller_id`, `floor`, `street`, `landmark`, `city`, `state`, 
  `pincode`, `account_number`, `confirm_account_number`, `ifsc_code`, `store_name`, `seller_name`,`status`) 
  VALUES ('$seller_id','$floor','$street','$landmark','$city','$state','$pincode','$bank','$bankcom',
  '$ifsc','$store','$seller_name','0')");
  

}
?>