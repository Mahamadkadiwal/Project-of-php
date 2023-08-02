<?php
    require_once 'admin/database/dbcon.php';

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

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
     
        $delete = mysqli_query($con, "DELETE from wishlist where id='$id'");

    }    
?>