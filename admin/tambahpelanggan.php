<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Pelanggan</li>
                <li class="breadcrumb-item active">Tambah Pelanggan</li>
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
                        <h3 class="card-title">Pelanggan</h3>
                        <div class="card-tools">
                            <a href="index.php?page=pelanggan" class="btn btn-warning btn-sm float-right"><i class="fa fa-undo"></i> kembali</a>
                        </div>
                    </div>
                    <?php 
                    if(isset ($_POST['save'])){
                        $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUE('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[telepon]','$_POST[alamat]')");
                        echo "<div class='alert alert-info'> Data Tersimpan</div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php?page=pelanggan'>";
                    }
                    ?>
                    <div class="card-body pad">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Nama Lengkap </label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="">Email </label>
                                <input type="email" class="form-control" name="email">
                            </div>      
                            <div class="form-group">
                                <label for="">Password </label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="number" class="form-control" name="telepon">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <button class="btn btn-primary" name="save"> <i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>