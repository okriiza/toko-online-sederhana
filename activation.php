<?php 
include 'koneksi.php' ;
include 'navbar.php';
?>

<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top:100px;">
        <div class="col-md-4">
            <div class="card ">
                <img class="m-3 mx-auto" src="assets/logo/logo.png" width="50" >
                <div class="card-body">
                <h4 class="card-title mb-4 text-center">Status Activasi Akun</h4>
                <?php
                    $token=$_GET['t'];
                    $sql_cek=mysqli_query($koneksi,"SELECT * FROM users WHERE token='".$token."' and aktif='0'");
                    $jml_data=mysqli_num_rows($sql_cek);
                    if ($jml_data>0) {
                        //update data users aktif
                        mysqli_query($koneksi,"UPDATE users SET aktif='1' WHERE token='".$token."' and aktif='0'");
                        echo '<div class="alert alert-success">
                                    Akun anda sudah aktif, silahkan <a href="login.php">Login</a>
                                    </div>';
                    }else{
                                //data tidak di temukan
                                echo '<div class="alert alert-warning">
                                    Invalid Token!
                                    </div>';
                            }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php' ;?>