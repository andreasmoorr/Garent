<?php
$servername = 'localhost';
$username = 'root';
$password = ''; // Laragon default kosong. Jika MySQL kamu memakai password, isi di sini
$database = 'db_garent';

// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if (!$koneksi) {
    die('Connection Failed: ' . mysqli_connect_error());
}
?>