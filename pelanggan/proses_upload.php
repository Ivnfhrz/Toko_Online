<?php
    include "koneksi.php";
    if($_POST['simpan']){
        $nama_produk=$_POST['nama_produk'];
        $deskripsi=$_POST['deskripsi'];
        $harga=$_POST['harga'];
        //upload foto
        $ekstensi = array('png','jpg','jpeg');
		$namafile = $_FILES['foto_produk']['name'];
		$tmp = $_FILES['foto_produk']['tmp_name'];
		$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
		$ukuran = $_FILES['foto_produk']['size'];

        if(empty(@$nama_produk)){
            echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
        }else{
			if(!in_array($tipe_file, $ekstensi)){
				header("location:tambah_produk.php?alert=gagal_ektensi");
			}else{
				if($ukuran < 1044070){			
					move_uploaded_file($tmp, 'foto_produk/'.$namafile);
					$query = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) VALUE ('".$nama_produk."','".$deskripsi."','".$harga."','".$namafile."')");
                    echo mysqli_error($conn);
					if($query){
						echo "<script>alert('Sukses menambahkan produk');location.href='Produk.php';</script>";
					}else{

						echo "<script>alert('Gagal menambahkan produk');location.href='Produk.php';</script>";
					}
				}else{
					echo "<script>alert('Ukuran Terlalu Besar');location.href='tambah_produk.php';</script>";
				}
			}
		}
		
    }
?>