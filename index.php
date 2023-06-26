<?php
    require_once 'admin/database/dbcon.php';
    $sql = mysqli_query($con, "SELECT * from addsinglecategory where status='1'");
    if(mysqli_num_rows($sql) >0):
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspire </title>
    <!-- css link  -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/custom.js"></script>
    
    <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">

</head>

<body>
    <?php require('inc/header.php'); ?>

    <section class="category_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center mt-2">
        <h2>
          Our Category
        </h2>
      </div>

      <ul class="filters_menu">
  <li class="active" data-filter="*">All</li>
  <li data-filter=".clothes">Clothes</li>
  <li data-filter=".kitchen">Kitchen</li>
  <li data-filter=".shoes">Shoes</li>
  <li data-filter=".electronics">Electronics</li>
</ul>

</section>

<div class="container">
    
    <h1 class="heading">New <span>Arrivals</span></h1>
    <div class="row mt-2">
        <?php foreach($sql as $row) :  ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products">            
            <div class="card bg-light w-100">
                <a href="single.php?id=<?php echo $row['id'];?>&category=<?php echo $row['category'];?>&subcategory=<?php echo $row['subcategory'];?>">
                    <img class="card-img-top img-fluid" src="img/<?php echo $row['image'];?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h3><b><?php echo $row['product_name'];?></b></h3>
                    <div class="price"><?php echo $row['seller_price'];?> <span>Rs. 370</span></div>
                </div>                    
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>

</html>
<?php endif; ?>