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
  <!-- Wadah Pop-Up Kustom (Snackbar) -->
  <div id="snackbar"></div>

  <div class="container">
    <header>
      <nav>
        <a href="index.php" class="logo">GARENT</a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="category.php">Category</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="login.php" class="btn_login">Login</a></li>
        </ul>
      </nav>
    </header>

    <main class="center">
      <div class="form-auth">
        <h2>Halo!</h2>
        <p class="subtitle">Daftar akun anda!</p>
        <form action="register-proses.php" method="post" onsubmit="validasiFormLogin(event)">
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
          <button type="submit" class="btn_submit" name="register">Register</button>
        </form>
      </div>
    </main>
  </div>
  <script src="js/script.js"></script>
</body>
</html>