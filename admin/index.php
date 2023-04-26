<?php
require_once('../abs_path.php');
session_start();
if(!$_SESSION['username']){
    header('Location:'.ROOT_PATH.'/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pengajuan Pengukuran Tanah</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT_PATH?>/assets/css/landing.css">
	<link rel="stylesheet" type="text/css" href="./admin.css">
</head>
<body>
    <?php include('../assets/components/nav.php'); ?>
  <nav class="sidenav">
    <ul>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Pengajuan</a></li>
      <li><a href="#">Laporan</a></li>
      <li><a href="#">Pengaturan</a></li>
    </ul>
    <button id="closeNav">&#10005;</button>
  </nav>
  <main>
    <button id="openNav">&#9776;</button>
    <h1>Selamat datang di halaman admin!</h1>
    <p>Silahkan pilih menu di sidenav untuk mengakses fitur yang tersedia.</p>
  </main>
  <script src="admin.js"></script>
</body>
</html>

</body>
</html>
