    <?php
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
    ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Produk</li>
                    <li class="breadcrumb-item active">Update Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card card-primary card-outline ">
                <div class="card-header">
                    <h3 class="card-title">Produk</h3>
                    <div class="card-tools">
                        <a href="index.php?page=produk" class="btn btn-warning btn-sm float-right"><i class="fa fa-undo"></i> kembali</a>
                    </div>
                </div>

                <div class="card-body pad">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?> ">
                        </div>
                        <div class="form-group">
                            <label for="">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Berat (Gr)</label>
                            <input type="text" name="berat" class="form-control" value="<?php echo $pecah['berat_produk'];?>">
                        </div>
                        <div class="form-group">
                            <!-- <label for=""> Foto Pada Beranda</label> -->
                            <img src="../assets/img/produk/<?php echo $pecah['foto_produk']; ?>" width="200">
                        </div>
                        <div class="form-group">
                            <label for="">Ganti Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                                <div class="mb-3">
                                    <textarea class="textarea" placeholder="Place some text here" name="deskripsi"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pecah['deskripsi_produk']; ?></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Stok  </label>
                            <input type="number" class="form-control" name="stok" value="<?php echo $pecah["stok_produk"]; ?>">
                        </div>
                        <button class="btn btn-primary" name="ubah"> <i class="fa fa-exchange"></i> Ubah</button>
                    </form>
                    <?php
                    if (isset($_POST['ubah'])) {
                        $namafoto=$_FILES['foto']['name'];
                        $lokasifoto=$_FILES['foto']['tmp_name'];
                        //jika foto di rubah
                        if (!empty($lokasifoto)) {
                            move_uploaded_file($lokasifoto, "../assets/img/produk/$namafoto");
                            $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
                        } else {
                            $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
                        }
                        echo "<script>alert('Data Produk telah diubah')</script>";
                        echo "<script>location='index.php?page=produk';</script>";
                    } 
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>