<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header('location:../../login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garent - Entry Category</title>
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
          <li><a href="../../logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>

    <main style="margin-top: 30px;">
      <h2>Tambah Data Kategori</h2>
      <div class="form-card">
        <form action="category-proses.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama_kategori">Nama Kategori Unit</label>
            <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Xbox Series X">
          </div>
          <div class="form-group">
            <label for="harga_sewa">Harga Sewa Per Hari</label>
            <input type="number" id="harga_sewa" name="harga_sewa" placeholder="Contoh: 120000">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi unit"></textarea>
          </div>
          <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" id="photo" name="photo">
          </div>
          <button type="submit" class="btn-action" name="simpan">Simpan Data</button>
        </form>
      </div>
    </main>
  </div>
</body>
</html>