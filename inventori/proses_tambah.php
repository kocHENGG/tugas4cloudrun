<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';

$kode = $_POST["kode"];
$nama = $_POST["nama"];
$jumlah = $_POST["jumlah"];
$satuan = $_POST["satuan"];
$date = $_POST["date"];
$kategori = $_POST["kategori"];
$status = $_POST["status"];
$harga = $_POST["harga"];

$query = "INSERT INTO inventaris (kode_barang, nama_barang, jumlah, satuan, tgl_datang, kategori, status_barang, harga) VALUES('$kode','$nama','$jumlah','$satuan','$date','$kategori','$status','$harga')";
$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    header("location:tambah.php");
} else {
    header("location:./");
}
?>