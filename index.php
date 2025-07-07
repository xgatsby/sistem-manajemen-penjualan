<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: halaman_utama.php");
    exit;
}

header("Location: login.php");
exit;
?>
