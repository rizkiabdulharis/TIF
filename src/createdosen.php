<?php
include("koneksi.php");
include("func.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Manajemen</title>

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-datepicker.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<nav class="navbar navbar-light bg-secondary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Teknik Informatika</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Home</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datadosen.php">Data</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Input Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
			        <li><a class="dropdown-item" href="createdosen.php">Input Data Dosen</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
 </nav>
	<div class="container">
		<div class="content">
			<h2>Add Data Dosen</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
				$nid		= aman($_POST['nid']);
				$pass1		= aman($_POST['pass1']);
				$pass2		= aman($_POST['pass2']);
				$nama		= aman($_POST['nama']);
				$tempat_lahir		= aman($_POST['tempat_lahir']);
				$tanggal_lahir		= aman($_POST['tanggal_lahir']);
				$email		= aman($_POST['email']);
				$jenis_kelamin		= aman($_POST['jenis_kelamin']);
				$agama		= aman($_POST['agama']);
				$mata_kuliah	= aman($_POST['mata_kuliah']);
				$pendidikan_terakhir		= aman($_POST['pendidikan_terakhir']);
				$tahun_masuk	= aman($_POST['tahun_masuk']);
				$alamat		= aman($_POST['alamat']);
				$status		= aman($_POST['status']);
				
				$cek = mysqli_query($koneksi, " SELECT * FROM dosen_informatika WHERE nid='$nid'");
				if(mysqli_num_rows($cek) == 0 ){
					if($pass1 == $pass2){
						$password = md5($pass1);
						$insert = mysqli_query($koneksi, "INSERT INTO dosen_informatika(nid, password, nama, tempat_lahir, tanggal_lahir, email, jenis_kelamin, agama, mata_kuliah, pendidikan_terakhir, tahun_masuk, alamat, foto, status)
															VALUES('$nid', '$password', '$nama', '$tempat_lahir', '$tanggal_lahir', '$email', '$jenis_kelamin', '$agama', '$mata_kuliah', '$pendidikan_terakhir', '$tahun_masuk', '$alamat', 'avatar.png', '$status')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
					}else{
						echo '<div class="alert alert-danger">Konfirmasi Password tidak sesuai.</div>';
					}
				}else{
					echo '<div class="alert alert-danger">NIM sudah terdaftar.</div>';
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NID</label>
					<div class="col-sm-2">
						<input type="text" name="nid" class="form-control" placeholder="NID" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PASSWORD</label>
					<div class="col-sm-4">
						<input type="password" name="pass1" class="form-control" placeholder="PASSWORD" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KONFIRMASI PASSWORD</label>
					<div class="col-sm-4">
						<input type="password" name="pass2" class="form-control" placeholder="KONFIRMASI PASSWORD" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="NAMA LENGKAP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TEMPAT & TANGGAL LAHIR</label>
					<div class="col-sm-3">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="TEMPAT LAHIR" required>
					</div>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tanggal_lahir" class="form-control" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" placeholder="EMAIL" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS KELAMIN</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value="Laki-Laki">LAKI-LAKI</option>
							<option value="Perempuan">PEREMPUAN</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">AGAMA</label>
					<div class="col-sm-2">
						<select name="agama" class="form-control">
							<option value="Islam">ISLAM</option>
							<option value="Kristen">KRISTEN</option>
							<option value="Hindu">HINDU</option>
							<option value="Budha">BUDHA</option>
							<option value="Katholik">KATHOLIK</option>
							<option value="Konghucu">KONGHUCU</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">MATA KULIAH</label>
					<div class="col-sm-3">
						<select name="mata_kuliah" class="form-control">
							<option value="Teknik Informatika">JARINGAN KOMPUTER</option>
							<option value="Teknik Sipil">PEMROGRAMAN WEB</option>
							<option value="Ekonomi">SISTEM OPERASI</option>
							<option value="Perikanan">GRAFIKA</option>
                            <option value="Teknik Informatika">INTERAKSI MANUSIA KOMPUTER</option>
							<option value="Teknik Sipil">DSS</option>
							<option value="Ekonomi">KALKULUS</option>
							<option value="Perikanan">FISIKA DASAR</option>
                            <option value="Teknik Informatika">KEWARGANEGARAAN</option>
							<option value="Teknik Sipil">BAHASA INGGRIS</option>
							<option value="Ekonomi">BAHASA INDONESIA</option>
							<option value="Perikanan">AL ISLAM</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PENDIDIKAN TERAKHIR</label>
					<div class="col-sm-2">
						<input type="text" name="pendidikan_terakhir" class="form-control" placeholder="SEMESTER">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TAHUN MASUK</label>
					<div class="col-sm-2">
						<input type="text" name="tahun_masuk" class="form-control" placeholder="TAHUN MASUK">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea name="alamat" class="form-control" placeholder="ALAMAT"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<select name="status" class="form-control" required>
							<option value="1">AKTIF</option>
							<option value="2">TIDAK AKTIF</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						<a href="index.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>