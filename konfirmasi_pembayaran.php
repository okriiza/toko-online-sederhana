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

// mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();


// mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yang login
$id_pelanggan0login = $_SESSION["users"]["id_users"];

if ($id_pelanggan0login !== $id_pelanggan_beli) {
    echo "<script>alert('Kamu Nakal Yahh');</script>";
    echo "<script>location='riwayat.php';</script>";
}
?>

<!-- mengambil menu navbar -->
<?php include 'navbar.php'; ?>

<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top:100px;">
        <div class="col-md-4">
            <div class="card ">
                <img class="m-3 mx-auto" src="assets/logo/logo.png" width="50" >
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <!-- <p class="text-success"> <b>Kirim Bukti Pembayaran Disini !</b> </p> -->
                    <div class="alert alert-info"> Total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>
                        <div class="form-group">
                            <label for="" >Nama Penyetor</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="" >Bank</label>
                            <input type="text" class="form-control" name="bank" required>
                        </div>
                        <div class="form-group">
                            <label for="" >Jumlah</label>
                            <input type="nunber" class="form-control" name="jumlah" required min="1">
                        </div>
                        <div class="form-group">
                            <label for="" >Foto Bukti</label>
                            <input type="file" class="form-control" name="bukti" required>
                            <p class="text-danger"> Foto Bukti Harus JPG maksimal 2MB</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" name="kirim"> <i class="fas fa-paper-plane"></i> Kirim </button>
                        </div>
                    </form><!-- /.form -->
                    <?php 
                    // jika ada tombol kirim/ tombil di kirim di tekan
                    if (isset($_POST["kirim"])) {
                        // upload dulu foto bukti
                        $namabukti = $_FILES["bukti"]["name"];
                        $lokasibukti = $_FILES["bukti"]["tmp_name"];
                        $namafiks = date("ymdHis").$namabukti;
                        move_uploaded_file($lokasibukti,"assets/img/bukti_pembayaran/$namafiks");

                        $nama = $_POST["nama"];
                        $bank = $_POST["bank"];
                        $jumlah = $_POST["jumlah"];
                        $tanggal = date("Y-m-d");

                        // Simpan Pembayaran
                        $koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal,bukti) VALUE('$idpem','$nama','$bank', '$jumlah','$tanggal','$namafiks')");

                        // update data pembelian dari pending jadi sudah kirim pembayaran
                        $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

                        echo "<script>alert('Bukti Pembayaran Terkirim');</script>";
                        echo "<script>location='riwayat.php';</script>";
                    }
                    
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ;?>