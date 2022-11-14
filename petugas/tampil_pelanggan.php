<?php 
    include "header.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Pelanggan</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="main_content">
        <div class="header" align="center">
          <h4>Daftar Pelanggan</h4>
        </div>  
        <div class="info">
            <table class="table table-striped" >
                <thead style="background-color: #3274d6" align="center">
                    <tr style="color: white">
                        <th>NO</th><th>NAMA</th><th>ALAMAT</th>
                        <th>TELP</th><th>USERNAME</th>
                        <th>PASSWORD</th><th>AKSI</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php
                        include "koneksi.php";
                        $qry_pelanggan=mysqli_query($conn,"select * from pelanggan");
                        $no=0;
                        while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){
                        $no++;
                    ?>
                        <tr>
                            <td><?=$no?></td><td><?=$data_pelanggan['id_pelanggan']?></td>
                            <td><?=$data_pelanggan['alamat']?></td>
                            <td><?=$data_pelanggan['telp']?></td>
                            <td><?=$data_pelanggan['username']?></td>
                            <td><?=$data_pelanggan['password']?></td>
                            <td><a href="ubah_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success">Ubah</a> 
                            <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    ?>
                </tbody>
            </table>
            <td><a href="tambah_pelanggan.php" class="btn btn-primary">+Tambah Pelanggan</a></td>
        </div>
    </div>
</div>
</body>
</html>