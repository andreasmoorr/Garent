<?php
$halaman_aktif = $halaman_aktif ?? '';
$akar  = $akar  ?? '../';   // jalur ke folder Garent/
$admin = $admin ?? '';      // jalur ke folder admin/
?>
<header class="dash-header">
  <nav class="dash-nav">
    <a href="<?= $akar ?>index.php" class="logo" style="font-size:32px; font-weight:900; color:#000; text-decoration:none;">GARENT</a>
    <ul>
      <li><a href="<?= $admin ?>dashboard.php"<?= $halaman_aktif === 'dashboard' ? ' class="active"' : '' ?>>Dashboard</a></li>
      <li><a href="<?= $admin ?>transaction/transaction.php"<?= $halaman_aktif === 'transaction' ? ' class="active"' : '' ?>>Transaction</a></li>
      <li><a href="<?= $admin ?>category/category.php"<?= $halaman_aktif === 'category' ? ' class="active"' : '' ?>>Category</a></li>
      <li><a href="<?= $akar ?>logout.php" class="logout">Logout (<?= htmlspecialchars($_SESSION['username'] ?? '') ?>)</a></li>
    </ul>
  </nav>
</header>