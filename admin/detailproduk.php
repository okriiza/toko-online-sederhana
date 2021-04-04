<?php  

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($tiap = $ambilfoto->fetch_assoc()){
    $fotoproduk[] = $tiap;
}

?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
                <li class="breadcrumb-item active">Detail Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail Produk</h3>
                <!-- <a href="index.php?page=tambahproduk" class="btn btn-success btn-sm float-right"> <i class="fa fa-plus"></i> Tambah Produk</a> -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Produk</th>
                                <td><?php echo $detailproduk['nama_produk'] ;?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td><?php echo number_format($detailproduk['harga_produk']) ;?></td>
                            </tr>
                            <tr>
                                <th>Berat</th>
                                <td><?php echo $detailproduk['berat_produk'] ;?></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><?php echo $detailproduk['deskripsi_produk'] ;?></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td><?php echo $detailproduk['stok_produk'] ;?></td>
                            </tr>
                        </table>
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="">Upload Foto</label>
                                <input type="file" name="fotomu" class="form-control-file">
                            </div>
                            <button class="btn btn-primary btn-sm" name="simpan" value="simpan">Simpan</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="foto-detail-produk row">
                    <?php foreach ($fotoproduk as $key => $value) :?>
                            <div class="col-md-4 text-center">
                                <img src="../assets/img/produk/<?php echo $value['nama_produk_foto'] ;?>" alt="" class="img-responsive mb-2" width="100%" height="200">
                                <a href="index.php?page=hapusfotoproduk&idfoto=<?php echo $value['id_produk_foto'] ;?>&idproduk=<?php echo $id_produk ;?>" class="btn btn-danger btn-sm mb-2"> Hapus</a>
                            </div>
                    <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  

if (isset($_POST['simpan'])) {
    $lokasifoto = $_FILES['fotomu']['tmp_name'];
    $namafoto = $_FILES['fotomu']['name'];

    $namafoto = date('YmdHis').$namafoto;

    move_uploaded_file($lokasifoto, "../assets/img/produk/".$namafoto);
    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$id_produk','$namafoto')");
    echo "<script>alert('Foto Produk Berhasil Tersimpan');</script>";
    echo "<script>location='index.php?page=detailproduk&id=$id_produk';</script>";
}

?>