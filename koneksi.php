<?php

$host_koneksi = "localhost";
$username = "root";
$password = "";
$database = "berita_acara";
$koneksi = mysqli_connect($host_koneksi, $username, $password, $database);

if (!$koneksi){
    // die("Koneksi gagal: " . mysqli_connect_error());
    echo "Koneksi Gagal";
}