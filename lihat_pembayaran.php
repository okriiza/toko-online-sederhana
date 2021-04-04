<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
//koneksi ke database
include 'koneksi.php';
?>
<?php include 'navbar.php' ;?>


<?php 

// mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian' ");
$detail = $ambil->fetch_assoc();
?>

<section class="section-details-content">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Riwayat</li>
                    <li class="breadcrumb-item active">Detail Pembayaran</li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pl-lg-0">
                <div class="card card-details">
                <h1 class="font-weight-bold">Detail Pembayaran</h1>
                <!-- <p class="font-weight-light">Detail Pembayaran Produk</p> -->
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $detail['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td><?php echo $detail['bank'] ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
                            </tr>
                            <tr>
                                <th>tanggal</th>
                                <td><?php echo $detail['tanggal'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="assets/img/bukti_pembayaran/<?php echo $detail['bukti']?>" alt="" class="img-responsive" width="350">
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>

<?php include 'footer.php' ;?>