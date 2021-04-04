<?php 

// mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian' ");
$detail = $ambil->fetch_assoc();
?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Pembelian</li>
                <li class="breadcrumb-item active">Detail Pembayaran</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail Pembayaran</h3>
                <a href="index.php?page=pembelian" class="btn btn-success btn-sm float-right"> <i class="fa fa-undo"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $detail['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td><?php echo $detail['bank'] ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
                            </tr>
                            <tr>
                                <th>tanggal</th>
                                <td><?php echo $detail['tanggal'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="../assets/img/bukti_pembayaran/<?php echo $detail['bukti']?>" alt="" class="img-responsive" width="350">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No Resi Pengiriman</label>
                                        <input type="text" class="form-control" name="resi" placeholder="Masukkan No Resi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Pilih Status</option>
                                            <option value="lunas">Lunas</option>
                                            <option value="barang dikirim">Barang Dikirim</option>
                                            <option value="batal">Batal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" name="proses"> <i class="fas fa-spinner"></i> Prosess</button>
                        </form>
                        <?php 
                        if (isset($_POST["proses"])) {
                            $resi = $_POST["resi"];
                            $status = $_POST["status"];

                            $koneksi->query("UPDATE pembelian set resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
                            echo "<script>alert('data pembelian terupdate')</script>";
                            echo "<script>location='index.php?page=pembelian';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>