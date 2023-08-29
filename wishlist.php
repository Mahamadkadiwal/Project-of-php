<?php
    require_once 'admin/database/dbcon.php';
     include 'header.php'; 

     if(isset($_POST['submit'])){
        $prod_id= $_POST['prod_id'];
        $prod_name= $_POST['prod_name'];
        $prod_image= $_POST['prod_image'];
        $prod_price= $_POST['prod_price'];
       
        $user_id= $_POST['user_id'];
  
        $sql = mysqli_query($con, "INSERT INTO `wishlist`( `prod_id`, `prod_name`, `prod_image`, 
        `prod_price`,  `user_id`) VALUES ('$prod_id','$prod_name',
        '$prod_image','$prod_price','$user_id')");
  
      }