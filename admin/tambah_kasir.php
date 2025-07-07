<?php
include '../config/koneksi.php';

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['idksr']) || empty($_POST['nmksr']) || empty($_POST['jkksr']) || empty($_POST['ntksr']) || empty($_POST['alksr'])) {
        $error_message = "Semua field harus diisi!";
    } else {
        $id = clean_input($_POST['idksr']);
        $nmksr = clean_input($_POST['nmksr']);
        $jkksr = clean_input($_POST['jkksr']);
        $ntksr = clean_input($_POST['ntksr']);
        $alksr = clean_input($_POST['alksr']);
        
        if (!preg_match('/^[0-9+\-\s]+$/', $ntksr)) {
            $error_message = "Format nomor telepon tidak valid!";
        } elseif (!in_array($jkksr, ['Laki-laki', 'Perempuan'])) {
            $error_message = "Jenis kelamin harus dipilih!";
        } else {
            $check_query = execute_query("SELECT idksr FROM kasir WHERE idksr='$id'");
            if (mysqli_num_rows($check_query) > 0) {
                $error_message = "ID Kasir '$id' sudah ada! Gunakan ID yang berbeda.";
            } else {
                $query = "INSERT INTO kasir (idksr, nmksr, jkksr, ntksr, alksr) VALUES ('$id', '$nmksr', '$jkksr', '$ntksr', '$alksr')";
                $result = execute_query($query);
                
                if ($result) {
                    header("Location: ../halaman_utama.php?page=kasir&success=added");
                    exit();
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kasir - Sistem Manajemen Penjualan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
    </style>
</head>

<body>
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .form-header h2 {
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
            margin-right: 1rem;
        }
        
        .btn-secondary:hover {
            background: #545b62;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 1rem;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
    
    <a href="?page=kasir" class="back-link">← Kembali ke Data Kasir</a>
    
    <div class="form-container">
        <div class="form-header">
            <h2>👥 Tambah Kasir Baru</h2>
            <p>Lengkapi form di bawah untuk menambahkan kasir baru</p>
        </div>
        
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-error">
                ⚠️ <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="idksr">ID Kasir:</label>
                <input type="text" id="idksr" name="idksr" required 
                       placeholder="Contoh: KSR001"
                       value="<?php echo isset($_POST['idksr']) ? htmlspecialchars($_POST['idksr']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="nmksr">Nama Kasir:</label>
                <input type="text" id="nmksr" name="nmksr" required 
                       placeholder="Masukkan nama kasir"
                       value="<?php echo isset($_POST['nmksr']) ? htmlspecialchars($_POST['nmksr']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="jkksr">Jenis Kelamin:</label>
                <select id="jkksr" name="jkksr" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" <?php echo (isset($_POST['jkksr']) && $_POST['jkksr'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo (isset($_POST['jkksr']) && $_POST['jkksr'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ntksr">No Telepon:</label>
                <input type="tel" id="ntksr" name="ntksr" required 
                       placeholder="Contoh: 08123456789"
                       value="<?php echo isset($_POST['ntksr']) ? htmlspecialchars($_POST['ntksr']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="alksr">Alamat:</label>
                <input type="text" id="alksr" name="alksr" required 
                       placeholder="Masukkan alamat lengkap"
                       value="<?php echo isset($_POST['alksr']) ? htmlspecialchars($_POST['alksr']) : ''; ?>">
            </div>
            
            <div class="form-actions">
                <a href="?page=kasir" class="btn btn-secondary">✖ Batal</a>
                <button type="submit" class="btn btn-primary">✓ Simpan Kasir</button>
            </div>
        </form>
    </div>
</body>

</html>
