<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: halaman_utama.php");
    exit;
}

$correct_username = 'admin';
$correct_password = 'admin';

$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error_message = "Username dan password harus diisi!";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if ($username === $correct_username && $password === $correct_password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['login_time'] = time();
            
            header("Location: halaman_utama.php");
            exit;
        } else {
            $error_message = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Login - Sistem Manajemen Penjualan</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary-alt) 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: var(--spacing-md);
        }
        
        .login-container {
            background: var(--color-white);
            padding: var(--spacing-xl);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-strong);
            width: 500px;
            max-width: 90%;
            border: 1px solid var(--color-neutral-light);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: var(--spacing-xl);
        }
        
        .login-header h2 {
            color: var(--color-primary-dark);
            font-family: var(--font-heading);
            margin-bottom: var(--spacing-sm);
            font-size: var(--font-size-h2);
        }
        
        .login-header p {
            color: var(--color-text-muted);
            font-size: var(--font-size-small);
            margin-bottom: var(--spacing-xs);
        }
        
        .team-info {
            background: linear-gradient(135deg, var(--color-accent-teal), var(--color-accent-aqua));
            color: var(--color-white);
            padding: var(--spacing-sm);
            border-radius: var(--border-radius-md);
            margin-bottom: var(--spacing-md);
            text-align: center;
        }
        
        .team-info small {
            opacity: 0.9;
            display: block;
            margin-top: var(--spacing-xs);
        }
        
        .login-btn {
            width: 100%;
            padding: var(--spacing-sm);
            background: linear-gradient(135deg, var(--color-accent-teal), var(--color-accent-aqua));
            color: var(--color-white);
            border: none;
            border-radius: var(--border-radius-md);
            font-size: var(--font-size-body);
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-base);
            font-family: var(--font-body);
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }
        
        .login-info {
            margin-top: var(--spacing-lg);
            padding: var(--spacing-md);
            background: var(--color-neutral-offwhite);
            border-radius: var(--border-radius-md);
            border-left: 4px solid var(--color-accent-teal);
        }
        
        .login-info h4 {
            color: var(--color-accent-teal);
            margin-bottom: var(--spacing-xs);
            font-family: var(--font-heading);
        }
        
        .login-info p {
            color: var(--color-text-muted);
            font-size: var(--font-size-small);
            margin: var(--spacing-xs) 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>🏪 Sistem Manajemen Penjualan</h2>
            <p>Tugas Kelompok 6 - Pemrograman Web</p>
            <div class="team-info">
                <strong>👥 Tim Pengembang</strong>
                <small>Rizki Ramadhan Lubis • Vicry Putra Mahendra</small>
                <small>Teknik Informatika - Universitas Indraprasta PGRI Jakarta</small>
            </div>
        </div>
        
        <?php if (!empty($error_message)): ?>
            <div class="notification error">
                ⚠️ <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($success_message)): ?>
            <div class="notification success">
                ✅ <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required 
                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-btn">🔑 LOGIN</button>
        </form>
        
        <div class="login-info">
            <h4>📝 Informasi Login:</h4>
            <p><strong>Username:</strong> admin</p>
            <p><strong>Password:</strong> admin</p>
            <small style="opacity: 0.8; display: block; margin-top: var(--spacing-xs);">Gunakan kredensial di atas untuk masuk ke sistem</small>
        </div>
    </div>
</body>
</html>
