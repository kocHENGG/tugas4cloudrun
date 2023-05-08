<?php
require_once 'session.php';
require_once 'koneksi.php';
require_once 'fungsi.php';
$username = $_POST['username'];
$fullname = $_POST['nama_lengkap'];
$email = $_POST['email'];
$no_tlp = $_POST['no_tlp'];
$password = $_POST['password'];

$query = "INSERT INTO petugas (username, password, nama_lengkap, email, no_tlp ) VALUES('$username','$password','$fullname', '$email', '$no_tlp')";
$hasil = mysqli_query($koneksi,$query);
if ($hasil) {
    header("location:./login.php?msg=regis");
}
else {
    header("location:./");
}
?>