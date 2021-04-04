<?php
$ambil = $koneksi->query("SELECT * FROM admin WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>


<div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">User</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Tambah User</li>
         </ol>
      </div>
   </div>
</div>

<div class="content">
   <div class="container-fluid ">
      <div class="row justify-content-center">
         <div class="col-md-6 ">
            <div class="card card-primary card-outline ">
               <div class="card-header">
                  <h3 class="card-title">User</h3>
                  <div class="card-tools">
                     <a href="index.php?page=user" class="btn btn-warning btn-sm float-right"><i class="fa fa-undo"></i> kembali</a>
                  </div>
               </div>


               <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $pecah['nama_lengkap']; ?>">
                     </div>
                     <div class="form-group">
                        <label>No Telpon</label>
                        <input type="number" name="notlp" class="form-control" value="<?php echo $pecah['notlp']; ?>">
                     </div>
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $pecah['username']; ?>">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $pecah['password']; ?>">
                     </div>
                     <div class="form-group">
                        <label>Level</label>
                        <?php $level = $pecah['level']; ?>
                        <select name="level" id="" class="form-control">
                           <option value="">Pilih Level</option>
                           <option <?php if ($level == '1') {
                                       echo "selected";
                                    }; ?> value="1">Admin</option>
                           <option <?php if ($level == '2') {
                                       echo "selected";
                                    }; ?> value="2">Kasir</option>
                        </select>
                     </div>
                     <button name="update" class="btn btn-primary btn-sm "><i class="fa fa-save"></i> Simpan</button>
                  </form>

                  <?php
                  if (isset($_POST['update'])) {
                     $username = $_POST['username'];
                     $password = md5($_POST['password']);
                     if (!empty($password)) {
                        $koneksi->query("UPDATE admin SET nama_lengkap='$_POST[nama_lengkap]',notlp='$_POST[notlp]',username='$username',level='$_POST[level]' WHERE id='$_GET[id]'");
                     } else {
                        $koneksi->query("UPDATE admin SET nama_lengkap='$_POST[nama_lengkap]',notlp='$_POST[notlp]',username='$username',password='$password',level='$_POST[level]' WHERE id='$_GET[id]'");
                     }
                     echo "<script>alert('Data User telah diubah')</script>";
                     echo "<script>location='index.php?page=user';</script>";
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>