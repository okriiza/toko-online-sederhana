<?php
if (!isset($_SESSION)) {
    session_start();
}
//koneksi ke database
include 'koneksi.php';

// jika tidak ada session pelanggan (belum login) maka dilarikan ke  login.php
if (!isset($_SESSION["users"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<?php 
include 'navbar.php';
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
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
                </nav>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1 class="font-weight-bold">Checkout</h1>
                        <p class="font-weight-light">List Produk yang akan di beli</p>
                        <div class="attendee">
                            <table class="table table-respinsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>NO</td>
                                        <td>Produk</td>
                                        <td>Harga</td>
                                        <td>Jumlah</td>
                                        <td>Subtotal</td>
                                        <!-- <td></td> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if (!isset($_SESSION['keranjang']) or empty($_SESSION['keranjang'])) {
                                    echo "<tr><td colspan='5' class='text-center'>Tidak ada item</td></tr>";
                                } else { ?>
                                    <?php $nomor = 1; ?>
                                    <?php $totalbelanja = 0; ?>
                                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                    <!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk'");
                                    $pecah = $ambil->fetch_assoc();
                                    $subharga = $pecah["harga_produk"] * $jumlah;
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $nomor; ?></td>
                                            <td class="align-middle"><?php echo $pecah["nama_produk"]; ?> </td>
                                            <td class="align-middle">Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                                            <td class="align-middle"><?php echo $jumlah; ?></td>
                                            <td class="align-middle">Rp. <?php echo  number_format($subharga); ?></td>
                                        </tr>
                                    <?php $nomor++; ?>
                                    <?php $totalbelanja += $subharga; ?>
                                    <?php endforeach ?>
                                <?php } ;?>
                                </tbody>
                            </table>
                        </div>
                        <h1>Data Pengiriman</h1>
                        <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Nama</b></label>
                                        <input type="text" readonly value="<?php echo $_SESSION["users"]['nama'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Alamat Lengkap Pengiriman</b></label>
                                        <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman (termasuk kode pos)" require></textarea>
                                    </div> <!-- /.form-group-->
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Telepon</b></label>
                                    <input type="text" readonly value="<?php echo $_SESSION["users"]['no_hp'] ?>" class="form-control">
                                    </div>
                                <label for=""><b>Ongkir</b></label>
                                <select name="id_ongkir" id="" class="form-control">
                                    <option value="">Pilih Ongkos Kirim</option>
                                    <?php $ambil = $koneksi->query("SELECT * FROM ongkir");
                                    while ($perongkir = $ambil->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $perongkir["id_ongkir"] ?>">
                                            <?php echo $perongkir['nama_kota'] ?> -
                                            Rp. <?php echo number_format($perongkir['tarif']) ?>
                                        </option>
                                    <?php  } ?>
                                </select>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Informasi</h2>
                        <table class="trip-informations mt-2">
                        <tr>
                            <th width="50%">Total</th>
                            <td width="50%" class="text-right"><b>

                            Rp. <?php if (!isset($totalbelanja) OR empty($totalbelanja)) {
                                echo '0';
                                } else {
                                    echo number_format($totalbelanja);
                                }
                                ?>
                            
                            </b></td>
                        </tr>
                        
                        </table>
                        <div class="member mt-3">
                            <!-- <button class="btn btn-outline-secondary "> <i class="fa fa-angle-double-left"></i> KEMBALI</button>
                            <button class="btn btn-login float-right"><i class="fa fa-check-circle"></i> Lanjut Checkout</button> -->
                            <h3 class="mt-4 mb-0 font-weight-bold">CATATAN</h3>
                            <p class="disclaimer mb-0 font-weight-light"> -
                            Bila anda ingin menambahkan kembali produk yang sudah di beli , silahkan kembali ke halaman awal, dan pilih produk serupa.
                            </p>
                            <p class="disclaimer mb-0 font-weight-light"> -
                            Pastikan Data Pengiriman Sudah lengkap.
                            </p>
                        </div>
                    </div>
                    <div class="join-container">
                        <!-- <a href="success.html" class="btn btn-block btn-join-now mt-3 py-2"><i class="fa fa-check"></i> CHECKOUT </a> -->
                        <button class="btn btn-block btn-join-now mt-3 py-2" name="checkout"><i class="fa fa-check"></i> CHECKOUT </button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="keranjang.php" class="text-muted"><i class="fa fa-angle-double-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </form>
        <?php
            if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["users"]["id_users"];
            $id_ongkir = $_POST["id_ongkir"];
            $tanggal_pembelian = date("y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['nama_kota'];
            $tarif = $arrayongkir['tarif'];

            $total_pembelian = $totalbelanja + $tarif;

            // 1. menyimpan data ke table pembelian
            $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUE ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman') ");

            // mendaptakan id-pembelian barusan terjadi
            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];

                $subberat = $perproduk['berat_produk'] * $jumlah;
                $subharga = $perproduk['harga_produk'] * $jumlah;
                $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk,nama,harga,berat,subberat,subharga, jumlah) VALUE ('$id_pembelian_barusan', '$id_produk','$nama','$harga','$berat','$subberat','$subharga', '$jumlah') ");

                // update stok
                $koneksi->query("UPDATE produk SET stok_produk = stok_produk -$jumlah WHERE id_produk='$id_produk' ");
            }
            //mengosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            // tampilan di alihkan ke halaman nota, nota dari pembelian barusan
            echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
        }
        ?>
    </div>
</section>


<?php include 'footer.php' ;?>