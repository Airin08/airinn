<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengurus Baru - KPALH Pelangi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f8fafc; padding: 40px 20px; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .form-container { background: white; padding: 35px; border-radius: 12px; width: 100%; max-width: 550px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; }
        h2 { margin-bottom: 5px; color: #0f172a; font-size: 24px; }
        p { color: #64748b; font-size: 14px; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #334155; }
        input, textarea, select { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; transition: border 0.2s; }
        input:focus, textarea:focus, select:focus { border-color: #2563eb; }
        .btn-flex { display: flex; gap: 10px; margin-top: 10px; }
        .btn-submit { background-color: #2563eb; color: white; border: none; padding: 12px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; flex: 1; font-size: 14px; transition: background 0.2s; }
        .btn-submit:hover { background-color: #1d4ed8; }
        .btn-batal { background-color: #94a3b8; color: white; text-decoration: none; text-align: center; padding: 12px 20px; border-radius: 8px; font-weight: bold; flex: 1; font-size: 14px; transition: background 0.2s; }
        .btn-batal:hover { background-color: #64748b; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Pengurus Baru</h2>
        <p>Silakan isi data lengkap anggota baru KPALH Pelangi.</p>
        
        <form action="proses_tambah.php" method="POST">
            <div class="form-group">
                <label>Username Akun</label>
                <input type="text" name="username" placeholder="Masukkan username baru" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password Akun</label>
                <input type="password" name="password" placeholder="Masukkan password akun" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap sesuai identitas" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" required>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat Rumah</label>
                <textarea name="alamat" rows="3" placeholder="Masukkan alamat rumah lengkap" required></textarea>
            </div>
            <div class="form-group">
                <label>Jabatan / Peran (Role)</label>
                <select name="role" required>
                    <option value="siswa">Siswa / Anggota Aktif</option>
                    <option value="guru">Guru Pembina / Pelatih</option>
                </select>
            </div>
            <div class="btn-flex">
                <a href="index.php" class="btn-batal">Batal</a>
                <button type="submit" name="tambah" class="btn-submit">Simpan Pengurus</button>
            </div>
        </form>
    </div>
</body>
</html>