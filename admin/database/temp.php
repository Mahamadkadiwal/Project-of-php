<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="<?php echo APPURL; ?>">Inspire Software </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="<?php echo APPURL; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="<?php echo APPURL; ?>/category/category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="<?php echo APPURL; ?>">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="#">Contact US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <?php if (isset($_SESSION['user_name'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo APPURL; ?>/cart.php"><i class="fas fa-shopping-cart"></i><?php echo $get['num_product'] ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link btn btn-outline-dark shadow-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['user_name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo APPURL; ?>/user/order.php?id=<?php echo $_SESSION['user_id']; ?>">Orders</a></li>

                            <li><a class="dropdown-item" href="<?php echo APPURL ?>/inc/logout.php">Logout</a></li>
                        </ul>
                    </li>

            </ul>

        <?php else : ?>
            <div class="d-flex">
                <a href="<?php echo APPURL ?>/inc/login.php">
                    <button type="button" class="ms-2 btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button></a>
                <a href="<?php echo APPURL ?>/inc/register.php">
                    <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#RagisterModal">
                        Register
                    </button></a>
            </div>
        <?php endif; ?>
        </div>
    </div>
</nav>