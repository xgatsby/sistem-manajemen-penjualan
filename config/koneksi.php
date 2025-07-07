<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dbphpjual');

$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$koneksi) {
    die("<div style='color: red; font-family: Arial, sans-serif; padding: 20px; border: 1px solid red; margin: 20px;'>
         <h3>Error Koneksi Database</h3>
         <p>Gagal terhubung ke database: " . mysqli_connect_error() . "</p>
         <p>Silakan pastikan:</p>
         <ul>
             <li>XAMPP/Apache sudah berjalan</li>
             <li>MySQL sudah berjalan</li>
             <li>Database 'dbphpjual' sudah dibuat</li>
         </ul>
         </div>");
}

mysqli_set_charset($koneksi, 'utf8');

function clean_input($data) {
    global $koneksi;
    return mysqli_real_escape_string($koneksi, htmlspecialchars(trim($data)));
}

function execute_query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    
    if (!$result) {
        die("<div style='color: red; font-family: Arial, sans-serif; padding: 20px; border: 1px solid red; margin: 20px;'>
             <h3>Error Query Database</h3>
             <p>Query Error: " . mysqli_error($koneksi) . "</p>
             </div>");
    }
    
    return $result;
}

?>