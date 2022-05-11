<?php
    include('connect.php');

    $nbi = $_GET['nbi'];
    mysqli_query($koneksi,"delete from tb_identitas where nbi='$nbi'");
    header("location:index.php");
?>