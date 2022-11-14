<?php
include 'header.php'
?><!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "koneksi.php";
    $qry_get_produk=mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
    $dt_produk=mysqli_fetch_array($qry_get_produk);
    ?>
    <h3 align="center">Ubah produk</h3>
    <form action="proses_ubah_produk.php" method="post">
        Nama produk :
        <input type="text" name="nama_produk" value="<?=$dt_produk['nama_produk']?>" class="form-control">
        Deskripsi :
        <input type="textarea" name="deskripsi" value="<?=$dt_produk['deskripsi']?>" class="form-control">
        Foto : 
        <input type="file" name="foto" value="<?=$dt_produk['foto_produk']?>" class="form-control">
        <br>
        <input type="submit" name="simpan" value="Ubah produk" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>