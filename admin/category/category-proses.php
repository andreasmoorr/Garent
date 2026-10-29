<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    header("Location: ../../login.php");
    exit;
}
// Dibuka tanpa menekan tombol Simpan -> kembali ke form
if (!isset($_POST['simpan'])) {
    header("Location: category-entry.php");
    exit;
}

$nama  = trim($_POST['nama']);
$harga = trim($_POST['harga']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garent - Proses Category</title>
  <link rel="stylesheet" href="../../css/admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <header class="dash-header">
      <nav class="dash-nav">
        <a href="../../index.php" class="logo" style="font-size:32px; font-weight:900; color:#000; text-decoration:none;">GARENT</a>
        <ul>
          <li><a href="../dashboard.php">Dashboard</a></li>
          <li><a href="../transaction/transaction.php">Transaction</a></li>
          <li><a href="category.php" class="active">Category</a></li>
          <li><a href="../../logout.php" class="logout">Logout</a></li>
        </ul>
      </nav>
    </header>

    <main style="margin-top: 30px;">
      <h2>Hasil Input Kategori</h2>
      <div class="form-card">
        <?php
        if ($nama == "" || $harga == "") {
            echo "Semua field wajib diisi.";
        } elseif (!is_numeric($harga) || $harga <= 0) {
            echo "Harga harus berupa angka lebih dari 0.";
        } else {
            echo "Nama Kategori : " . htmlspecialchars($nama) . "<br>";
            echo "Harga Sewa Per Hari : Rp " . number_format($harga, 0, ',', '.');
        }
        ?>
        <br><br>
        <a href="category-entry.php" class="btn-action">Kembali ke Form</a>
        <a href="category.php" class="btn-action">Lihat Category</a>
      </div>
    </main>
  </div>
</body>
</html>