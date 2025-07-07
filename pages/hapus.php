<?php
include '../config/koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../halaman_utama.php?page=barang&error=invalid_id");
    exit();
}

$id = clean_input($_GET['id']);

$check_query = execute_query("SELECT id, nmbrg FROM barang WHERE id='$id'");
if (mysqli_num_rows($check_query) == 0) {
    header("Location: ../halaman_utama.php?page=barang&error=not_found");
    exit();
}

$query = "DELETE FROM barang WHERE id='$id'";
execute_query($query);

header("Location: ../halaman_utama.php?page=barang&success=deleted");
exit();
?>
