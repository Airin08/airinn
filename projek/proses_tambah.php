<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $username      = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password      = md5($_POST['password']); 
    $nama_lengkap  = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    
    // Menangkap data Jenis Kelamin dari form
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    
    $alamat        = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $role          = mysqli_real_escape_string($koneksi, $_POST['role']);

    // Memasukkan data lengkap ke database termasuk kolom jenis_kelamin
    $query = mysqli_query($koneksi, "INSERT INTO `2526_24` (username, password, nama_lengkap, tanggal_lahir, jenis_kelamin, alamat, role) VALUES ('$username', '$password', '$nama_lengkap', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$role')");

    if ($query) {
        echo "<script>alert('Data pengurus baru berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "'); window.location='tambah.php';</script>";
    }
} else {
    header("location:tambah.php");
}
?>