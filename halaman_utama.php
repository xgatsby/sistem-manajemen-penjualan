<?php
include 'includes/auth.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$user_info = get_user_info();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Penjualan - Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .team-info {
            background: var(--color-white);
            border-radius: var(--border-radius-lg);
            padding: var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
            box-shadow: var(--shadow-light);
            text-align: center;
            border: 2px solid var(--color-accent-teal);
        }
        
        .team-info h3 {
            color: var(--color-primary-dark);
            font-family: var(--font-heading);
            font-size: var(--font-size-h3);
            margin-bottom: var(--spacing-sm);
            font-weight: 700;
        }
        
        .course-info {
            background: linear-gradient(135deg, var(--color-primary-dark), var(--color-primary-alt));
            color: var(--color-white);
            padding: var(--spacing-sm) var(--spacing-md);
            border-radius: var(--border-radius-md);
            margin-bottom: var(--spacing-md);
            font-weight: 600;
            font-size: var(--font-size-body);
        }
        
        .team-members {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: var(--spacing-md);
            margin-top: var(--spacing-md);
            justify-items: center;
        }
        
        .member-card {
            background: linear-gradient(135deg, var(--color-accent-teal), var(--color-accent-aqua));
            color: var(--color-white);
            padding: var(--spacing-lg);
            border-radius: var(--border-radius-lg);
            text-align: center;
            box-shadow: var(--shadow-medium);
            transition: transform var(--transition-base), box-shadow var(--transition-base);
            border: 3px solid rgba(255,255,255,0.2);
            min-width: 280px;
        }
        
        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-strong);
        }
        
        .member-card h4 {
            font-family: var(--font-heading);
            margin-bottom: var(--spacing-sm);
            color: var(--color-white);
            font-size: 1.3rem;
            font-weight: 700;
        }
        
        .member-card .npm {
            background: rgba(255,255,255,0.2);
            padding: var(--spacing-xs) var(--spacing-sm);
            border-radius: var(--border-radius-md);
            font-weight: 700;
            font-size: var(--font-size-body);
            color: #FFE4B5;
            border: 2px solid rgba(255,255,255,0.3);
            display: inline-block;
            margin-top: var(--spacing-xs);
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: var(--color-white);
            padding: var(--spacing-xs) var(--spacing-sm);
            border: none;
            border-radius: var(--border-radius-md);
            text-decoration: none;
            font-size: var(--font-size-small);
            transition: all var(--transition-base);
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            color: var(--color-white);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1>🏪 Sistem Manajemen Penjualan</h1>
                    <p style="margin: 0; opacity: 0.9; font-size: var(--font-size-small);">Tugas Kelompok 6 - Pemrograman Web</p>
                    <small style="color: rgba(255,255,255,0.8);">Universitas Indraprasta PGRI Jakarta</small>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <span style="font-size: var(--font-size-small);">Selamat datang, <?php echo htmlspecialchars($user_info['username']); ?></span>
                    <a href="?logout=true" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">🚪 Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="team-info">
            <h3>👥 Tim Pengembang</h3>
            <div class="course-info">
                📚 Tugas Kelompok 6 - Pemrograman Web<br>
                🎓 Teknik Informatika - Kelas SJ - Semester 6<br>
                🏛️ Universitas Indraprasta PGRI Jakarta
            </div>
            <div class="team-members">
                <div class="member-card">
                    <h4>👨‍💻 Rizki Ramadhan Lubis</h4>
                    <div class="npm">NPM: 202243500763 • TI</div>
                </div>
                <div class="member-card">
                    <h4>👨‍💻 Vicry Putra Mahendra</h4>
                    <div class="npm">NPM: 202243501638 • TI</div>
                </div>
            </div>
        </div>
        
        <nav class="nav-menu">
            <a href="?page=home" <?php echo ($page == 'home') ? 'class="active"' : ''; ?>>🏠 Beranda</a>
            <a href="?page=barang" <?php echo ($page == 'barang') ? 'class="active"' : ''; ?>>📦 Data Barang</a>
            <a href="?page=kasir" <?php echo ($page == 'kasir') ? 'class="active"' : ''; ?>>👥 Data Kasir</a>
        </nav>
        
        <main class="card fade-in">
            <?php
            if (isset($_GET['success'])) {
                $success_message = '';
                switch ($_GET['success']) {
                    case 'added':
                        $success_message = 'Data berhasil ditambahkan!';
                        break;
                    case 'updated':
                        $success_message = 'Data berhasil diperbarui!';
                        break;
                    case 'deleted':
                        $success_message = 'Data berhasil dihapus!';
                        break;
                }
                if ($success_message) {
                    echo "<div class='notification success'>";
                    echo "<button class='alert-close' onclick='this.parentElement.style.display=\"none\"' style='position: absolute; top: 0.5rem; right: 1rem; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: inherit;'>&times;</button>";
                    echo "✅ $success_message";
                    echo "</div>";
                }
            }
            
            if (isset($_GET['error'])) {
                $error_message = '';
                switch ($_GET['error']) {
                    case 'invalid_id':
                        $error_message = 'ID tidak valid!';
                        break;
                    case 'not_found':
                        $error_message = 'Data tidak ditemukan!';
                        break;
                }
                if ($error_message) {
                    echo "<div class='notification error'>";
                    echo "<button class='alert-close' onclick='this.parentElement.style.display=\"none\"' style='position: absolute; top: 0.5rem; right: 1rem; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: inherit;'>&times;</button>";
                    echo "⚠️ $error_message";
                    echo "</div>";
                }
            }
            
            switch ($page) {
                case 'barang':
                    include 'pages/barang.php';
                    break;
                case 'tambah':
                    include 'pages/tambah.php';
                    break;
                case 'tambah_kasir':
                    include 'admin/tambah_kasir.php';
                    break;
                case 'edit':
                    if (isset($_GET['id'])) {
                        include 'pages/edit.php';
                    } else {
                        echo "<div class='alert alert-error'>ID barang tidak ditemukan.</div>";
                    }
                    break;
                case 'edit_kasir':
                    if (isset($_GET['idksr'])) {
                        include 'admin/edit_kasir.php';
                    } else {
                        echo "<div class='alert alert-error'>ID kasir tidak ditemukan.</div>";
                    }
                    break;
                case 'kasir':
                    include 'admin/kasir.php';
                    break;
                case 'home':
                default:
                    include 'config/koneksi.php';
                    $total_barang = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM barang"));
                    $total_kasir = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kasir"));
                    $total_stok = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(stok) as total FROM barang"))['total'];
                    ?>
                    <div class="page-header">
                        <h1>🏠 Selamat Datang di Dashboard</h1>
                        <p>Sistem Manajemen Penjualan Modern - Kelompok 6</p>
                    </div>
                    
                    <div class="dashboard stats mb-lg">
                        <div class="card">
                            <div class="stat-number">📦 <?php echo $total_barang; ?></div>
                            <div class="stat-label">Total Barang</div>
                        </div>
                        <div class="card">
                            <div class="stat-number">👥 <?php echo $total_kasir; ?></div>
                            <div class="stat-label">Total Kasir</div>
                        </div>
                        <div class="card">
                            <div class="stat-number">📋 <?php echo $total_stok ?: 0; ?></div>
                            <div class="stat-label">Total Stok</div>
                        </div>
                    </div>
                    
                    <div class="dashboard stats">
                        <div class="card nav-card" onclick="window.location.href='?page=barang'">
                            <h3>📦 Manajemen Barang</h3>
                            <p>Kelola data barang dengan mudah. Tambah, edit, dan hapus data barang dengan antarmuka yang modern dan user-friendly.</p>
                        </div>
                        <div class="card nav-card" onclick="window.location.href='?page=kasir'">
                            <h3>👥 Manajemen Kasir</h3>
                            <p>Atur data kasir dengan sistem yang terintegrasi. Pantau informasi kasir secara real-time dengan fitur pencarian.</p>
                        </div>
                        <div class="card nav-card">
                            <h3>📊 Dashboard Informatif</h3>
                            <p>Dapatkan overview sistem dengan statistik yang jelas, responsif, dan mudah dipahami dalam satu tampilan.</p>
                        </div>
                    </div>
                    <?php
                    break;
            }
            ?>
        </div>
    </div>
</body>

</html>
