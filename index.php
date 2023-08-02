<?php
    require_once 'admin/database/dbcon.php';
    require_once 'inc/header.php';
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
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">


</head>
<style>
    *{
        font-family: 'Roboto', sans-serif;
    }
.Product_container_You{
    min-height: 500px;
    /* background-color: #ccc; */
    padding: 10px;
}
.product_container_you_content{
    display: grid;
    grid-template-columns: 280px 1fr;
    height: 100%;
    gap:30px;
}
.product_category_you_aside{
    /* background-color: red; */
    height: 100%;
}
.product_category_display{
    /* background-color: green; */
    height: 100%;
    display: grid;
    grid-template-columns: repeat(4,minmax(250px,1fr));
}
.search_category_input{
    display: flex;
    padding: 15px;
    font-size: 18px;
    border:2px solid #ccc;
    border-radius: 5px;
}
.search_category_input input{
    font-size: 18px;
    width: 100%;
    background-color: transparent;
    border:none;
    outline: none;
    padding: 0px 10px;
}
.search_category_input input::placeholder{
    font-size: 15px;
}
.display_Category_list{
    padding: 20px 10px;
    display: flex;
    flex-direction: column;
}
.display_Category_list label{
    margin: 3px 0px;
    text-transform: capitalize;
}


.productCard{
    max-width: 250px;
    padding: 10px;
    box-shadow: -1px -1px 5px rgba(0,0,0,0.1),
    1px 1px 5px rgba(0,0,0,0.3);
    border-radius: 5px;
    cursor: pointer;
}
.productCard:hover{
    background-color: #f0f0f0;   
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
}
.product_image{
    display: flex;
    
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.product_image img{
    /* width: 200px; */
    width: fit-content;
    height: 170px;
}
.product_price{
    font-weight: 550;
    font-size: 22px;
    color:black;
}
.product_name{
    text-transform: capitalize;
}
</style>

<body>
    

    <section class="category_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center mt-2">
        <h2>
          Our Categorys
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
<!-- 
 <div class="container">
    
    <h1 class="heading">New <span>Arrivals</span></h1>
    <div class="row mt-2">
        <?php foreach($sql as $row) :  ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products">            
            <div class="card bg-light w-100">
                <a href="single.php?id=<?php echo $row['p_id'];?>&category=<?php echo $row['category'];?>&subcategory=<?php echo $row['subcategory'];?>">
                    <img class="card-img-top img-fluid" src="./img/<?php echo $row['p_image'];?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h3><b><?php echo $row['product_name'];?></b></h3>
                    <div class="price"><?php echo $row['seller_price'];?> </div>
                </div>                    
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>  -->

<div class="Product_container_You">
        <h2 >Products For You</h2>
        <div class="product_container_you_content">
            <aside class="product_category_you_aside">
                <h3>Category</h3>
                <div class="search_category_input">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search"/>
                </div>
                <div class="display_Category_list">
                    <label for="bluetooth" >
                        <input type="checkbox" id="bluetooth"/>
                        <span>bluetooth Headset</span>
                    </label>
                    <label for="chains">
                        <input type="checkbox" id="chains"/>
                        <span>Men Chains</span>
                    </label>
                    <label for="kurtas">
                        <input type="checkbox" id="kurtas"/>
                        <span>Kurtas</span>
                    </label>
                    <label for="accessories">
                        <input type="checkbox" id="accessories"/>
                        <span>Mobile Accessories</span>
                    </label>
                    <label for="sarees">
                        <input type="checkbox" id="sarees"/>
                        <span>sarees</span>
                    </label>
                    <label for="watch">
                        <input type="checkbox" id="watch"/>
                        <span>watch</span>
                    </label>
                </div>
                
            </aside>
            <main class="product_category_display" id="product_category_displayId">
            
            <?php foreach($sql as $row) :  ?>
                <a href="single.php?id=<?php echo $row['p_id'];?>&category=<?php echo $row['category'];?>&subcategory=<?php echo $row['subcategory'];?>">

            <div class="productCard mb-4 products" onclick="ClickProduct(product_1)">
                <div class="product_image ">
                    <img class="card-img-top img-fluid" src="./img/<?php echo $row['p_image'];?>" alt="Card image cap">
                
                </div>
               <div class="card-body">
                    <h3 class="product_name"><b><?php echo $row['product_name'];?></b></h3>
                    <div class="price product_price">  <span>₹</span><?php echo  $row['seller_price'];?> </div>
                </div>  
             </div>
             </a>
           
            <?php endforeach; ?>
            </main>
        </div>
    </div>
    
</body>

</html>
<?php else:?>
    <h1>No more product</h1>
<?php endif; ?>
