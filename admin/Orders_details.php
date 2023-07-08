<?php
include_once 'database/dbcon.php';


session_start();
if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}
$order_id = mysqli_real_escape_string($con,$_GET['id']);
	if(isset($_POST['submit'])){
		$update_order_status = $_POST['update_order_status'];
		mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
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
                            <table border="0px">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Product Image</th>
							<th>Qty</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>       
						<?php
							$query = mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,
							product.name,product.image,`order`.address,`order`.city,`order`.state,`order`.pincode from order_detail,product,`order` where
							order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");

							$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` where id='$order_id'"));
									
							$address=$userInfo['address'];
							$city=$userInfo['city'];
							$state = $userInfo['state'];
							$pincode=$userInfo['pincode'];

							$totalPrice = 0;
							while($row = mysqli_fetch_assoc($query)){
							$totalPrice = $totalPrice + ($row['qty']*$row['price']);
						?>                 
						<tr>
							<td><?php echo $row['name']?></td>
							<td><img src="media/product/<?php echo $row['image']?>" width="80px" height="80px"></td>
							<td><?php echo $row['qty']?></td>
							<td><?php echo $row['qty']*$row['price']?></td>
						</tr>
						<?php }?>
						<tr>
							<td colspan="2"></td>
							<td><b>Toatal Price</b></td>
							<td><?php echo $totalPrice?></td>
						</tr>
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