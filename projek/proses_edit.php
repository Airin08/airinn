<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan']; // 💡 Menangkap kiriman input jurusan
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    // Update data dengan menyertakan kolom jurusan ke database
    $query = mysqli_query($koneksi, "UPDATE `2526_24` SET username='$username', nama_lengkap='$nama_lengkap', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', alamat='$alamat', role='$role' WHERE id='$id'");

    if ($query) {
        echo "<script>alert('Data Berhasil Diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal Memperbarui Data!'); window.location='edit.php?id=$id';</script>";
    }
}
?>