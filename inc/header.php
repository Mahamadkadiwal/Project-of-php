<?php
session_start();
define("APPURL", "http://localhost/php/Project-of-php");

dirname(dirname(__FILE__)) . "/admin/database/dbcon.php";
if (isset($_SESSION['user_id'])) {
    $number = mysqli_query($con, "select count(*) as num_product from cart where user_id=$_SESSION[user_id]");

    $get = mysqli_fetch_assoc($number);
    // require_once '../admin/database/dbcon.php';
    // if(!isset($_SESSION['user_name'])){
    //     header('location:inc/login.php');
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspire Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <bootstrap  js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </script>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>




<body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="<?php echo APPURL; ?>">Inspire Software </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="<?php echo APPURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?php echo APPURL; ?>/category/category.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?php echo APPURL; ?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Contact US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>

                <!-- Right-side login and register buttons -->
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['user_name'])) : ?>
                        <!-- Display user-related links if the user is logged in -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo APPURL; ?>/cart.php"><i class="fas fa-shopping-cart"></i><?php echo $get['num_product'] ?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link btn btn-outline-dark shadow-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['user_name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo APPURL; ?>/user/order.php?id=<?php echo $_SESSION['user_id']; ?>">Orders</a></li>
                                <li><a class="dropdown-item" href="<?php echo APPURL ?>/inc/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <!-- Display login and register buttons if the user is not logged in -->
                        <li class="nav-item">
                            <a href="<?php echo APPURL ?>/inc/login.php">
                                <button type="button" class="ms-2 btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    Login
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo APPURL ?>/inc/register.php">
                                <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#RagisterModal">
                                    Register
                                </button>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>


</html> 