<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("location:login.php");
}

require_once 'database/dbcon.php';
if (isset($_GET['permission'])) {
    
    $type = mysqli_real_escape_string($con, $_GET['permission']);
    if ($type == 'status') {
         $operation = mysqli_real_escape_string($con, $_GET['operation']);
        $p_id = mysqli_real_escape_string($con, $_GET['p_id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
       mysqli_query($con, "update addsinglecategory set status='$status' where p_id='$p_id'");
    }
    
}
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
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
    <style></style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- nav bar  -->
        <?php
        include 'include/nav.php';
        ?>

        <!-- nav bar  -->

        <!-- Main Sidebar Container -->
        <?php
        include 'include/side.php';
        ?>

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
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
                            <div class="card">

                            </div>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Product for access the admin panel</h3>
                                    
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <?php
                                        $sql = mysqli_query($con, "select * from addsinglecategory AS adsc INNER JOIN categories AS cat ON adsc.category=cat.id INNER JOIN sub_categories AS suc ON suc.id = adsc.subcategory");
                                        if (mysqli_num_rows($sql) > 0) {
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category</th>
                                                    <th>Sub category</th>
                                                    <th>Product Name</th>
                                                    <th>Product Image</th>
                                                    <th>Price</th>
                                                    <th>Permission</th>
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
                                                            <?php echo $row['category_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['subcategory_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['product_name']; ?>
                                                        </td>
                                                        <td>
                                                            <img src="../img/<?php echo $row['p_image']; ?>" width="50px" height="60px"
                                                                alt="image">
                                                        </td>
                                                        <td>
                                                            <?php echo $row['seller_price']; ?>
                                                        </td>

                                                        <td class="status">
                                                            <?php
                                                            if ($row['status'] == 1) {
                                                                echo "<span class='operate active'><a href='?permission=status&operation=deactive&p_id=" . $row['p_id'] . "'><i class='fa fa-toggle-on'></i></a></span>&nbsp;&nbsp;";
                                                            } else {
                                                                echo "<span class='operate deactive'><a href='?permission=status&operation=active&p_id=" . $row['p_id'] . "'><i class='fa fa-toggle-off'></i></a></span>&nbsp;&nbsp;";
                                                            }
                                                            // echo "<span class='badge edit'><a href='" . $row['id'] . "'><i class='fa fa-pen-to-square'></i></a></span>&nbsp;&nbsp;";
                                                           // echo "<span class='operate delete'><a href='?permission=delete&id=" . $row['id'] . "'><i class='fas fa-trash-alt' onclick ='return checkdelete()'></i></a></span>";

                                                            ?>
                                                            

                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }

                                                ?>
                                            </tbody>
                                            <?php
                                        }
                                        ?>



                                        </tr>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Category</th>
                                                <th>Sub category</th>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                                <th>Price</th>
                                                <th>Permission</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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