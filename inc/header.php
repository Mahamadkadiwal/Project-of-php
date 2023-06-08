<!-- <bootstrap  js link -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- bootstrap css link  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">JP HOTEL </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="Facilities.php">Facilities</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-2" href="contact.php">Contact US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

            </ul>
            <div class="d-flex">

                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#RagisterModal">
                    Ragister
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Modal login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>User login
                    </h5>
                    <button type=" reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control shadow-none" id="exampleInputEmail1">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control shadow-none" id="password">
                    </div>
                    <div class=" d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none "> login </button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">forgot password
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- modal register -->
<div class="modal fade" id="RagisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill text-warning fs-3 me-2 "></i>
                        User Ragister
                    </h5>
                    <button type=" reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base"> Your datils must
                        match with your ID(aadhaar card,passport etc.. that will required during check-in )
                    </span>

                    <div class="container-fuild">
                        <div class="row">
                            <div class="col-md-6  mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control shadow-none" id="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Email " class="form-label">Email </label>
                                <input type="email" class="form-control shadow-none" id="Email ">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="number" class="form-label">phone number </label>
                                <input type="number" class="form-control shadow-none" id="number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="picture " class="form-label">picture </label>
                                <input type="file" class="form-control shadow-none" id="picture ">
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="address " class="form-label">Address </label>
                                <textarea class="form-control shadow-none" id="exampleFormControlTextarea1" rows="1"></textarea>
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="Pincode" class="form-label">Pincode </label>
                                <input type="number" class="form-control shadow-none" id="Pincode">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="Date " class="form-label">Date of birth </label>
                                <input type="date" class="form-control shadow-none" id="Date ">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="Password" class="form-label">Password </label>
                                <input type="password" class="form-control shadow-none" id="Password">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="Conform Password " class="form-label">Conform Password </label>
                                <input type="password" class="form-control shadow-none" id="Conform Password ">
                            </div>

                        </div>
                    </div>

                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none "> Ragister </button>
                    </div>


                </div>

            </form>

        </div>
    </div>
</div>