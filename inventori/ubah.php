<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../fungsi.php';


$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM inventaris WHERE kode_barang = '$id';");
$inventori = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">  
    <title><?= $_SESSION['app_name'] ?> - Ubah Data Inventori</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../data_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../data_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../data_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="title p-3 bg-primary">
        <h1 class="judul text-center text-light m-0"> DAFTAR INVENTARIS KANTOR SERBA ADA</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('dashboard.php') ?>">Beranda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('folder_inventori/indexisi.php') ?>">Daftar Inventaris</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        List per Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        $list = mysqli_query($koneksi, "SELECT * from inventaris GROUP BY kategori;");
                        while ($invent = mysqli_fetch_assoc($list)) {
                        ?>
                            <a class="dropdown-item" href="./folder_inventori/list.php?kategori=<?php echo $invent['kategori'] ?>"><?php echo $invent['kategori'] ?></a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
                <a href="<?= base_url('logout.php') ?>" class="btn btn-light ">Logout</a>
        </div>
    </nav>
	<div id="wrapper">
				<div class="container-fluid">
					<div class="clearfix"><br>
						<h1 class="h3 mb-4 text-gray-800 float-left">Ubah Data Inventori</h1>
						<a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
					</div>
                    <hr>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data berikut!!!</strong></span>
								</div>
								<div class="card-body">
									<form action="proses_ubah.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputkode">Kode Barang</label>
                                            <input name="kode" type="text" class="form-control shadow" id="exampleInputkode" value="<?php echo $inventori['kode_barang'] ?>" placeholder="Masukkan Kode Barang">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputnama">Nama barang</label>
                                            <input name="nama" type="text" class="form-control shadow" id="exampleInputnama" value="<?php echo $inventori['nama_barang'] ?>" placeholder=" Masukkan Nama Brang">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjumlah">Jumlah</label>
                                            <input name="jumlah" type="text" class="form-control shadow" id="exampleInputjumlah" value="<?php echo $inventori['jumlah'] ?>" placeholder="Masukkan Jumlah">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputsatuan">Satuan</label>
                                            <input name="satuan" type="text" class="form-control shadow" id="exampleInputsatuan" value="<?php echo $inventori['satuan'] ?>" placeholder="Masukkan Satuan">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputdate">Tanggal Datang</label>
                                            <input name="date" type="date" class="form-control shadow" id="exampleInputdate" aria-describedby="dateHelp" value="<?php echo $inventori['tgl_datang'] ?>" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjudul">Kategori</label>
                                            <select name="kategori" class="custom-select">
                                                <option selected disabled>Open this select menu</option>
                                                <option <?= $inventori['kategori'] == 'Alat Tulis Kantor' ? ' selected="selected"' : ''; ?> value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                                                <option <?= $inventori['kategori'] == 'Bangunan' ? ' selected="selected"' : ''; ?> value="Bangunan">Bangunan</option>
                                                <option <?= $inventori['kategori'] == 'Elektronik' ? ' selected="selected"' : ''; ?> value="Elektronik">Elektronik</option>
                                                <option <?= $inventori['kategori'] == 'Kendaraan' ? ' selected="selected"' : ''; ?> value="Kendaraan">Kendaraan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjudul">Status</label>
                                            <div class="form-check d-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status1" <?= $inventori['status_barang'] == 'Baik' ? ' checked="checked"' : ''; ?> value="Baik">
                                                <label class="form-check-label" for="status1">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status2" <?= $inventori['status_barang'] == 'Perawatan' ? ' checked="checked"' : ''; ?> value="Perawatan">
                                                <label class="form-check-label" for="status2">
                                                    Perawatan
                                                </label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status3" <?= $inventori['status_barang'] == 'Rusak' ? ' checked="checked"' : ''; ?> value="Rusak">
                                                <label class="form-check-label" for="status3">
                                                    Rusak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputharga">Harga Satuan</label>
                                            <input name="harga" type="text" class="form-control shadow" id="exampleInputharga" value="<?php echo $inventori['harga'] ?>" placeholder="Masukkan harga">
                                        </div>
                                        <a href="./daftar.php" class="btn btn-primary">Close</a>
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer p-3 bg-primary">
        <h5 class="judul text-center text-light m-0"> Inventaris 2016</h5>
    </div>
		</div>
	</div>
	
<script src="../data_template/vendor/jquery/jquery.min.js"></script>
<script src="../data_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../data_template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../data_template/js/sb-admin-2.min.js"></script>
</body>

</html>
