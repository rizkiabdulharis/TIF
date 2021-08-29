<?php
        include "koneksi.php";

        $sql = " CREATE DATABASE informatika";

        if($koneksi->query($sql) === TRUE){
            echo "Database Berhasil dibuat";
        } else {
            echo "Database gagal dibuat";
        }

?>