<?php include 'navbar.php' ;?>


<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top:100px;">
        <div class="col-md-4">
            <div class="card ">
                <img class="m-3 mx-auto" src="assets/logo/logo.png" width="50" >
                <?php
              include "koneksi.php";
              if (isset($_POST['daftar'])) {
                  //ambil data dari form   
                  $Username=$_POST['Username'];
                  $Password= md5($_POST['Password']);
                  $Nama=$_POST['Nama'];
                  $Email=$_POST['Email'];
                  $Telepon=$_POST['Telepon'];
                  //buat token
                  $token=hash('sha256', md5(date('Y-m-d'))) ;
                  //cek user terdaftar
                  $sql_cek=mysqli_query($koneksi,"SELECT * FROM users WHERE email='".$Email."'");
                  $r_cek=mysqli_num_rows($sql_cek);
                  if ($r_cek>0) {
                    echo '<div class="alert alert-warning">
                            Email anda sudah pernah terdaftar!
                          </div>';
                  }else{
                    //jika data kosong maka insert ke tabel;
                    //aktif =0 user belum aktif
                    $insert=mysqli_query($koneksi,"INSERT INTO users(username,password,nama,email,no_hp,token,aktif) VALUES('".$Username."','".$Password."','".$Nama."','".$Email."','".$Telepon."','".$token."','0')");
                    //include kirim email
                    include("mail.php");

                    if ($insert) {
                        echo '<div class="alert alert-success">
                            Pendaftaran anda berhasil, silahkan cek email anda untuk aktivasi. 
                            <a href="login.php">Login</a>
                          </div>';
                    }
                  }                  
              }

            ?>
                <div class="card-body">
                    <h4 class="card-title mb-2 text-center">login</h4>
                    <form class="" method="POST">
                      <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="">Telepon</label>
                        <input type="text" class="form-control" id="Telepon" name="Telepon" placeholder="Telepon">
                      </div>
                      <button type="submit" name="daftar" class="btn btn-primary mx-auto btn-sm"><i class="fas fa-sign-in-alt "></i> Daftar</button>
                    </form>
                    <hr>
                    Sudah punya akun? <a href="login.php"> Login</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php' ;?>