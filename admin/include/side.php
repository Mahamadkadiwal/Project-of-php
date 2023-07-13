<?php
// session_start();
// require_once '../database/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="././image/inspire.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">


            <span class="brand-text font-weight-light">Inspire Software</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">


            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="./home.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    

                            <?php if ($_SESSION['adminrole'] == 1) : ?>
                                <a href="<?php echo ADMINURL?>/orders.php" class="nav-link">
                                    <i class="nav-icon fas fa-cart-plus"></i>
                                    <p>
                                        Order
                                    </p>
                                </a>
                            <?php endif; ?>
                        </li>
                        <?php if ($_SESSION['adminrole'] == 1) : ?>
                            <li class="nav-item">
                                <a href="<?php echo ADMINURL?>/cat.php" class="nav-link">
                                    <i class='nav-icon fas fa-upload'></i>
                                    <p>
                                        Catalog Upload
                                    </p>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?php echo ADMINURL?>./category.php" class="nav-link">
                                    <i class='nav-icon fas fa-upload'></i>
                                    <p>
                                        Category
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMINURL?>./subcategory.php" class="nav-link">
                                    <i class='nav-icon fas fa-upload'></i>
                                    <p>
                                        Sub Category
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMINURL?>./allproduct.php" class="nav-link">
                                    <i class='nav-icon fas fa-upload'></i>
                                    <p>
                                        Lists of Product
                                    </p>
                                </a>
                            </li>
                            



                        <?php
                        $sqlCount = mysqli_query($con, "SELECT COUNT(*) AS total FROM admin_login WHERE role = 1");
                        $sqlRows = mysqli_query($con, "SELECT id FROM admin_login WHERE role = 1");

                        if (mysqli_num_rows($sqlCount) > 0 && mysqli_num_rows($sqlRows) > 0) {
                            $rowCount = mysqli_fetch_assoc($sqlCount);
                            $sellerCount = $rowCount['total'];
                        ?>
                            <li class="nav-item">

                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        List of sellers (<?php echo $sellerCount; ?>)
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($sqlRows)) {
                                    ?>
                                        <li class="nav-item">
                                            <a href="../seller_pro.php?id=<?php echo $row['id']; ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Seller <?php echo $i; ?></p>
                                            </a>
                                        </li>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="./vendor.php" class="nav-link">
                                    <i class='nav-icon fas fa-upload'></i>
                                    <p>
                                        Vendor
                                    </p>
                                </a>
                            </li>
                        <?php

                          

                        }
                        ?>


                    <?php endif; ?>
                    <?php if (!$_SESSION['adminrole'] == 1) : ?>
                        <!-- <li class="nav-item">
                                <a href="./form.php" class="nav-link">

                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Forms
                                    </p>
                                </a>

                            </li> -->
                        
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMINURL?>./table.php" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Tables
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo ADMINURL?>././orders.php" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>

                                        All Orders
                                    </p>
                                </a>


                            </li>





                    <?php endif; ?>
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- script icon link -->
</body>

</html>