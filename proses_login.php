<?php
require_once 'session.php';
require_once 'koneksi.php';
require_once 'fungsi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query = "select * from petugas where username='$username' and password='$password';";
    $hasil= mysqli_query($koneksi,$query);
    $cek= mysqli_num_rows($hasil);
    if ($cek==1){
        session_start();
        $data= mysqli_fetch_array($hasil);
        $_SESSION["nama_lengkap"]=$data["nama_lengkap"];
        $_SESSION["login"]=true;
        header("location:./dashboard.php");
    }
    else{
        echo("Login Gagal");
        header("location:./login.php?msg=loginfail");
    }
?>