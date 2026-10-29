<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function sudah_login(): bool
{
    return isset($_SESSION['username']);
}

function wajib_login(string $arah_login): void
{
    if (!sudah_login()) {
        header('Location: ' . $arah_login . '?pesan=belum_login');
        exit;
    }
}

function set_flash(string $pesan, string $tipe = 'info'): void
{
    $_SESSION['flash'] = ['pesan' => $pesan, 'tipe' => $tipe];
}

function ambil_flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}