<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
    exit();
}

// Menghitung data statistik secara otomatis dari database
$query_siswa = mysqli_query($koneksi, "SELECT * FROM `2526_24` WHERE role='siswa'");
$total_siswa = mysqli_num_rows($query_siswa);

$query_guru = mysqli_query($koneksi, "SELECT * FROM `2526_24` WHERE role='guru'");
$total_guru = mysqli_num_rows($query_guru);

$query_admin = mysqli_query($koneksi, "SELECT * FROM `2526_24` WHERE role='admin'");
$total_admin = mysqli_num_rows($query_admin);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard - KPALH Pelangi</title>
     <link rel="icon" type="image/jpeg" href="logo-kpalh.jpeg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KPALH Pelangi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background-color: #f4f7fe; color: #1e293b; display: flex; min-height: 100vh; }
        
        .sidebar { width: 280px; background-color: #1e3a8a; padding: 30px 20px; display: flex; flex-direction: column; position: fixed; height: 100vh; box-shadow: 4px 0 10px rgba(0,0,0,0.05); }
        .logo-section { display: flex; flex-direction: column; align-items: center; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .logo-section img { width: 85px; height: 85px; object-fit: contain; margin-bottom: 12px; border-radius: 8px; }
        .logo-section h1 { color: #ffffff; font-size: 18px; font-weight: 700; letter-spacing: 1px; }
        
        .nav-menu { list-style: none; display: flex; flex-direction: column; gap: 8px; flex-grow: 1; }
        .nav-item a { display: flex; align-items: center; gap: 14px; padding: 14px 18px; color: #ffffff; opacity: 0.7; text-decoration: none; border-radius: 10px; font-weight: 500; transition: all 0.3s ease; }
        .nav-item.active a, .nav-item a:hover { background-color: rgba(255,255,255,0.1); opacity: 1; }
        
        .btn-logout { background-color: #ef4444; color: white !important; font-weight: 600; text-align: center; justify-content: center; margin-top: auto; border-radius: 10px; opacity: 1 !important; }

        .main-content { margin-left: 280px; padding: 40px; width: calc(100% - 280px); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .header h2 { font-size: 26px; font-weight: 700; color: #0f172a; }

        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 35px; }
        .stat-card { background: white; padding: 25px; border-radius: 16px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 20px rgba(0,0,0,0.02); border: 1px solid #e2e8f0; }
        .stat-info h3 { font-size: 14px; color: #64748b; font-weight: 500; }
        .stat-info p { font-size: 32px; font-weight: 700; color: #0f172a; }

        .table-container { background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); border: 1px solid #e2e8f0; overflow-x: auto; }
        .table-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .table-header h3 { font-size: 18px; font-weight: 700; }
        
        .btn-tambah { background-color: #3b82f6; color: white; text-decoration: none; padding: 12px 20px; border-radius: 10px; font-weight: 600; font-size: 14px; }

        table { width: 100%; border-collapse: collapse; text-align: left; table-layout: auto; }
        th { background-color: #f8fafc; padding: 14px 12px; font-size: 13px; font-weight: 600; color: #64748b; border-bottom: 1px solid #e2e8f0; text-transform: uppercase; }
        td { padding: 14px 12px; font-size: 14px; color: #334155; border-bottom: 1px solid #f1f5f9; }

        .badge { padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-block; }
        .badge-admin { background-color: #fee2e2; color: #dc2626; }
        .badge-guru { background-color: #fef3c7; color: #b45309; }
        .badge-siswa { background-color: #e0f2fe; color: #0369a1; }

        .action-container { display: flex; gap: 6px; justify-content: center; }
        .btn-action { padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; color: white; display: inline-block; }
        .btn-edit { background-color: #ea580c; }
        .btn-delete { background-color: #dc2626; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-section">
            <img src="logo-kpalh.jpeg" alt="Logo KPALH">
            <h1>KPALH PELANGI</h1>
        </div>
        <ul class="nav-menu">
            <li class="nav-item active">
                <a href="index.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
            </li>
            
            <?php if (strtolower($_SESSION['role']) == 'admin') { ?>
            <li class="nav-item">
                <a href="registrasi.php"><i class="fa-solid fa-user-plus"></i> Tambah Anggota</a>
            </li>
            <?php } ?>

            <li class="nav-item">
                <a href="logout.php" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h2>Sistem Biodata Kepengurusan</h2>
                <p style="color: #64748b; font-size: 14px; margin-top: 4px;">Manajemen data terpusat organisasi KPALH Pelangi SMKN 2 Baleendah.</p>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Total Anggota / Siswa</h3>
                    <p><?php echo $total_siswa; ?></p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Guru Pembina / Pelatih</h3>
                    <p><?php echo $total_guru; ?></p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>Admin Sistem</h3>
                    <p><?php echo $total_admin; ?></p>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h3>Daftar Informasi Pengurus</h3>
                <?php if (strtolower($_SESSION['role']) == 'admin') { ?>
                <a href="registrasi.php" class="btn-tambah">+ Tambah Data Baru</a>
                <?php } ?>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th style="white-space: nowrap;">Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th> 
                        <th>Role</th> 
                        <?php if (strtolower($_SESSION['role']) == 'admin') { ?>
                        <th style="text-align: center; width: 15%;">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $query_tabel = mysqli_query($koneksi, "SELECT * FROM `2526_24` ORDER BY id DESC");
                    while($row = mysqli_fetch_array($query_tabel)) {
                        
                        // 💡 Perbaikan utama: Mengubah role baris data menjadi huruf kecil sebelum dibandingkan
                        $role_db = strtolower(trim($row['role']));

                        if ($role_db == 'admin') {
                            $badge_css = 'badge-admin';
                            $text_role = 'Admin';
                        } elseif ($role_db == 'guru') {
                            $badge_css = 'badge-guru';
                            $text_role = 'Guru';
                        } else {
                            $badge_css = 'badge-siswa';
                            $text_role = 'Siswa';
                        }
                    ?>
                    <tr>
                        <td><strong><?php echo $no++; ?></strong></td>
                        <td style="color: #3b82f6; font-weight: 600;"><?php echo $row['username']; ?></td>
                        <td><?php echo !empty($row['nama_lengkap']) ? $row['nama_lengkap'] : '<em>Belum diisi</em>'; ?></td>
                        <td><?php echo !empty($row['alamat']) ? $row['alamat'] : '<em>Belum diisi</em>'; ?></td>
                        <td style="white-space: nowrap;"><?php echo !empty($row['tanggal_lahir']) ? $row['tanggal_lahir'] : '<em>Belum diisi</em>'; ?></td>
                        <td><?php echo !empty($row['jenis_kelamin']) ? $row['jenis_kelamin'] : '<em>Belum diisi</em>'; ?></td>
                        <td style="font-weight: 500; color: #475569;"><?php echo !empty($row['jurusan']) ? $row['jurusan'] : '-'; ?></td>
                        <td><span class="badge <?php echo $badge_css; ?>"><?php echo $text_role; ?></span></td>
                        
                        <?php if (strtolower($_SESSION['role']) == 'admin') { ?>
                        <td style="text-align: center;">
                            <div class="action-container">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Ubah</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn-action btn-delete">Hapus</a>
                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>