<?php
session_start();
// Jika user sudah dalam keadaan login, langsung lempar ke dashboard index.php
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KPALH Pelangi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        
        body { 
            /* 💡 Memanggil file foto bersama KPALH Pelangi dengan nama 'dokumentasi.jpeg' */
            background: linear-gradient(rgba(30, 58, 138, 0.45), rgba(30, 58, 138, 0.45)), 
                        url('dokumentasi.jpeg') no-repeat center center fixed; 
            background-size: cover;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }
        
        /* Kotak login transparan dengan efek blur kaca (Glassmorphism) */
        .login-container { 
            background: rgba(255, 255, 255, 0.82); 
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px); /* Dukungan browser Safari/iOS */
            padding: 40px; 
            border-radius: 16px; 
            width: 100%; 
            max-width: 400px; 
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2); 
            text-align: center; 
            border: 1px solid rgba(255, 255, 255, 0.25);
        }
        
        .login-logo { width: 90px; height: 90px; object-fit: contain; margin-bottom: 15px; border-radius: 8px; }
        h2 { color: #1e3a8a; font-weight: 700; margin-bottom: 5px; font-size: 24px; }
        .subtitle { color: #475569; font-size: 14px; margin-bottom: 25px; font-weight: 500; }
        
        .form-group { margin-bottom: 20px; text-align: left; }
        label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #334155; }
        
        input { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #cbd5e1; 
            border-radius: 8px; 
            font-size: 14px; 
            outline: none; 
            transition: all 0.3s; 
            background: rgba(255, 255, 255, 0.9); 
        }
        input:focus { 
            border-color: #2563eb; 
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15); 
            background: #ffffff;
        }
        
        .btn-login { 
            background-color: #2563eb; 
            color: white; 
            border: none; 
            width: 100%; 
            padding: 12px; 
            border-radius: 8px; 
            font-weight: bold; 
            cursor: pointer; 
            margin-top: 10px; 
            font-size: 14px; 
            transition: background 0.2s, transform 0.1s; 
        }
        .btn-login:hover { background-color: #1d4ed8; }
        .btn-login:active { transform: scale(0.98); }
        
        .reg-link { text-align: center; margin-top: 20px; font-size: 13px; color: #475569; }
        .reg-link a { color: #2563eb; text-decoration: none; font-weight: bold; }
        .reg-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="logo-kpalh.jpeg" alt="Logo KPALH" class="login-logo">
        
        <h2>KPALH Pelangi</h2>
        <div class="subtitle">Sistem Informasi Biodata Kepengurusan</div>
        
        <?php 
        // Menampilkan notifikasi error login jika salah password/username
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<p style='color:#dc2626; background-color:#fee2e2; padding:10px; border-radius:8px; text-align:center; margin-bottom:15px; font-size:13px; font-weight:600;'>Username atau Password salah!</p>";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "<p style='color:#d97706; background-color:#fef3c7; padding:10px; border-radius:8px; text-align:center; margin-bottom:15px; font-size:13px; font-weight:600;'>Silakan login terlebih dahulu!</p>";
            }
        }
        ?>

        <form action="proses_login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username Anda" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password Anda" required>
            </div>
            
            <button type="submit" name="login" class="btn-login">Masuk ke Dashboard</button>
        </form>
        
        <div class="reg-link">
            Belum punya akun pengurus? <a href="registrasi.php">Daftar di sini</a>
        </div>
    </div>
</body>
</html>