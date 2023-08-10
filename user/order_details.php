<?php
require_once '../admin/database/dbcon.php';
require('../inc/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = mysqli_query($con, "SELECT 
    order_detail.*,
    addsinglecategory.*,
    orders.*,
    order_status.name AS order_status,
    users.name AS user_name
FROM 
    order_detail
INNER JOIN addsinglecategory ON addsinglecategory.p_id = order_detail.product_id
INNER JOIN orders ON orders.id = order_detail.orders_id
INNER JOIN order_status ON order_status.id = orders.order_status
INNER JOIN users ON orders.user_id = users.id
WHERE orders.id= '$id'");
    if ($id !== $_SESSION['user_id']) {
        // header("location: ".APPURL."");
        ?>
        <script>
            window.location.href('".APPURL."');
        </script>
        <?php
    }
}
if (!isset($_SESSION['user_id'])) {
    header("location :" . APPURL . "");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
       
<div class="card  mt-5 mx-5 d-flex justify-content-between">
    <?php foreach ($sql as $row) { ?>
        <div class="card-body " style="display:inline">
        <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between flex-fill">
        <li class="nav-item">
    <p class="fw-bold fs-5 mx-2">Shipping Address</p>
    <p class="fs-6 mb-3 mx-2">
        <?php echo $row['user_name'] ?><br>
        <?php echo $row['street'] ?><br>
        <?php echo $row['landmark'] ?><br>
        <?php echo $row['city'] . ", " . $row['state'] . " " . $row['pincode'] ?><br>
        India<br>
    </p>
</li>

      <li class="nav-item">
      <p class="fw-bold fs-5 mx-5">Payment Method</p>
        <p class="fs-6 mx-5">
             <?php echo $row['payment_type']?><br>
               
        </p>
      </li>
      <li class="nav-item">
      <p class="fw-bold fs-5 mx-5">Payment Method</p>
        <p class="fs-6 mx-5">
            Item(s) Subtotal: <?php echo $row['price']?><br>
            Shipping: <?php echo $row['price']?><br>
            Total : <?php echo $row['price']; ?>
               
        </p>
      </li>
    </ul>
            
        </div>
       
    
</div>
<div class="card mt-2 mx-5">
    
        <div class="card-body " style="display:inline">
        <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
   
    <p class="fs-6 mb-3 mx-2">
    <img src="<?php echo APPURL; ?>/img/<?php echo $row['p_image'];?>" width="90px" height="80px" class="img-fluid" alt="">
        <?php echo $row['product_name'] ?><br>
        
    </p>
</li>

      <li class="nav-item">
      <p class="fw-bold fs-5 mx-5"></p>
        <p class="fs-6 mx-5">
            
             <?php echo $row['product_details']?><br>
               
        </p>
      </li>
      <li class="nav-item">
      <p class="fw-bold fs-5 mx-5">Payment Method</p>
        <p class="fs-6 mx-5">
            Item(s) Subtotal: <?php echo $row['price']?><br>
            Shipping: <?php echo $row['price']?><br>
            Total : <?php echo $row['price']; ?>
               
        </p>
      </li>
    </ul>
            
        </div>
       
    <?php } ?>
</div>


</body>

</html>