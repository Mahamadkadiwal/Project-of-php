<?php 
    require_once 'admin/database/dbcon.php';
    include_once 'header.php';

    if(!isset($_SERVER['HTTP_REFERER'])){
        header('location: index.php');
        exit;
      }
    //header('refresh:5; url=index.php');
    ?>
    
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center">
                <div class="image-fliud">
                    
                </div>
                <h1 class="display-1 fw-bold">Order Placed</h1>
                
                <p class="lead">
                    Your order has been placed successfully.
                </p>
                <a href="<?php echo APPURL ?>" class="btn btn-primary">Go Home</a>
            </div>
        </div>

