<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "informatika";

    $koneksi = mysqli_connect($host, $username, $password, $db_name);

    if ($koneksi) {
         echo "Koneksi ke databasa berhasil ";
    } else {
        die(mysqli_connect_error("Koneksi ke database gagal"));
    }
?>
