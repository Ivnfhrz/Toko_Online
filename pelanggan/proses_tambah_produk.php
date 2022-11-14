<?php
if($_POST){
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga = $_POST['harga'];
   $foto =$_POST['foto_produk'];
    if(empty($nama_produk)){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    }  elseif(empty($harga)){
        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
     }elseif(empty($foto)){
       echo "<script>alert('foto tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into produk (nama_produk, deskripsi,harga) value ('".$nama_produk."','".$deskripsi."','".$harga."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan produk');location.href='Produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    }
}
?>