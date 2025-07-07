<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function check_login() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

function get_user_info() {
    if (isset($_SESSION['username'])) {
        return [
            'username' => $_SESSION['username'],
            'login_time' => isset($_SESSION['login_time']) ? $_SESSION['login_time'] : null
        ];
    }
    return null;
}

if (isset($_GET['logout'])) {
    logout();
}

$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page !== 'login.php') {
    check_login();
}
?>
