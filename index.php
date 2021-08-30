<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Teknik Informatika</title>
</head>
<body>
  <style>
    *{
      font-family: sans-serif;
    }
  </style>
  
	<!-- Nav -->
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://instagram.com/himatifuninus?utm_medium=copy_link" target="_blank">Teknik Informatika</a>
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="src/Data.php">Data Mahasiswa</a></li>
			        <li><a class="dropdown-item" href="src/Datadosen.php">Data Dosen</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Input Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="src/create.php">Input Data Mahasiswa</a></li>
			        <li><a class="dropdown-item" href="src/createdosen.php">Input Data Dosen</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
 </nav>

    
    <!-- Slider -->
<div id="slider" class="slider" style="object-fit: cover;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="img/foto2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Teknik Informatika</h5>
      </div>
      </div>
    <div class="carousel-item">
        <img src="img/foto3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Teknik Informatika</h5>
          <p>ANGKATAN 2019.</p>
      </div>
    </div>
    <div class="carousel-item">
        <img src="img/foto5.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Teknik Informatika</h5>
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
  </div>

  <!-- Navigator -->
  <div class="container">
    <header class="d-flex justify-content-center py-3 mt-4">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#slider" class="nav-link active" aria-current="page">Beranda</a></li>
        <li class="nav-item"><a href="#kegiatan" class="nav-link">Kegiatan</a></li>
        <li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
        <li class="nav-item"><a href="#slider" class="nav-link">Kepengurusan</a></li>
      </ul>
    </header>
  </div>


    <!-- Content1 -->
  <div class="container" style="margin-top: 80px; margin-bottom: 20px;">
    <div class="row">
    <div class="col">
      <h5 style="text-align: center;">Visi</h5>
   <p>Menjadi Perguruan Tinggi Islam yang Mandiri dan Unggul Tahun 2035. </p> 
    </div>
    <div class="col">
    <h5 style="text-align: center;">Misi</h5>
    <li><a>Menyelenggarakan pendidikan dan pengajaran untuk menghasilkan sumber daya manusia yang memiliki kompetensi akademik serta integritas pribadi sebagai cendekiawan muslim.</a></li>
    <li><a> Menyelenggarakan penelitian dan pengkajian untuk mengembangkan ilmu pengetahuan, teknologi, seni, dan budaya bedasarkan nilai – nilai keislaman yang relevan dengan kebutuhan masyarakat.</a></li>
    <li><a> Menyelenggarakan pengabdian pada masyarakat dengan memanfaatkan ilmu pengetahuan, teknologi, seni dan budaya dengan berdasarkan nilai – nilai islam.</a></li>
    <li><a> Menyelenggarakan tata kelola perguruan tinggi yang menjamin peningkatan kualitas berkelanjutan berdasarkan prinsip – prinsip otonom, kredibel, akuntable dan transparan, serta .</a></li>
    <li><a>Mengembangkan kerjasama dan kemitraan dengan berbagai pihak di dalam dan diluar negeri berdasarkan prinsip – prinsip kesetaraan.</a></li>
    </div>
  </div>
</div>
<br><br><br>

    <!-- Kegiatan -->
  <div id="kegiatan" class="container mt-5">
  <h3 style="font: bold; text-align:center;">Kegiatan</h3>
  <div class="row row-cols-3 g-5 mt-2 ">
    <div class="col">
    <div class="card" style="width: 18rem;">
       <img src="img/mabim.jpeg" class="card-img-top">
        <div class="card-body">
       <h5 class="card-title">Mabim</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the   card's content.</p>
       <a href="https://www.instagram.com/p/CMY5j0-lSuE/?utm_medium=copy_link" class="btn btn-primary">Go</a>
        </div>
       </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
       <img src="img/milad.jpeg" class="card-img-top">
        <div class="card-body">
       <h5 class="card-title">Milad</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the   card's content.</p>
       <a href="https://www.instagram.com/p/COcq4X-lSya/?utm_medium=copy_link" class="btn btn-primary">Go</a>
        </div>
    </div>
    </div>
    <div class="col">
    <div class="card" style="width: 18rem;">
       <img src="img/TP.jpeg" class="card-img-top">
        <div class="card-body">
       <h5 class="card-title">Makrab</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the   card's content.</p>
       <a href="https://www.instagram.com/p/CNEaDTNlqBp/?utm_medium=copy_link" class="btn btn-primary">Go</a>
        </div>
    </div>
    </div>
  </div>
  </div>
  <br><br><br>



     <!-- Kontak  -->
     <div id="kontak" style="text-align: center;">
    <ul class="list-group">
      <h3 style="font: bold;">Kontak</h3>
  <li class="list-group-item"><img src="node_modules/bootstrap-icons/icons/pin-map-fill.svg"> Jl. Soekarno Hatta No.530, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286</li>
  <li class="list-group-item"><img src="node_modules/bootstrap-icons/icons/phone.svg">0811-2161-530</li>
  <li class="list-group-item"><img src="node_modules/bootstrap-icons/icons/mailbox.svg" style="padding-right: 3px;">humasuninus@gmail.com</li>
    </ul>
  </div>
  <br><br><br>
  

<!-- footers -->
 <div class="footer">
 <p class="text-center text-muted">&copy; 2021 Teknik Informatika</p>
 </div>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>