<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header('location:../../login.php');
  exit;
}
include '../../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garent - Category Data</title>
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
      <h2>Data Kategori Unit</h2>
      <a href="category-entry.php" class="btn-action" style="margin: 15px 0;">+ Tambah Kategori</a>

      <table class="table-data">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Kategori</th>
            <th>Harga/Hari</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM tb_category";
          $result = mysqli_query($koneksi, $sql);

          if (mysqli_num_rows($result) == 0) {
            echo "
              <tr>
                <td colspan='6' align='center'>Data Kosong</td>
              </tr>
            ";
          }

          $no = 1;
          while ($data = mysqli_fetch_assoc($result)) {
            $harga = number_format($data['harga_sewa'], 0, ',', '.');
            echo "
              <tr>
                <td>$no</td>
                <td><img src='../../img_categories/$data[foto]' width='100px'></td>
                <td>$data[nama_kategori]</td>
                <td>Rp $harga</td>
                <td>$data[deskripsi]</td>
                <td>
                  <a class='btn-action' href='category-edit.php?id=$data[id]'>Edit</a>
                  <a class='btn-action btn-delete' href='category-hapus.php?id=$data[id]'>Hapus</a>
                </td>
              </tr>
            ";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>