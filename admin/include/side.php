<?php
// session_start();
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
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="././image/manlogo.jpg
                    " class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">jeel</a>
                </div>
            </div>

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
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="home.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <?php
                        if ($_SESSION['adminrole'] == 1) {
                            echo  '<a href="././order_vender.php" class="nav-link">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Orders
                            </p>
                        </a>';
                        }

                        ?>


                    </li>
                    <?php if ($_SESSION['adminrole'] == 1) : ?>
                        <li class="nav-item">
                            <a href="././cat.php" class="nav-link">
                                <i class='nav-icon fas fa-upload'></i>
                                <p>
                                    Catalog UPload
                                </p>
                            </a>

                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="././category.php" class="nav-link">
                                <i class='nav-icon fas fa-upload'></i>
                                <p>
                                    Category
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="././subcategory.php" class="nav-link">
                                <i class='nav-icon fas fa-upload'></i>
                                <p>
                                    Sub Category
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="././allproduct.php" class="nav-link">
                                <i class='nav-icon fas fa-upload'></i>
                                <p>
                                    Lists of Product
                                </p>
                            </a>

                        </li>

                    <?php endif; ?>
                    <?php if (!$_SESSION['adminrole'] == 1) { ?>
                        <li class="nav-item">

                            <a href="././form.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Forms

                                </p>
                            </a>
                        <li class="nav-item">
                            <a href="././table.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>

                                    Tables
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="././orders.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>

                                     All Orders
                                </p>
                            </a>

                        </li>

                    <?php  } ?>
                    <!--   <li class="nav-item">
                        <a href="../table.php" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Simple Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../table.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DataTables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>jsGrid</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- script icon link -->
</body>

</html>