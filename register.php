<?php
session_start();

$pesan = "";

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm']);

    if ($username == "" || $password == "" || $confirm == "") {
        $pesan = "Peringatan: Semua kolom wajib diisi!";
    } elseif ($password != $confirm) {
        $pesan = "Peringatan: Password dan Confirm Password tidak sama!";
    } else {
        header("Location: login.php");   // sama seperti action="login.html" pada versi awal
        exit;
    }
}

$halaman_aktif = "register";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garent - Register</title>
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
      z-index: 9999;
      left: 50%;
      top: 30px;
      transform: translateX(-50%);
      font-size: 14px;
      font-weight: 500;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      transition: visibility 0.5s, opacity 0.5s, top 0.5s;
      opacity: 0;
    }
    #snackbar.show {
      visibility: visible;
      opacity: 1;
      top: 30px;
    }
  </style>
</head>
<body>
  <div id="snackbar"></div>

  <div class="container">
    <?php include 'includes/navbar.php'; ?>

    <main class="center">
      <div class="form-auth">
        <h2>Halo!</h2>
        <p class="subtitle">Daftar akun anda!</p>
        <form action="" method="post" onsubmit="validasiFormLogin(event)">
          <div class="input-group">
            <label for="user">Username/Email</label>
            <input type="text" id="user" name="username">
          </div>
          <div class="input-group">
            <label for="pass">Password</label>
            <input type="password" id="pass" name="password">
          </div>
          <div class="input-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm">
          </div>
          <button type="submit" class="btn_submit">Register</button>
        </form>
      </div>
    </main>
  </div>
  <script src="js/script.js"></script>
  <?php if ($pesan != "") { ?>
  <script>tampilkanSnackbar("<?php echo $pesan; ?>");</script>
  <?php } ?>
</body>
</html>