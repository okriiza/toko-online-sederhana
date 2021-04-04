<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>
                <!-- <a href="index.php?page=tambahpelanggan" class="btn btn-success btn-sm float-right"> <i class="fa fa-plus"></i> Tambah Pelanggan</a> -->
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:15%;">Nama</th>
                            <th style="width:12%;">Email</th>
                            <th style="width:10%;">Telepon</th>
                            <!-- <th style="width:10%;">Alamat</th> -->
                            <th style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1; ?>
                    <?php $ambil=$koneksi->query("SELECT * FROM users");?>
                    <?php while($pecah=$ambil->fetch_assoc()) { ?>
                        <tr>
                            <td align="center"><?php echo $nomor++ ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td><?php echo $pecah['email']; ?></td>
                            <td><?php echo $pecah['no_hp']; ?></td>
                            <!-- <td><?php echo $pecah['alamat_pelanggan'] ;?></td> -->
                            <td>
                                <a href="index.php?page=dethapuspelangganail&id=<?php echo $pecah['id_users'] ;?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ;?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>