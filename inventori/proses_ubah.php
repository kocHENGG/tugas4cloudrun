<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';
$id = $_POST["id"];
$kode = $_POST["kode"];
$nama = $_POST["nama"];
$jumlah = $_POST["jumlah"];
$satuan = $_POST["satuan"];
$date = $_POST["date"];
$harga = $_POST["harga"];
$kategori = $_POST["kategori"];
$status = $_POST["status"];

$query = "UPDATE inventaris SET kode_barang='$kode', nama_barang='$nama', jumlah='$jumlah', satuan='$satuan', tgl_datang='$date', kategori='$kategori', status_barang='$status', harga='$harga' WHERE id='$id'";
$berhasil = mysqli_query($koneksi, $query);
if ($berhasil) {
    header("location:index.php");
} else {
    header("location:./");
}
?>