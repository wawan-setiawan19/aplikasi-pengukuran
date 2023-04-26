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
    <div class="register">
      <form action="proses-registrasi.php" method="POST">
        <h1 class="login-text">REGISTER</h1>
        <label for="nama"><b>Nama Lengkap</b></label>
        <input type="text" placeholder="Masukkan Username" name="nama" required>
        
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Masukkan Username" name="username" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Masukkan Username" name="email" required>

        <label for="nik"><b>NIK</b></label>
        <input type="text" placeholder="Masukkan Username" name="nik" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Masukkan Password" name="password" required>
        
        <button type="submit">Daftar</button>
        <div class="bottom-text">
          <div>Sudah punya akun? <a href="./login.php">Login</a></div>
        </div>
      </form>
    </div>
  </body>
</html>
