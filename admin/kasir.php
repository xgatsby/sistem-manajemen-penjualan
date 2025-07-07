<?php
include '../config/koneksi.php';

$limit = 10;
$page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page_num - 1) * $limit;

$search = isset($_GET['search']) ? clean_input($_GET['search']) : '';
$where_clause = '';
if (!empty($search)) {
    $where_clause = "WHERE idksr LIKE '%$search%' OR nmksr LIKE '%$search%' OR jkksr LIKE '%$search%' OR alksr LIKE '%$search%'";
}

$total_query = execute_query("SELECT COUNT(*) as total FROM kasir $where_clause");
$total_data = mysqli_fetch_assoc($total_query)['total'];
$total_pages = ceil($total_data / $limit);

$query = execute_query("SELECT * FROM kasir $where_clause ORDER BY idksr ASC LIMIT $limit OFFSET $offset");
?>

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .page-title {
        color: #333;
        font-size: 2rem;
        margin: 0;
    }
    
    .search-container {
        display: flex;
        gap: 1rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .search-box {
        padding: 0.6rem 1rem;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        width: 250px;
    }
    
    .search-box:focus {
        outline: none;
        border-color: #667eea;
    }
    
    .btn {
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
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
    
    .btn-success {
        background: #28a745;
        color: white;
    }
    
    .btn-success:hover {
        background: #218838;
    }
    
    .btn-warning {
        background: #ffc107;
        color: #212529;
    }
    
    .btn-warning:hover {
        background: #e0a800;
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .btn-danger:hover {
        background: #c82333;
    }
    
    .btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.8rem;
    }
    
    .table-container {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }
    
    .table th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        border: none;
    }
    
    .table td {
        padding: 1rem;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }
    
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .stats-info {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .gender-badge {
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .gender-male {
        background: #e3f2fd;
        color: #1976d2;
    }
    
    .gender-female {
        background: #fce4ec;
        color: #c2185b;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }
    
    .pagination a {
        padding: 0.5rem 1rem;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #667eea;
        border-radius: 5px;
        transition: all 0.3s;
    }
    
    .pagination a:hover {
        background: #667eea;
        color: white;
    }
    
    .pagination .active {
        background: #667eea;
        color: white;
    }
    
    .no-data {
        text-align: center;
        padding: 3rem;
        color: #666;
    }
    
    .no-data h3 {
        margin-bottom: 1rem;
        color: #999;
    }
    
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-container {
            flex-direction: column;
        }
        
        .search-box {
            width: 100%;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="page-header">
    <h2 class="page-title">👥 Data Kasir</h2>
    <div class="search-container">
        <form method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
            <input type="hidden" name="page" value="kasir">
            <input type="text" name="search" placeholder="Cari kasir..." class="search-box" 
                   value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary btn-sm">🔍 Cari</button>
            <?php if (!empty($search)): ?>
                <a href="?page=kasir" class="btn btn-sm" style="background: #6c757d; color: white;">✖ Reset</a>
            <?php endif; ?>
        </form>
        <a href="?page=tambah_kasir" class="btn btn-success">➕ Tambah Kasir</a>
    </div>
</div>

<?php
$stats_query = execute_query("SELECT 
    COUNT(*) as total_kasir,
    COUNT(CASE WHEN jkksr = 'Laki-laki' THEN 1 END) as total_male,
    COUNT(CASE WHEN jkksr = 'Perempuan' THEN 1 END) as total_female
    FROM kasir $where_clause");
$stats = mysqli_fetch_assoc($stats_query);
?>

<div class="stats-info">
    <div><strong>Total Kasir:</strong> <?php echo $stats['total_kasir']; ?> orang</div>
    <div><strong>Laki-laki:</strong> <?php echo $stats['total_male']; ?> orang</div>
    <div><strong>Perempuan:</strong> <?php echo $stats['total_female']; ?> orang</div>
    <?php if (!empty($search)): ?>
        <div><strong>Hasil Pencarian:</strong> "<?php echo htmlspecialchars($search); ?>"</div>
    <?php endif; ?>
</div>

<div class="table-container">
    <?php if (mysqli_num_rows($query) > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kasir</th>
                    <th>Nama Kasir</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = $offset + 1;
                while ($row = mysqli_fetch_assoc($query)): 
                    $gender_class = ($row['jkksr'] == 'Laki-laki') ? 'gender-male' : 'gender-female';
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><strong><?php echo htmlspecialchars($row['idksr']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['nmksr']); ?></td>
                        <td><span class="gender-badge <?php echo $gender_class; ?>"><?php echo htmlspecialchars($row['jkksr']); ?></span></td>
                        <td><?php echo htmlspecialchars($row['ntksr']); ?></td>
                        <td><?php echo htmlspecialchars($row['alksr']); ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="?page=edit_kasir&idksr=<?php echo $row['idksr']; ?>" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <a href="admin/hapus_kasir.php?idksr=<?php echo $row['idksr']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('⚠️ Yakin ingin menghapus kasir \"<?php echo htmlspecialchars($row['nmksr']); ?>\"?')">
                                    🗑️ Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-data">
            <h3>📭 Tidak ada data kasir</h3>
            <?php if (!empty($search)): ?>
                <p>Tidak ditemukan hasil untuk pencarian "<?php echo htmlspecialchars($search); ?>"</p>
                <a href="?page=kasir" class="btn btn-primary">Lihat Semua Data</a>
            <?php else: ?>
                <p>Belum ada data kasir yang tersimpan.</p>
                <a href="?page=tambah_kasir" class="btn btn-success">➕ Tambah Kasir Pertama</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php if ($total_pages > 1): ?>
    <div class="pagination">
        <?php if ($page_num > 1): ?>
            <a href="?page=kasir<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=1">« Pertama</a>
            <a href="?page=kasir<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $page_num - 1; ?>">‹ Sebelumnya</a>
        <?php endif; ?>
        
        <?php 
        $start_page = max(1, $page_num - 2);
        $end_page = min($total_pages, $page_num + 2);
        
        for ($i = $start_page; $i <= $end_page; $i++): 
        ?>
            <a href="?page=kasir<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $i; ?>"
               class="<?php echo ($i == $page_num) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        
        <?php if ($page_num < $total_pages): ?>
            <a href="?page=kasir<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $page_num + 1; ?>">Selanjutnya ›</a>
            <a href="?page=kasir<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $total_pages; ?>">Terakhir »</a>
        <?php endif; ?>
    </div>
    
    <div style="text-align: center; margin-top: 1rem; color: #666; font-size: 0.9rem;">
        Menampilkan <?php echo $offset + 1; ?> - <?php echo min($offset + $limit, $total_data); ?> dari <?php echo $total_data; ?> data
    </div>
<?php endif; ?>
