<?php
if (!isset($halaman_aktif)) {
    $halaman_aktif = "";
}
?>
<header>
      <nav>
        <a href="index.php" class="logo" id="logo-teks">GARENT</a>
        <ul>
          <li><a href="index.php" class="nav-link">Home</a></li>
          <li><a href="category.php" class="nav-link<?php if ($halaman_aktif == "category") { echo " active"; } ?>">Category</a></li>
          <?php if (isset($_SESSION['username'])) { ?>
            <?php if (($_SESSION['role'] ?? "") == "admin") { ?>
          <li><a href="admin/dashboard.php" class="nav-link">Dashboard</a></li>
            <?php } ?>
          <li><a href="logout.php" class="btn_login">Logout</a></li>
          <?php } else { ?>
          <li><a href="register.php" class="nav-link">Register</a></li>
          <li><a href="login.php" class="btn_login">Login</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>