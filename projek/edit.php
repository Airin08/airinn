<?php
session_start();
include 'koneksi.php';

// PROTEKSI: Jika username yang login BUKAN 'admin', langsung ditolak!
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login" || $_SESSION['username'] != 'admin') {
    echo "<script>
            alert('Akses Ditolak! Hanya akun Admin utama yang bisa mengedit data.'); 
            window.location='index.php';
          </script>";
    exit();
}

// Mengambil ID data dari URL yang mau diedit
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM `2526_24` WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Pengurus - KPALH Pelangi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f4f7fe; padding: 40px 20px; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .form-container { background: white; padding: 35px; border-radius: 12px; width: 100%; max-width: 550px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #334155; }
        input, textarea, select { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; }
        input:focus, textarea:focus, select:focus { border-color: #ea580c; }
        .btn-flex { display: flex; gap: 10px; margin-top: 10px; }
        .btn-submit { background-color: #ea580c; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; cursor: pointer; flex: 1; font-size: 14px; }
        .btn-batal { background-color: #94a3b8; color: white; text-decoration: none; text-align: center; padding: 12px; border-radius: 8px; font-weight: bold; flex: 1; font-size: 14px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="margin-bottom: 20px; color: #0f172a;">Ubah Data Anggota</h2>
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <div class="form-group">
                <label>Username Akun</label>
                <input type="text" name="username" value="<?php echo $data['username']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" required>
                    <option value="" <?php if(empty($data['jurusan'])) echo 'selected'; ?>>-- Pilih Jurusan --</option>
                    <option value="Kuliner" <?php if($data['jurusan'] == 'Kuliner') echo 'selected'; ?>>Kuliner</option>
                    <option value="DPB" <?php if($data['jurusan'] == 'DPB') echo 'selected'; ?>>DPB</option>
                    <option value="KS" <?php if($data['jurusan'] == 'KS') echo 'selected'; ?>>KS</option>
                    <option value="Kimia" <?php if($data['jurusan'] == 'Kimia') echo 'selected'; ?>>Kimia</option>
                    <option value="TJKT" <?php if($data['jurusan'] == 'TJKT') echo 'selected'; ?>>TJKT</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat Rumah</label>
                <textarea name="alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Jabatan / Peran (Role)</label>
                <select name="role" required>
                    <option value="siswa" <?php if($data['role'] == 'siswa') echo 'selected'; ?>>Siswa / Anggota Aktif</option>
                    <option value="guru" <?php if($data['role'] == 'guru') echo 'selected'; ?>>Guru Pembina / Pelatih</option>
                    <option value="admin" <?php if($data['role'] == 'admin') echo 'selected'; ?>>Admin Sistem</option>
                </select>
            </div>
            <div class="btn-flex">
                <a href="index.php" class="btn-batal">Batal</a>
                <button type="submit" name="update" class="btn-submit">Perbarui Data</button>
            </div>
        </form>
    </div>
</body>
</html>