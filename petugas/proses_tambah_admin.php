<?php
if($_POST){
    $admin_nama=$_POST['admin_nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $admin_telp=$_POST['admin_telp'];
    $admin_email=$_POST['admin_email'];
    $admin_address=$_POST['admin_address'];
        include "db.php";
        $insert=mysqli_query($conn,"insert into tb_admin (admin_nama, username, password, admin_telp, admin_email, admin_address) value ('".$admin_nama."','".$username."','".md5($password)."','".$admin_telp."', '".$admin_email."', '".$admin_address."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan admin');location.href='login_admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan admin');location.href='register-admin.php';</script>";
        }
}
?>