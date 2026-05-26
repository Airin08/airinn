<?php

$host     = "localhost";
$username = "2526_24";
$password = "12345678";
$database = "2526_24db";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>