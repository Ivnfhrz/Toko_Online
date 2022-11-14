<?php
include "koneksi.php";
if ($_POST['simpan']) {
	$nama_produk = $_POST['nama_produk'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	//upload foto

	print_r($_FILES);
	$nama_gambar= $_FILES['foto_produk']['name'];
	$gambar= $_FILES['gambar'];
	$target_dir="../foto_produk";
	include "upload.php";

	if (empty(@$nama_produk)) {
		//echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
	} else {
		$query = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) VALUE ('" . $nama_produk . "','" . $deskripsi . "','" . $harga . "','" . $nama_gambar . "')");
		echo mysqli_error($conn);
		if ($query && $uploadOk) {
			//echo "<script>alert('Sukses menambahkan produk');location.href='Produk.php';</script>";
		} else {
			//echo "<script>alert('Gagal $status');location.href='Produk.php';</script>";
		}
	}
}
