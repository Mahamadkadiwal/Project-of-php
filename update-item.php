<?php
    require_once 'admin/database/dbcon.php';
    // require_once 'inc/header.php';

     /* at the top of 'check.php' */
     if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: index.php' ) );

    }

    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
      }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        $update= mysqli_query($con, "update cart set quantity='$quantity' where id='$id'");
        if($update){
            echo $return = 'Quantity has been updated';
        }else{
            echo $return = 'Not updated'; 
        }
    }

?>