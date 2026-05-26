<?php
session_start();

// Menghapus semua memori session login
session_destroy();

// Kembalikan user ke halaman login dengan pesan sukses logout
header("location:login.php?pesan=logout");
exit();
?>