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
	<title>Data dosen</title>

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	
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
<nav class="navbar navbar-light bg-secondary py-3 fixed-top">
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
			<h2>Data dosen</h2>
			<hr />
			
			<?php
			$nid = $_GET['nid'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM dosen_informatika WHERE nid='$nid'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM dosen_infromatika WHERE nid='$nid'");
				if($delete){
					echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info">Data gagal dihapus.</div>';
				}
			}
			?>
			<!-- <img class="img-responsive img-circle center-block" src="avatar/<?php echo $row['foto']; ?>" width="150"><br /> -->
			<table class="table table-striped">
				<tr>
					<th width="20%">NID</th>
					<td><?php echo $row['nid']; ?></td>
				</tr>
				<tr>
					<th>NAMA LENGKAP</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>TEMPAT & TANGGAL LAHIR</th>
					<td><?php echo $row['tempat_lahir'].', '.tanggal($row['tanggal_lahir']); ?></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>JENIS KELAMIN</th>
					<td><?php echo $row['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>AGAMA</th>
					<td><?php echo $row['agama']; ?></td>
				</tr>
				<tr>
					<th>MATA KULIAH</th>
					<td><?php echo $row['mata_kuliah']; ?></td>
				</tr>
				<tr>
					<th>PENDIDIKAN TERAKHIR</th>
					<td><?php echo $row['pendidikan_terakhir']; ?></td>
				</tr>
				<tr>
					<th>TAHUN MASUK</th>
					<td><?php echo $row['tahun_masuk']; ?></td>
				</tr>
				<tr>
					<th>ALAMAT</th>
					<td><?php echo $row['alamat']; ?></td>
				</tr>
				<tr>
					<th>STATUS</th>
					<td><?php if($row['status'] == 1){ echo 'AKTIF'; }else{ echo 'TIDAK AKTIF'; } ?></td>
				</tr>
			</table>
			
			<a href="readdosen.php" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="editdosen.php?nid=<?php echo $row['nid']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>