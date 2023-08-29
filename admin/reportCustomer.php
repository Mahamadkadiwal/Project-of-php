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
    <title> Customer Report</title>
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
               
                    <h1 class="">Customer Report</h1>
                    
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
                                            <th> ID</th>
                                           
                                            
                                            <th>CUSTOMER NAME</th>
                                            <th>Total orders</th>
                                            <th>Total Purchase</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $i = 1;
                                        
                                            
                                        
                                        $res = mysqli_query(
                                            $con,
                                            "SELECT
                                            orders.*,
                                            COUNT(orders.id) AS total_orders,
                                            SUM(price) as total_price,
                                            users.name
                                        FROM
                                            orders
                                        JOIN
                                            users ON orders.user_id = users.id
                                        GROUP BY
                                            orders.user_id, users.name
                                        HAVING
                                            total_orders > 1
                                        ORDER BY
                                            total_orders DESC;"
                                        );
                                    
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                            <tr>
                                                 <td>
                                                    <?php echo $i ?>
                                                     <!-- <a class="text-dark text-decoration-none"
                                                        style="background: #27ae60; padding: .3rem;" data-toggle="tooltip"
                                                        data-placement="top" title="Clisk this"
                                                        href="Orders_details.php?id=<?php echo $row['id'] ?>"
                                                        class="text-dark">
                                                        <?php echo $row['id'] ?></a>  -->
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                
                                                <td>
                                                    <?php echo $row['total_orders'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['total_price'] ?>
                                                </td>
                                                

                                            </tr>
                                            <?php
                                             $i++;
                                        }
                                      ?>
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