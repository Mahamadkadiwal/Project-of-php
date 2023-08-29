<?php
require_once 'admin/database/dbcon.php';
require_once 'header.php';

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Seller">
    <meta name="keywords" content="Multi_seller,creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product</title>

    <!-- Google Font -->
    
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <?php $sql = mysqli_query($con, "Select * from categories where status=1");
                                        if(mysqli_num_rows($sql)){
                                        ?>
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll " > 
                                                    <?php foreach($sql as $row) {?>
                                                    <li class="category-item"><a href="" ><?php echo $row['category_name'] ?></a></li>
                                                    
                                                    <?php } ?>
                                                    <li class="category-item"><a href="">Mobile (20)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="#">Louis Vuitton</a></li>
                                                    <li><a href="#">Chanel</a></li>
                                                    <li><a href="#">Hermes</a></li>
                                                    <li><a href="#">Gucci</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li class="price-select" value="150"><a href="">₹0.00 - ₹149.00</a></li>
                                                    <li class="price-select" value="200"><a href="">Under ₹199.00</a></li>
                                                    <li class="price-select" value="300"><a href="">Under ₹299.00</a></li>
                                                    <li class="price-select" value="400"><a href="">under - ₹399.00</a></li>
                                                    <li class="price-select" value="500"><a href="">Under ₹499.00</a></li>
                                                    <li class="price-select" value="600"><a href="">₹600.00 above</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="xs">xs
                                                    <input type="radio" id="xs">
                                                </label>
                                                <label for="sm">s
                                                    <input type="radio" id="sm">
                                                </label>
                                                <label for="md">m
                                                    <input type="radio" id="md">
                                                </label>
                                                <label for="xl">xl
                                                    <input type="radio" id="xl">
                                                </label>
                                                <label for="2xl">2xl
                                                    <input type="radio" id="2xl">
                                                </label>
                                                <label for="xxl">xxl
                                                    <input type="radio" id="xxl">
                                                </label>
                                                <label for="3xl">3xl
                                                    <input type="radio" id="3xl">
                                                </label>
                                                <label for="4xl">4xl
                                                    <input type="radio" id="4xl">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__color">
                                                <label class="c-1" for="sp-1">
                                                    <input type="radio" id="sp-1">
                                                </label>
                                                <label class="c-2" for="sp-2">
                                                    <input type="radio" id="sp-2">
                                                </label>
                                                <label class="c-3" for="sp-3">
                                                    <input type="radio" id="sp-3">
                                                </label>
                                                <label class="c-4" for="sp-4">
                                                    <input type="radio" id="sp-4">
                                                </label>
                                                <label class="c-5" for="sp-5">
                                                    <input type="radio" id="sp-5">
                                                </label>
                                                <label class="c-6" for="sp-6">
                                                    <input type="radio" id="sp-6">
                                                </label>
                                                <label class="c-7" for="sp-7">
                                                    <input type="radio" id="sp-7">
                                                </label>
                                                <label class="c-8" for="sp-8">
                                                    <input type="radio" id="sp-8">
                                                </label>
                                                <label class="c-9" for="sp-9">
                                                    <input type="radio" id="sp-9">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#">Product</a>
                                                <a href="#">Bags</a>
                                                <a href="#">Shoes</a>
                                                <a href="#">Fashio</a>
                                                <a href="#">Clothing</a>
                                                <a href="#">Hats</a>
                                                <a href="#">Accessories</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select onchange="sortdown(this.value)">
                                    <option value="" selected>Select an option</option>
                                        <option value="low-to-high">Low To High</option>
                                        <option value="100-500">₹100- ₹500</option>
                                        <option value="500-1000">₹500 - ₹1000</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row" id="product_list">
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <h2>Inspire seller</h2>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="<?php echo APPURL?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo APPURL?>/js/bootstrap.min.js"></script>
    <script src="<?php echo APPURL?>/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo APPURL?>/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo APPURL?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo APPURL?>/js/jquery.countdown.min.js"></script>
    <script src="<?php echo APPURL?>/js/jquery.slicknav.js"></script>
    <script src="<?php echo APPURL?>/js/mixitup.min.js"></script>
    <script src="<?php echo APPURL?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo APPURL?>/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    $(document).ready(function() {
            $(document).ready(function() {
        var defaultSortOption = ""; // Set your default sorting option here
        sortdown(defaultSortOption);
    });
    
    // $('#sortdown').on('change', function() {

        // alert("Document is ready");
        // var sortOption = $(this).val();
        
        // console.log("Selected sort option:", sortOption);
        // sortProducts(sortOption);
    // });

    $('.category-item').click(function (e) { 
        e.preventDefault();
        var selectCategory = $(this).text();
        // alert("Selected Category : "+ selectCategory);
        selectProducts(selectCategory);
    });
});
    $('.price-select').click(function (e) { 
        e.preventDefault();
        var selectPrice= $(this).val();
        // alert("selected price is "+ selectPrice);
        selectListProduct(selectPrice);
    });

function selectListProduct(selectPrice){
    $.ajax({
        type: "post",
        url: "select_price.php",
        data: {select: selectPrice},
        
        success: function (response) {
            $('#product_list').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Request error:', xhr.status, xhr.statusText);
        }
    });
}    

function selectProducts(selectCategory){
    $.ajax({
        type: "post",
        url: "select_category.php",
        data: {select: selectCategory},
        
        success: function (response) {
            console.log(response);
            $('#product_list').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Request error:', xhr.status, xhr.statusText);
        }
    });
}
function sortdown($val)
{
   
        var sortOption = $val;
        sortProducts(sortOption);
}
function sortProducts(sortOption) {
    $.ajax({
        type: 'POST',
        url: 'sort_product.php',
        data: { sort: sortOption },
        success: function(response) {
            // console.log("Response from server:", response);
            $('#product_list').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Request error:', xhr.status, xhr.statusText);
        }
    });
}

</script>

</body>

</html>
   

    
<!-- <a href="single.php?id=<?php echo $row['p_id']; ?>&category=<?php echo $row['category']; ?>&subcategory=<?php echo $row['subcategory']; ?>"> -->