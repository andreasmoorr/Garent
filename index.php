<?php
session_start();
$halaman_aktif = "home";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garent - Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    #snackbar {
      visibility: hidden;
      min-width: 280px;
      background-color: #111;
      color: #fff;
      text-align: center;
      border-radius: 8px;
      padding: 14px 20px;
      position: fixed;
      z-index: 1000;
      left: 50%;
      top: 30px;
      transform: translateX(-50%);
      font-size: 14px;
      font-weight: 500;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    #snackbar.show {
      visibility: visible;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }
    @keyframes fadein {
      from {top: 0; opacity: 0;}
      to {top: 30px; opacity: 1;}
    }
    @keyframes fadeout {
      from {top: 30px; opacity: 1;}
      to {top: 0; opacity: 0;}
    }
  </style>
</head>
<body>
  <div class="container">
    <?php include 'includes/navbar.php'; ?>

    <main class="hero">
      <?php if (isset($_SESSION['username'])) { ?>
      <h3 class="sapaan" id="sapaan-user">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?></h3>
      <?php } ?>
      <h1 id="judul-utama">Upgrade Pengalaman Gaming-mu Tanpa Bikin Kantong Jebol</h1>
      <p id="deskripsi">Solusi praktis hiburan game untuk akhir pekan, acara kumpul teman, atau sekadar coba unit baru sebelum membeli.</p>

      <!-- Tombol untuk memicu DOM & Toast -->
      <a href="#" class="btn_jelajahi" onclick="prosesJelajahi(event)">Jelajahi Unit</a>
      <button type="button" id="btn-tema" onclick="ubahTema()" style="margin-left: 10px; padding: 10px 22px; border-radius: 20px; border: 1.5px solid #000; background: #fff; color: #000; cursor: pointer; font-weight: 600;">Ubah Tema</button>
    </main>
  </div>

  <section class="why-section" id="section-bawah">
    <h2>Kenapa Memilih Garent?</h2>
    <div class="features-grid">
      <div class="feature-card">
        <h3>Siap Antar Alamat</h3>
        <p>Unit diantar & dijemput langsung.</p>
      </div>
      <div class="feature-card">
        <h3>Unit Steril & Terawat</h3>
        <p>Konsol selalu dibersihkan dan dicek sebelum disewa.</p>
      </div>
      <div class="feature-card">
        <h3>Lengkap & Siap Main</h3>
        <p>Sudah termasuk game populer dan stik ekstra.</p>
      </div>
    </div>
  </section>

  <div id="snackbar">Mohon maaf, halaman katalog unit sedang disiapkan!</div>

  <script src="js/script.js"></script>
</body>
</html>