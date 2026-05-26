<?php
session_start();
include 'koneksi.php';

// 1. PROTEKSI: Cek apakah user sudah login atau belum
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit();
}

// 2. PROTEKSI GANDA: Jika username yang login BUKAN 'admin', langsung tolak!
if ($_SESSION['username'] != 'admin') {
    echo "<script>
            alert('Akses Ditolak! Hanya akun Admin utama yang bisa menghapus data.'); 
            window.location='index.php';
          </script>";
    exit();
}

// 3. PROSES HAPUS DATA
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menjalankan query hapus data berdasarkan ID pengurus
    $query = mysqli_query($koneksi, "DELETE FROM `2526_24` WHERE id='$id'");

    if ($query) {
        echo "<script>
                alert('Data pengurus berhasil dihapus!'); 
                window.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "'); 
                window.location='index.php';
              </script>";
    }
} else {
    // Jika tidak ada ID di URL, kembalikan ke halaman utama
    header("location:index.php");
}
?>