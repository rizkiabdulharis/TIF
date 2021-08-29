<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "informatika";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE mahasiswa_informatika(
  nim int PRIMARY KEY,
  password varchar(35),
  nama varchar(50),
  tempat_lahir varchar(20),
  tanggal_lahir varchar(20),
  email varchar(50),
  jenis_kelamin varchar(20),
  agama varchar(20),
  jurusan varchar(30),
  semester varchar(2),
  tahun_masuk varchar(5),
  alamat varchar(100),
  foto varchar(100),
  status int(2)
)";

if ($conn->query($sql) === TRUE) {
  echo "Create Table successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 