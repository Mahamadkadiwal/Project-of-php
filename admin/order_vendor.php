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
                                            <th>PRODUCT/QTY</th>
                                            <th>ADDRESS</th>
                                            <th>PAYMENT TYPE</th>
                                            <th>PAYMENT_STATUS</th>
                                            <th>ORDER_STATUS</th>
                                        </tr>
                                        <!-- select order_detail.qty, adsinlecatlog.name,
                                                `orders`.*,order_status.name as order_status_str from order_detail,adsinlecatlog,
                                                `orders`,order_status where order_status.id=`orders`.order_status and 
                                                adsinlecatlog.id=order_detail.adsinlecatlog and `orders`.id=order_detail.order_id and 
                                                product.added_by='" . $_SESSION['admin_id'] . "' order by `orders`.id desc 
                                            
                                            select order_detail.qty, addsinglecategory.product_name,
                                        `orders`.*,order_status.name as order_status_str from order_detail,addsinglecategory,
                                        `orders`,order_status where order_status.id=`orders`.order_status and 
                                        addsinglecategory.p_id=order_detail.product_id and `orders`.id=order_detail.orders_id and 
                                        addsinglecategory.seller_id='" . $_SESSION['admin_name'] . "' order by `orders`.id desc-->
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($con, "SELECT order_detail.qty, addsinglecategory.product_name, `orders`.*, order_status.name AS order_status_str
                                        FROM order_detail, addsinglecategory, `orders`, order_status
                                        WHERE order_status.id = `orders`.order_status
                                          AND addsinglecategory.p_id = order_detail.product_id
                                          AND `orders`.id = order_detail.orders_id
                                          where  orders.seller_id = '".$_SESSION['admin_name']."'
                                        ORDER BY `orders`.id DESC;
                                        ");
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td>
                                                    <?php echo $row['name'] . "<br>";
                                                    echo $row['qty'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo "<b>floor: </b>";
                                                    echo $row['floor'] . "<br>";
                                                    echo "<b>street: </b>";
                                                    echo $row['street'] . "<br>";
                                                    echo "<b>landmark: </b>";
                                                    echo $row['landmark'] . "<br>";
                                                    echo "<b>State: </b>";
                                                    echo $row['state'] . "<br>";
                                                    echo "<b>City: </b>";
                                                    echo $row['city'];
                                                    ?>
                                                </td>
                                                <td><?php echo $row['payment_type'] ?></td>
                                                <td><?php echo $row['payment_status'] ?></td>
                                                <!-- <td><?php echo $row['order_status_str'] ?></td> -->
                                            </tr>
                                        <?php } ?>
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