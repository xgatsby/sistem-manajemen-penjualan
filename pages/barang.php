<?php
include '../config/koneksi.php';

$limit = 10;
$page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page_num - 1) * $limit;

$search = isset($_GET['search']) ? clean_input($_GET['search']) : '';
$where_clause = '';
if (!empty($search)) {
    $where_clause = "WHERE id LIKE '%$search%' OR nmbrg LIKE '%$search%'";
}

$total_query = execute_query("SELECT COUNT(*) as total FROM barang $where_clause");
$total_data = mysqli_fetch_assoc($total_query)['total'];
$total_pages = ceil($total_data / $limit);

$query = execute_query("SELECT * FROM barang $where_clause ORDER BY id ASC LIMIT $limit OFFSET $offset");
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
    
    .currency {
        color: #28a745;
        font-weight: 600;
    }
    
    .stock-low {
        color: #dc3545;
        font-weight: 600;
    }
    
    .stock-medium {
        color: #ffc107;
        font-weight: 600;
    }
    
    .stock-high {
        color: #28a745;
        font-weight: 600;
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
    <h2 class="page-title">📦 Data Barang</h2>
    <div class="search-container">
        <form method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
            <input type="hidden" name="page" value="barang">
            <input type="text" name="search" placeholder="Cari barang..." class="search-box" 
                   value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary btn-sm">🔍 Cari</button>
            <?php if (!empty($search)): ?>
                <a href="?page=barang" class="btn btn-sm" style="background: #6c757d; color: white;">✖ Reset</a>
            <?php endif; ?>
        </form>
        <a href="?page=tambah" class="btn btn-success">➕ Tambah Barang</a>
    </div>
</div>

<?php
$stats_query = execute_query("SELECT 
    COUNT(*) as total_items,
    SUM(stok) as total_stock,
    COUNT(CASE WHEN stok <= 5 THEN 1 END) as low_stock
    FROM barang $where_clause");
$stats = mysqli_fetch_assoc($stats_query);
?>

<div class="stats-info">
    <div><strong>Total Barang:</strong> <?php echo $stats['total_items']; ?> item</div>
    <div><strong>Total Stok:</strong> <?php echo $stats['total_stock'] ?: 0; ?> unit</div>
    <div><strong>Stok Menipis:</strong> <span class="stock-low"><?php echo $stats['low_stock']; ?> item</span></div>
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = $offset + 1;
                while ($row = mysqli_fetch_assoc($query)): 
                    $stock_status = '';
                    $stock_class = '';
                    if ($row['stok'] <= 5) {
                        $stock_status = 'Stok Menipis';
                        $stock_class = 'stock-low';
                    } elseif ($row['stok'] <= 20) {
                        $stock_status = 'Stok Sedang';
                        $stock_class = 'stock-medium';
                    } else {
                        $stock_status = 'Stok Aman';
                        $stock_class = 'stock-high';
                    }
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><strong><?php echo htmlspecialchars($row['id']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['nmbrg']); ?></td>
                        <td><span class="currency">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span></td>
                        <td><?php echo $row['stok']; ?> unit</td>
                        <td><span class="<?php echo $stock_class; ?>"><?php echo $stock_status; ?></span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="?page=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <a href="pages/hapus.php?id=<?php echo $row['id']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('⚠️ Yakin ingin menghapus barang \"<?php echo htmlspecialchars($row['nmbrg']); ?>\"?')">
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
            <h3>📭 Tidak ada data barang</h3>
            <?php if (!empty($search)): ?>
                <p>Tidak ditemukan hasil untuk pencarian "<?php echo htmlspecialchars($search); ?>"</p>
                <a href="?page=barang" class="btn btn-primary">Lihat Semua Data</a>
            <?php else: ?>
                <p>Belum ada data barang yang tersimpan.</p>
                <a href="?page=tambah" class="btn btn-success">➕ Tambah Barang Pertama</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php if ($total_pages > 1): ?>
    <div class="pagination">
        <?php if ($page_num > 1): ?>
            <a href="?page=barang<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=1">« Pertama</a>
            <a href="?page=barang<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $page_num - 1; ?>">‹ Sebelumnya</a>
        <?php endif; ?>
        
        <?php 
        $start_page = max(1, $page_num - 2);
        $end_page = min($total_pages, $page_num + 2);
        
        for ($i = $start_page; $i <= $end_page; $i++): 
        ?>
            <a href="?page=barang<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $i; ?>"
               class="<?php echo ($i == $page_num) ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        
        <?php if ($page_num < $total_pages): ?>
            <a href="?page=barang<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $page_num + 1; ?>">Selanjutnya ›</a>
            <a href="?page=barang<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>&page_num=<?php echo $total_pages; ?>">Terakhir »</a>
        <?php endif; ?>
    </div>
    
    <div style="text-align: center; margin-top: 1rem; color: #666; font-size: 0.9rem;">
        Menampilkan <?php echo $offset + 1; ?> - <?php echo min($offset + $limit, $total_data); ?> dari <?php echo $total_data; ?> data
    </div>
<?php endif; ?>
