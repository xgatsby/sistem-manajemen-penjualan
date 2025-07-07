<?php
include '../config/koneksi.php';

echo "<h2>🔄 Update Data Kasir - Anggota Kelompok</h2>";

$delete_query = "TRUNCATE TABLE kasir";
if (mysqli_query($koneksi, $delete_query)) {
    echo "<p>✅ Data lama berhasil dihapus</p>";
} else {
    echo "<p>❌ Error menghapus data lama: " . mysqli_error($koneksi) . "</p>";
}

$insert_query = "INSERT INTO `kasir` (`idksr`, `nmksr`, `jkksr`, `ntksr`, `alksr`) VALUES
('KSR001', 'Rizki Ramadhan Lubis', 'Laki-laki', '087894966464', 'Bogor'),
('KSR002', 'Vicry Putra Mahendra', 'Laki-laki', '087893213412', 'Jakarta Utara'),
('KSR003', 'Alya Sari', 'Perempuan', '08950213234', 'Jakarta Selatan')";

if (mysqli_query($koneksi, $insert_query)) {
    echo "<p>✅ Data kasir baru berhasil ditambahkan</p>";
    
    echo "<h3>📋 Data Kasir Terbaru:</h3>";
    $result = mysqli_query($koneksi, "SELECT * FROM kasir ORDER BY idksr");
    
    echo "<table border='1' style='border-collapse: collapse; width: 100%; margin-top: 10px;'>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 10px;'>ID Kasir</th>";
    echo "<th style='padding: 10px;'>Nama</th>";
    echo "<th style='padding: 10px;'>Jenis Kelamin</th>";
    echo "<th style='padding: 10px;'>No. Telepon</th>";
    echo "<th style='padding: 10px;'>Alamat</th>";
    echo "</tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 8px; text-align: center;'>" . $row['idksr'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['nmksr'] . "</td>";
        echo "<td style='padding: 8px; text-align: center;'>" . $row['jkksr'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['ntksr'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['alksr'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    $laki_result = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM kasir WHERE jkksr = 'Laki-laki'");
    $perempuan_result = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM kasir WHERE jkksr = 'Perempuan'");
    
    $laki_count = mysqli_fetch_assoc($laki_result)['count'];
    $perempuan_count = mysqli_fetch_assoc($perempuan_result)['count'];
    
    echo "<h3>📊 Statistik Gender:</h3>";
    echo "<p>👨 Laki-laki: <strong>$laki_count orang</strong></p>";
    echo "<p>👩 Perempuan: <strong>$perempuan_count orang</strong></p>";
    
} else {
    echo "<p>❌ Error menambahkan data baru: " . mysqli_error($koneksi) . "</p>";
}

echo "<hr>";
echo "<p><a href='../halaman_utama.php'>🏠 Kembali ke Dashboard</a></p>";
echo "<p><a href='../halaman_utama.php?page=kasir'>👥 Lihat Data Kasir</a></p>";

mysqli_close($koneksi);
?>
