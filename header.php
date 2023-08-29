<?php
session_start();
define("APPURL", "http://localhost/php/Project-of-php");

dirname(dirname(__FILE__)) . "/admin/database/dbcon.php";
if (isset($_SESSION['user_id'])) {
    $number = mysqli_query($con, "select count(*) as num_product from cart where user_id=$_SESSION[user_id]");

    $get = mysqli_fetch_assoc($number);
    // require_once '.../admin/database/dbcon.php';
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
    <title>Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo APPURL?>/css/style11.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                
            </div>
            
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="<?php echo APPURL?>/img/icon/search.png" alt=""></a>
            <a href="#"><img src="<?php echo APPURL?>/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="<?php echo APPURL?>/img/icon/cart.png" alt=""> <span>4</span></a>
            <!-- <div class="price">$0.00</div> -->
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-5">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user_name'])): ?>
                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-li btn-sm btn-primary dropdown-toggle" href="" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item"
                                        href="<?php echo APPURL; ?>/user/order.php?id=<?php echo $_SESSION['user_id']; ?>">Orders</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="<?php echo APPURL; ?>/user/wishlist-user.php?id=<?php echo $_SESSION['user_id']; ?>">Wishlist</a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo APPURL ?>/inc/logout.php">Logout</a></li>
                            </ul>
                        </li>
                       <?php else: ?>
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="<?php echo APPURL?>/inc/login.php">Sign in</a>
                                <a href="<?php echo APPURL?>/inc/register.php">Register</a>
                            </div>
                            <?php endif; ?>
                    </ul>
                       
                            <!-- <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <!-- <a href="./index.html"><img src="img/logo.png" alt=""></a> -->
                        <h3>Inspire Seller </h3>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="<?php echo APPURL?>">Home</a></li>
                            <li class="active"><a href="product.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about.html">About Us</a></li>
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <li><a href="<?php echo APPURL; ?>/category/category.php">Categories</a></li>
                            <?php if(isset($_SESSION['user_id'])) :?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo APPURL?>/cart.php"><i
                                        class="fas fa-shopping-cart"></i>
                                        <?php echo $get['num_product'] ?>
                                </a>
                            </li>
                            <?php else: ?>
                                <p>Please login</p>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="<?php echo APPURL; ?>/img/icon/search.png" alt=""></a>
                        <a href="<?php echo APPURL; ?>/user/wishlist-user.php?id=29"><img src="img/icon/heart.png" alt=""></a>
                        <a href="#"><img src="<?php echo APPURL; ?>/img/icon/cart.png" alt=""> <span>5</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
</body>
</html>