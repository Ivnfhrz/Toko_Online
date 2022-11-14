<?php 
    if($_POST){
        $username=$_POST['username'];//mendapatkan fariable dari post sebelumnya
        $password=$_POST['password'];
        if(empty($username)){//mengecek apakah username password kosong
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            //mencari dari databes petugas dengan kondisi jika username dan password sesuai
            $qry_login=mysqli_query($conn,"select * from pelanggan where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                //mengset fariable jika hasilnya ada ke session
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_pelanggan']=$dt_login['id_pelanggan'];
                $_SESSION['nama']=$dt_login['nama'];
                $_SESSION['status_login']=true;
                header("location: home.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>
