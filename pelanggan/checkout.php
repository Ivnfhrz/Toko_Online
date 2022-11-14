<?php
    session_start();
    include "koneksi.php";
    $keranjang = @$_SESSION['keranjang'];
    if (count($keranjang) > 0) {
        $tgl_transaksi = date('Y-m-d');
        $query_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_transaksi, id_pelanggan, tgl_transaksi)
        VALUES (null, '".$_SESSION['id_pelanggan']."', '".$tgl_transaksi."')");
        //print_r($_SESSION['id_pelanggan']." ".$tgl_transaksi);
        if ($query_transaksi) {
            $id = mysqli_insert_id($conn);
            foreach ($keranjang as $key => $value) {
                $qty = $value['qty'];
                $harga = $value['harga'];
                $subtotal = $qty*$harga;
                mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal)
                VALUES ('".$id."', '".$value['id_produk']."', '".$qty."', '".$subtotal."')");
            }
            unset($_SESSION['keranjang']);
            echo "<script>alert('Anda Berhasil Membeli Produk');location.href='transaksi.php'</script>";
        }
        else{
            //echo "<script>alert('Gagal Membeli Produk');location.href='checkout.php'</script>";
        }
    }
?>