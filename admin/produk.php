<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Produk</h3>
                <a href="index.php?page=tambahproduk" class="btn btn-success btn-sm float-right"> <i class="fa fa-plus"></i> Tambah Produk</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:15%;">Nama Produk</th>
                            <th>Deskripsi Produk</th>
                            <th style="width:10%;">Harga</th>
                            <th>Berat</th>
                            <th>Foto</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1; ?>
                    <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                    <?php while($pecah=$ambil->fetch_assoc()){ ?>
                        <tr>
                            <td align="center"><?php echo $nomor++; ?></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td><?php echo $pecah['deskripsi_produk']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                            <td><?php echo $pecah['berat_produk']; ?></td>
                            <td>
                                <img src="../assets/img/produk/<?php echo $pecah['foto_produk']; ?>" width="100">
                            </td>
                            <td><?php echo $pecah['stok_produk']; ?></td>
                            <td style="width: 15%">
                                <a href="index.php?page=editproduk&id=<?php echo $pecah['id_produk'] ;?>" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i></a>
                                <a href="index.php?page=detailproduk&id=<?php echo $pecah['id_produk'] ;?>" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i></a>
                                <a href="index.php?page=hapusproduk&id=<?php echo $pecah['id_produk'] ;?>" onclick="return confirm('Yakin Akan Hapus Produk ini ?')" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ;?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>