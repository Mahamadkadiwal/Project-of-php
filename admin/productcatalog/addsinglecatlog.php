<?php
include_once '../database/dbcon.php';
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD Single Catlog</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<!-- hold-transition register-page -->

<body class=" ">


    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="">
                <!-- header  -->
                <div class="header">
                </div>

                <!-- body  -->
                <div class="body m-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2 class="card-title">ADD Single Category</h2>
                                </div>
                                <div class="card-body p-0">
                                    <form action="" method="post">
                                        <div class="bs-stepper">
                                            <div class="bs-stepper-header" role="tablist">
                                                <!-- your steps here -->
                                                <div class="step" data-target="#logins-part">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="logins-part" id="logins-part-trigger">
                                                        <span class="bs-stepper-circle">1</span>
                                                        <span class="bs-stepper-label">Select Category </span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#information-part">
                                                    <button type="button" class="step-trigger" role="tab"
                                                        aria-controls="information-part" id="information-part-trigger">
                                                        <span class="bs-stepper-circle">2</span>
                                                        <span class="bs-stepper-label">Various information</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content">
                                                <!-- your steps content here -->
                                                <div id="logins-part" class="content" role="tabpanel"
                                                    aria-labelledby="logins-part-trigger">


                                                    <div class="form-group">
                                                        <label>Select Category</label>
                                                        <select class="form-control select2" name="category"
                                                            style="width: 100%;"
                                                            onchange="showSubcategoryBox(this.value)">
                                                            <option>select</option>
                                                            <?php
                                                            $sql = mysqli_query($con, "SELECT * from categories where status='1'");

                                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                                <?php
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div id="subcategoryBox" style="display: none;" class="form-group">
                                                        <label>Select Sub Category</label>
                                                        <select class="form-control select2" name="subcategory"
                                                            style="width: 100%;" id="subcategorySelect">
                                                            <!-- Subcategory options will be dynamically added here -->
                                                        </select>
                                                    </div>
                                                    <script>
                                                        function showSubcategoryBox(categoryId) {
                                                            if (categoryId === 'select') {
                                                                // If the 'select' option is chosen, hide the subcategory box
                                                                document.getElementById("subcategoryBox").style.display = "none";
                                                            } else {
                                                                // Show the subcategory box and load the subcategories for the selected category
                                                                document.getElementById("subcategoryBox").style.display = "block";
                                                                loadSubcategories(categoryId);
                                                            }
                                                        }

                                                        function loadSubcategories(categoryId) {
                                                            $.ajax({
                                                                url: 'fetch_subcategories.php',
                                                                method: 'POST',
                                                                data: { category_id: categoryId },
                                                                success: function (response) {
                                                                    var subcategories = JSON.parse(response);

                                                                    var subcategorySelect = document.getElementById("subcategorySelect");
                                                                    subcategorySelect.innerHTML = '';

                                                                    subcategories.forEach(function (subcategory) {
                                                                        var option = document.createElement('option');
                                                                        option.value = subcategory.id;
                                                                        option.text = subcategory.name;
                                                                        subcategorySelect.appendChild(option);
                                                                    });
                                                                },
                                                                error: function () {
                                                                    console.log('Error occurred while fetching subcategories.');
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                    <!-- <button class="btn btn-primary" onclick="stepper.next()">Next</button> -->
                                                    <button id="nextButtonStep1" class="btn btn-primary">Next</button>
                                                </div>
                                                <div id="information-part" class="content" role="tabpanel"
                                                    aria-labelledby="information-part-trigger">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">File input</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <button class="btn btn-primary"
                                                    onclick="stepper.previous()">Previous</button> -->
                                                    <button id="prevButtonStep2"
                                                        class="btn btn-primary">Previous</button>
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="../plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="../plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        // Handle the Next button click event in Step 1
        document.getElementById('nextButtonStep1').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.next(); // Go to the next step
        });

        // Handle the Previous button click event in Step 2
        document.getElementById('prevButtonStep2').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.previous(); // Go to the previous step
        });
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

</body>

</html>


<?php
    if(isset($_POST['submit'])){
        $cat = $_POST['category'];
        echo '<script>alert("'.$cat.'")</script>';
        $sub = $_POST['subcategory'];
        echo '<script>alert("'.$sub.'")</script>';
    }

?>