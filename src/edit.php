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
	<!-- Nav -->
<nav class="navbar navbar-light bg-secondary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://instagram.com/himatifuninus?utm_medium=copy_link">Teknik Informatika</a>
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
            <a class="nav-link" href="data.php">Data</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Input Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
					<li><a class="dropdown-item" href="create.php">Input Data Mahasiswa</a></li>
			        <li><a class="dropdown-item" href="#">Input Data Dosen</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
 </nav>
	<div class="container">
		<div class="content">
			<h2>Edit Data</h2>
			<hr />
			
			<?php
			
			$sql = mysqli_query($koneksi, " SELECT * FROM mahasiswa_informatika WHERE id ='$id'" );
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$nama		= aman($_POST['nama']);
				$tmp		= aman($_POST['tmp']);
				$tgl		= aman($_POST['tgl']);
				$email		= aman($_POST['email']);
				$jk			= aman($_POST['jk']);
				$agama		= aman($_POST['agama']);
				$jurusan	= aman($_POST['jurusan']);
				$smt		= aman($_POST['semester']);
				$thn_masuk	= aman($_POST['tahun_masuk']);
				$alamat		= aman($_POST['alamat']);
				$status		= aman($_POST['status']);
				
				$update = mysqli_query($koneksi, "UPDATE mahasiswa_informatika SET nama ='$nama', tempat_lahir='$tmp', tanggal_lahir='$tgl', email='$email', jenis_kelamin='$jk', agama='$agama', jurusan='$jurusan', semester='$smt', tahun_masuk='$thn_masuk', alamat='$alamat', status='$status' WHERE nim='$nim'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nim=".$nim."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success">Data berhasil disimpan.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" class="form-control" value="<?php echo $row['nim']; ?>" placeholder="NIM" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NAMA LENGKAP</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="NAMA LENGKAP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TEMPAT & TANGGAL LAHIR</label>
					<div class="col-sm-3">
						<input type="text" name="tmp" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" placeholder="TEMPAT LAHIR" required>
					</div>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">EMAIL</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="EMAIL" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">JENIS KELAMIN</label>
					<div class="col-sm-2">
						<select name="jk" class="form-control" required>
							<option value="">JENIS KELAMIN</option>
							<option value="Laki-Laki" <?php if($row['jenis_kelamin'] == 'Laki-Laki'){ echo 'selected'; } ?>>LAKI-LAKI</option>
							<option value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan'){ echo 'selected'; } ?>>PEREMPUAN</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">AGAMA</label>
					<div class="col-sm-2">
						<select name="agama" class="form-control">
							<option value="">AGAMA</option>
							<option value="Islam" <?php if($row['agama'] == 'Islam'){ echo 'selected'; } ?>>ISLAM</option>
							<option value="Kristen" <?php if($row['agama'] == 'Kristen'){ echo 'selected'; } ?>>KRISTEN</option>
							<option value="Hindu" <?php if($row['agama'] == 'Hindu'){ echo 'selected'; } ?>>HINDU</option>
							<option value="Budha" <?php if($row['agama'] == 'Budha'){ echo 'selected'; } ?>>BUDHA</option>
							<option value="Katholik" <?php if($row['agama'] == 'Katholik'){ echo 'selected'; } ?>>KATHOLIK</option>
							<option value="Konghucu" <?php if($row['agama'] == 'Konghucu'){ echo 'selected'; } ?>>KONGHUCU</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">JURUSAN</label>
					<div class="col-sm-3">
						<select name="jurusan" class="form-control">
							<option value="">JURUSAN</option>
							<option value="Teknik Informatika"  <?php if($row['jurusan'] == 'Teknik Informatika'){ echo 'selected'; } ?>>TEKNIK INFORMATIKA</option>
							<option value="Teknik Sipil" <?php if($row['jurusan'] == 'Teknik Sipil'){ echo 'selected'; } ?>>TEKNIK SIPIL</option>
							<option value="Ekonomi" <?php if($row['jurusan'] == 'Ekonomi'){ echo 'selected'; } ?>>EKONOMI</option>
							<option value="Perikanan" <?php if($row['jurusan'] == 'Perikanan'){ echo 'selected'; } ?>>PERIKANAN</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">SEMESTER</label>
					<div class="col-sm-2">
						<input type="text" name="semester" class="form-control" value="<?php echo $row['semester']; ?>" placeholder="SEMESTER">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">TAHUN MASUK</label>
					<div class="col-sm-2">
						<input type="text" name="tahun_masuk" class="form-control" value="<?php echo $row['tahun_masuk']; ?>" placeholder="TAHUN MASUK">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea name="alamat" class="form-control" placeholder="ALAMAT"><?php echo $row['alamat']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<select name="status" class="form-control" required>
							<option value="">STATUS</option>
							<option value="1" <?php if($row['status'] == '1'){ echo 'selected'; } ?>>AKTIF</option>
							<option value="2" <?php if($row['status'] == '2'){ echo 'selected'; } ?>>TIDAK AKTIF</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-primary" value="SIMPAN">
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