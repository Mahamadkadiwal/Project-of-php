<?php
include_once 'database/dbcon.php';


session_start();
if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}


if (isset($_GET['type']) && $_GET['type'] === 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
    $type = ($_GET['type']);
    $p_id = ($_GET['id']);
    if ($type == 'delete') {
        mysqli_query($con, "delete from addsinglecategory where p_id='$p_id'");
        // redirect('addsinglecategory.php');
    }
}
$res = mysqli_query($con, "select * from addsinglecategory AS adsc INNER JOIN categories AS cat ON adsc.category=cat.id INNER JOIN sub_categories AS suc ON suc.id = adsc.subcategory");

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetegory</title>
    <?php
    include 'include/link.php';
    ?>
</head>

<body>
    <div class="wrapper">

        <!-- nav bar  -->
    <?php
    include 'include/nav.php';
    ?>

    <!-- nav bar  -->

    <!-- sidebar -->
    <?php
    include 'include/side.php';
    ?>

    <!-- / sidebar -->

      

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="fa fa-product-hunt" aria-hidden="true"> Upload Catalog</i></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="home.php">Home</a></li> -->
                                <li class="breadcrumb-item active">Catalog Upload</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Buttons with Icons -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Have unique Product Sell ?</h3>
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-6">
                                        <a href="addsinglecatlog.php">
                                            <button type="button" class="btn btn-default btn-block">Add Single Catalog</button>
                                            <!-- <button type="button" class="btn btn-primary btn-block">Add Single Catalog</button> -->
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <button type="button" class="btn btn-default btn-block">Add Catalog in Bulk</button> -->
                                        <a href="addbulkcatlog.php">
                                            <button type="button" class="btn btn-primary btn-block">Add Catalog in Bulk</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.table  -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="10%">ID</th>
                                            <th width="10%">CATEGORIES</th>
                                            <th width="10%">SUB_CATEGORY</th>
                                            <th width="10%">NAME</th>
                                            <th width="10%">IMAGE</th>
                                            <th width="10%">PRICE</th>
                                            <th width="10%">QTY</th>
                                            <th width="10%">SIZE</th>
                                            <th width="20%">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['category_name']; ?></td>
                                                <td><?php echo $row['subcategory_name']; ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td>
                                                    <img src="./image/upload/<?php echo $row['p_image']; ?>" width="29px" alt="image">
                                                   
                                                </td>
                                                <td><?php echo $row['seller_price']; ?></td>
                                                <td><?php echo $row['product_quantity']; ?></td>
                                                <td>
                                                    <?php
                                                    $sizes = explode(", ", $row['sizes']);
                                                    foreach ($sizes as $size) {
                                                        echo $size . '<br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td style="cursor: pointer;">
                                                    <a href="addsinglecatlog_edit.php?id=<?php echo $row['p_id']; ?>"><label class="badge badge-success hand_cursor">Edit</label></a>
                                                    <a href="?id=<?php echo $row['p_id'] ?>&type=delete"><label class="badge badge-danger delete_red">Delete</label></a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>

        <!-- ./wrapper -->

</body>

</html>