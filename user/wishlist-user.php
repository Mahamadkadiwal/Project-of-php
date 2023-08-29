<?php
    require_once '../admin/database/dbcon.php';
    require('../header.php');

 
    $sql = mysqli_query($con, "SELECT * from wishlist where user_id='$_SESSION[user_id]'");
    if(mysqli_num_rows($sql) >0):
?>

<div class="container">
    
    <h1 class="heading">New <span>Arrivals</span></h1>
    <div class="row mt-2">
        
        <?php foreach($sql as $row) :  ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products">            
            <div class="card bg-light w-100">
                <a href="../single.php?id=<?php echo $row['prod_id'];?>">
                    <img class="card-img-top img-fluid" src="../img/<?php echo $row['prod_image'];?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h3><b><?php echo $row['prod_name'];?></b></h3>
                    <div class="price"><?php echo $row['prod_price'];?> <span>Rs. 370</span></div>
                </div>                    
            </div>
        </div>
        <?php endforeach; ?>
       
    </div>
</div>

</body>

</html>
<?php else:?>
    <h1>No more product</h1>
<?php endif; ?>