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
    <a class="navbar-brand" href="https://instagram.com/himatifuninus?utm_medium=copy_link">JARINGAN KOMPUTER</a>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              		<li><a class="dropdown-item" href="Data.php">Data Mahasiswa</a></li>
			        <li><a class="dropdown-item" href="Datadosen.php">Data Dosen</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Input Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
					<li><a class="dropdown-item" href="create.php">Input Data Mahasiswa</a></li>
			        <li><a class="dropdown-item" href="createdatabase.php">Input Data Dosen</a></li>
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
			
			$nid = $_GET['nid'];
			$sql = mysqli_query($koneksi, " SELECT * FROM dosen_informatika WHERE nid ='$nid'" );
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
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
				
				$update = mysqli_query($koneksi, "UPDATE dosen_informatika SET nama ='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', email='$email', jenis_kelamin='$jenis_kelamin', agama='$agama', mata_kuliah='$mata_kuliah', pendidikan_terakhir='$pendidikan_terakhir', tahun_masuk='$tahun_masuk', alamat='$alamat', status='$status' WHERE nid='$nid'") or die(mysqli_error());
				if($update){
					header("Location: editdosen.php?nid=".$nid."&pesan=sukses");
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
					<label class="col-sm-3 control-label">NID</label>
					<div class="col-sm-2">
						<input type="text" name="nid" class="form-control" value="<?php echo $row['nid']; ?>" placeholder="NID" disabled>
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
						<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" placeholder="TEMPAT LAHIR" required>
					</div>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" placeholder="0000-00-00">
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
					<label class="col-sm-3 control-label">MATA KULIAH</label>
					<div class="col-sm-3">
						<select name="mata_kuliah" class="form-control">
							<option value="">MATA KULIAH</option>
							<option value="JARINGAN KOMPUTER"  <?php if($row['mata_kuliah'] == 'JARINGAN KOMPUTER'){ echo 'selected'; } ?>>JARINGAN KOMPUTER</option>
							<option value="PEMROGRAMAN WEB" <?php if($row['mata_kuliah'] == 'PEMROGRAMAN WEB'){ echo 'selected'; } ?>>PEMROGRAMAN WEB</option>
							<option value="SISTEM OPERASI" <?php if($row['mata_kuliah'] == 'SISTEM OPERASI'){ echo 'selected'; } ?>>SISTEM OPERASI</option>
							<option value="GRAFIKA" <?php if($row['mata_kuliah'] == 'GRAFIKA'){ echo 'selected'; } ?>>GRAFIKA</option>
                            <option value="INTERAKSI MANUSIA KOMPUTER"  <?php if($row['mata_kuliah'] == 'INTERAKSI MANUSIA KOMPUTER'){ echo 'selected'; } ?>>INTERAKSI MANUSIA KOMPUTER</option>
							<option value="DSS" <?php if($row['mata_kuliah'] == 'DSS'){ echo 'selected'; } ?>>DSS</option>
							<option value=KALKULUS" <?php if($row['mata_kuliah'] == 'KALKULUS'){ echo 'selected'; } ?>>KALKULUS</option>
							<option value="FISIKA DASAR" <?php if($row['mata_kuliah'] == 'FISIKA DASAR'){ echo 'selected'; } ?>>FISIKA DASAR</option>
                            <option value="KEWARGANEGARAAN"  <?php if($row['mata_kuliah'] == 'KEWARGANEGARAAN'){ echo 'selected'; } ?>>KEWARGANEGARAAN</option>
							<option value="BAHASA INGGRIS" <?php if($row['mata_kuliah'] == 'BAHASA INGGRIS'){ echo 'selected'; } ?>>BAHASA INGGRIS</option>
							<option value="BAHASA INDONESIA" <?php if($row['mata_kuliah'] == 'BAHASA INDONESIA'){ echo 'selected'; } ?>>BAHASA INDONESIA</option>
							<option value="AL ISLAM" <?php if($row['mata_kuliah'] == 'AL ISLAM'){ echo 'selected'; } ?>>AL ISLAM</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PENDIDIKAN TERAKHIR</label>
					<div class="col-sm-2">
						<input type="text" name="pendidikan_terakhir" class="form-control" value="<?php echo $row['pendidikan_terakhir']; ?>" placeholder="pendidikan_terakhir">
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
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>