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
    <title>ADD Single Catlog Edit </title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../image/favicon.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
<style>
    .no-spinner::-webkit-inner-spin-button,
    .no-spinner::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .select-checkbox {
        position: relative;
    }

    .checkboxes {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

<body>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="body m-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title">ADD Single Category</h2>
                            </div>
                            <div class="card-body p-0">
                                <?php
                                if (isset($_GET['id'])) {
                                    $p_id = mysqli_real_escape_string($con, $_GET['id']);
                                    $quary = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
                                    $quary_run = mysqli_query($con, $quary);

                                    if (mysqli_num_rows($quary_run) > 0) {
                                        $row = mysqli_fetch_array($quary_run);
                                ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="bs-stepper">
                                                <div class="bs-stepper-header" role="tablist">
                                                    <!-- your steps here -->
                                                    <div class="step" data-target="#logins-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                            <span class="bs-stepper-circle">1</span>
                                                            <span class="bs-stepper-label">Select Category</span>
                                                        </button>
                                                    </div>
                                                    <div class="line"></div>
                                                    <div class="step" data-target="#information-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                            <span class="bs-stepper-circle">2</span>
                                                            <span class="bs-stepper-label">Category Details</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content">
                                                    <!-- your steps content here -->
                                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                        <div class="form-group">
                                                            <label>Select Category</label>
                                                            <select class="form-control select2" name="category" style="width: 100%;" onchange="showSubcategoryBox(this.value)">
                                                                <option>select</option>
                                                                <?php
                                                                $sql = mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
                                                                while ($category = mysqli_fetch_assoc($sql)) {
                                                                    $categoryID = $category['id'];
                                                                    $categoryName = $category['category_name'];
                                                                    $selected = ($categoryID == $row['category']) ? "selected" : ""; // Check if the option value matches the stored category value
                                                                    echo "<option value='$categoryID' $selected>$categoryName</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div id="subcategoryBox" class=" form-group">
                                                            <label>Select Sub Category</label>
                                                            <select class="form-control select2" name="subcategory" value="<?= $row['subcategory']; ?>" style="width: 100%;" id="subcategorySelect">
                                                                <!-- Subcategory options will be dynamically added here -->
                                                            </select>
                                                        </div>
                                                        <script>
                                                            function showSubcategoryBox(category_id) {
                                                                if (category_id === 'select') {
                                                                    // If the 'select' option is chosen, hide the subcategory box
                                                                    document.getElementById("subcategoryBox").style.display = "none";
                                                                } else {
                                                                    // Show the subcategory box and load the subcategories for the selected category
                                                                    document.getElementById("subcategoryBox").style.display = "block";
                                                                    loadSubcategories(category_id);
                                                                }
                                                            }

                                                            function loadSubcategories(category_id) {
                                                                $.ajax({
                                                                    url: 'fetch_subcategories.php',
                                                                    method: 'POST',
                                                                    data: {
                                                                        category_id: category_id
                                                                    },
                                                                    success: function(response) {
                                                                        var subcategories = JSON.parse(response);

                                                                        var subcategorySelect = document.getElementById("subcategorySelect");
                                                                        subcategorySelect.innerHTML = '';

                                                                        subcategories.forEach(function(subcategory) {
                                                                            var option = document.createElement('option');
                                                                            option.value = subcategory.id;
                                                                            option.text = subcategory.name;
                                                                            subcategorySelect.appendChild(option);
                                                                        });
                                                                    },
                                                                    error: function() {
                                                                        console.log('Error occurred while fetching subcategories.');
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File input</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="imageupload" class="custom-file-input" id="exampleInputFile">
                                                                    <input type="hidden" name="imageupload_old" class="custom-file-input" value="<?php echo $row['p_image']; ?>" id="exampleInputFile">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button id="nextButtonStep1" class="btn btn-primary">Next</button>
                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                        <div class="card-warning">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Product Details</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Seller Price</label>
                                                                            <input type="number" name="seller_price" value="<?php echo $row['seller_price']; ?>" class="form-control no-spinner">
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Wrong/Defective Return Price</label>
                                                                            <input type="number" name="return_price" value="<?php echo $row['return_price']; ?>" class="form-control no-spinner">
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-group">
                                                                                <label>Product Name</label>
                                                                                <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control no-spinner">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Net Weight(gms)</label>
                                                                            <input type="number" name="product_weight" value="<?php echo $row['product_weight']; ?>" class="form-control no-spinner">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Sizes (multiple select)</label>
                                                                            <select class="select2" multiple="multiple" name="sizes[]" data-placeholder="Select a State" style="width: 100%;">
                                                                                <option value="xs" <?= (is_array($row['sizes']) && in_array('xs', $row['sizes'])) ? 'selected' : ''; ?>>xs</option>
                                                                                <option value="S" <?= (is_array($row['sizes']) && in_array('S', $row['sizes'])) ? 'selected' : ''; ?>>S</option>
                                                                                <option value="M" <?= (is_array($row['sizes']) && in_array('M', $row['sizes'])) ? 'selected' : ''; ?>>M</option>
                                                                                <option value="L" <?= (is_array($row['sizes']) && in_array('L', $row['sizes'])) ? 'selected' : ''; ?>>L</option>
                                                                                <option value="XL" <?= (is_array($row['sizes']) && in_array('XL', $row['sizes'])) ? 'selected' : ''; ?>>XL</option>
                                                                                <option value="XXL" <?= (is_array($row['sizes']) && in_array('XXL', $row['sizes'])) ? 'selected' : ''; ?>>XXL</option>
                                                                                <option value="XXXL" <?= (is_array($row['sizes']) && in_array('XXXL', $row['sizes'])) ? 'selected' : ''; ?>>XXXL</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Product Details</label>
                                                                            <textarea class="form-control" name="product_details" rows="1"><?= $row['product_details']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Manufacturer Details</label>
                                                                            <textarea class="form-control" name="manufacturer_details" rows="1"><?= $row['manufacturer_details']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Product Quantity</label>
                                                                            <input type="number" name="product_quantity" value="<?= $row['product_quantity']; ?>" class="form-control no-spinner">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button id="prevButtonStep2" class="btn btn-primary">Previous</button>
                                                                <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                            </div>
                        </div>
                <?php

                                    } else {
                                        echo "<h1>No record found.</h1>";
                                    }
                                }
                ?>
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
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        // Handle the Next button click event in Step 1
        document.getElementById('nextButtonStep1').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.next(); // Go to the next step
        });

        // Handle the Previous button click event in Step 2
        document.getElementById('prevButtonStep2').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.previous(); // Go to the previous step
        });
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

</body>

</html>

<?php

if (isset($_GET['id'])) {
    $p_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_array($query_run);
        // print_r($row);

        if (isset($_POST['update'])) {
            // Retrieve form data
            $category = mysqli_real_escape_string($con, $_POST['category']);
            $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);
            $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
            $seller_price = mysqli_real_escape_string($con, $_POST['seller_price']);
            $return_price = mysqli_real_escape_string($con, $_POST['return_price']);
            $product_quantity = mysqli_real_escape_string($con, $_POST['product_quantity']);
            $product_weight = mysqli_real_escape_string($con, $_POST['product_weight']);
            $sizes = $_POST['sizes'];
            $sizesString = implode(',', $sizes);
            $product_details = mysqli_real_escape_string($con, $_POST['product_details']);
            $manufacturer_details = mysqli_real_escape_string($con, $_POST['manufacturer_details']);

            // Update the database
            $update_query = "UPDATE addsinglecategory SET  category='$category', subcategory='$subcategory',  product_name='$product_name',seller_price='$seller_price', return_price='$return_price', product_weight='$product_weight',  sizes='$sizesString', product_details='$product_details', manufacturer_details='$manufacturer_details', product_quantity='$product_quantity' WHERE p_id='$p_id'";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                echo "Data updated successfully!";
?>
                <script>
                    window.location.href = "cat.php";
                </script>

<?php

            } else {
                echo "Failed to update data.";
                // Handle the update failure
            }
        }
    } else {
        echo "<h1>No record found</h1>";
    }
}
?>