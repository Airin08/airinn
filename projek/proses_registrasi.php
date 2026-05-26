<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan']; // Tangkap pilihan jurusan dari dropdown
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    // Query untuk menyimpan data termasuk kolom jurusan ke database
    $query = mysqli_query($koneksi, "INSERT INTO `2526_24` (username, password, nama_lengkap, tanggal_lahir, jenis_kelamin, jurusan, alamat, role) VALUES ('$username', '$password', '$nama_lengkap', '$tanggal_lahir', '$jenis_kelamin', '$jurusan', '$alamat', '$role')");

    if ($query) {
        echo "<script>alert('Pendaftaran Berhasil!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran Gagal!'); window.location='registrasi.php';</script>";
    }
}
?>