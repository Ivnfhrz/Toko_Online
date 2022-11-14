  <?php
    if($_POST){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        print_r($password);
        if(empty($nama)){
            //echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        } elseif(empty($alamat)){
            //echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        } elseif(empty($telp)){
            //echo "<script>alert('telp tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        } elseif(empty($username)){
            //echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        } elseif(empty($password)){
            //echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        } else {
            include "koneksi.php";
            $insert = mysqli_query($conn,"insert into pelanggan (nama, alamat, telp, username, password) value ('".$nama."','".$alamat."','".$telp."','".$username."','".$password."')") or die(mysqli_error($conn));
        if($insert){
            // header("location: tambah_pelanggan.php");
            //echo "<script>alert('Sukses menambahkan pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            //echo "<script>alert('Gagal menambahkan pelanggan');location.href='tampil_pelanggan.php';</script>";
        }
      }
    }
  ?>