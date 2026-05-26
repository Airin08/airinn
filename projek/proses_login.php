<?php
// 1. Wajib jalankan session pertama kali
session_start();

// 2. Panggil file koneksi ke database kamu
include 'koneksi.php';

// 3. Cek apakah tombol login di form sudah diklik
if (isset($_POST['login'])) {
    
    // Ambil data yang diketik user di form login
    // mysqli_real_escape_string dipakai biar aman dari hacker (SQL Injection)
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // 4. Query untuk mencari cocok atau tidaknya username & password di tabel kamu
    $query = mysqli_query($koneksi, "SELECT * FROM `2526_24` WHERE username='$username' AND password='$password'");
    
    // Hitung apakah datanya ditemukan atau tidak
    $cek_data = mysqli_num_rows($query);

    if ($cek_data > 0) {
        // Jika data ditemukan, ambil baris datanya
        $data = mysqli_fetch_assoc($query);

        // 5. Buat data Session untuk pengaman halaman
        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $data['role']; // Menyimpan role (admin/guru/siswa)
        $_SESSION['status']   = "login";       // Status penanda sudah login

        // 6. Lempar user langsung masuk ke halaman utama (Dashboard)
        header("location:index.php");
        exit();

    } else {
        // Jika username atau password salah/belum terdaftar, balikkan ke login dan kasih notifikasi gagal
        header("location:login.php?pesan=gagal");
        exit();
    }
} else {
    // Jika ada yang coba buka file ini langsung tanpa lewat form login, usir balik ke login.php
    header("location:login.php");
    exit();
}
?>