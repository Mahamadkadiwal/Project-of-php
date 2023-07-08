 1
 <li class="nav-item">
     <?php
        if ($_SESSION['adminrole'] == 1) {
            echo  '<a href="././order.php" class="nav-link">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Order
                            </p>
                        </a>';
        }
        ?>
 </li>
 <li class="nav-item">
     <a href="././productcatalog/cat.php" class="nav-link">
         <i class='nav-icon fas fa-upload'></i>
         <p>
             Catalog UPload
         </p>
     </a>

 </li>

 <li class="nav-item">
     <?php
        if (!$_SESSION['adminrole'] == 1) {
            echo  '<a href="././form.php" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                              Forms
                            </p>
                        </a>';
        }
        ?>
 </li>
 <li class="nav-item">
     <?php
        if (!$_SESSION['adminrole'] == 1) {
            echo  '<a href="././table.php" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                            Tables
                            </p>
                        </a>';
        }
        ?>
 </li>
 <?php
    include_once '../database/dbcon.php';

    session_start();
    if (!isset($_SESSION['admin_email'])) {
        header("location:../login.php");
    }



    // $sql = "select * from addsinglecategory order by order_number";
    // $res = mysqli_query($con, $sql);
    $res = mysqli_query($con, "select * from addsinglecategory where id");
    ?>




 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Tempusdominus Bootstrap 4 -->
     <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <!-- iCheck -->
     <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <!-- JQVMap -->
     <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="../dist/css/adminlte.min.css">
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
     <!-- summernote -->
     <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
     <!-- datatable  -->
     <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

 </head>

 <body>
     <div class="wrapper">

         <!-- nav bar  -->

         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
             <!-- Left navbar links -->
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                 </li>
                 <li class="nav-item d-none d-sm-inline-block">
                     <a href="home.php" class="nav-link">Home</a>
                 </li>
                 <li class="nav-item d-none d-sm-inline-block">
                     <a href="#" class="nav-link">Contact</a>
                 </li>
             </ul>

             <!-- Right navbar links -->
             <ul class="navbar-nav ml-auto">
                 <!-- Navbar Search -->
                 <li class="nav-item">
                     <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                         <i class="fas fa-search"></i>
                     </a>
                     <div class="navbar-search-block">
                         <form class="form-inline">
                             <div class="input-group input-group-sm">
                                 <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                 <div class="input-group-append">
                                     <button class="btn btn-navbar" type="submit">
                                         <i class="fas fa-search"></i>
                                     </button>
                                     <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                         <i class="fas fa-times"></i>
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </li>

                 <!-- Messages Dropdown Menu -->
                 <li class="nav-item dropdown">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                         <i class="far fa-comments"></i>
                         <span class="badge badge-danger navbar-badge">3</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                         <a href="#" class="dropdown-item">
                             <!-- Message Start -->
                             <div class="media">
                                 <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                 <div class="media-body">
                                     <h3 class="dropdown-item-title">
                                         Brad Diesel
                                         <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                     </h3>
                                     <p class="text-sm">Call me whenever you can...</p>
                                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                 </div>
                             </div>
                             <!-- Message End -->
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item">
                             <!-- Message Start -->
                             <div class="media">
                                 <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                 <div class="media-body">
                                     <h3 class="dropdown-item-title">
                                         John Pierce
                                         <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                     </h3>
                                     <p class="text-sm">I got your message bro</p>
                                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                 </div>
                             </div>
                             <!-- Message End -->
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item">
                             <!-- Message Start -->
                             <div class="media">
                                 <img src="https://sms.inspiresoftware.co.in/salary/images/user.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                 <div class="media-body">
                                     <h3 class="dropdown-item-title">
                                         Nora Silvester
                                         <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                     </h3>
                                     <p class="text-sm">The subject goes here</p>
                                     <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                 </div>
                             </div>
                             <!-- Message End -->
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                     </div>
                 </li>
                 <!-- Notifications Dropdown Menu -->
                 <li class="nav-item dropdown">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                         <i class="far fa-bell"></i>
                         <span class="badge badge-warning navbar-badge">15</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                         <span class="dropdown-item dropdown-header">15 Notifications</span>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item">
                             <i class="fas fa-envelope mr-2"></i> 4 new messages
                             <span class="float-right text-muted text-sm">3 mins</span>
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item">
                             <i class="fas fa-users mr-2"></i> 8 friend requests
                             <span class="float-right text-muted text-sm">12 hours</span>
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item">
                             <i class="fas fa-file mr-2"></i> 3 new reports
                             <span class="float-right text-muted text-sm">2 days</span>
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                         <i class="fas fa-expand-arrows-alt"></i>
                     </a>
                 </li>
                 <!-- <li class="nav-item">
                <a href="logout.php" class="nav-link btn btn-light btn-sm" role=" button">
                    <i class='fas fa-sign-out-alt'></i>
                </a>

            </li> -->

                 <li class="nav-item nav-profile dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                         <span class="nav-profile-name"> Admin</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item " href="../logout.php">
                             <i class='fas fa-sign-out-alt m-2 '></i>
                             Logout
                         </a>
                     </div>
                 </li>
             </ul>
         </nav>

         <!-- aside bar  -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
             <!-- Brand Logo -->
             <a href="index3.html" class="brand-link">
                 <img src="https://sms.inspiresoftware.co.in/salary/images/user.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                 <span class="brand-text font-weight-light">Inspire Software</span>
             </a>

             <!-- Sidebar -->
             <div class="sidebar">
                 <!-- Sidebar user panel (optional) -->
                 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                     <div class="image">
                         <img src="https://sms.inspiresoftware.co.in/salary/images/user.jpg" class="img-circle elevation-2" alt="User Image">
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
                             <a href="../home.php" class="nav-link active">
                                 <i class="nav-icon fas fa-tachometer-alt"></i>
                                 <p>
                                     Dashboard

                                 </p>
                             </a>

                         </li>

                         <li class="nav-item">
                             <?php
                                if ($_SESSION['adminrole'] == 1) {
                                    echo  '<a href="../order.php" class="nav-link">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Order
                            </p>
                        </a>';
                                }

                                ?>


                         </li>
                         <li class="nav-item">
                             <a href="../productcatalog/cat.php" class="nav-link">
                                 <i class='nav-icon fas fa-upload'></i>
                                 <p>
                                     Catalog UPload
                                 </p>
                             </a>

                         </li>
                         <?php if (!$_SESSION['adminrole'] == 1) { ?>
                             <li class="nav-item">

                                 <a href="../form.php" class="nav-link">
                                     <i class="nav-icon fas fa-edit"></i>
                                     <p>
                                         Forms

                                     </p>
                                 </a>
                             <li class="nav-item">
                                 <a href="../table.php" class="nav-link">
                                     <i class="nav-icon fas fa-table"></i>
                                     <p>

                                         Tables
                                     </p>
                                 </a>

                             </li>
                         <?php  } ?>
                         <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
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
                                <a href="table.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DataTables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/jsgrid.html" class="nav-link">
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

         <!-- Main Sidebar Container -->


         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1><i class="fa fa-product-hunt" aria-hidden="true"> Upload Catalog</i></h1>
                         </div>
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                 <!-- <li class="breadcrumb-item"><a href="home.php">Home</a></li> -->
                                 <li class="breadcrumb-item active">Catalog Upload</li>
                             </ol>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-md-6">
                             <!-- Buttons with Icons -->
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">Have unique Product Sell ?</h3>
                                 </div>
                                 <div class="card-body row">
                                     <div class="col-md-6">
                                         <a href="addsinglecatlog.php">
                                             <button type="button" class="btn btn-default btn-block">Add Single Catalog</button>
                                             <!-- <button type="button" class="btn btn-primary btn-block">Add Single Catalog</button> -->
                                         </a>
                                     </div>
                                     <div class="col-md-6">
                                         <!-- <button type="button" class="btn btn-default btn-block">Add Catalog in Bulk</button> -->
                                         <a href="addbulkcatlog.php">
                                             <button type="button" class="btn btn-primary btn-block">Add Catalog in Bulk</button>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>


                     <!-- /.row -->
                 </div>
                 <!-- /.container-fluid -->
             </section>
             <!-- /.table  -->
             <section class="content">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="card col-md-12">
                             <div class="card-header">
                                 <h3 class="card-title">DataTable with default features</h3>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>ID</th>
                                             <th>CATEGORIES</th>
                                             <th>SUB_SCATEGORIES</th>
                                             <th style="width: 250px;">NAME</th>
                                             <th>IMAGE</th>
                                             <th>PRICE</th>
                                             <th>QTY</th>
                                             <th>STATUS</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                             <tr>
                                                 <td><?php echo $row['id'] ?></td>
                                                 <td><?php echo $row['category'] ?></td>
                                                 <td><?php echo $row['subcategory'] ?></td>
                                                 <td><?php echo $row['product_name'] ?></td>
                                                 <td class="img"><img src="media/product/<?php echo $row['image'] ?>"></td>
                                                 <td><?php echo $row['seller_price'] ?></td>
                                                 <td><?php echo $row['product_quantity'] ?><br>
                                             </tr>
                                         <?php } ?>
                                     </tbody>

                                 </table>
                             </div>
                             <!-- /.card-body -->
                         </div>
                     </div>
                 </div>
             </section>
             <!-- /.content-wrapper -->
             <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer> -->

             <!-- Control Sidebar -->
             <aside class="control-sidebar control-sidebar-dark">
                 <!-- Control sidebar content goes here -->
             </aside>
             <!-- /.control-sidebar -->
         </div>

         <!-- ./wrapper -->

         <!-- jQuery -->
         <script src="../plugins/jquery/jquery.min.js"></script>
         <!-- jQuery UI 1.11.4 -->
         <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
         <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
         <script>
             $.widget.bridge('uibutton', $.ui.button)
         </script>
         <!-- Bootstrap 4 -->
         <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- ChartJS -->
         <script src="../plugins/chart.js/Chart.min.js"></script>
         <!-- Sparkline -->
         <script src="../plugins/sparklines/sparkline.js"></script>
         <!-- JQVMap -->
         <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
         <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
         <!-- jQuery Knob Chart -->
         <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
         <!-- daterangepicker -->
         <script src="../plugins/moment/moment.min.js"></script>
         <script src="../plugins/daterangepicker/daterangepicker.js"></script>
         <!-- Tempusdominus Bootstrap 4 -->
         <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
         <!-- Summernote -->
         <script src="../plugins/summernote/summernote-bs4.min.js"></script>
         <!-- overlayScrollbars -->
         <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
         <!-- AdminLTE App -->
         <script src="../dist/js/adminlte.js"></script>
         <!-- AdminLTE for demo purposes -->
         <script src="../dist/js/demo.js"></script>
         <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
         <script src="../dist/js/pages/dashboard.js"></script>

         <!-- jQuery -->
         <script src="../plugins/jquery/jquery.min.js"></script>
         <!-- Bootstrap 4 -->
         <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- DataTables  & ../Plugins -->
         <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
         <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
         <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
         <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
         <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
         <script src="../plugins/jszip/jszip.min.js"></script>
         <script src="../plugins/pdfmake/pdfmake.min.js"></script>
         <script src="../plugins/pdfmake/vfs_fonts.js"></script>
         <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
         <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
         <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
         <!-- AdminLTE App -->
         <script src="dist/js/adminlte.min.js"></script>
         <!-- AdminLTE for demo purposes -->
         <script src="dist/js/demo.js"></script>
         <!-- Page specific script -->
         <script>
             $(function() {
                 $("#example1").DataTable({
                     "responsive": true,
                     "lengthChange": false,
                     "autoWidth": false,
                     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                 }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                 $('#example2').DataTable({
                     "paging": true,
                     "lengthChange": false,
                     "searching": false,
                     "ordering": true,
                     "info": true,
                     "autoWidth": false,
                     "responsive": true,
                 });
             })
         </script>
 </body>

 </html>


 <section class="content">
     <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="body m-5">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card card-default">
                         <div class="card-header">

                             <h2 class="card-title">ADD Single Category</h2>
                         </div>
                         <div class="card-body p-0">
                             <form action="" method="post" ">
                                        <div class=" bs-stepper">

                                 <div class="bs-stepper-header" role="tablist">
                                     <!-- your steps here -->
                                     <div class="step" data-target="#logins-part">
                                         <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                             <span class="bs-stepper-circle">1</span>
                                             <span class="bs-stepper-label">Select Category </span>
                                         </button>
                                     </div>
                                     <div class="line"></div>
                                     <div class="step" data-target="#information-part">
                                         <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                             <span class="bs-stepper-circle">2</span>
                                             <span class="bs-stepper-label">Category Details </span>
                                         </button>
                                     </div>
                                 </div>
                                 <div class="bs-stepper-content">
                                     <!-- your steps content here -->
                                     <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">


                                         <div class="form-group">
                                             <label>Select Category</label>
                                             <select class="form-control select2" name="category" style="width: 100%;" onchange="showSubcategoryBox(this.value)">
                                                 <option>select</option>
                                                 <?php
                                                    $sql = mysqli_query($con, "SELECT * from categories where status='1'");

                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                     <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                 <?php
                                                    }
                                                    ?>

                                             </select>
                                         </div>
                                         <div id="subcategoryBox" style="display: no;" class="form-group">
                                             <label>Select Sub Category</label>
                                             <select class="form-control select2" name="subcategory" style="width: 100%;" id="subcategorySelect">
                                                 <!-- Subcategory options will be dynamically added here -->
                                             </select>
                                         </div>
                                         <script>
                                             function showSubcategoryBox(category_id) {
                                                 if (category_id === 'select') {
                                                     // If the 'select' option is chosen, hide the subcategory box
                                                     document.getElementById("subcategoryBox").style.display = "none";
                                                 } else {
                                                     // Show the subcategory box and load the subcategories for the selected category
                                                     document.getElementById("subcategoryBox").style.display = "block";
                                                     loadSubcategories(category_id);
                                                 }
                                             }

                                             function loadSubcategories(category_id) {
                                                 $.ajax({
                                                     url: 'fetch_subcategories.php',
                                                     method: 'POST',
                                                     data: {
                                                         category_id: category_id
                                                     },
                                                     success: function(response) {
                                                         var subcategories = JSON.parse(response);

                                                         var subcategorySelect = document.getElementById("subcategorySelect");
                                                         subcategorySelect.innerHTML = '';

                                                         subcategories.forEach(function(subcategory) {
                                                             var option = document.createElement('option');
                                                             option.value = subcategory.id;
                                                             option.text = subcategory.name;
                                                             subcategorySelect.appendChild(option);
                                                         });
                                                     },
                                                     error: function() {
                                                         console.log('Error occurred while fetching subcategories.');
                                                     }
                                                 });
                                             }
                                         </script>
                                         <div class="form-group">
                                             <label for="exampleInputFile">File input</label>
                                             <div class="input-group">
                                                 <div class="custom-file">
                                                     <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                 </div>
                                                 <div class="input-group-append">
                                                     <span class="input-group-text">Upload</span>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- <button class="btn btn-primary" onclick="stepper.next()">Next</button> -->
                                         <button id="nextButtonStep1" class="btn btn-primary">Next</button>
                                     </div>
                                     <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                         <div class=" card-warning">
                                             <div class="card-header">
                                                 <h3 class="card-title">Product Details</h3>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">
                                                 <!-- <form method="get" action="" id="myForm"> -->
                                                 <div class="row">
                                                     <div class="col-sm-6">
                                                         <!-- text input -->
                                                         <div class="form-group">
                                                             <label>Seller Price</label>
                                                             <input type="number" name="seller_price" class="form-control no-spinner" placeholder=" Price Enter ...">
                                                             <p></p>
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-6">
                                                         <div class="form-group">
                                                             <label>Worng/Defective Return Price</label>
                                                             <input type="number" name="return_price" class="form-control no-spinner" placeholder="Enter ...">
                                                             <p></p>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row">
                                                     <div class="col-sm-3">

                                                         <div class="form-group">
                                                             <div class="form-group">
                                                                 <label>Product Name</label>
                                                                 <input type="text" name="product_name" class="form-control no-spinner" placeholder=" Price Enter ...">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-3">
                                                         <div class="form-group">
                                                             <label>Net Weight(gms) </label>
                                                             <input type="number" name="product_weight" class="form-control no-spinner" placeholder=" Weight Enter ...">

                                                         </div>
                                                     </div>
                                                     <div class="col-sm-6">
                                                         <div class="form-group">
                                                             <label>Sizes (maltipal select )</label>
                                                             <select class="select2" multiple="multiple" name="sizes[]" data-placeholder="Select a State" style="width: 100%;">
                                                                 <option>xs</option>
                                                                 <option>S</option>
                                                                 <option>M</option>
                                                                 <option>L</option>
                                                                 <option>XL</option>
                                                                 <option>XXL</option>
                                                                 <option>XXXL</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="row">


                                                     <div class="col-sm-6">
                                                         <div class="form-group">
                                                             <label>Product Details</label>
                                                             <textarea class="form-control" name="product_details" rows="1" placeholder="Enter ..."></textarea>

                                                         </div>
                                                     </div>

                                                 </div>
                                                 <div class="row">
                                                     <div class="col-sm-6">
                                                         <div class="form-group">
                                                             <label> Manufacturer Details</label>
                                                             <textarea class="form-control" name="manufacturer_details" rows="1" placeholder="Enter ..."></textarea>

                                                         </div>
                                                     </div>
                                                     <div class="col-sm-3">
                                                         <div class="form-group">
                                                             <label> Product quantity</label>
                                                             <input type="number" name="product_quantity" class="form-control no-spinner" placeholder="Enter ...">


                                                         </div>
                                                     </div>
                                                 </div>

                                                 <!-- /.card-body -->
                                                 <!-- <button class="btn btn-primary"
                                                    onclick="stepper.previous()">Previous</button> -->
                                                 <button id="prevButtonStep2" class="btn btn-primary">Previous</button>
                                                 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <!-- /.card-body -->

                     </div>
                     <!-- /.card -->
                 </div>
             </div>
         </div>

     </div>
 </section>

 <section class="content">
     <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
         <div class="body m-5">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card card-default">
                         <div class="card-body p-0">

                             <?php
                                if (isset($_GET['id'])) {
                                    $id = mysqli_real_escape_string($con, $_GET['id']);
                                    $quary = "SELECT * FROM addsinglecategory WHERE id='$id'";
                                    $quary_run = mysqli_query($con, $quary);

                                    if (mysqli_num_rows($quary_run) > 0) {
                                        $row = mysqli_fetch_array($quary_run);
                                        // print_r($row);
                                ?>

                                     <form action="" method="POST">
                                         <div class="bs-stepper">

                                             <div class="bs-stepper-header" role="tablist">
                                                 <!-- your steps here -->
                                                 <div class="step" data-target="#logins-part">
                                                     <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                         <span class="bs-stepper-circle">1</span>
                                                         <span class="bs-stepper-label">Select Category </span>
                                                     </button>
                                                 </div>
                                                 <div class="line"></div>
                                                 <div class="step" data-target="#information-part">
                                                     <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                         <span class="bs-stepper-circle">2</span>
                                                         <span class="bs-stepper-label">Category Details </span>
                                                     </button>
                                                 </div>
                                             </div>
                                             <div class="bs-stepper-content">
                                                 <!-- your steps content here -->
                                                 <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                     <div class="form-group">
                                                         <label>Select Category</label>
                                                         <select class="form-control select2" name="category" style="width: 100%;" onchange="showSubcategoryBox(this.value)">
                                                             <option>select</option>
                                                             <?php
                                                                $sql = mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
                                                                while ($category = mysqli_fetch_assoc($sql)) {
                                                                    $categoryID = $category['id'];
                                                                    $categoryName = $category['name'];
                                                                    $selected = ($categoryID == $row['category']) ? "selected" : ""; // Check if the option value matches the stored category value
                                                                    echo "<option value='$categoryID' $selected>$categoryName</option>";
                                                                }
                                                                ?>
                                                         </select>

                                                     </div>
                                                     <div id="subcategoryBox" style="display: no;" class="form-group">
                                                         <label>Select Sub Category</label>
                                                         <select class="form-control select2" name="subcategory" value="<?= $row['subcategory']; ?>" style="width: 100%;" id="subcategorySelect">
                                                             <!-- Subcategory options will be dynamically added here -->
                                                         </select>
                                                     </div>
                                                     <script>
                                                         function showSubcategoryBox(category_id) {
                                                             if (category_id === 'select') {
                                                                 // If the 'select' option is chosen, hide the subcategory box
                                                                 document.getElementById("subcategoryBox").style.display = "none";
                                                             } else {
                                                                 // Show the subcategory box and load the subcategories for the selected category
                                                                 document.getElementById("subcategoryBox").style.display = "block";
                                                                 loadSubcategories(category_id);
                                                             }
                                                         }

                                                         function loadSubcategories(category_id) {
                                                             $.ajax({
                                                                 url: 'fetch_subcategories.php',
                                                                 method: 'POST',
                                                                 data: {
                                                                     category_id: category_id
                                                                 },
                                                                 success: function(response) {
                                                                     var subcategories = JSON.parse(response);

                                                                     var subcategorySelect = document.getElementById("subcategorySelect");
                                                                     subcategorySelect.innerHTML = '';

                                                                     subcategories.forEach(function(subcategory) {
                                                                         var option = document.createElement('option');
                                                                         option.value = subcategory.id;
                                                                         option.text = subcategory.name;
                                                                         subcategorySelect.appendChild(option);
                                                                     });
                                                                 },
                                                                 error: function() {
                                                                     console.log('Error occurred while fetching subcategories.');
                                                                 }
                                                             });
                                                         }
                                                     </script>
                                                     <div class="form-group">
                                                         <label for="exampleInputFile">File input</label>
                                                         <div class="input-group">
                                                             <div class="custom-file">
                                                                 <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                                 <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                             </div>
                                                             <div class="input-group-append">
                                                                 <span class="input-group-text">Upload</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <!-- <button class="btn btn-primary" onclick="stepper.next()">Next</button> -->
                                                     <button id="nextButtonStep1" class="btn btn-primary">Next</button>
                                                 </div>
                                                 <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                     <div class=" card-warning">
                                                         <div class="card-header">
                                                             <h3 class="card-title">Product Details</h3>
                                                         </div>
                                                         <!-- /.card-header -->
                                                         <div class="card-body">
                                                             <!-- <form method="get" action=""> -->
                                                             <div class="row">
                                                                 <div class="col-sm-6">
                                                                     <!-- text input -->
                                                                     <div class="form-group">
                                                                         <label>Seller Price</label>
                                                                         <input type="number" name="seller_price" value="<?php echo $row['seller_price']; ?>" class="form-control no-spinner">
                                                                         <p></p>
                                                                     </div>

                                                                 </div>
                                                                 <div class="col-sm-6">
                                                                     <div class="form-group">
                                                                         <label>Worng/Defective Return Price</label>
                                                                         <input type="number" name="return_price" value="<?php echo $row['return_price']; ?>" class="form-control no-spinner" ">
                                                                                <p></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" row">
                                                                         <div class="col-sm-3">
                                                                             <!-- textarea -->
                                                                             <div class="form-group">
                                                                                 <div class="form-group">
                                                                                     <label>Product Name</label>
                                                                                     <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control no-spinner">
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                         <div class="col-sm-3">
                                                                             <div class="form-group">
                                                                                 <label>Net Weight(gms) </label>
                                                                                 <input type="number" name="product_weight" value="<?php echo $row['product_weight']; ?>" class="form-control no-spinner">

                                                                             </div>
                                                                         </div>
                                                                         <div class="col-sm-6">
                                                                             <div class="form-group">
                                                                                 <label>Sizes (maltipal select )</label>
                                                                                 <select class="select2" multiple="multiple" name="sizes[]" data-placeholder="Select a State" style="width: 100%;">
                                                                                     <option value="xs" <?= (is_array($row['sizes']) && in_array('xs', $row['sizes'])) ? 'selected' : ''; ?>>xs</option>
                                                                                     <option value="S" <?= (is_array($row['sizes']) && in_array('S', $row['sizes'])) ? 'selected' : ''; ?>>S</option>
                                                                                     <option value="M" <?= (is_array($row['sizes']) && in_array('M', $row['sizes'])) ? 'selected' : ''; ?>>M</option>
                                                                                     <option value="L" <?= (is_array($row['sizes']) && in_array('L', $row['sizes'])) ? 'selected' : ''; ?>>L</option>
                                                                                     <option value="XL" <?= (is_array($row['sizes']) && in_array('XL', $row['sizes'])) ? 'selected' : ''; ?>>XL</option>
                                                                                     <option value="XXL" <?= (is_array($row['sizes']) && in_array('XXL', $row['sizes'])) ? 'selected' : ''; ?>>XXL</option>
                                                                                     <option value="XXXL" <?= (is_array($row['sizes']) && in_array('XXXL', $row['sizes'])) ? 'selected' : ''; ?>>XXXL</option>
                                                                                 </select>


                                                                             </div>
                                                                         </div>

                                                                         <div class="row">


                                                                             <div class="col-sm-6">
                                                                                 <div class="form-group">
                                                                                     <label>Product Details</label>
                                                                                     <textarea class="form-control" name="product_details" rows="1"><?= $row['product_details']; ?></textarea>
                                                                                 </div>
                                                                             </div>

                                                                         </div>
                                                                         <div class="row">
                                                                             <div class="col-sm-6">
                                                                                 <div class="form-group">
                                                                                     <label>Manufacturer Details</label>
                                                                                     <textarea class="form-control" name="manufacturer_details" rows="1"><?= $row['manufacturer_details']; ?></textarea>
                                                                                 </div>
                                                                             </div>
                                                                             <div class="col-sm-3">
                                                                                 <div class="form-group">
                                                                                     <label>Product Quantity</label>
                                                                                     <input type="number" name="product_quantity" value="<?= $row['product_quantity']; ?>" class="form-control no-spinner">
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                     <!-- <button class="btn btn-primary"
                                                             onclick="stepper.previous()">Previous</button> -->
                                                                     <button id="prevButtonStep2" class="btn btn-primary">Previous</button>
                                                                     <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                     </form>
                             <?php

                                    } else {

                                        echo "<h1>no record found </h1>";
                                    }
                                }

                                ?>
                         </div>
                         <!-- /.card-body -->

                     </div>
                     <!-- /.card -->
                 </div>
             </div>



         </div>
     </div>
 </section>

 <a href="addsinglecatlog_edit.php?id=<?php echo $row['id']; ?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
 <a href="?id=<?php echo $i ?>&type=delete"><label class="badge badge-danger delete_red">Delete</label></a> <?php

                                                                                                            //                     } else {
                                                                                                            //                         echo "<h1>No record found.</h1>";
                                                                                                            //                     }
                                                                                                            //                 }
                                                                                                            // // 
                                                                                                            ?> <?php
                                                                                                                //                 if (isset($_GET['p_id'])) {
                                                                                                                //                     $p_id = mysqli_real_escape_string($con, $_GET['p_id']);
                                                                                                                //                     $quary = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
                                                                                                                //                     $quary_run = mysqli_query($con, $quary);

                                                                                                                //                     if (mysqli_num_rows($quary_run) > 0) {
                                                                                                                //                         $row = mysqli_fetch_array($quary_run);
                                                                                                                //                 
                                                                                                                ?> <form action="" method="POST">
     <div class="bs-stepper">
         <div class="bs-stepper-header" role="tablist">
             <!-- your steps here -->
             <div class="step" data-target="#logins-part">
                 <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                     <span class="bs-stepper-circle">1</span>
                     <span class="bs-stepper-label">Select Category</span>
                 </button>
             </div>
             <div class="line"></div>
             <div class="step" data-target="#information-part">
                 <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                     <span class="bs-stepper-circle">2</span>
                     <span class="bs-stepper-label">Category Details</span>
                 </button>
             </div>
         </div>
         <div class="bs-stepper-content">

             <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                 <div class="form-group">
                     <label>Select Category</label>
                     <select class="form-control select2" name="category" style="width: 100%;" onchange="showSubcategoryBox(this.value)">
                         <option>select</option>
                         <?php
                            $sql = mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
                            while ($category = mysqli_fetch_assoc($sql)) {
                                $categoryID = $category['id'];
                                $categoryName = $category['name'];
                                $selected = ($categoryID == $row['category']) ? "selected" : ""; // Check if the option value matches the stored category value
                                echo "<option value='$categoryID' $selected>$categoryName</option>";
                            }
                            ?>
                     </select>
                 </div>
                 <div id="subcategoryBox" style="display: none;" class="form-group">
                     <label>Select Sub Category</label>
                     <select class="form-control select2" name="subcategory" value="<?= $row['subcategory']; ?>" style="width: 100%;" id="subcategorySelect">
                         <!-- Subcategory options will be dynamically added here -->
                     </select>
                 </div>
                 <script>
                     function showSubcategoryBox(category_id) {
                         if (category_id === 'select') {
                             // If the 'select' option is chosen, hide the subcategory box
                             document.getElementById("subcategoryBox").style.display = "none";
                         } else {
                             // Show the subcategory box and load the subcategories for the selected category
                             document.getElementById("subcategoryBox").style.display = "block";
                             loadSubcategories(category_id);
                         }
                     }

                     function loadSubcategories(category_id) {
                         $.ajax({
                             url: 'fetch_subcategories.php',
                             method: 'POST',
                             data: {
                                 category_id: category_id
                             },
                             success: function(response) {
                                 var subcategories = JSON.parse(response);

                                 var subcategorySelect = document.getElementById("subcategorySelect");
                                 subcategorySelect.innerHTML = '';

                                 subcategories.forEach(function(subcategory) {
                                     var option = document.createElement('option');
                                     option.value = subcategory.id;
                                     option.text = subcategory.name;
                                     subcategorySelect.appendChild(option);
                                 });
                             },
                             error: function() {
                                 console.log('Error occurred while fetching subcategories.');
                             }
                         });
                     }
                 </script>
                 <div class="form-group">
                     <label for="exampleInputFile">File input</label>
                     <div class="input-group">
                         <div class="custom-file">
                             <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                             <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                         </div>
                         <div class="input-group-append">
                             <span class="input-group-text">Upload</span>
                         </div>
                     </div>
                 </div>
                 <button id="nextButtonStep1" class="btn btn-primary">Next</button>
             </div>
             <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                 <div class="card-warning">
                     <div class="card-header">
                         <h3 class="card-title">Product Details</h3>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Seller Price</label>
                                     <input type="number" name="seller_price" value="<?php echo $row['seller_price']; ?>" class="form-control no-spinner">
                                     <p></p>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Wrong/Defective Return Price</label>
                                     <input type="number" name="return_price" value="<?php echo $row['return_price']; ?>" class="form-control no-spinner">
                                     <p></p>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <div class="form-group">
                                         <label>Product Name</label>
                                         <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control no-spinner">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <label>Net Weight(gms)</label>
                                     <input type="number" name="product_weight" value="<?php echo $row['product_weight']; ?>" class="form-control no-spinner">
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Sizes (multiple select)</label>
                                     <select class="select2" multiple="multiple" name="sizes[]" data-placeholder="Select a State" style="width: 100%;">
                                         <option value="xs" <?= (is_array($row['sizes']) && in_array('xs', $row['sizes'])) ? 'selected' : ''; ?>>xs</option>
                                         <option value="S" <?= (is_array($row['sizes']) && in_array('S', $row['sizes'])) ? 'selected' : ''; ?>>S</option>
                                         <option value="M" <?= (is_array($row['sizes']) && in_array('M', $row['sizes'])) ? 'selected' : ''; ?>>M</option>
                                         <option value="L" <?= (is_array($row['sizes']) && in_array('L', $row['sizes'])) ? 'selected' : ''; ?>>L</option>
                                         <option value="XL" <?= (is_array($row['sizes']) && in_array('XL', $row['sizes'])) ? 'selected' : ''; ?>>XL</option>
                                         <option value="XXL" <?= (is_array($row['sizes']) && in_array('XXL', $row['sizes'])) ? 'selected' : ''; ?>>XXL</option>
                                         <option value="XXXL" <?= (is_array($row['sizes']) && in_array('XXXL', $row['sizes'])) ? 'selected' : ''; ?>>XXXL</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Product Details</label>
                                     <textarea class="form-control" name="product_details" rows="1"><?= $row['product_details']; ?></textarea>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <label>Manufacturer Details</label>
                                     <textarea class="form-control" name="manufacturer_details" rows="1"><?= $row['manufacturer_details']; ?></textarea>
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <label>Product Quantity</label>
                                     <input type="number" name="product_quantity" value="<?= $row['product_quantity']; ?>" class="form-control no-spinner">
                                 </div>
                             </div>
                         </div>
                         <button id="prevButtonStep2" class="btn btn-primary">Previous</button>
                         <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
                     </div>
                 </div>
             </div>
         </div>
 </form>

 <?php

    //     } else {
    //         echo "<h1>No record found.</h1>";
    //     }
    // }
    ?> <?php
        // if (isset($_GET['p_id'])) {
        //     $p_id = mysqli_real_escape_string($con, $_GET['p_id']);
        //     $quary = "SELECT * FROM addsinglecategory WHERE id='$p_id' LIMIT 1";
        //     $quary_run = mysqli_query($con, $quary);
        //     print_r(' $quary_run ');
        //     if (mysqli_num_rows($quary_run) > 0) {
        //         $row = mysqli_fetch_array($quary_run);
        // 
        ?><?php
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
                    <img src="https://sms.inspiresoftware.co.in/salary/images/user.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        
        
                    <span class="brand-text font-weight-light">Inspire Software</span>
                </a>
        
                <!-- Sidebar -->
                <div class="sidebar">
        
                    <!--  -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="https://sms.inspiresoftware.co.in/salary/images/user.jpg" class="img-circle elevation-2" alt="User Image">
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
                            <li class="nav-item menu-open">
                                <a href="./home.php" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php if ($_SESSION['adminrole'] == 1) : ?>
                                    <a href="././order_vendor.php" class="nav-link">
                                        <i class="nav-icon fas fa-cart-plus"></i>
                                        <p>
                                            Order
                                        </p>
                                    </a>
                                <?php endif; ?>
                            </li>
                            <?php if ($_SESSION['adminrole'] == 1) : ?>
                                <li class="nav-item">
                                    <a href="./cat.php" class="nav-link">
                                        <i class='nav-icon fas fa-upload'></i>
                                        <p>
                                            Catalog Upload
                                        </p>
                                    </a>
                                </li>
        
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="./category.php" class="nav-link">
                                        <i class='nav-icon fas fa-upload'></i>
                                        <p>
                                            Category
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./subcategory.php" class="nav-link">
                                        <i class='nav-icon fas fa-upload'></i>
                                        <p>
                                            Sub Category
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allproduct.php" class="nav-link">
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
                                <li class="nav-item">
                                    <a href="./table.php" class="nav-link">
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



        <?php
// Retrieve the category_id and subcategory_id from the AJAX request
$category_id = $_POST['category_id'];
$subcategory_id = $_POST['subcategory_id'];

// Implement your database update operation here based on the category_id and subcategory_id

// Fetch the updated subcategory options based on the category_id
$subcategories = fetchSubcategories($category_id);

// Generate the HTML options for the subcategories
$options = '';
foreach ($subcategories as $subcategory) {
    $selected = ($subcategory['id'] == $subcategory_id) ? "selected" : "";
    $options .= "<option value='{$subcategory['id']}' $selected>{$subcategory['name']}</option>";
}

// Send the HTML options back as the response
echo $options;

// Function to fetch subcategories from the database based on the category_id
function fetchSubcategories($category_id) {
    // Implement your database query here to fetch subcategories based on the category_id
    // Return the fetched subcategories as an array
    // Example:
    $subcategories = [
        ['id' => 1, 'name' => 'Subcategory 1'],
        ['id' => 2, 'name' => 'Subcategory 2'],
        ['id' => 3, 'name' => 'Subcategory 3']
    ];

    return $subcategories;
}
?> 

<?php
include_once 'database/dbcon.php';


session_start();

if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD Single Catlog Edit </title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="image/favicon.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!-- hold-transition register-page -->
<style>
    .no-spinner::-webkit-inner-spin-button,
    .no-spinner::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .select-checkbox {
        position: relative;
    }

    .checkboxes {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

<body>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="body m-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title">ADD Single Category</h2>
                            </div>
                            <div class="card-body p-0">
                                <?php
                                if (isset($_GET['id'])) {
                                    $p_id = mysqli_real_escape_string($con, $_GET['id']);
                                    $quary = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
                                    $quary_run = mysqli_query($con, $quary);

                                    if (mysqli_num_rows($quary_run) > 0) {
                                        $row = mysqli_fetch_array($quary_run);
                                ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="bs-stepper">
                                                <div class="bs-stepper-header" role="tablist">
                                                    <!-- your steps here -->
                                                    <div class="step" data-target="#logins-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                            <span class="bs-stepper-circle">1</span>
                                                            <span class="bs-stepper-label">Select Category</span>
                                                        </button>
                                                    </div>
                                                    <div class="line"></div>
                                                    <div class="step" data-target="#information-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                            <span class="bs-stepper-circle">2</span>
                                                            <span class="bs-stepper-label">Category Details</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content">
                                                    <!-- your steps content here -->
                                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                        <div class="form-group">
                                                            <label>Select Category</label>
                                                            <select class="form-control select2" name="category" style="width: 100%;" onchange="showSubcategoryBox(this.value)">
                                                                <option>select</option>
                                                                <?php
                                                                $sql = mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
                                                                while ($category = mysqli_fetch_assoc($sql)) {
                                                                    $categoryID = $category['id'];
                                                                    $categoryName = $category['category_name'];
                                                                    $selected = ($categoryID == $row['category']) ? "selected" : ""; // Check if the option value matches the stored category value
                                                                    echo "<option value='$categoryID' $selected>$categoryName</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div id="subcategoryBox" class=" form-group">
                                                            <label>Select Sub Category</label>
                                                            <select class="form-control select2" name="subcategory" value="<?= $row['subcategory']; ?>" style="width: 100%;" id="subcategorySelect">
                                                                <!-- Subcategory options will be dynamically added here -->
                                                            </select>
                                                        </div>
                                                        <script>
                                                            function showSubcategoryBox(category_id) {
                                                                if (category_id === 'select') {
                                                                    // If the 'select' option is chosen, hide the subcategory box
                                                                    document.getElementById("subcategoryBox").style.display = "none";
                                                                } else {
                                                                    // Show the subcategory box and load the subcategories for the selected category
                                                                    document.getElementById("subcategoryBox").style.display = "block";
                                                                    loadSubcategories(category_id);
                                                                }
                                                            }

                                                            function loadSubcategories(category_id) {
                                                                $.ajax({
                                                                    url: 'fetch_subcategories.php',
                                                                    method: 'POST',
                                                                    data: {
                                                                        category_id: category_id
                                                                    },
                                                                    success: function(response) {
                                                                        var subcategories = JSON.parse(response);

                                                                        var subcategorySelect = document.getElementById("subcategorySelect");
                                                                        subcategorySelect.innerHTML = '';

                                                                        subcategories.forEach(function(subcategory) {
                                                                            var option = document.createElement('option');
                                                                            option.value = subcategory.id;
                                                                            option.text = subcategory.name;
                                                                            subcategorySelect.appendChild(option);
                                                                        });
                                                                    },
                                                                    error: function() {
                                                                        console.log('Error occurred while fetching subcategories.');
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File input</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="imageupload" class="custom-file-input" id="exampleInputFile">
                                                                    <input type="hidden" name="imageupload_old" class="custom-file-input" value="<?php echo $row['p_image']; ?>" id="exampleInputFile">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button id="nextButtonStep1" class="btn btn-primary">Next</button>
                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                        <div class="card-warning">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Product Details</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Seller Price</label>
                                                                            <input type="number" name="seller_price" value="<?php echo $row['seller_price']; ?>" class="form-control no-spinner">
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Wrong/Defective Return Price</label>
                                                                            <input type="number" name="return_price" value="<?php echo $row['return_price']; ?>" class="form-control no-spinner">
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-group">
                                                                                <label>Product Name</label>
                                                                                <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control no-spinner">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Net Weight(gms)</label>
                                                                            <input type="number" name="product_weight" value="<?php echo $row['product_weight']; ?>" class="form-control no-spinner">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Sizes (multiple select)</label>
                                                                            <select class="select2" multiple="multiple" name="sizes[]" data-placeholder="Select a State" style="width: 100%;">
                                                                                <option value="xs" <?= (is_array($row['sizes']) && in_array('xs', $row['sizes'])) ? 'selected' : ''; ?>>xs</option>
                                                                                <option value="S" <?= (is_array($row['sizes']) && in_array('S', $row['sizes'])) ? 'selected' : ''; ?>>S</option>
                                                                                <option value="M" <?= (is_array($row['sizes']) && in_array('M', $row['sizes'])) ? 'selected' : ''; ?>>M</option>
                                                                                <option value="L" <?= (is_array($row['sizes']) && in_array('L', $row['sizes'])) ? 'selected' : ''; ?>>L</option>
                                                                                <option value="XL" <?= (is_array($row['sizes']) && in_array('XL', $row['sizes'])) ? 'selected' : ''; ?>>XL</option>
                                                                                <option value="XXL" <?= (is_array($row['sizes']) && in_array('XXL', $row['sizes'])) ? 'selected' : ''; ?>>XXL</option>
                                                                                <option value="XXXL" <?= (is_array($row['sizes']) && in_array('XXXL', $row['sizes'])) ? 'selected' : ''; ?>>XXXL</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Product Details</label>
                                                                            <textarea class="form-control" name="product_details" rows="1"><?= $row['product_details']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Manufacturer Details</label>
                                                                            <textarea class="form-control" name="manufacturer_details" rows="1"><?= $row['manufacturer_details']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Product Quantity</label>
                                                                            <input type="number" name="product_quantity" value="<?= $row['product_quantity']; ?>" class="form-control no-spinner">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button id="prevButtonStep2" class="btn btn-primary">Previous</button>
                                                                <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                            </div>
                        </div>
                <?php

                                    } else {
                                        echo "<h1>No record found.</h1>";
                                    }
                                }
                ?>
                    </div>
                </div>
    </section>





    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        // Handle the Next button click event in Step 1
        document.getElementById('nextButtonStep1').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.next(); // Go to the next step
        });

        // Handle the Previous button click event in Step 2
        document.getElementById('prevButtonStep2').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.previous(); // Go to the previous step
        });
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

</body>

</html>

<?php

if (isset($_GET['id'])) {
    $p_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_array($query_run);
        // print_r($row);

        if (isset($_POST['update'])) {
            // Retrieve form data
            $category = mysqli_real_escape_string($con, $_POST['category']);
            $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);
            $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
            $seller_price = mysqli_real_escape_string($con, $_POST['seller_price']);
            $return_price = mysqli_real_escape_string($con, $_POST['return_price']);
            $product_quantity = mysqli_real_escape_string($con, $_POST['product_quantity']);
            $product_weight = mysqli_real_escape_string($con, $_POST['product_weight']);
            $sizes = $_POST['sizes'];
            $sizesString = implode(',', $sizes);
            $product_details = mysqli_real_escape_string($con, $_POST['product_details']);
            $manufacturer_details = mysqli_real_escape_string($con, $_POST['manufacturer_details']);

            // Update the database
            $update_query = "UPDATE addsinglecategory SET  category='$category', subcategory='$subcategory',  product_name='$product_name',seller_price='$seller_price', return_price='$return_price', product_weight='$product_weight',  sizes='$sizesString', product_details='$product_details', manufacturer_details='$manufacturer_details', product_quantity='$product_quantity' WHERE p_id='$p_id'";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                echo "Data updated successfully!";
?>
                <script>
                    window.location.href = "cat.php";
                </script>

<?php

            } else {
                echo "Failed to update data.";
                // Handle the update failure
            }
        }
    } else {
        echo "<h1>No record found</h1>";
    }
}
?>



<?php

use Stripe\Terminal\Location;

include_once 'database/dbcon.php';


session_start();

if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD Single Catlog Edit </title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="image/favicon.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!-- hold-transition register-page -->
<style>
    .no-spinner::-webkit-inner-spin-button,
    .no-spinner::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .select-checkbox {
        position: relative;
    }

    .checkboxes {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

<body>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="body m-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title">ADD Single Category</h2>
                            </div>
                            <div class="card-body p-0">
                                <?php
                                if (isset($_GET['id'])) {
                                    $p_id = mysqli_real_escape_string($con, $_GET['id']);
                                    $quary = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
                                    $quary_run = mysqli_query($con, $quary);

                                    if (mysqli_num_rows($quary_run) > 0) {
                                        $row = mysqli_fetch_array($quary_run);
                                ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="product_id" value="<?= $row['p_id']; ?>">

                                            <div class="bs-stepper">
                                                <div class="bs-stepper-header" role="tablist">
                                                    <!-- your steps here -->
                                                    <div class="step" data-target="#logins-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                            <span class="bs-stepper-circle">1</span>
                                                            <span class="bs-stepper-label">Select Category</span>
                                                        </button>
                                                    </div>
                                                    <div class="line"></div>
                                                    <div class="step" data-target="#information-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                            <span class="bs-stepper-circle">2</span>
                                                            <span class="bs-stepper-label">Category Details</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content">
                                                    <!-- your steps content here -->
                                                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                      <div class="form-group">
                                                            <label>Select Category</label>
                                                            <select class="form-control select2" name="category" style="width: 100%;" onchange="showSubcategoryBox(this.value)">
                                                                <option>select</option>
                                                                <?php
                                                                $sql = mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
                                                                while ($category = mysqli_fetch_assoc($sql)) {
                                                                    $categoryID = $category['id'];
                                                                    $categoryName = $category['category_name'];
                                                                    $selected = ($categoryID == $row['category']) ? "selected" : ""; // Check if the option value matches the stored category value
                                                                    echo "<option value='$categoryID' $selected>$categoryName</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div id="subcategoryBox" class=" form-group">
                                                            <label>Select Sub Category</label>
                                                            <select class="form-control select2" name="subcategory" value="<?= $row['subcategory']; ?>" style="width: 100%;" id="subcategorySelect">
                                                                <!-- Subcategory options will be dynamically added here -->
                                                            </select>
                                                        </div>
                                                        <script>
                                                            function showSubcategoryBox(category_id) {
                                                                if (category_id === 'select') {
                                                                    // If the 'select' option is chosen, hide the subcategory box
                                                                    document.getElementById("subcategoryBox").style.display = "none";
                                                                } else {
                                                                    // Show the subcategory box and load the subcategories for the selected category
                                                                    document.getElementById("subcategoryBox").style.display = "block";
                                                                    loadSubcategories(category_id);
                                                                }
                                                            }

                                                            function loadSubcategories(category_id) {
                                                                $.ajax({
                                                                    url: 'fetch_subcategories.php',
                                                                    method: 'POST',
                                                                    data: {
                                                                        category_id: category_id
                                                                    },
                                                                    success: function(response) {
                                                                        var subcategories = JSON.parse(response);

                                                                        var subcategorySelect = document.getElementById("subcategorySelect");
                                                                        subcategorySelect.innerHTML = '';

                                                                        subcategories.forEach(function(subcategory) {
                                                                            var option = document.createElement('option');
                                                                            option.value = subcategory.id;
                                                                            option.text = subcategory.name;
                                                                            subcategorySelect.appendChild(option);
                                                                        });
                                                                    },
                                                                    error: function() {
                                                                        console.log('Error occurred while fetching subcategories.');
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File input</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="imageupload" class="custom-file-input" id="exampleInputFile">
                                                                    <input type="hidden" name="old_upload" value="<?= $row['p_image']; ?>">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                            <img src="image/upload/<?php echo $row['p_image']; ?>" width="100px" alt="image">
                                                        </div>
                                                        <button id="nextButtonStep1" class="btn btn-primary">Next</button>
                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                        <div class="card-warning">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Product Details</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Seller Price</label>
                                                                            <input type="number" name="seller_price" value="<?php echo $row['seller_price']; ?>" class="form-control no-spinner">
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Wrong/Defective Return Price</label>
                                                                            <input type="number" name="return_price" value="<?php echo $row['return_price']; ?>" class="form-control no-spinner">
                                                                            <p></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-group">
                                                                                <label>Product Name</label>
                                                                                <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control no-spinner">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Net Weight(gms)</label>
                                                                            <input type="number" name="product_weight" value="<?php echo $row['product_weight']; ?>" class="form-control no-spinner">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div id="sizesBox" class="form-group">
                                                                            <label>Sizes (multiple select)</label>
                                                                            <select class="select2" multiple="multiple" name="sizes[]" data-placeholder="Select a State" style="width: 100%;">
                                                                                <option value="xs" <?= (is_array($row['sizes']) && in_array('xs', $row['sizes'])) ? 'selected' : ''; ?>>xs</option>
                                                                                <option value="S" <?= (is_array($row['sizes']) && in_array('S', $row['sizes'])) ? 'selected' : ''; ?>>S</option>
                                                                                <option value="M" <?= (is_array($row['sizes']) && in_array('M', $row['sizes'])) ? 'selected' : ''; ?>>M</option>
                                                                                <option value="L" <?= (is_array($row['sizes']) && in_array('L', $row['sizes'])) ? 'selected' : ''; ?>>L</option>
                                                                                <option value="XL" <?= (is_array($row['sizes']) && in_array('XL', $row['sizes'])) ? 'selected' : ''; ?>>XL</option>
                                                                                <option value="XXL" <?= (is_array($row['sizes']) && in_array('XXL', $row['sizes'])) ? 'selected' : ''; ?>>XXL</option>
                                                                                <option value="XXXL" <?= (is_array($row['sizes']) && in_array('XXXL', $row['sizes'])) ? 'selected' : ''; ?>>XXXL</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Product Details</label>
                                                                            <textarea class="form-control" name="product_details" rows="1"><?= $row['product_details']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Manufacturer Details</label>
                                                                            <textarea class="form-control" name="manufacturer_details" rows="1"><?= $row['manufacturer_details']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Product Quantity</label>
                                                                            <input type="number" name="product_quantity" value="<?= $row['product_quantity']; ?>" class="form-control no-spinner">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button id="prevButtonStep2" class="btn btn-primary">Previous</button>
                                                                <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                            </div>
                        </div>
                <?php

                                    } else {
                                        echo "<h1>No record found.</h1>";
                                    }
                                }
                ?>
                    </div>
                </div>
    </section>





    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- JQUARY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        // Handle the Next button click event in Step 1
        document.getElementById('nextButtonStep1').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.next(); // Go to the next step
        });

        // Handle the Previous button click event in Step 2
        document.getElementById('prevButtonStep2').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            window.stepper.previous(); // Go to the previous step
        });
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

</body>

</html>

<?php

if (isset($_GET['id'])) {
    $p_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM addsinglecategory WHERE p_id='$p_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_array($query_run);
        // print_r($row);

        if (isset($_POST['update'])) {
            // Retrieve form data
            $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
            $category = mysqli_real_escape_string($con, $_POST['category']);
            $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);
            $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
            $imageupload = $_FILES['imageupload']['name'];

            $seller_price = mysqli_real_escape_string($con, $_POST['seller_price']);
            $return_price = mysqli_real_escape_string($con, $_POST['return_price']);
            $product_weight = mysqli_real_escape_string($con, $_POST['product_weight']);
            $sizes = $_POST['sizes'];
            $sizesString = implode(',', $sizes);
            // $sizes = isset($_POST['sizes']) ? implode(",", $_POST['sizes']) : "N/A";

            $product_details = mysqli_real_escape_string($con, $_POST['product_details']);
            $manufacturer_details = mysqli_real_escape_string($con, $_POST['manufacturer_details']);
            $product_quantity = mysqli_real_escape_string($con, $_POST['product_quantity']);

            $old_upload = mysqli_real_escape_string($con, $_POST['old_upload']);

            if ($imageupload != '') {
                $update_filename = $_FILES['imageupload']['name'];
                $filepath = ['jpg', 'jpeg', 'png', 'ico'];

                $fileExtension = strtolower(pathinfo($imageupload, PATHINFO_EXTENSION));
                if (!in_array($fileExtension, $filepath)) {
                    echo "Invalid image file. Only JPG, JPEG, and PNG files are allowed.";
                    exit(0);
                }
            } else {
                $update_filename = $old_upload;
            }

            // Update the database

            $update_query = "UPDATE addsinglecategory SET category='$category', subcategory='$subcategory', product_name='$product_name', p_image='$update_filename', seller_price='$seller_price', return_price='$return_price', product_weight='$product_weight', sizes='$sizesString', product_details='$product_details', manufacturer_details='$manufacturer_details', product_quantity='$product_quantity' WHERE p_id='$p_id'";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                if ($imageupload != '') {
                    // move_uploaded_file($image_tmp, "image/upload/" . $imageupload);
                    move_uploaded_file($_FILES['imageupload']['tmp_name'], "image/upload/" . $update_filename);
                    if (file_exists('image/upload/' . $old_upload)) {
                        unlink('image/upload/' . $old_upload);
                    }
                }

?>
                <script>
                    window.location.href = "cat.php";
                </script>

<?php
                // header('Location: cat.php?id=' . $product_id);
                echo "Data updated  successfully!!";
            } else {
                // header('Location: cat.php?id=' . $product_id);
                echo "Failed to update data!!.";
                // Handle the update failure
            }
        }
    } else {
        echo "<h1>No record found</h1>";
    }
}
?>