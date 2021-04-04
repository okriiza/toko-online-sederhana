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
                <li class="breadcrumb-item active">Tambah Produk</li>
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
                    <?php 
                        if(isset ($_POST['save'])){
                            $namanamafoto = $_FILES['foto']['name'];
                            $lokasilokasifoto = $_FILES['foto']['tmp_name'];
                            move_uploaded_file($lokasilokasifoto[0], '../assets/img/produk/'.$namanamafoto[0]);
                            $koneksi->query("INSERT INTO produk (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk, stok_produk) VALUE('$_POST[nama]','$_POST[harga]','$_POST[berat]','$namanamafoto[0]','$_POST[deskripsi]','$_POST[stok]')");

                            $id_produk_barusan = $koneksi->insert_id;

                            foreach ($namanamafoto as $key => $tiap_nama) {
                                $tiap_lokasi = $lokasilokasifoto[$key];
                                move_uploaded_file($tiap_lokasi, '../assets/img/produk/'.$tiap_nama);
                                $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES 
                                ('$id_produk_barusan','$tiap_nama')");
                            }

                            echo "<div class='alert alert-info'> Data Tersimpan</div>";
                            echo "<meta http-equiv='refresh' content='1;url=index.php?page=produk'>";
                        }
                    ?>

                    <div class="card-body pad">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="">Harga (Rp) </label>
                                <input type="number" class="form-control" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="">Berat (Gr) </label>
                                <input type="number" class="form-control" name="berat">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <div class="mb-3">
                                    <textarea class="textarea" placeholder="Place some text here" name="deskripsi"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <div class="btn btn-primary btn-sm btn-tambah float-right mb-1">
                                    <i class="fa fa-plus"></i> Tambah Foto
                                </div>
                                <div class="letak-input">
                                    <input type="file" class="form-control mb-2" name="foto[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Stok  </label>
                                <input type="number" class="form-control" name="stok">
                            </div>
                            <button class="btn btn-primary" name="save"> <i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    