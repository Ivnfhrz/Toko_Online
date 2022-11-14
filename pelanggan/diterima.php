<?php
if($_GET['id']){
    include "koneksi.php";
    $id_transaksi=$_GET['id'];
        $update=mysqli_query($conn,"update transaksi set status='Produk Sudah diterima' where id_transaksi = ".$id_transaksi."") or die(mysqli_error($conn));
        echo "<script>alert('Sukses update status');location.href='transaksi.php';</script>";
   }
?>