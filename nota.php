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
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_pelanggan = users.id_users WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<!-- Jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka di larikan ke riwayat.php karena dia tidak berhak melihat nota orang lain, "PELANGGAN YANG BELI HARUS PELANGGAN YANG LOGIN" -->
<?php 
//mendapatkan id pelanggan yang beli
$idpelangganyangbeli = $detail["id_pelanggan"];

// mendapatkan id_[elanggan yang login]
$idpelangganyanglogin = $_SESSION["users"]["id_users"];

if ($idpelangganyangbeli!==$idpelangganyanglogin) {
    echo "<script>alert('Kamu Nakal Yahhhh :v');</script>";
    echo "<script>location='riwayat.php';</script>";
}

?>

<section class="section-details-content">
    <div class="container">
        <div class="row">
            <div class="col p-0">
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item">Keranjang</li>
                    <li class="breadcrumb-item">Checkout</li>
                    <li class="breadcrumb-item active">Detail Pembelian</li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pl-lg-0">
                <div class="card card-details">
                <h1 class="font-weight-bold">Detail Pembelian</h1>
                <p class="font-weight-light">Detail Pembelian Produk</p>
                <hr>
                <div class="row nota-info">
                    <div class="col-sm-4 nota-col">
                        <h1>Pembelian</h3>                       
                        <address>
                        <strong>No Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
                        Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                        </address>
                    </div>
                    <div class="col-sm-4 nota-col">
                        <h1>Pelanggan</h1>
                        <address>
                        <strong><?php echo $detail['nama']; ?></strong><br>
                        Phone: <?php echo $detail['no_hp'];?><br>
                        Email: <?php echo $detail['email']; ?>
                        </address>
                    </div>
                    <div class="col-sm-4 nota-col">
                        <h1>Pengiriman</h1>
                        <b><?php  echo $detail['nama_kota'] ?></b><br>
                        <b>Ongkos Kirim:</b> Rp. <?php echo number_format($detail['tarif']); ?><br>
                        <b>Alamat:</b> <?php echo $detail['alamat_pengiriman'];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">NO</th>
                                    <th >Produk</th>
                                    <th width="15%">Harga</th>
                                    <th width="10%">Berat</th>
                                    <th width="5%">Jumlah</th>
                                    <th width="10%">Subberat</th>
                                    <th width="20%">Subharga</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $nomor=1;?>
                            <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $nomor ?></td>
                                    <td><?php echo $pecah['nama']; ?></td>
                                    <td>Rp. <?php echo number_format($pecah['harga']);?></td>
                                    <td><?php echo $pecah['berat'];?> Gr.</td>
                                    <td><?php echo $pecah['jumlah'];?></td>
                                    <td><?php echo $pecah['subberat'];?> Gr.</td>
                                    <td>Rp. <?php echo number_format($pecah['subharga']);?></td>
                                </tr>
                            <?php $nomor++?>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <p class="lead">Payment Methods:</p>
                        <div class="alert alert-secondary" role="alert">
                            <div class="row d-flex align-self-center">
                                <div class="col-md d-flex align-self-center">
                                    <img src="assets/img/images/bni.png" alt="bni" width="50%" height="60%">
                                </div>
                                <div class="col-md">
                                    <h2><b>No.Rek : <br> 890743870436</b></h2>
                                        <h6>PAKAINAKU.CO</h6>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <div class="row d-flex align-self-center">
                                <div class="col-md d-flex align-self-center">
                                    <img src="assets/img/images/bri.png" alt="bri" width="50%" height="60%">
                                </div>
                                <div class="col-md">
                                    <h2><b>No.Rek : <br> 890743870</b></h2>
                                        <h6>PAKAINAKU.CO</h6>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <div class="row d-flex align-self-center">
                                <div class="col-md d-flex align-self-center">
                                    <img src="assets/img/images/bca.png" alt="bca" width="50%" height="60%">
                                </div>
                                <div class="col-md">
                                    <h2><b>No.Rek : <br> 890743870</b></h2>
                                        <h6>PAKAINAKU.CO</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="lead">Informasi Transaksi:</p>
                        <div class="table-responsive">
                            <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row no-print">
                    <div class="col-md-12">
                        <a href="riwayat.php" class="btn btn-secondary btn-sm"><i class="fa fa-angle-double-left"></i> Kembali</a>
                        <!-- <button type="button" class="btn btn-success float-right btn-sm"><i class="fa fa-credit-card"></i> Submit Payment
                        </button> -->
                        <a href="konfirmasi_pembayaran.php?id=<?php echo $detail['id_pembelian']; ?>" class="btn btn-primary float-right btn-sm" style="margin-right: 5px;"><i class="fa fa-download"></i> Konfirmasi Pembayaran</a>
                        <!-- <button type="button" class="btn btn-primary float-right btn-sm" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> Konfirmasi Pembayaran
                        </button> -->
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