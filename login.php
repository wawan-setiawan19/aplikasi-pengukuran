<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/landing.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/login.css">
  </head>
  <body>
  <?php include('./assets/components/nav.php'); ?>
    <div class="login">
      <form action="proses-login.php" method="POST">
        <h1 class="login-text">LOGIN</h1>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Masukkan Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Masukkan Password" name="password" required>

        <button type="submit">Masuk</button>
        <div class="bottom-text">
          <div>Belum punya akun? <a href="./register.php">Register</a></div>
        </div>
      </form>
    </div>
  </body>
</html>
