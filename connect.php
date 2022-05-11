<?php
    $serverName="localhost";
    $username = "root";
    $password = "";
    $database = "mahasiswa";

    $koneksi=mysqli_connect($serverName,$username,$password,$database);

    // if (!$koneksi) {
    //     die("Koneksi gagal: " . mysqli_connect_error());
    // }
    // echo "Koneksi berhasil";
    // mysqli_close($koneksi);
?>