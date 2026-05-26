<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - KPALH Pelangi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        
        body { 
            background: linear-gradient(rgba(30, 58, 138, 0.45), rgba(30, 58, 138, 0.45)), 
                        url('dokumentasi.jpeg') no-repeat center center fixed; 
            background-size: cover;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            padding: 40px 20px; 
        }
        
        .form-container { 
            background: rgba(255, 255, 255, 0.82); 
            backdrop-filter: blur(18px); 
            -webkit-backdrop-filter: blur(18px);
            padding: 35px; 
            border-radius: 16px; 
            width: 100%; 
            max-width: 550px; 
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2); 
            border: 1px solid rgba(255, 255, 255, 0.25);
        }
        
        .text-center { text-align: center; margin-bottom: 25px; color: #475569; font-size: 14px; font-weight: 500; }
        .form-title { font-size: 20px; font-weight: bold; color: #1e3a8a; margin-bottom: 5px; text-align: center; }
        
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-size: 14px; font-weight: 600; color: #334155; }
        
        input, textarea, select { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #cbd5e1; 
            border-radius: 8px; 
            font-size: 14px; 
            outline: none; 
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.9);
        }
        input:focus, textarea:focus, select:focus { 
            border-color: #2563eb; 
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15); 
            background: #ffffff;
        }
        
        .btn-submit { 
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
        .btn-submit:hover { background-color: #1d4ed8; }
        .btn-submit:active { transform: scale(0.98); }
        
        .login-link { text-align: center; margin-top: 20px; font-size: 13px; color: #475569; }
        .login-link a { color: #2563eb; text-decoration: none; font-weight: bold; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Formulir Pendaftaran Akun</h2>
        <p class="text-center">Silakan lengkapi data kepengurusan KPALH Pelangi</p>
        
        <form action="proses_registrasi.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Buat username baru" required autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Buat password" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
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
                <label>Jurusan</label>
                <select name="jurusan" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="Kuliner">Kuliner</option>
                    <option value="DPB">DPB</option>
                    <option value="KS">KS</option>
                    <option value="Kimia">Kimia</option>
                    <option value="TJKT">TJKT</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap rumah" required></textarea>
            </div>

            <input type="hidden" name="role" value="siswa">

            <button type="submit" name="register" class="btn-submit">Daftar Akun</button>
        </form>
        
        <div class="login-link">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>