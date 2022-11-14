<?php
if($_POST){
    $pelanggan=$_POST['id_pelanggan'];
    $petugas=$_POST['id_petugas'];
    $tanggal = $_POST["tanggal"];
    if(empty($pelanggan)){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }  elseif(empty($petugas)){
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }elseif(empty($tanggal)){
        echo "<script>alert('tanggal tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } else {
        include "../koneksi.php";
        $insert=mysqli_query($conn,"insert into transaksi (id_pelanggan, id_petugas ,  tgl_transaksi) value ('".$pelanggan."','".$petugas."','".$tanggal."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
        }
    }
}
?>