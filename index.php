<?php 
if (!isset($_SESSION)) {
    session_start();
}
// if (empty($_SESSION['login'])) {
//     header("Location:login.php");
//   }
include 'koneksi.php';

include 'navbar.php';
include 'header.php';

?>

<section class="section-produk">
    <div class="container">
        <div class="row">
            <div class="col-md  mt-4 mb-3">
                <h2>Produk Terbaru</h2>
                <a href="listproduk.php" class="float-right text-decoration-none font-weight-light">Lihat Selengkapnya</a>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum distinctio dolor vitae voluptates dolore fuga. </p>
                <hr class="garis">
                <div class="card-deck mb-4 mt-3">
                <?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 5"); ?>
                <?php while ($perproduk = $ambil->fetch_assoc()) {; ?>
                    <div class="card" >
                        <img src="assets/img/produk/<?php echo $perproduk['foto_produk'] ;?>" class="card-img-top rounded img-thumbnail" alt="..." style="object-fit: cover;width: 100%;
    height: 22vw;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $perproduk['nama_produk'] ;?></h5>
                            <p class="card-text"><small class="text-muted">Rp. <?php echo number_format($perproduk['harga_produk']) ;?></small></p>
                            <a href="detail.php?id=<?php echo $perproduk['id_produk'] ;?>" class="btn btn-login btn-sm font-weight-light"><i class="fas fa-shopping-cart"></i> Lihat Produk</a>
                        </div>
                    </div>
                <?php } ;?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-about pt-5 mt-5">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6 d-none d-sm-block">
                <div class="card">
                    <img src="assets/img/sampul/1.png" class="card-img-top rounded" width="100%" height="300">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center about-title">Pre Order Kaos Limited Edition</h2>
                <hr class="about-judul">
                <p class="text-justify mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ipsam ex iste quod veniam! Quod autem explicabo distinctio dolor repellendus harum mollitia minima et enim iste! Quia maxime porro veniam.</p>
                <button class="btn btn-login font-weight-light" style="font-family: 'Open Sans',  sans-serif; "> <i class="far fa-clock"></i> PRE ORDER </button>
            </div>
        </div>
    </div>
</section>

<section class="section-pelayanan" style="margin-top:80px; margin-bottom:80px;">
    <div class="container">
        <!-- <h3>Pelayanan Kami</h3>
        <hr class="garis"> -->
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center border-left mt-5" style="color: #066aa8;">Pelayanan Kami</h2>
            </div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-2">
                        <div class="icon-pelayanan" style="font-size:40px;  color: #066aa8;">
                        <i class="far fa-handshake"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                    <h5 class="pelayanan-title font-weight-bold"> PELAYANAN MAKSIMAL</h5>
                    <p class="text-justify font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, maiores velit voluptatem hic corrupti distinctio deleniti.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-2">
                        <div class="icon-pelayanan" style="font-size:40px;  color: #066aa8;">
                        <i class="fas fa-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                    <h5 class="pelayanan-title font-weight-bold"> ORDER MUDAH</h5>
                    <p class="text-justify font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, maiores velit voluptatem hic corrupti distinctio deleniti.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-2">
                        <div class="icon-pelayanan" style="font-size:40px;  color: #066aa8;">
                        <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                    <h5 class="pelayanan-title font-weight-bold"> PEMESANAN ONLINE</h5>
                    <p class="text-justify font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, maiores velit voluptatem hic corrupti distinctio deleniti.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-2">
                        <div class="icon-pelayanan" style="font-size:40px;  color: #066aa8;">
                        <i class="fas fa-credit-card"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                    <h5 class="pelayanan-title font-weight-bold"> PEMBAYARAN MUDAH</h5>
                    <p class="text-justify font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, maiores velit voluptatem hic corrupti distinctio deleniti.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-2">
                        <div class="icon-pelayanan" style="font-size:40px;  color: #066aa8;">
                        <i class="fas fa-truck"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                    <h5 class="pelayanan-title font-weight-bold"> PENGIRIMAN KE SELURUH INDONESIA</h5>
                    <p class="text-justify font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, maiores velit voluptatem hic corrupti distinctio deleniti.</p>
                    </div>
                </div>
            </div>

            
           

        </div>
    </div>
</section>


<?php include 'footer.php' ;?>