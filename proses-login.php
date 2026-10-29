<?php
require_once __DIR__ . '/includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    set_flash('Peringatan: Username dan Password tidak boleh kosong!', 'error');
    header('Location: login.php');
    exit;
}

session_regenerate_id(true);                       // cegah session fixation
$_SESSION['username']    = $username;              // SESSION: nama pengguna
$_SESSION['waktu_login'] = date('d-m-Y H:i');

// COOKIE: ingat username terakhir selama 7 hari
setcookie('garent_last_user', $username, time() + 86400 * 7, '/');

header('Location: admin/dashboard.php');
exit;