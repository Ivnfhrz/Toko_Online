<?php
if($_POST){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $telp=$_POST['telp'];
    $alamat=$_POST['alamat'];
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into pelanggan (nama, username, password, telp,alamat) value ('".$nama."','".$username."','".md5($password)."','".$telp."', '".$alamat."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan admin');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan admin');location.href='login.php';</script>";
        }
}
?>  
