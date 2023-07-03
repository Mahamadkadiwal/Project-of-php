<?php
include_once 'database/dbcon.php';


session_start();
if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orders</title>
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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->

            <!-- /.table  -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card col-md-12 mt-2">
                            <div class="card-header">
                                <h3 class="card-title accent-dark "> ORDERS..</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ORDER ID</th>
                                            <th>CUSTOMER DETAILS</th>
                                            <th>CUSTOMER NAME</th>
                                            <th>ORDER DATE</th>
                                            <th>PAYMENT_STATUS</th>
                                            <th width="20%">ORDER_STATUS</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // $i = 1;
                                        $res = mysqli_query($con, "select `orders`.*,order_status.name as 
                                        order_status_str from `orders`,order_status where order_status.id=
                                        `orders`.order_status orders by `orders`.id desc");
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td><a class="text-dark text-decoration-none" style="background: #27ae60; padding: .3rem;" data-toggle="tooltip" data-placement="top" title="Clisk this" href="Orders_details.php?id=<?php echo $row['id'] ?>" class="text-dark">
                                                        <?php echo $row['id'] ?></a>
                                                </td>
                                               
                                                <td style="cursor: pointer;">
                                                    <a href="addsinglecatlog_edit.php?id=<?php echo $row['p_id']; ?>"><label class="badge badge-success hand_cursor">Edit</label></a>
                                                    <a href="?id=<?php echo $row['p_id'] ?>&type=delete"><label class="badge badge-danger delete_red">Delete</label></a>
                                                </td>
                                            </tr>
                                        <?php 
                                        // $i++;
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