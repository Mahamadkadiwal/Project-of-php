<?php
include_once 'admin/database/dbcon.php';
include_once 'inc/header.php';

if(!isset($_SESSION['user_name'])){
    header('location: index.php');
  }
// Retrieve cart items for the user
$sql = mysqli_query($con, "SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");

if(isset($_POST['submit'])){
    $price = $_POST['price'];

    $_SESSION['price'] = $price;
    // echo "<script>alert('" . $_SESSION['price'] . "');</script>";
    header('location: checkout.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart User</title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                    </div>

                                    <table class="table" height="190">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Update</th>
                                                <th scope="col"><button class="delete-all btn btn-danger text-white">Clear</button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(mysqli_num_rows($sql) > 0) :
                                            while ($row = mysqli_fetch_assoc($sql)) :
                                                $total_price = $row['prod_price'] * $row['quantity'];
                                            ?>
                                                <tr class="mb-4">
                                                    <th scope="row"></th>
                                                    <td><img width="100" height="100" src="img/<?php echo $row['prod_image']; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt"></td>
                                                    <td><?php echo $row['prod_name']; ?></td>
                                                    <td class="prod_price"><?php echo $row['prod_price']; ?></td>
                                                    <td><input id="form1" min="1" name="quantity" value="<?php echo $row['quantity']; ?>" type="number" class="form-control form-control-sm quantity" /></td>
                                                    <td class="total_price">Rs.<?php echo $total_price; ?></td>
                                                    <td><button value="<?php echo $row['id']; ?>" class="btn btn-warning text-white update"><i class="fas fa-edit"></i> </button></td>
                                                    <td><button value="<?php echo $row['id']; ?>" class="btn btn-danger text-white delete"><i class="fa fa-trash"></i> </button></td>
                                                </tr>
                                            <?php endwhile; ?>
                                            <?php else : ?>
                                                <div class="alert alert-danger bg-danger text-white">
                                                    Empty Cart
                                                </div>
                                            <?php endif; ?>    
                                        </tbody>
                                    </table>
                                    <a href="index.php" class="btn btn-success text-white"><i class="fas fa-arrow-left"></i> Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
                                    
                                    <form method="post" action="cart.php">
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5 class="full_price">Rs.</h5>
                                        <input type="hidden" class="inp_price form-control" name="price">
                                    </div>

                                    <button type="submit" name="submit" class="checkout btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Checkout</button>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {

         

    $(".quantity").mouseup(function () {
        var $el = $(this).closest('tr');
        var quantity = $el.find(".quantity").val();
        var prod_price = $el.find(".prod_price").html();
        var total = quantity * prod_price;
        $el.find(".total_price").html("Rs." + total);
        updateCartItem($el.find(".update").val(), quantity);
        fetch();
    });

    $(".delete").on('click', function(e) {
        e.preventDefault();

        var id = $(this).val();
        var quantity = $(this).closest('tr').find(".quantity").val();

        $.ajax({
            type: "POST",
            url: "delete-item.php",
            data: {
                delete: "delete",
                id: id
                
            },
            success: function() {
                // Alert or perform any other actions upon success
                alert("Item deleted successfully");
                reload();
            }
        });
    });  
    
    $(".delete-all").on('click', function(e) {
        e.preventDefault();

        
        $.ajax({
            type: "POST",
            url: "delete-all-item.php",
            data: {
                delete: "delete"
            },
            success: function() {
                // Alert or perform any other actions upon success
                alert("All Items deleted successfully");
                reload();
            }
        });
    }); 


    fetch();

    function fetch() {
        setInterval(function () {
            var sum = 0.0;
            $('.total_price').each(function () {
                sum += parseFloat($(this).text().replace("Rs.", ""));
            });
            $(".full_price").html("Rs." + sum);
            $(".inp_price").val(sum);

            if($(".inp_price").val() > 0){
                $('.checkout').show();
            }else{
                $('.checkout').hide();
            }
        }, 3000);
    }

    $(".update").on('click', function(e) {
        e.preventDefault();

        var id = $(this).val();
        var quantity = $(this).closest('tr').find(".quantity").val();

        $.ajax({
            type: "POST",
            url: "update-item.php",
            data: {
                update: "update",
                id: id,
                quantity: quantity
            },
            success: function() {
                // Alert or perform any other actions upon success
                // alert("Item updated successfully");
                // reload();
            }
        });
    });

    function reload() {
        $("body").load("cart.php");
    }
});
</script>
