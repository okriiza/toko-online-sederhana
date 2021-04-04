<?php 
//koneksi ke database
$koneksi = new mysqli("localhost","root","","db_pakaianku"); 
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>