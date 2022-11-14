<!--  -->
<!--  -->
<?php
include "header.php";
?>
<h2>Histori Pembelian Produk</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th>
        <th>Tanggal Bayar</th>
        <!-- <th>Tanggal Sampai</th> -->
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Aksi</th>

    </thead>
    <tbody>
        <?php
        include "koneksi.php";
        // if($_SESSION['nama_petugas']=="petugas\"){
        //     $qry_histori=mysqli_query($conn,"select * from transaksi order by id_transaksi desc");
        // }elseif($_SESSION['nama_petugas\']=="petugas\"){
        //     $qry_histori=mysqli_query($conn,"select * from transaksi where id_petugas\ ='".$id."' order by id_transaksi desc");
        // }alert
        $qry_histori = mysqli_query($conn, "select * from transaksi where id_pelanggan=" . $_SESSION['id_pelanggan'] . " order by id_transaksi desc");
        $no = 0;
        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
            $no++;
            //menampilkan produk yang dibeli
            $produk_dibeli = "<ol>";
            $qry_produk = mysqli_query($conn, "select * from  detail_transaksi join produk on produk.id_produk=detail_transaksi.id_produk where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                $produk_dibeli .= "<li>" . $dt_produk['nama_produk'] . "</li>";
            }
            $produk_dibeli .= "</ol>";

            //diterima
            $qry_cek_diterima = mysqli_query($conn, "select * from transaksi where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
            $qry_cek_diterima = mysqli_fetch_array($qry_cek_diterima);
            if ($qry_cek_diterima['status'] == 'Menunggu Barang di Confirm') {
                $status_diterima = "<label class='alert alert-success'>Menunggu Barang diconfirm</label>";
                $button_diterima = "";
            } elseif ($qry_cek_diterima['status'] == "Barang Sudah di Confirm") {
                $status_diterima = "<label class='alert alert-success'>Barang Sudah diconfirm</label>";
                $button_diterima = "";
            } elseif ($qry_cek_diterima['status'] == "Produk Sedang Dikemas") {
                $status_diterima = "<label class='alert alert-success'>Produk Sedang di Kemas</label>";
                $button_diterima = "";
            } elseif ($qry_cek_diterima['status'] == "Produk Sedang Dikirim") {
                $status_diterima = "<label class='alert alert-success'> Produk Sedang di Kirim</label>";
                $button_diterima = "<a href='diterima.php?id=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning' onclick='return confirm(\"Produk Sudah Diterima\")'>Diterima</a>";
            } elseif ($qry_cek_diterima['status'] == "Produk Sudah diterima") {
                $status_diterima = "<label class='alert alert-success'>Produk Sudah di Terima</label>";
                $button_diterima = "";
            } else {
                $status_diterima = "<label class='alert alert-danger'>Belum diterima</label>";
                $button_diterima = "";
            }
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $dt_histori['tgl_transaksi'] ?></td>
                <!-- <td><?= $dt_histori['tgl_sampai'] ?></td> -->
                <td><?= $produk_dibeli ?></td>
                <?php
                include "koneksi.php";
                $query_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
                while ($data_detail = mysqli_fetch_array($query_detail)) {
                    echo "<td>" . $data_detail['qty'] . "<td>";
                }
                ?>
                <td><?= $status_diterima ?></td>
                <td><?= $button_diterima ?></td>

            </tr>
        <?php
        }

        ?>
    </tbody>
</table>

</html>
<?php
include "footer.php";
?>