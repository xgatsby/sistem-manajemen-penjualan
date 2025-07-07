<?php
include '../config/koneksi.php';

if (!isset($_GET['idksr']) || empty($_GET['idksr'])) {
    header("Location: ../halaman_utama.php?page=kasir&error=invalid_id");
    exit();
}

$id = clean_input($_GET['idksr']);

$check_query = execute_query("SELECT idksr, nmksr FROM kasir WHERE idksr='$id'");
if (mysqli_num_rows($check_query) == 0) {
    header("Location: ../halaman_utama.php?page=kasir&error=not_found");
    exit();
}

$query = "DELETE FROM kasir WHERE idksr='$id'";
execute_query($query);

header("Location: ../halaman_utama.php?page=kasir&success=deleted");
exit();
?>
