
    <?php
    require_once '../admin/database/dbcon.php';
    require('../inc/header.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if($id !== $_SESSION['user_id']){
            header("location: ".APPURL."");
        }
    }
    if(!isset($_SESSION['user_id'])){
        header("location :".APPURL."");
    }
    $sql = mysqli_query($con, "SELECT 
    order_detail.*,
    addsinglecategory.*,
    orders.*,
    order_status.name AS order_status,
    users.name AS user_name
FROM 
    order_detail
INNER JOIN addsinglecategory ON addsinglecategory.p_id = order_detail.product_id
INNER JOIN orders ON orders.id = order_detail.orders_id
INNER JOIN order_status ON order_status.id = orders.order_status
INNER JOIN users ON orders.user_id = users.id
WHERE user_id='$_SESSION[user_id]' Order by orders.id desc");
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Seller</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css"> -->
    <!-- <link rel="stylesheet" href="../admin/dist/css/adminlte.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
    <style></style>
</head>

<body class="hold-transition sidebar-mini">
    
    <div class="wrapper mx-5">



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-5">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2>Hello  <?php echo $_SESSION['name']?></h2>

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb ">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li> -->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php if (mysqli_num_rows($sql) > 0) : ?>
                            <div class="card">

                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Orders</h3>
                                    
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <?php
                                        
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Order Placed</th>
                                                    <th>Total</th>
                                                    <th>Address</th>
                                                    <th>Image</th>
                                                    <th>Order Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $i ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['created_at']; ?>
                                                        </td>
                                                        <td>
                                                            Rs.<?php echo $row['price']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['floor'].',';
                                                           echo $row['street'].'<br>';
                                                            echo $row['landmark'].'<br>'; 
                                                            echo $row['city'].'<br>';
                                                            echo $row['state'].'<br>';
                                                            echo $row['pincode'];?>
                                                        </td>
                                                        <td>
                                                            <img src="../img/<?php  echo $row['p_image'];?>" alt="" class="img-thumbnail" width="100px" height="100px">
                                                            
                                                        </td>
                                                        <td>
                                                            <?php echo $row['order_status']; ?>
                                                            <a href="order_details.php?id=<?php echo $row['id']?>">View order detail</a>
                                                        </td>

                                                        

                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }

                                                ?>
                                            </tbody>
                                            <?php
                                        
                                        ?>



                                        </tr>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                   <th>Id</th>
                                                    <th>Order Placed</th>
                                                    <th>Total</th>
                                                    <th>Address</th>
                                                    <th>Image</th>
                                                    <th>Order Status</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <?php else: ?>
                                <div class="alert alert-success text-white bg-success ">There are no order now</div>
                            <?php endif; ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & ../admin/plugins/ -->
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../admin/plugins/jszip/jszip.min.js"></script>
    <script src="../admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
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
        });
        //     $(document).ready(function() {
        //   setInterval(function() {
        //     $('.status').load('');
        //   }, 5000); // 5 seconds
        // });



    </script>
</body>

</html>
