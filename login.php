
<?php
if (!isset($_SESSION)) {
  session_start();
}
// if (!empty($_SESSION['login'])) {
//   header("Location:index.php");
// } 
include "koneksi.php";
include 'navbar.php' ;
?>


<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top:100px;">
        <div class="col-md-4">
            <div class="card ">
                <img class="m-3 mx-auto" src="assets/logo/logo.png" width="50" >
                <?php  
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
                    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
                    //cek user terdaftar dan aktif
                    $sql_cek=mysqli_query($koneksi,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."' AND aktif='1'") or die(mysqli_error($koneksi));
                    $r_cek=mysqli_fetch_array($sql_cek);
                    $jml_data=mysqli_num_rows($sql_cek);
                    if ($jml_data>0) {
                        //buat session login dan redirect ke halaman utama
                        $_SESSION["users"]= $r_cek;
                        if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
                          echo "<script>location='checkout.php';</script>";
                      }else {
                          echo "<script>location='riwayat.php';</script>";
                      }
                    }else{
                        //data tidak di temukan
                        echo '<div class="alert alert-warning">
                            Username atau Password anda salah!
                            </div>';
                    }
                    }

            ?>
                <div class="card-body">
                    <h4 class="card-title mb-2 text-center">login</h4>
                    <form class="" method="POST">
                      <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                      </div>
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                      <button type="submit" name="login" class="btn btn-primary mx-auto btn-sm"><i class="fas fa-sign-in-alt "></i> Login</button>
                    </form>
                    <hr>
                    Tidak punya akun? <a href="register.php"> Register</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php' ;?>