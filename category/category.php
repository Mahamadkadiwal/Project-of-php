<?php
require_once '../admin/database/dbcon.php';
require('../header.php');

$sql = mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
if (mysqli_num_rows($sql) > 0) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <!-- CSS links -->
        <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
        <!--font awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <h1 class="heading">Category <span></span></h1>
            <div class="row mt-2">
                <?php foreach ($sql as $row) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products">
                        <div class="card bg-light w-100">
                            <a href="">
                                <img class="card-img-top img-fluid" src="../img/<?php echo $row['image']; ?>" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h3><b><?php echo $row['category_name']; ?></b></h3>
                                <div class="price"></div>
                                <button class="btn btn-primary" onclick="toggleSubcategory(this, <?php echo $row['id']; ?>)">More info..</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="container subcategoryBox" style="display: none;">
            <h1 class="heading">Sub Category <span></span></h1>
            <div class="row mt-2" id="subcategoryContainer">
                <!-- Subcategories will be dynamically added here -->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function toggleSubcategory(button, categoryID) {
                var subcategoryBox = document.querySelector('.subcategoryBox');
                if (subcategoryBox.style.display === 'none') {
                    subcategoryBox.style.display = 'block';
                    loadSubcategories(categoryID);
                } else {
                    subcategoryBox.style.display = 'none';
                }
            }

            function loadSubcategories(categoryID) {
                var subcategoryContainer = document.getElementById('subcategoryContainer');
                subcategoryContainer.innerHTML = '';

                // Perform an AJAX request to fetch subcategories for the selected category
                // Replace 'fetch_subcategories.php' with the actual URL of your server-side script
                $.ajax({
                    url: 'fetch_subcategories.php',
                    method: 'POST',
                    data: {
                        category_id: categoryID
                    },
                    success: function(response) {
                        var subcategories = JSON.parse(response);

                        subcategories.forEach(function(subcategory) {
                            var subcategoryCard = document.createElement('div');
                            subcategoryCard.className = 'col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-5 products';
                            subcategoryCard.innerHTML = `
                    <div class="card bg-light w-100">
                        <a href="">
                            <img class="card-img-top img-fluid" src="../img/${subcategory.image}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h3><b>${subcategory.name}</b></h3>
                            <div class="price"></div>
                            <a href="singlecat.php?id=${subcategory.id}"><button class="btn btn-primary">More info..</button></a>
                        </div>
                    </div>
                `;
                            subcategoryContainer.appendChild(subcategoryCard);
                        });
                    },
                    error: function() {
                        console.log('Error occurred while fetching subcategories.');
                    }
                });
            }
        </script>

    </body>

    </html>

<?php } else {
    header('location: ../404.php');
    exit();
} ?>