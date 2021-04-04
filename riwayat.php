
<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include 'koneksi.php';

// jika tidak ada session pelanggan (Belum Login)
if (!isset($_SESSION["users"]) OR empty($_SESSION["users"])) {
    echo "<script>alert('Silahkan Login Terlebih Dulu');</script>";
    echo "<script>location='login.php';</script>";
}
?>

<!-- mengambil menu navbar -->
<?php include 'navbar.php'; ?>

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
                    <h1 class="font-weight-bold">Riwayat Pembelian <b><?php echo $_SESSION["users"]["nama"] ?></h1>
                    <p class="font-weight-light">Daftar Riwayat Pembelian</p>
                    
                    <div class="attendee">
                        <table id="example1" class="table table-responsive-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor=1;
                            // mendapatakn id_pelanggan yang login dari session
                            $id_pelanggan = $_SESSION["users"]['id_users'];
                            $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                            while($pecah = $ambil->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah["tanggal_pembelian"]; ?></td>
                                <td>
                                    <?php echo $pecah["status_pembelian"]; ?>
                                    <br>
                                    <?php if (!empty($pecah['resi_pengiriman'])) : ?>
                                    Resi: <b><?php echo $pecah['resi_pengiriman']; ?></b>
                                    <?php endif ?>
                                </td>
                                <td>Rp. <?php echo number_format($pecah["total_pembelian"]); ?></td>
                                <td>
                                    <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info btn-sm"><i class="far fa-sticky-note"></i> Note</a>
                                    <?php if ($pecah['status_pembelian']=="Pending"): ?> 
                                        <a href="konfirmasi_pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success btn-sm"><i class="fas fa-credit-card"></i> Konfirmasi Pembayaran</a>
                                    <?php else: ?>
                                        <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Lihat Pembayaran</a>
                                    <?php endif  ?>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ;?>