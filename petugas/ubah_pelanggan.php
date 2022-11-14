<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body{
      background-color: #4682b4;
      margin-top: 100px;
      }
  </style>
</head>
<body>
<?php
    include "koneksi.php";
    $qry_get_pelanggan=mysqli_query($conn,"select * from pelanggan where id_pelanggan = '".$_GET['id_pelanggan']."'");
    $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);
?>
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-white">Ubah Pelanggan</div>
    <div class="card-body">
      <form action="proses_ubah_pelanggan.php" method="post">
      <input type="hidden" name="id_pelanggan" value= "<?=$dt_pelanggan['id_pelanggan']?>">
        <div class="form-group">
          <label>Nama Pelanggan</label>
          <input type="text" name="nama" value= "<?=$dt_pelanggan['nama']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" value= "<?=$dt_pelanggan['alamat']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Telp</label>
          <input type="text" name="telp" value= "<?=$dt_pelanggan['telp']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" value= "<?=$dt_pelanggan['username']?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" value="" class="form-control">
        </div>
        <a href="tampil_pelanggan.php" class="btn btn-danger" type="submit" value="KEMBALI">Kembali</a>
        <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
</body>
</html>