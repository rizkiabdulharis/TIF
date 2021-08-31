<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data mahasiswa</title>

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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
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
			<h2>Data mahasiswa</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nim = $_GET['nim'];
					$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim ='$nim'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				// }
			}
			?>
			
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="urut" class="form-control" onchange="form.submit()">
						<option value="0">Filter</option>
						<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
						<option value="1" <?php if($urut == '1'){ echo 'selected'; } ?>>Mahasiswa Aktif</option>
						<option value="2" <?php if($urut == '2'){ echo 'selected'; } ?>>Mahasiswa Tidak Aktif</option>
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>NO.</th>
					<th>NIM</th>
					<th>NAMA LENGKAP</th>
					<th>EMAIL</th>
					<th>JENIS KELAMIN</th>
					<th>JURUSAN</th>
					<th>STATUS</th>
					<th>SETTING</th>
				</tr>
				<?php
				if($urut){
					$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa_informatika WHERE status='$urut' ORDER BY nim ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa_informatika ORDER BY nim ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['nim'].'</td>
							<td>'.$row['nama'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['jenis_kelamin'].'</td>
							<td>'.$row['jurusan'].'</td>
							<td>';
							if($row['status'] == 1){
								echo '<span class="label label-success">Aktif</span>';
							}else{
								echo '<span class="label label-warning">Tidak Aktif</span>';
							}
						echo '
						      </td>
						      <td>
								<a href="read.php?nim='.$row['nim'].'" title="Lihat Detail"><img src="../node_modules/bootstrap-icons/icons/list-task.svg" alt=""></a>
								<a href="edit.php?nim='.$row['nim'].'" title="Edit Data"><img src="../node_modules/bootstrap-icons/icons/pencil.svg" alt=""></a>
								<a href="index.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><img src="../node_modules/bootstrap-icons/icons/trash.svg" alt=""></a>
							 </td>	
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>