
<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
//koneksi ke database
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan belanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<?php include 'navbar.php' ;?>
<section class="section-details-content">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">Keranjang</li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pl-lg-0">
                <div class="card card-details">
                    <h1 class="font-weight-bold">Keranjang</h1>
                    <p class="font-weight-light">Daftar Produk Pada Keranjang</p>
                    
                    <div class="attendee">
                        <table class="table table-respinsive-sm text-center">
                            <thead>
                                <tr>
                                    <td>NO</td>
                                    <td>Produk</td>
                                    <td>Harga</td>
                                    <td>Jumlah</td>
                                    <td>Subtotal</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $nomor=1;?>
                            <?php foreach ($_SESSION["keranjang"] as $id_produk =>$jumlah): ?>
                            <!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                            <?php  
                                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah["harga_produk"]*$jumlah;
                            ?>
                                <tr>
                                    <td align="center"><?php echo $nomor; ?></td>
                                    <td class="align-middle"><?php  echo $pecah["nama_produk"];?> </td>
                                    <td class="align-middle">Rp. <?php  echo number_format($pecah["harga_produk"]);?></td>
                                    <td class="align-middle"><?php  echo $jumlah;?></td>
                                    <td class="align-middle">Rp. <?php echo  number_format($subharga);?></td>
                                    <td class="align-middle">
                                        <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>">
                                        <img src="assets/img/images/ic_remove.png" alt="" />
                                        </a>
                                    </td>
                                </tr>
                            <?php $nomor++;?>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="member mt-3">
                        <!-- <button class="btn btn-outline-secondary "> <i class="fa fa-angle-double-left"></i> Belanja Lagi</button> -->
                        <a href="listproduk.php" class="btn btn-outline-secondary"><i class="fa fa-angle-double-left"></i> Belanja Lagi</a>
                        <a href="checkout.php" class="btn btn-login float-right"><i class="fa fa-check-circle"></i> Lanjut Checkout</a>
                        <h3 class="mt-4 mb-0 font-weight-bold">CATATAN</h3>
                        <p class="disclaimer mb-0 font-weight-light">
                        Bila anda ingin membeli kembali produk, silahkan klik belnaja lagi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php' ;?>