<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
                <a href="index.php?page=tambahuser" class="btn btn-success btn-sm float-right"> <i class="fa fa-plus"></i> Tambah User</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor = 1 ;?>
                    <?php $ambil = $koneksi->query("SELECT * FROM admin") ;?>
                    <?php while($pecah = $ambil->fetch_assoc()) {?>
                        <tr>
                            <td align="center"><?php echo $nomor++ ;?></td>
                            <td><?php echo $pecah['nama'] ;?></td>
                            <td><?php echo $pecah['username'] ;?></td>
                            <td style="width: 15%">
                                <!-- <a href="index.php?page=edituser&id=<?php echo $pecah['id_admin'] ;?>" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i></a> -->
                                <a href="index.php?page=hapususer&id=<?php echo $pecah['id_admin'] ;?>" onclick="return confirm('Yakin Akan Hapus User ini ?')" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ;?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>