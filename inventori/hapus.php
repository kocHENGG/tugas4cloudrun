<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';

$kode = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM inventaris WHERE kode_barang = $kode");
if($query){
	header('Location: index.php');
} else die("gagal!" . mysqli_error($koneksi));
?>