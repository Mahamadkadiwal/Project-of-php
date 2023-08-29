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
    <title> Purchase Report</title>
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
            <div class="">
                <form action="" method="post">
                    <h1 class="">Purchase Report</h1>
                    <!-- Main content -->
                    <div class="dateInput">
                        Enter Amount <input type="number" name="price" class="form-control"><br>
                        
                        <input type="submit" name="amount" class="form-control">
                    </div>
                </form>
            </div>
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
                                            <th>Total Amount</th>
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
                                        if(isset($_POST['amount'])){
                                            $price = $_POST['price'];
                                            
                                        
                                        $res = mysqli_query(
                                            $con,
                                            "SELECT
                                                   orders.*,
                                                   order_status.name AS order_status,
                                                   users.name AS user_name
                                               FROM
                                                   orders
                                               INNER JOIN                                               
                                                   order_status ON order_status.id = orders.order_status
                                               INNER JOIN
                                                   users ON orders.user_id = users.id
                                               WHERE
                                                   orders.price >= $price
                                               ORDER BY
                                                   orders.id DESC;
                                                "
                                        );
                                    
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                            <tr>
                                                <td><a class="text-dark text-decoration-none"
                                                        style="background: #27ae60; padding: .3rem;" data-toggle="tooltip"
                                                        data-placement="top" title="Clisk this"
                                                        href="Orders_details.php?id=<?php echo $row['id'] ?>"
                                                        class="text-dark">
                                                        <?php echo $row['id'] ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $row['price'] ?>
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
                                                <td>
                                                    <?php echo $row['user_name'] ?>
                                                </td>
                                                
                                                <td>
                                                    <?php echo $row['created_at'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['payment_type'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['order_status'] ?>
                                                </td>

                                            </tr>
                                            <?php
                                            // $i++;
                                        }
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