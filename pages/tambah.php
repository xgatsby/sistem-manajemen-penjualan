<?php
include '../config/koneksi.php';

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['id']) || empty($_POST['nmbrg']) || empty($_POST['harga']) || empty($_POST['stok'])) {
        $error_message = "Semua field harus diisi!";
    } else {
        $id = clean_input($_POST['id']);
        $nmbrg = clean_input($_POST['nmbrg']);
        $harga = clean_input($_POST['harga']);
        $stok = clean_input($_POST['stok']);
        
        if (!is_numeric($harga) || $harga <= 0) {
            $error_message = "Harga harus berupa angka positif!";
        } elseif (!is_numeric($stok) || $stok < 0) {
            $error_message = "Stok harus berupa angka tidak negatif!";
        } else {
            $check_query = execute_query("SELECT id FROM barang WHERE id='$id'");
            if (mysqli_num_rows($check_query) > 0) {
                $error_message = "Kode barang '$id' sudah ada! Gunakan kode yang berbeda.";
            } else {
                $query = "INSERT INTO barang (id, nmbrg, harga, stok) VALUES ('$id', '$nmbrg', '$harga', '$stok')";
                $result = execute_query($query);
                
                if ($result) {
                    header("Location: ../halaman_utama.php?page=barang&success=added");
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
    <title>Tambah Barang - Sistem Manajemen Penjualan</title>
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
        
        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus {
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
    
    <a href="?page=barang" class="back-link">← Kembali ke Data Barang</a>
    
    <div class="form-container">
        <div class="form-header">
            <h2>📦 Tambah Barang Baru</h2>
            <p>Lengkapi form di bawah untuk menambahkan barang baru</p>
        </div>
        
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-error">
                ⚠️ <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="id">Kode Barang:</label>
                <input type="text" id="id" name="id" required 
                       placeholder="Contoh: BRG001"
                       value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="nmbrg">Nama Barang:</label>
                <input type="text" id="nmbrg" name="nmbrg" required 
                       placeholder="Masukkan nama barang"
                       value="<?php echo isset($_POST['nmbrg']) ? htmlspecialchars($_POST['nmbrg']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="harga">Harga (Rp):</label>
                <input type="number" id="harga" name="harga" required min="1" 
                       placeholder="Masukkan harga barang"
                       value="<?php echo isset($_POST['harga']) ? htmlspecialchars($_POST['harga']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" required min="0" 
                       placeholder="Masukkan jumlah stok"
                       value="<?php echo isset($_POST['stok']) ? htmlspecialchars($_POST['stok']) : ''; ?>">
            </div>
            
            <div class="form-actions">
                <a href="?page=barang" class="btn btn-secondary">✖ Batal</a>
                <button type="submit" class="btn btn-primary">✓ Simpan Barang</button>
            </div>
        </form>
    </div>
</body>

</html>
