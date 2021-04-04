<?php 
include 'koneksi.php';
include 'navbar.php' ;
?>

<main>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">List Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card-group">
                    <div class="row">
                    <?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC"); ?>
                    <?php while ($perproduk = $ambil->fetch_assoc()) {; ?>
                            <div class="col-md-2 p-2">
                                <div class="card ">
                                    <img class="card-img-top" style="object-fit: cover;width: 100%;
    height: 22vw;" src="assets/img/produk/<?php echo $perproduk['foto_produk'] ;?>" alt="">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?php echo $perproduk['nama_produk'] ;?></h5>
                                        <p class="card-text"><small class="text-muted">Rp. <?php echo number_format($perproduk['harga_produk']) ;?></small></p>
                                        <a href="detail.php?id=<?php echo $perproduk['id_produk'] ;?>" class="btn btn-login btn-sm font-weight-light"><i class="fas fa-shopping-cart"></i> Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                    <?php } ;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php' ;?>