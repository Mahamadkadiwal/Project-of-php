<?php




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Management System</title>
    <!-- css link  -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/custom.js"></script>
    
    <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">

</head>

<body>
    <?php require('inc/header.php'); ?>

    <section class="category_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center mt-5">
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
    <div class="row mt-5">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products">            
            <div class="card bg-light w-100">
                <a href="#">
                    <img class="card-img-top img-fluid" src="img/Casual-Shirts-2.png" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h3><b>Shirt</b></h3>
                    <div class="price">Rs. 350 <span>Rs. 330</span></div>
                </div>                    
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products">            
            <div class="card bg-light w-100">
                <a href="#">
                    <img class="card-img-top img-fluid" src="img/Casual-Shirts-2.png" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h3><b>Shirt</b></h3>
                    <div class="price">Rs. 330 <span>Rs. 330</span></div>
                </div>                    
            </div>
        </div>
    </div>
</div>

</body>

</html>
