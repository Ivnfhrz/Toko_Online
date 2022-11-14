<?php
include "header.php";
error_reporting(E_ERROR | E_PARSE);
?>
 <div class="sectionn">
        <div class="containerr">
            <h3>ADMIN STATUS</h3>
            <div class="boxx">
                <table class="table">
                    <thead>
                        <th>NO</th>
                        <th>Pembeli</th>
                        <th>Tanggal Beli</th>
                        <th>Nama Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        
                         $no = 1;
                        echo "id: ".$_SESSION['id_petugas'];
                        echo "id: ".$_SESSION['id_pelanggan'];
                        $qry_histori = mysqli_query($conn, "select * from transaksi join pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan ORDER BY id_transaksi DESC;");
                        echo "histori: " .mysqli_num_rows($qry_histori);
                        while ($dt_histori = mysqli_fetch_array($qry_histori)) {

                            $qry_histori1 = mysqli_query($conn, "select * from detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk where id_transaksi='" . $dt_histori['id_transaksi'] . "'");
                             
                            while ($dt_histori1 = mysqli_fetch_array($qry_histori1)) {
                                $subtotal =$dt_histori1['qty'] * $dt_histori1['harga'];
                        ?> <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt_histori['nama']?></td>
                                <td><?= $dt_histori['tgl_transaksi'] ?></td>
                                <td><?= $dt_histori1[ 'nama_produk'] ?></td>
                                <td><?= "Rp. " . $subtotal?></td>
                                <td><?= $dt_histori['status'] ?></td>
                                <td>

                                    <form action="proses_ubah_status.php" method="post">
                                        <input type="hidden" name="id_transaksi" value="<?= $dt_histori['id_transaksi'] ?>">
                                        <select name="status" onchange='if(this.value != 0) { this.form.submit(); }'>
                                            <option value=""></option>
                                            <option value="Menunggu Barang di Confirm">Menunggu Barang diconfirm</option>
                                            <option value="Barang Sudah di Confirm">Barang Sudah di Confirm</option>
                                            <option value="Produk Sedang Dikemas">Barang Sedang di Kemas</option>
                                            <option value="Produk Sedang Dikirim">Barang Sedang di Kirim</option>
                                            <option value="Produk Sudah Diterima">Barang Sudah di Terima</option>
                                        </select>
                                    </form>

                                </td>

                            </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>