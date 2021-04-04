<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pembelian</li>
                    </ol>
                </div>
            </div>
        </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Pembelian</h3>
                <!-- <a href="index.php?page=tambahproduk" class="btn btn-success btn-sm float-right"> <i class="fa fa-plus"></i> Tambah Produk</a> -->
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:15%;">Nama Pelanggan</th>
                            <th style="width:12%;">Tanggal</th>
                            <th style="width:10%;">Total</th>
                            <th style="width:15%;">Kota Pengiriman</th>
                            <th style="width:17%;">Alamat Pengiriman</th>
                            <th style="width:15%;">Status Pembelian</th>
                            <th style="width:10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1; ?>
                    <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_pelanggan=users.id_users"); ?>
                    <?php while($pecah=$ambil->fetch_assoc()){ ?>
                        <tr>
                            <td align="center"><?php echo $nomor;?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                            <td><?php echo $pecah['total_pembelian']; ?></td>
                            <td><?php echo $pecah['nama_kota']; ?></td>
                            <td><?php echo $pecah['alamat_pengiriman']; ?></td>
                            <td><?php echo $pecah['status_pembelian'] ?></td>
                            <td style="width: 15%">
                                <a href="index.php?page=detail&id=<?php echo $pecah['id_pembelian'] ;?>" class="btn btn-info btn-sm"> <i class="fas fa-cog"></i></a>
                                <?php  if ($pecah['status_pembelian']!=="Pending"):?>
                                <a href="index.php?page=pembayaran&id=<?php echo $pecah['id_pembelian'] ;?>" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i></a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php } ;?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>