<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'navbar.php'; 
include 'koneksi.php';?>
<?php 

// mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//query ambil data 
$ambil = $koneksi->query("SELECT * FROM produk  WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>

<main>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1><?php echo $detail['nama_produk'] ;?></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="assets/img/produk/<?php echo $detail['foto_produk'] ;?>" class="xzoom mx-auto d-block" id="xzoom-default"
                                xoriginal="assets/img/produk/<?php echo $detail['foto_produk'] ;?>" />
                            </div>
                            <div class="xzoom-thumbs">
                            <?php  $ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'")?>
                            <?php while($ambilfotoproduk = $ambilfoto->fetch_assoc()){ ?>
                                <a href="assets/img/produk/<?php echo $ambilfotoproduk['nama_produk_foto'] ;?>">
                                <img src="assets/img/produk/<?php echo $ambilfotoproduk['nama_produk_foto'] ;?>" class="xzoom-gallery" width="80"
                                    xpreview="assets/img/produk/<?php echo $ambilfotoproduk['nama_produk_foto'] ;?>" />
                                </a>
                            <?php } ;?>
                                <!-- <a href="assets/img/slideshow/2.jpg">
                                <img src="assets/img/slideshow/2.jpg" class="xzoom-gallery" width="80"
                                    xpreview="assets/img/slideshow/2.jpg" />
                                </a>
                                <a href="assets/img/slideshow/3.jpg">
                                <img src="assets/img/slideshow/3.jpg" class="xzoom-gallery" width="80"
                                    xpreview="assets/img/slideshow/3.jpg" />
                                </a> -->
                            </div>
                        </div>
                        <h2>Tentang Produk</h2>
                        <?php echo $detail['deskripsi_produk'] ;?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="" method="post">
                        <div class="card card-details card-right">                  
                            <h2>Produk Informasi</h2>
                            <table class="trip-informations">
                            <tr>
                                <th width="50%">Harga</th>
                                <td width="50%" class="text-right">Rp. <?php echo number_format($detail['harga_produk']) ;?></td>
                            </tr>
                            <tr>
                                <th width="50%">Produk Tersedia</th>
                                <td width="50%" class="text-right"><?php echo $detail['stok_produk'] ;?> Pcs</td>
                            </tr>
                            <!-- <tr>
                                <th width="50%">Size Tersedia</th>
                                <td width="50%" class="text-right">XL L M S</td>
                            </tr> -->
                            <tr>
                                <th width="50%">Jumlah Pembelian</th>
                                <td width="50%" class="text-right">
                                    <div class="form-group mb-0" height="100">
                                        <div class="input-group input-group-sm">
                                            <input type="number" min="1" class="form-control" name="jumlah" id="" max="<?php echo $detail['stok_produk'] ;?>">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            <!-- <a href="checkout.html" class="btn btn-block btn-join-now mt-3 py-2">Checkout Now</a> -->
                            <button class="btn btn-block btn-join-now mt-3 py-2" name="beli">Checkout Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </main>
    <?php 
    // jk ada tombol beli
    if (isset($_POST["beli"])) {
        // mendapatkan jumlah yang di inputkan
        $jumlah = $_POST["jumlah"];
        
        // masukkan di keranjang belanja
        $_SESSION["keranjang"][$id_produk] = $jumlah;

        echo "<script>alert('Produk telah masuk ke keranjang belanja')</script>";    
        echo "<script>location='keranjang.php';</script>";             
    }
    ?>

<?php include 'footer.php' ;?>