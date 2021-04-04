<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_pelanggan = users.id_users WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pembelian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Pembelian</li>
                <li class="breadcrumb-item active">Detail Pembelian</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail Pembelian</h3>
                <a href="index.php?page=pembelian" class="btn btn-success btn-sm float-right"> <i class="fa fa-undo"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 pl-md-0">
                        <h2 class="font-weight-bold">Detail Pembelian</h2>
                        <p class="font-weight-light">Detail Pembelian Produk</p>
                        <hr>
                        <div class="row nota-info">
                            <div class="col-sm-4 nota-col">
                                <h2>Pembelian</h2>                       
                                <address>
                                <strong>No Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
                                Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                                </address>
                            </div>
                            <div class="col-sm-4 nota-col">
                                <h2>Pelanggan</h2>
                                <address>
                                <strong><?php echo $detail['nama']; ?></strong><br>
                                Phone: <?php echo $detail['no_hp'];?><br>
                                Email: <?php echo $detail['email']; ?>
                                </address>
                            </div>
                            <div class="col-sm-4 nota-col">
                                <h2>Pengiriman</h2>
                                <b><?php  echo $detail['nama_kota'] ?></b><br>
                                <b>Ongkos Kirim:</b> Rp. <?php echo number_format($detail['tarif']); ?><br>
                                <b>Alamat:</b> <?php echo $detail['alamat_pengiriman'];?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">NO</th>
                                            <th >Produk</th>
                                            <th width="15%">Harga</th>
                                            <th width="10%">Berat</th>
                                            <th width="5%">Jumlah</th>
                                            <th width="10%">Subberat</th>
                                            <th width="20%">Subharga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $nomor=1;?>
                                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                                    <?php while($pecah = $ambil->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $pecah['nama']; ?></td>
                                            <td>Rp. <?php echo number_format($pecah['harga']);?></td>
                                            <td><?php echo $pecah['berat'];?> Gr.</td>
                                            <td><?php echo $pecah['jumlah'];?></td>
                                            <td><?php echo $pecah['subberat'];?> Gr.</td>
                                            <td>Rp. <?php echo number_format($pecah['subharga']);?></td>
                                        </tr>
                                    <?php $nomor++?>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <p class="lead">Informasi Transaksi:</p>
                                <div class="table-responsive">
                                    <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>