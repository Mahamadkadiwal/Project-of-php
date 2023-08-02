<?php
require_once 'admin/database/dbcon.php';
include 'inc/header.php';
// session_start();
if (isset($_POST['submit'])) {
  $prod_id = $_POST['prod_id'];
  $prod_name = $_POST['prod_name'];
  $prod_image = $_POST['prod_image'];
  $prod_price = $_POST['prod_price'];
  $prod_quantity = $_POST['quantity'];
  $user_id = $_POST['user_id'];

  $sql = mysqli_query($con, "INSERT INTO `cart`( `prod_id`, `prod_name`, `prod_image`, 
      `prod_price`, `quantity`, `user_id`) VALUES ('$prod_id','$prod_name',
      '$prod_image','$prod_price','$prod_quantity','$user_id')");

}
if (isset($_GET['id']) && ($_GET['category']) && $_GET['subcategory']) {
  // echo "<script>alert('".$_GET['id']."')</script>";
  $id = $_GET['id'];

  if (isset($_SESSION['user_id'])) {
    //checking product in the cart
    $select = mysqli_query($con, "select * from cart where prod_id='$id' and user_id='$_SESSION[user_id]'");
  }

  //getting id for wishlist 
  if (isset($_SESSION['user_id'])) {

    $select_wishlist = mysqli_query($con, "select * from wishlist where prod_id='$id' and user_id='$_SESSION[user_id]'");
    $get = mysqli_fetch_assoc($select_wishlist);
  }


  //getting data for every product
  $cat_id = $_GET['category'];
  // echo "<script>alert('$cat_id cat')</script>";
  $sub_id = $_GET['subcategory'];
  // echo "<script>alert('".$_GET['subcategory']."sub')</script>";
  $sql = mysqli_query($con, "SELECT * from addsinglecategory where p_id='$id' and category='$cat_id' and subcategory='$sub_id'");
  $row = mysqli_fetch_assoc($sql);
} else {
  header('location: 404.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inspire | E-commerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Details</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"></h3>
                <div class="col-12">
                  <img src="img/<?php echo $row['p_image']; ?>" class="product-image" alt="Product Image">
                </div>
                <!-- <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="admin/dist/img/prod-1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="admin/dist/img/prod-2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="admin/dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="admin/dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="admin/dist/img/prod-5.jpg" alt="Product Image"></div>
              </div> -->
              </div>
              <div class="col-12 col-sm-6">
                <h3 class="my-3">
                  <?php echo $row['product_name']; ?>
                </h3>
                <p>
                  <?php echo $row['product_details']; ?>
                </p>

                <hr>
                <!-- <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div> -->

                <!-- <h4 class="mt-3">Size <small>Please select one</small></h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    <span class="text-lg">
                      <?php echo $row['sizes'][0] ?>
                    </span>
                    <br>
                    Small
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                    <span class="text-lg">
                      <?php echo $row['sizes'][2] ?>
                    </span>
                    <br>
                    Medium
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                    <span class="text-lg">
                      <?php echo $row['sizes'][4] ?>
                    </span>
                    <br>
                    Large
                  </label>
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                    <span class="text-lg">
                      <?php echo $row['sizes'][6] . $row['sizes'][7]; ?>
                    </span>
                    <br>
                    Xtra-Large
                  </label>
                </div> -->

                <div class="bg-gray py-2 px-3 mt-4">
                  <h2 class="mb-0">
                    Rs.
                    <?php echo $row['seller_price']; ?>
                  </h2>
                  <h4 class="mt-0">
                    <small>Ex Tax: Rs.
                      <?php echo $row['seller_price']; ?>
                    </small>
                  </h4>
                </div>
                <form action="" method="post" id="form-data">
                  <div class="">
                    <input type="hidden" name="prod_id" id="" value="<?php echo $row['p_id']; ?>" class="form-control">
                  </div>
                  <div class="">
                    <input type="hidden" name="prod_name" id="" value="<?php echo $row['product_name']; ?>"
                      class="form-control">
                  </div>
                  <div class="">
                    <input type="hidden" name="prod_image" id="" value="<?php echo $row['p_image']; ?>"
                      class="form-control">
                  </div>
                  <div class="">
                    <input type="hidden" name="prod_price" id="" value="<?php echo $row['seller_price']; ?>"
                      class="form-control">
                  </div>
                  <div class="">
                    <input type="hidden" name="quantity" id="" value="1" class="form-control">
                  </div>
                  <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="">
                      <input type="hidden" name="user_id" id="" value="<?php echo $_SESSION['user_id']; ?>"
                        class="form-control">
                    </div>
                  <?php endif; ?>
                  <div class="mt-4">
                    <?php if (isset($_SESSION['user_id'])):

                      if (mysqli_num_rows($select) > 0): ?>
                        <button name="submit" type="submit" id="submit" disabled class="btn btn-primary btn-lg btn-flat">
                          <i class="fas fa-cart-plus fa-lg mr-2"></i>
                          Added to Cart</button>

                      <?php else: ?>
                        <button name="submit" type="submit" id="submit" class="btn btn-primary btn-lg btn-flat">
                          <i class="fas fa-cart-plus fa-lg mr-2"></i>
                          Add to Cart</button>

                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user_id'])):

                      if (mysqli_num_rows($select_wishlist) > 0): ?>
                        <button class="btn btn-default btn-lg btn-flat delete-wishlist" value="<?php echo $get['id']; ?>">
                          <i class="fas fa-heart fa-lg mr-2"></i>
                          Added to Wishlist
                        </button>
                      <?php else: ?>
                        <button class="btn btn-default btn-lg btn-flat Wishlist-btn">
                          <i class="fas fa-heart fa-lg mr-2"></i>
                          Add to Wishlist
                        </button>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                  
                </form>


              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                  role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                  role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab"
                  aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc.
                Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et,
                commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus
                velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum
                placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non
                pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque
                interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi
                molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel
                metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse
                potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum,
                venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex
                pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex
                elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien
                eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur
                a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras
                ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo
                augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis.
                Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et
                erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia
                lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at,
                consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut
                varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor
                vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula
                placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="admin/dist/js/demo.js"></script>
  <script>
    $(document).ready(function () {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })

    });
    $(document).ready(function () {
      $(document).on("submit", function (e) {
        e.preventDefault();
        var formdata = $('#form-data').serialize() + '&submit=submit';

        $.ajax({
          type: "post",
          url: "single.php?id=<?php echo $id; ?>",
          data: formdata,

          success: function (response) {
            alert('added to cart successfully');
            $('#submit').html("<i class='fas fa-cart-plus fa-lg mr-2'></i>Added to cart").prop("disabled", true);
            // refresh();
          }
        });


      });

      $(".Wishlist-btn").on("click", function (e) {
        e.preventDefault();
        var formdata = $('#form-data').serialize() + '&submit=submit';

        $.ajax({
          type: "post",
          url: "wishlist.php",
          data: formdata,

          success: function (response) {
            alert('added to wishlist successfully');
            $('.Wishlist-btn').html("<i class='fas fa-heart fa-lg mr-2'></i>Added to wishlist").addClass("delete-wishlist")
              .removeClass("Wishlist-btn");
            refresh();
          }
        });
        
      });


    });

    function refresh() {
          $("body").load("single.php?id=<?php echo $id; ?>");
        }



    $(".delete-wishlist").on('click', function (e) {
      e.preventDefault();

      var id = $(this).val();
      var quantity = $(this).closest('tr').find(".quantity").val();

      $.ajax({
        type: "POST",
        url: "delete-item-wishlist.php",
        data: {
          delete: "delete",
          id: id

        },
        success: function () {
          // Alert or perform any other actions upon success
          alert("Item deleted successfully from wishlist");
          $('.delete-wishlist').html("<i class='fas fa-heart fa-lg mr-2'></i>Add to wishlist").addClass("Wishlist-btn")
              .removeClass("delete-wishlist");
              refresh();
        }
      });
    });

  </script>
</body>

</html>