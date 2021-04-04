<?php
// error_reporting(0);
include 'koneksi.php';
if (!isset($_SESSION)) {
   session_start();
}
if (!isset($_SESSION['admin'])) {
   echo "<script>alert('Anda harus login dahulu');</script>";
   echo "<script>location='login.php';</script>";
   header('location:login.php');
   exit();
}
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="icon" href="../assets/logo/logo.png" type="image/x-icon">
    <title>Pakaianku | Admin</title>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="index3.html" class="brand-link" >
    <img src="../assets/logo/pakaianku.png" alt="AdminLTE Logo" class="brand-text" width="170" height="40">
    <!-- <span class="brand-text font-weight-light">Pakaianku Admin</span> -->
</a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/logo/logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Pakaianku Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=produk" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                        Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=pembelian" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                        Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=laporan_pembelian" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                        Laporan
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                        Setting Blog
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Posting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-header">Setting</li>
                <li class="nav-item">
                    <a href="index.php?page=pelanggan" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                        Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=user" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                        User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<div class="content-wrapper">
<?php
            if (isset($_GET['page'])) {
                if ($_GET['page'] == "produk") {
                    include 'produk.php';
                } elseif ($_GET['page'] == "tambahproduk") {
                    include 'tambahproduk.php';
                } elseif ($_GET['page'] == "editproduk") {
                    include 'editproduk.php';
                } elseif ($_GET['page'] == "hapusproduk") {
                    include 'hapusproduk.php';
                } elseif ($_GET['page'] == "pembelian") {
                    include 'pembelian.php';
                } elseif ($_GET['page'] == "pelanggan") {
                    include 'pelanggan.php';
                } elseif ($_GET['page'] == "tambahpelanggan") {
                    include 'tambahpelanggan.php';
                } elseif ($_GET['page'] == "editpelanggan") {
                    include 'editpelanggan.php';
                } elseif ($_GET['page'] == "hapuspelanggan") {
                    include 'hapuspelanggan.php';
                } elseif ($_GET['page'] == "laporan_pembelian") {
                    include 'laporan_pembelian.php';
                } elseif ($_GET['page'] == "user") {
                    include 'user.php';
                } elseif ($_GET['page'] == "tambahuser") {
                    include 'tambahuser.php';
                } elseif ($_GET['page'] == "edituser") {
                    include 'edituser.php';
                } elseif ($_GET['page'] == "hapususer") {
                    include 'hapususer.php';
                } elseif ($_GET['page'] == "detailproduk") {
                    include 'detailproduk.php';
                } elseif ($_GET['page'] == "hapusfotoproduk") {
                    include 'hapusfotoproduk.php';
                } elseif ($_GET['page'] == "detail") {
                    include 'detail.php';
                } elseif ($_GET['page'] == "pembayaran") {
                    include 'pembayaran.php';
                }
            } else {
                include 'home.php';
            }
            ?>
</div>


    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Version 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="https://okriiza.com">Okriiza</a>.</strong> All rights reserved.
    </footer>
</div>


<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function() {
    $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    })
})
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script>
        $(document).ready(function(){
            $(".btn-tambah").on("click",function(){
                $(".letak-input").append("<input type='file' class='form-control mb-2' name='foto[]'>")
            })
        })
    </script>
</body>
</html>
