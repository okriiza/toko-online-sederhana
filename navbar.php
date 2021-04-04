<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/plugin/xzoom/xzoom.css">
    <link rel="stylesheet" href="admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/main.css">
    <title>Pakaianku | Minimalist Style for your fashion</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white text-uppercase fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/logo/Pakaianku1.png" width="150">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <form class="form-inline ml-3 mx-auto" >
                <div class="input-group input-group-sm" >
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-login" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->
            <ul class="navbar-nav ml-auto mr-3 ">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-address-card"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-blog"></i> Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="keranjang.php"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                </li>
                <?php if (isset($_SESSION['users'])) :?>
                <li class="nav-item">
                    <a class="nav-link" href="riwayat.php"><i class="fas fa-history"></i> Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php"><i class="fas fa-check"></i> Checkout</a>
                </li>
            </ul>
            <!-- Mobile button -->
            <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0 px-4">
                <a href="logout.php" class="text-white text-decoration-none"> LOGOUT</a>
                </button>
            </form>
            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                <a href="logout.php" class="text-white text-decoration-none"> LOGOUT</a>
                </button>
            </form>
                <?php else: ?>
            
                    </ul>
            <!-- Mobile button -->
            <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0 px-4">
                <a href="login.php" class="text-white text-decoration-none"> MASUK</a>
                </button>
            </form>
            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                <a href="login.php" class="text-white text-decoration-none"> MASUK</a>
                </button>
            </form>
            <?php endif ;?>
        </div>
    </div>
</nav>