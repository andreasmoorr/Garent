<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header('location:../../login.php');
  exit;
}

include '../../koneksi.php';

if (!isset($_GET['id'])) {
  echo "
    <script>
      alert('Tidak ada ID yang Terdeteksi');
      window.location = 'category.php';
    </script>
  ";
  exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM tb_category WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
  echo "
    <script>
      alert('Data tidak ditemukan');
      window.location = 'category.php';
    </script>
  ";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garent - Hapus Category</title>
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
      <h2>Hapus Data Kategori</h2>
      <div class="form-card">
        <h4>Ingin menghapus kategori "<?= $data['nama_kategori'] ?>"?</h4>
        <form action="category-proses.php" method="post" style="margin-top: 20px;">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <button type="submit" class="btn-action btn-delete" name="hapus">Yes</button>
          <a href="category.php" class="btn-action">No</a>
        </form>
      </div>
    </main>
  </div>
</body>
</html>