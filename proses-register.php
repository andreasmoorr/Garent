<?php
require_once __DIR__ . '/includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm  = trim($_POST['confirm'] ?? '');

if ($username === '' || $password === '' || $confirm === '') {
    set_flash('Peringatan: Semua kolom wajib diisi!', 'error');
    header('Location: register.php');
    exit;
}
if ($password !== $confirm) {
    set_flash('Peringatan: Password dan Confirm Password tidak sama!', 'error');
    header('Location: register.php');
    exit;
}

setcookie('garent_last_user', $username, time() + 86400 * 7, '/');
set_flash('Registrasi berhasil! Silakan login.', 'success');
header('Location: login.php');
exit;